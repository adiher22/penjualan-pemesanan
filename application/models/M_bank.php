<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bank extends CI_Model {
   
	

	public function get($id = null){

		$this->db->from('bank');
		if($id != null){
			$this->db->where('id_bank',$id);
		}
		$query = $this->db->get();
		return $query;
	}
	
	public function get_edit($id = null){

		$this->db->from('bank');
		if($id != null){
			$this->db->where("id_bank", decrypt_url($id));
		}
		$query = $this->db->get();
		return $query;
	}
    public function getBank($id_bank){

		$this->db->from('bank');
		$this->db->where("id_bank", $id_bank);
		$query = $this->db->get();
		return $query;
	}
	public function add($post){
		
		$params['nama_bank'] = $post['nama_bank'];
        $params['nomor_rekening'] = $post['nomor_rekening'];
        $params['nama_pemilik'] = $post['nama_pemilik'];

		$this->db->insert('bank', $params);
		
	}

	public function edit($post){

		$params['nama_bank'] = $post['nama_bank'];
        $params['nomor_rekening'] = $post['nomor_rekening'];
        $params['nama_pemilik'] = $post['nama_pemilik'];

		$this->db->where('id_bank', decrypt_url($post['id_bank']));
		$this->db->update('bank', $params);
	}

	public function del($id)
	{
		$this->db->where('id_bank', decrypt_url($id));
		$this->db->delete('bank');
	}
	
    
}

/* EM_siswae ModelName.php */
