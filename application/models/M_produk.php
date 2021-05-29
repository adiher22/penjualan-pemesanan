<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {
    
	public function get($id = null){

		
		$this->db->select('produk.*,
                          kategori.*');
		$this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
     
        
		$this->db->order_by('produk.id_produk', 'desc');
		
		if($id != null){
			$this->db->where("produk.id_produk", $id);
		}
		$query = $this->db->get();
		return $query;
    }
    public function get_dash($limit){

		
		$this->db->select('produk.*,
                          warga.*');
		$this->db->from('produk');
        $this->db->join('warga', 'warga.id_warga = produk.id_warga', 'left');
     
        $this->db->limit($limit);
        
		$this->db->order_by('produk.id_produk', 'desc');
		
		$query = $this->db->get();
		return $query;
    }
    public function get_last($limit,$id){

		
		$this->db->select('produk.*,
                          warga.*');
		$this->db->from('produk');
        $this->db->join('warga', 'warga.id_warga = produk.id_warga', 'left');
     
        $this->db->limit($limit);
        $this->db->where("produk.id_warga", $id);
		$this->db->order_by('produk.id_produk', 'desc');
		
		$query = $this->db->get();
		return $query;
    }
	public function get_detail($id = null){

		
		$this->db->select('produk.*,
                          warga.*,
                          rekening.*');
		$this->db->from('produk');
        $this->db->join('warga', 'warga.id_warga = produk.id_warga', 'left');
        $this->db->join('rekening', 'rekening.id_rekening = produk.id_rekening', 'left');
        
        
		$this->db->order_by('produk.id_produk', 'desc');
		
		if($id != null){
			$this->db->where("sha1(produk.id_produk)", $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add_produk($post){

		$params['id_produk'] = $post['id_produk'];
		$params['id_warga'] = $post['id_warga'];
        $params['nominal'] = $post['nominal'];
        $params['id_rekening'] = $post['rekening'];
        $params['total_biaya'] = $post['total_biaya'];
		$params['tgl_bayar'] = $post['tgl_bayar'];
		

		$this->db->insert('produk', $params);
		
    }

    public function upload_bukti($post){
        $params['bukti_bayar'] = $post['bukti_bayar'];

        
        $this->db->where('id_produk', $post['id_produk']);
        
        $this->db->update('produk', $params);
        
    }
    
    public function add_detail($post){
        $bulan_spp = $post['bulan'];
        $params['id_produk'] = $post['id_produk'];
		$params['id_warga'] = $post['id_warga'];
		
        $params['tahun'] = $post['tahun'];
        foreach($bulan_spp as $bulan) {
            $params['bulan'] = $bulan;

            $this->db->insert('detail', $params);
        }
	
		
	}
  
    public function detail($id = null){
        $this->db->select('warga.*,
                          produk.*,
                          detail.*');
		$this->db->from('warga');
        $this->db->join('produk', 'produk.id_warga = warga.id_warga', 'left');
        $this->db->join('detail','detail.id_warga = detail.id_warga', 'left');
        
		$this->db->order_by('warga.id_warga', 'desc');
		
		if($id != null){
			$this->db->where("sha1(warga.id_warga)", $id);
		}
		$query = $this->db->get();
		return $query;
    }
    public function dataDetail($id = null){
        $this->db->select('warga.*,
                          produk.*,
                          detail.*');
		$this->db->from('detail');
        $this->db->join('produk', 'produk.id_produk = detail.id_produk', 'left');
        $this->db->join('warga','warga.id_warga = detail.id_warga', 'left');
        
		$this->db->order_by('detail.id_produk', 'desc');
		
		if($id != null){
			$this->db->where("sha1(detail.id_produk)", $id);
		}
		$query = $this->db->get();
		return $query;
    }
   
	public function del_produk($id)
	{
		$this->db->where('id_produk', $id);
		$this->db->delete('produk');
    }
    public function del_detail($id)
	{
		$this->db->where('id_produk', $id);
		$this->db->delete('detail');
    }
    function id_produk(){
      
        $q = $this->db->query("SELECT MAX(RIGHT(id_produk,4)) AS kd_max FROM produk WHERE DATE(tgl_update)=CURDATE()");
        $kd = "";
        $no = "PROD-";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $no.date('ymd-').$kd;
    }
    function getdetail($params = array())
    {
        
        if(isset($params['id_produk']))
        {
            $this->db->where('id_produk', $params['id_produk']);
        }

        if(isset($params['id_warga']))
        {
            $this->db->where('id_warga', $params['id_warga']);
        }
        
        if(isset($params['bulan']))
        {
            $this->db->where('bulan', $params['bulan']);
        }
        if(isset($params['tahun']))
        {
            $this->db->where('tahun', $params['tahun']);
        }
        

        if(isset($params['limit']))
        { 
            if(!isset($params['offset']))
            {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }

        if(isset($params['order_by']))
        {
            $this->db->order_by($params['order_by'], 'desc');
        }
        

        $this->db->select('id_detail, id_warga, bulan,
            tahun');
        $res = $this->db->get('detail');

       
            return $res->result_array();
    }
        function get_tahun($kode)
    {
        $query=$this->db->query("SELECT DISTINCT tahun FROM detail WHERE id_warga = '$kode'");
        return $query->result_array();
    }

    function get_butun($kode, $tahun)
    {
        $query=$this->db->query("SELECT * FROM detail WHERE id_warga = '$kode' and tahun = '$tahun' order by tahun asc");
        return $query->result_array();
    }

    public function report($where){
		$this->db->select('produk.*,
        warga.*');
		$this->db->from('produk');

		$this->db->join('warga', 'produk.id_warga = warga.id_warga', 'left');
    
        
		$this->db->where($where);
		$this->db->order_by('id_produk', 'asc');

		$query = $this->db->get();
		return $query;
    }
    
    public function report_detail($where){
		$this->db->select('produk.*,
        warga.*,
        detail.*');
		$this->db->from('detail');

		$this->db->join('warga', 'detail.id_warga = warga.id_warga', 'left');
        $this->db->join('produk', 'produk.id_produk = detail.id_produk', 'left');
        
        
		$this->db->where($where);
		$this->db->order_by('detail.id_produk', 'asc');

		$query = $this->db->get();
		return $query;
	}
}

/* EM_siswae ModelName.php */
