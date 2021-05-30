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
	public function get_edit($id){

		
		$this->db->select('produk.*,
                          kategori.*');
		$this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
     
        
		$this->db->order_by('produk.id_produk', 'desc');
		
		if($id != null){
			$this->db->where("sha1(produk.id_produk)", $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post){

		$params['id_produk'] = $post['id_produk'];
		$params['id_kategori'] = $post['id_kategori'];
        $params['nama_produk'] = $post['nama_produk'];
        $params['slug'] = url_title($post['nama_produk'], 'dash', TRUE);
        $params['harga'] = $post['harga'];
        $params['gambar'] = $post['gambar'];
        $params['deskripsi'] = $post['deskripsi'];
	
		

		$this->db->insert('produk', $params);
		
    }

    public function edit($post){
        
        $params['id_kategori'] = $post['id_kategori'];
        $params['nama_produk'] = $post['nama_produk'];
        $params['slug'] = url_title($post['nama_produk'], 'dash', TRUE);
        $params['harga'] = $post['harga'];
        $params['deskripsi'] = $post['deskripsi'];
        
        if($post['gambar'] != null) {
            $params['gambar'] = $post['gambar'];
        }
        $this->db->where('sha1(id_produk)', $post['kd']);
        $this->db->update('produk',$params);
    }

  
  
    // public function detail($id = null){
    //     $this->db->select('warga.*,
    //                       produk.*,
    //                       detail.*');
	// 	$this->db->from('warga');
    //     $this->db->join('produk', 'produk.id_warga = warga.id_warga', 'left');
    //     $this->db->join('detail','detail.id_warga = detail.id_warga', 'left');
        
	// 	$this->db->order_by('warga.id_warga', 'desc');
		
	// 	if($id != null){
	// 		$this->db->where("sha1(warga.id_warga)", $id);
	// 	}
	// 	$query = $this->db->get();
	// 	return $query;
    // }
    // public function dataDetail($id = null){
    //     $this->db->select('warga.*,
    //                       produk.*,
    //                       detail.*');
	// 	$this->db->from('detail');
    //     $this->db->join('produk', 'produk.id_produk = detail.id_produk', 'left');
    //     $this->db->join('warga','warga.id_warga = detail.id_warga', 'left');
        
	// 	$this->db->order_by('detail.id_produk', 'desc');
		
	// 	if($id != null){
	// 		$this->db->where("sha1(detail.id_produk)", $id);
	// 	}
	// 	$query = $this->db->get();
	// 	return $query;
    // }
   
	public function del($id)
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

      // start datatables
    var $column_order = array(null, 'id_produk', 'nama_produk', 'kategori', 'harga'); //set column field database for datatable orderable
    var $column_search = array('id_produk', 'nama_produk', 'kategori','harga'); //set column field database for datatable searchable
    var $order = array('id_produk' => 'asc'); // default order 
 
    private function _get_datatables_query() {
        $this->db->select('produk.*, kategori.kategori as kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
      
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('produk');
        return $this->db->count_all_results();
    }
    // end datatables
}

/* EM_siswae ModelName.php */
