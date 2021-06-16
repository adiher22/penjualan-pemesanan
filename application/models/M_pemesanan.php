<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model {

    public function get($id = null){
        $this->db->select('*');
		$this->db->from('pemesanan');
        $this->db->join('customer', 'pemesanan.id_cust = customer.id_cust', 'left');
		if($id != null){
			$this->db->where('pemesanan.id_pemesanan',$id);
		}
		$query = $this->db->get();
		return $query;
	}
     public function get_track($post){
        $this->db->select('*');
		$this->db->from('pemesanan');
        $this->db->join('customer', 'pemesanan.id_cust = customer.id_cust', 'left');
        $this->db->join('transaksi_detail', 'pemesanan.id_pemesanan = transaksi_detail.id_pemesanan', 'left');
        $this->db->join('produk', 'transaksi_detail.id_produk = produk.id_produk', 'left');
	    $this->db->where('pemesanan.no_resi',$post['no_resi']);
		
		$query = $this->db->get();
		return $query;
	}
    public function getUpload($id){
        $this->db->select('*');
		$this->db->from('pemesanan');
        $this->db->join('customer', 'pemesanan.id_cust = customer.id_cust', 'left');
		$this->db->where('pemesanan.id_pemesanan',decrypt_url($id));
		
		$query = $this->db->get();
		return $query;
	}
	 public function getPemesanan($id){
        $this->db->select('produk.*,
                          transaksi_detail.*,
                          pemesanan.*');
		$this->db->from('pemesanan');
        $this->db->join('transaksi_detail', 'pemesanan.id_pemesanan = transaksi_detail.id_pemesanan', 'left');
        $this->db->join('produk', 'transaksi_detail.id_produk = produk.id_produk', 'left');
        $this->db->order_by('pemesanan.id_pemesanan', 'asc');
        $this->db->group_by('pemesanan.id_pemesanan');
        
		$this->db->where('pemesanan.id_cust',$id);
		
		$query = $this->db->get();
		return $query;
	}
    public function getProduk($id)
    {
        $this->db->select('produk.*,
                          transaksi_detail.*');
		$this->db->from('transaksi_detail');
        $this->db->join('produk', 'transaksi_detail.id_produk = produk.id_produk', 'left');
        $this->db->order_by('transaksi_detail.id_pemesanan', 'desc');
		$this->db->where('transaksi_detail.id_pemesanan', decrypt_url($id));
		
		$query = $this->db->get();
		return $query;
    }
     public function getSubtotal($id)
    {
        $this->db->select('SUM(produk.harga) AS subtotal,
                          transaksi_detail.*');
		$this->db->from('transaksi_detail');
        $this->db->join('produk', 'transaksi_detail.id_produk = produk.id_produk', 'left');
        $this->db->order_by('transaksi_detail.id_pemesanan', 'desc');
		$this->db->where('transaksi_detail.id_pemesanan', decrypt_url($id));
		
		$query = $this->db->get();
		return $query;
    }
    public function terima_barang($id)
    {
        $params['status_pemesanan'] = "BARANG SAMPAI";

        $this->db->where('id_pemesanan', decrypt_url($id));
        $this->db->update('pemesanan', $params);
        
        
    }
     public function getDetailPemesanan($id){
        $this->db->select('pemesanan.*,
                          bank.*,
                          customer.*');
		$this->db->from('pemesanan');
        $this->db->join('customer', 'pemesanan.id_cust = customer.id_cust', 'left');
        $this->db->join('bank', 'bank.id_bank = pemesanan.id_bank', 'left');
        $this->db->order_by('pemesanan.id_pemesanan', 'asc');
		$this->db->where('pemesanan.id_pemesanan',decrypt_url($id));
		
		$query = $this->db->get();
		return $query;
	}
    function id_pemesanan(){
      
        $q = $this->db->query("SELECT MAX(RIGHT(id_pemesanan,4)) AS kd_max FROM pemesanan WHERE DATE(tgl_pesan)=CURDATE()");
        $kd = "";
        $no = "PMSN-";
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
    function no_resi(){
      
        $q = $this->db->query("SELECT MAX(RIGHT(no_resi,4)) AS kd_max FROM pemesanan WHERE DATE(tgl_pesan)=CURDATE()");
        $kd = "";
        $no = "KTI";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "01";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $no.time().$kd;
    }
    public function add($post){
		$params['id_pemesanan'] = decrypt_url($post['id_pemesanan']);
		$params['id_cust'] = $this->session->userdata('customerid');
		$params['id_bank'] = decrypt_url($post['bank']);
        if($post['down_payment'] != null) {
            $params['down_payment'] = $post['down_payment'];

        }
        if(!empty($post['full_payment'])){
            $params['full_payment'] = $post['full_payment'];
        }
        if(!empty($post['deskripsi_pemesanan'])) {
            $params['deskripsi_pemesanan'] = $post['deskripsi_pemesanan'];
        }
        $params['tgl_batas'] = date("Y-m-d", mktime(0,0,0, date("m"), date("d") + 2, date("Y")));
        $params['status_pemesanan'] = "BELUM TRANSFER";
        $params['pajak'] = $post['pajak'];
        $params['produk_asuransi'] = $post['produk_asuransi'];
        $params['biaya_pengiriman'] = $post['biaya_pengiriman'];
        $params['total'] = $post['total'];
		$this->db->insert('pemesanan', $params);
		
	}
   
    public function getCart($id){
        
        $this->db->select('keranjang.id_produk');
		$this->db->from('keranjang');
        $this->db->join('produk', 'keranjang.id_produk = produk.id_produk', 'left');
        
		$this->db->where("id_cust", $id);
		$query = $this->db->get();
		return $query;
	}
    public function upload_bukti($post)
    {
        $params['bukti_bayar'] = $post['bukti_bayar'];
        $params['status_pemesanan'] = "SUDAH DIBAYAR";

        $this->db->where('id_pemesanan', decrypt_url($post['id_pemesanan']));
        
        $this->db->update('pemesanan', $params);
        
    }
     public function update_pengiriman($post)
    {
        $params['status_pemesanan'] = $post['status_pemesanan'];

            if($post['status_pemesanan'] === "DIKIRIM") {
                $params['no_resi'] = $post['no_resi'];
            }
        $this->db->where('id_pemesanan', $post['id_pemesanan']);
        
        $this->db->update('pemesanan', $params);
        
    }
    public function addDetail($post,$cart) // script menambahkan transaksi
    {
        $params = array();
        foreach($cart as $cart) : 
            $params[] = [
                'id_produk' => $cart['id_produk'],
                'id_pemesanan' => decrypt_url($post['id_pemesanan'])
            ];
            endforeach;
     

        $this->db->insert_batch('transaksi_detail', $params);
    }
      // start datatables
    var $column_order = array(null, 'id_pemesanan', 'nama_bank', 'nama_cust', 'total'); //set column field database for datatable orderable
    var $column_search = array('id_pemesanan', 'nama_cust', 'total','nama_bank'); //set column field database for datatable searchable
    var $order = array('id_pemesanan' => 'asc'); // default order 
 
    private function _get_datatables_query() {
        $this->db->select('pemesanan.*, customer.*, bank.*');
        $this->db->from('pemesanan');
        $this->db->join('customer', 'pemesanan.id_cust = customer.id_cust');
        $this->db->join('bank', 'pemesanan.id_bank = bank.id_bank', 'left');
        
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
        $this->db->from('pemesanan');
        return $this->db->count_all_results();
    }
    // end datatables
    
}

/* End of file ModelName.php */

