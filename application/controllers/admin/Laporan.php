<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_pemesanan');
        $this->load->model('M_customer');
        $this->load->model('M_produk');
        check_not_login();
        
        
    }
    
    public function laporanPemesanan(){
        $data['title'] = "Halaman Laporan Pemesanan";

		$this->template->load('admin/template', 'admin/laporan/laporanPemesanan',$data);
    }
    public function LaporanDataPemesanan(){

        // Validasi data dari view siswa laporan
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'trim|required', 
        array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'trim|required', 
            array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

        if($this->form_validation->run() == FALSE) {
            $data['title'] = "Laporan Data Pemesanan";

            $this->template->load('admin/template', 'admin/laporan/laporanDataPemesanan',$data); 
        }else {
            
        $dari = $this->input->post('dari', TRUE);
        $sampai = $this->input->post('sampai', TRUE);

            $data['title'] = "Laporan Data Pemesanan Berdasarkan Tanggal";
            $where = ['tgl_pesan >=' => $dari, 'tgl_pesan <=' => $sampai];
            $data['report'] = $this->M_pemesanan->report($where)->result();
            $data['reportDetail'] = $this->M_pemesanan->report($where)->result_array();
            
            $this->template->load('admin/template', 'admin/laporan/laporanDataPemesanan',$data);
                    
        }
    }

    public function cetakPemesanan(){
        $dari = $this->input->get('dari', TRUE);
        $sampai = $this->input->get('sampai', TRUE);
            if($dari != "" || $sampai != "") {
                $where = ['tgl_pesan >=' => $dari, 'tgl_pesan <=' => $sampai];
                $data['report'] = $this->M_pemesanan->report($where)->result();
                $data['reportDetail'] = $this->M_pemesanan->report($where)->result_array();
                $data['title'] = "Cetak Laporan Data Pemesanan";
                // var_dump($data);
                // die;
                $this->load->view('admin/laporan/cetakPemesanan',$data);
            }else{
                
                redirect(base_url('admin/laporan/LaporanDataPemesanan'),'refresh');
                
            }
    }

    public function laporanPengiriman()
    {
           $data['title'] = "Halaman Laporan Pengiriman";

		$this->template->load('admin/template', 'admin/laporan/laporanPengiriman',$data);
    }
    
      public function LaporanDataPengiriman(){

        // Validasi data dari view siswa laporan
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'trim|required', 
        array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'trim|required', 
            array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

        if($this->form_validation->run() == FALSE) {
            $data['title'] = "Laporan Data Pengiriman";

            $this->template->load('admin/template', 'admin/laporan/laporanDataPemesanan',$data); 
        }else {
            
        $dari = $this->input->post('dari', TRUE);
        $sampai = $this->input->post('sampai', TRUE);

            $data['title'] = "Laporan Data Pemesanan Berdasarkan Tanggal";
            $where = ['tgl_pesan >=' => $dari, 'tgl_pesan <=' => $sampai];
            $data['report'] = $this->M_pemesanan->report($where)->result();
            $data['reportDetail'] = $this->M_pemesanan->report($where)->result_array();
            
            $this->template->load('admin/template', 'admin/laporan/laporanDataPengiriman',$data);
                    
        }
    }

    public function cetakPengiriman(){
        $dari = $this->input->get('dari', TRUE);
        $sampai = $this->input->get('sampai', TRUE);
            if($dari != "" || $sampai != "") {
                $where = ['tgl_pesan >=' => $dari, 'tgl_pesan <=' => $sampai];
                $data['report'] = $this->M_pemesanan->report($where)->result();
                $data['reportDetail'] = $this->M_pemesanan->report($where)->result_array();
                $data['title'] = "Cetak Laporan Data Pemesanan";
                // var_dump($data);
                // die;
                $this->load->view('admin/laporan/cetakPemesanan',$data);
            }else{
                
                redirect(base_url('admin/laporan/LaporanDataPemesanan'),'refresh');
                
            }
    }
}