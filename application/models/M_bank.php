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
		
		$params['id_bank'] = decrypt_url($post['id_bank']);
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
	function id_bank(){
      
        $q = $this->db->query("SELECT MAX(RIGHT(id_bank,4)) AS kd_max FROM bank WHERE DATE(tgl_update)=CURDATE()");
        $kd = "";
        $no = "BANK-";
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
