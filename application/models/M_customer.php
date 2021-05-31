<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {
   
	public function login($post){
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('nama_pengguna', $post['username']);
		$this->db->where('password', password_verify($post['password'], PASSWORD_BCRYPT));
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
			$this->db->where("id_customer", $id);
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

		$params['nik'] = $post['nik'];
		$params['nama'] = $post['nama'];
	
		
		$params['no_hp'] = $post['no_hp'];
		$params['nama_pengguna'] = $post['username'];
		$params['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
		if(!empty($post['no_rek'])){
			$params['no_rek'] = $post['no_rek'];
		}
		if(!empty($post['no_kk'])){
			$params['no_kk'] = $post['no_kk'];
		}
		$params['alamat'] = $post['alamat'];
		$params['tgl_daftar'] = date('Y-m-d');
		
		$this->db->insert('customer', $params);
		
	}

	public function edit($post){

		$params['nik'] = $post['no_ktp'];
		$params['nama'] = $post['nama'];
		$params['no_hp'] = $post['no_hp']
;		$params['no_kk'] = $post['no_kk'];
		$params['no_rek'] = $post['norek'];
		$params['nama_pengguna'] = $post['username'];
		if(!empty($post['password'])) {
		$params['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
		}
		$params['alamat'] = $post['alamat'];

		$this->db->where('id_customer', $post['id_customer']);
		$this->db->update('customer', $params);
	}

	public function del($id)
	{
		$this->db->where('id_customer', $id);
		$this->db->delete('customer');
	}
    
}

/* EM_siswae ModelName.php */
