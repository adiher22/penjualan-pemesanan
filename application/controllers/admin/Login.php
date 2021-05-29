<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		check_already_login();
		// has password geneate echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);
	 	
	
		$this->load->view('login');
	}

	public function proses()
	{

		
		
		$post = $this->input->post(null, TRUE);

			
		if(isset($post['login'])){
			cek_csrf();	
			$this->load->model('M_admin');
			$query = $this->M_admin->login($post);
			
			if($query->num_rows() > 0){
			$row = $query->row();
			$param['userid'] = $row->id_admin;
			cek_csrf();
			$this->session->set_userdata($param);
			$this->session->set_flashdata('sukses_login', 'Klik Oke Untuk Lanjut');
					redirect(site_url('admin/dashboard'),'refresh');
			}else {
				$this->session->set_flashdata('warning', 'Username atau Password salah!');
					redirect(site_url('admin/login'),'refresh');
			}
			
		
		}
		
	}
	public function logout()
	{
		$param = ['userid'];
		$this->session->unset_userdata($param);
		$this->session->set_flashdata('sukses_logout','Anda Berhasil Logout');
		redirect(base_url('admin/login'),'refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
