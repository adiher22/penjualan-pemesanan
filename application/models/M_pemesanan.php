<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model {

    public function get($id = null){
        $this->db->select('*');
		$this->db->from('pemesanan');
        $this->db->join('customer', 'pemesanan.id_cust = customer.id_cust', 'left');
		if($id != null){
			$this->db->where('pemesanan.id_cust',$id);
		}
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
    public function addDetail($post,$cart)
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
    
}

/* End of file ModelName.php */

