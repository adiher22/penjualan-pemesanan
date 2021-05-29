<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_warga');
        $this->load->model('M_pembayaran');
        $this->load->model('M_rekening');
        
    }
    

    public function DataIuranKeamanan()
    {

        $data['title'] = "Pembayaran Iuran Keamanan Warga";
        $data['pembayaran'] = $this->M_pembayaran->get()->result_array();  

        $data['keamanan'] = $this->M_pembayaran->get()->row();

        $data['detail'] = $this->M_pembayaran->detail()->result_array();
        $this->template->load('admin/template', 'admin/pembayaran/data',$data);
        
    }

    public function cekTunggakan() {
        // Panggil id uri segment url ke 3 
        $id = $this->uri->segment(4);

        // Panggil data model dari m_pembayaran dengan parameter id 
        $query = $this->M_pembayaran->detail($id);
        if($query->num_rows() > 0){
            // Jika number rows lebih dari 0 = 1 maka munculkan data yang dipanggl
            $data['title'] = "Cek tunggakan warga";
            $data['warga'] = $query->row_array();
        
            $this->template->load('admin/template', 'admin/pembayaran/cek_tunggakan', $data);
        }else{
            // Jika url ngaco maka tampilkan message error ini
            echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='".site_url('admin/pembayaran/cekTungakan/'.$id)."';</script>";
        }
        
    }
    public function detailPembayaran(){
        $id = $this->uri->segment(4);

        $query = $this->M_pembayaran->get_detail($id);
        $detaila = $this->M_pembayaran->dataDetail($id);
		if($query->num_rows() && $detaila->num_rows() > 0) {
			$data['title'] = "Detail Pembayaran";
            $data['pembayaran'] = $query->row();
            $data['detail'] = $detaila->result_array();
			$this->template->load('admin/template', 'admin/pembayaran/detail',$data);
		}else{
			$this->session->set_flashdata('error','Data Tidak Ditemukan');
			redirect(base_url('admin/pembayaran/detailPembayaran'),'refresh');
		}
    }
}