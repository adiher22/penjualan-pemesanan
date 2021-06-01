<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        check_not_login();
        $this->load->model('M_admin');
        
    }
    

    public function index()
    {
        $data['title'] = "Manajemen Pengguna";
        $data['pengguna'] = $this->M_admin->get()->result();
        $this->template->load('admin/template', 'admin/user/user_data', $data);
    }

    public function tambahPengguna()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', 
			array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[25]',
			array(	'required' => '%s Harus Diisi',
					'min_length' => '%s Minimal 4 Karakter',
					'max_length' => '%s Maksimal 20 Karakter'));

		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'trim|required',
			array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE) {
            
            $data['title'] = "Tambah Pengguna";
            
            $this->template->load('admin/template', 'admin/user/add_pengguna', $data);
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_admin->add($post);
			if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sukses','Data Berhasil Ditambahkan');
                redirect(base_url('pengguna'),'refresh');
            }
		}

		
    }
    public function editPengguna() {

        $id = $this->uri->segment(4);

        $this->form_validation->set_rules('username', 'Username', 'trim|required', 
			array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'trim|required',
			array(	'required' => '%s Harus Diisi'));
	
	  

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

	
        

         
		if($this->form_validation->run() == FALSE) {
			$query = $this->M_admin->get($id);
			if($query->num_rows() > 0){
                $data['row'] = $query->row();
                $data['title'] = "Edit Profil";

				$this->template->load('admin/template', 'admin/user/edit_pengguna',$data);

			}else{
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('admin/pengguna')."';</script>";
			}
			
		}else {
			$post = $this->input->post(null, TRUE);

			// upload gambar profile
			$config['upload_path'] = './upload/profile/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['file_name'] = 'profile-'.date('ymd').'-'.substr(md5(rand()),0,01); 

			$this->load->library('upload', $config);
			// Upload foto
			if($this->upload->do_upload('gambar')){
			$post['gambar'] = $this->upload->data('file_name');

			$admin = $this->M_admin->get($id)->row();
			$target_file = './upload/profile/'.$admin->gambar;
			unlink($target_file);
			$this->M_admin->edit($post);
					if($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('sukses','Data Berhasil Diubah');
						redirect(base_url('admin/dashboard'),'refresh');
					}
			}else{
					$this->session->set_flashdata('sukses','Data Diubah Tanpa Gambar');
					redirect(base_url('admin/dashboard'),'refresh');
				}
				
     			
				
			
		}
	
	// public function hapusPengguna(){
	// 	$id = $this->uri->segment(4);
	
	// 	$this->M_admin->del($id);
	// 	// Jika berhasil dihapus
	// 	if($this->db->affected_rows() > 0) {
	// 		$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
	// 		redirect(site_url('admin/pengguna'), 'refresh');
	// 	}

	// }

}
}
/* End of file Controllername.php */

