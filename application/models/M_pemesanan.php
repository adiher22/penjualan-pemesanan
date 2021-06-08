<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model {

    public function get($id = null){

		$this->db->from('pemesanan');
		if($id != null){
			$this->db->where('id_pemesanan',$id);
		}
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
}

/* End of file ModelName.php */

