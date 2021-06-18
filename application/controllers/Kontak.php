<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_customer');
        
    }
    
    public function index()
    {
        $data['title'] = "Kontak Kami";
        $data['isi'] = 'home/kontak';
        $data['footer'] = "Adiher";
        $this->load->view('layout/wrapper',$data);
    }
    public function add_pesan() //function kotak pesan pada halaman kontak
	{
		$this->form_validation->set_rules('nama_anda', 'Nama Anda', 'trim|required|min_length[5]|max_length[50]|regex_match[/[a-zA-Z]+$/]',
		array(	'required' => '%s Harus Diisi',
                'min_length' => '%s Minimal 5 karakter',
                'regex_match' => '%s Harus menggunakan huruf'));
		
		$this->form_validation->set_rules('email_anda', 'Email Anda', 'trim|required|valid_email',
		array(	'required' => '%s Harus Diisi',
                'valid_email' => '%s Email tidak valid'));

         $this->form_validation->set_rules('pesan', 'Pesan', 'trim|required|max_length[500]',
		array(	'required' => '%s Harus Diisi',
                'max_length' => '%s Anda mecapai maksimum 500 kata'));       

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE) {
            
                $data['title'] = "Kontak Kami";
                $data['isi'] = 'home/kontak';
                $data['footer'] = "Adiher";

                $this->load->view('layout/wrapper',$data);
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_customer->addKontak($post);
			if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sukses','Data Berhasil Ditambahkan');
                redirect(base_url('kontak'),'refresh');
            }
		}
	}

}
