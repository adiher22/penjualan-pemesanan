<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function login($post){
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $post['username']);
		$this->db->where('password', sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}
	public function get_lib($id = null){

		$this->db->from('admin');
		if($id != null){
			$this->db->where("id_admin", $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function get($id = null){

		$this->db->from('admin');
		if($id != null){
			$this->db->where("sha1(id_admin)", $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post){

		$params['nama'] = $post['nama'];
		$params['username'] = $post['username'];
		$params['password'] = sha1($post['password']);
		
		$this->db->insert('admin', $params);
		
	}
	public function count($table) 
	{
		return $this->db->count_all($table);
	}
	public function edit($post){
		$params['nama'] = $post['nama'];
		$params['username'] = $post['username'];
		$params['gambar'] = $post['gambar'];
		if(!empty($post['password'])){
		$params['password'] = sha1($post['password']);
	     }
		$this->db->where('id_admin', $post['id_admin']);
		$this->db->update('admin', $params);
	}

	public function del($id)
	{
		$this->db->where("sha1(id_admin)", $id);
		$this->db->delete('admin');
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */