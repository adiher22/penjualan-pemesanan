<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model {

    
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
}

/* End of file ModelName.php */

