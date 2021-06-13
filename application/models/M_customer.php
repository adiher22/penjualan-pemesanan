<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {
   
	public function login($post){
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('email', $post['email']);
		$this->db->where('password', password_verify($post['password'], PASSWORD_DEFAULT));
		$query = $this->db->get();
		return $query;
	}

	public function get($id = null){

		$this->db->from('customer');
		if($id != null){
			$this->db->where('id_customer',$id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function get_lib($id = null){

		$this->db->from('customer');
		if($id != null){
			$this->db->where("id_cust", $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function where($where){
		
		$this->db->select('*');
		
		$this->db->from('customer');
		$this->db->where($where);
		$query = $this->db->get();
	
		return $query;
		
		
	}
	public function get_edit($id = null){

		$this->db->from('customer');
		if($id != null){
			$this->db->where("sha1(id_customer)", $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function add($post){
		$params['id_cust'] = decrypt_url($post['kd']);
		$params['nama_cust'] = $post['nama_cust'];
		$params['email'] = $post['email'];
		$params['no_telp'] = $post['no_hp'];
	
		$params['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
		if(!empty($post['no_rek'])){
			$params['no_rek'] = $post['no_rek'];
		}
		
		$params['alamat'] = $post['alamat'];
		
		
		$this->db->insert('customer', $params);
		
	}

	public function getCust($id_cust){

		$this->db->select('alamat, no_rek,');
		$this->db->from('customer');
		$this->db->join('keranjang', 'keranjang.id_cust = customer.id_cust', 'left');
		$this->db->where('customer.id_cust', $id_cust);
		
		$query = $this->db->get();
		return $query;
		
	}
	public function edit($post,$id){

		if(!empty($post['no_rek'])){
			$params['no_rek'] = $post['no_rek'];
		}
		if(!empty($post['alamat_cust'])){
			$params['alamat'] = $post['alamat_cust'];
		}
		$this->db->where('id_cust', $id);
		$this->db->update('customer', $params);
	}
	public function editRekUpload($post,$id_cust){

		if(!empty($post['no_rek'])){
			$params['no_rek'] = $post['no_rek'];
		}
	
		$this->db->where('id_cust', $id_cust);
		$this->db->update('customer', $params);
	}
	public function del($id)
	{
		$this->db->where('id_customer', $id);
		$this->db->delete('customer');
	}
    function id_customer(){
      
        $q = $this->db->query("SELECT MAX(RIGHT(id_cust,4)) AS kd_max FROM customer WHERE DATE(tgl_daftar)=CURDATE()");
        $kd = "";
        $no = "CUST-";
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
    
}

/* EM_siswae ModelName.php */
