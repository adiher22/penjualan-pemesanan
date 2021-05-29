<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_pembayaran');
        $this->load->model('M_warga');

        
        
    }
    
    public function index(){
        $data['title'] = "Halaman Laporan Pembayaran";

		$this->template->load('admin/template', 'admin/laporan/laporan',$data);
    }
    public function LaporanData(){

        // Validasi data dari view siswa laporan
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'trim|required', 
        array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'trim|required', 
            array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

        if($this->form_validation->run() == FALSE) {
            $data['title'] = "Laporan Data Pembayaran";

            $this->template->load('admin/template', 'admin/laporan/laporan_data',$data); 
        }else {
            
        $dari = $this->input->post('dari', TRUE);
        $sampai = $this->input->post('sampai', TRUE);

            $data['title'] = "Laporan Data Pembayaran Berdasarkan Tanggal";
            $where = ['tgl_bayar >=' => $dari, 'tgl_bayar <=' => $sampai];
            $data['report'] = $this->M_pembayaran->report($where)->result();
            $data['reportDetail'] = $this->M_pembayaran->report_detail($where)->result_array();
            
            $this->template->load('admin/template', 'admin/laporan/laporan_data',$data);
                    
        }
    }

    public function cetak(){
        $dari = $this->input->get('dari', TRUE);
        $sampai = $this->input->get('sampai', TRUE);
            if($dari != "" || $sampai != "") {
                $where = ['tgl_bayar >=' => $dari, 'tgl_bayar <=' => $sampai];
                $data['report'] = $this->M_pembayaran->report($where)->result();
                $data['reportDetail'] = $this->M_pembayaran->report_detail($where)->result_array();
                $data['title'] = "Cetak Laporan Data Pembayaran";
                // var_dump($data);
                // die;
                $this->load->view('admin/laporan/cetak',$data);
            }else{
                
                redirect(base_url('admin/laporan/laporanData'),'refresh');
                
            }
    }
  
}