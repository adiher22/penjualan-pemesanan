<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
   
	

	public function get($id = null){

		$this->db->from('kategori');
		if($id != null){
			$this->db->where('id_kategori',$id);
		}
		$query = $this->db->get();
		return $query;
	}
	
	public function get_edit($id = null){

		$this->db->from('kategori');
		if($id != null){
			$this->db->where("id_kategori", decrypt_url($id));
		}
		$query = $this->db->get();
		return $query;
	}
	public function add($post){
		$params['id_kategori'] = decrypt_url($post['id_kategori']);
		$params['kategori'] = $post['nama_kategori'];
		$params['slug'] = url_title($post['nama_kategori'], 'dash', TRUE);

		$this->db->insert('kategori', $params);
		
	}

	public function edit($post){

		$params['kategori'] = $post['nama_kategori'];
		$params['slug'] = url_title($post['nama_kategori'], 'dash', TRUE);

		$this->db->where('id_kategori', decrypt_url($post['id_kategori']));
		$this->db->update('kategori', $params);
	}

	public function del($id)
	{
		$this->db->where('id_kategori', decrypt_url($id));
		$this->db->delete('kategori');
	}
	function id_kategori(){
      
        $q = $this->db->query("SELECT MAX(RIGHT(id_kategori,4)) AS kd_max FROM kategori WHERE DATE(tgl_update)=CURDATE()");
        $kd = "";
        $no = "KTG-";
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
