<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_warga');
		
	}
	

    public function index()
    {
		check_already_warga_login();

		$data['copyright'] = "Adiher";

        $this->load->view('auth/login',$data);
    }
    public function proses()
	{
	

		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('M_warga');
			$query = $this->M_warga->login($post);
			if($query->num_rows() > 0){
				$row = $query->row();

				$param = ['wargaid' => $row->id_warga,
						  'nama'    => $row->nama]; 
			
				$this->session->set_userdata($param);
			    $this->session->set_flashdata('sukses_login', 'Klik Oke Untuk Lanjut');
					 redirect(site_url('dashboard'),'refresh');
			}else {
				$this->session->set_flashdata('warning', 'Username atau Password salah!');
					 redirect(site_url('auth'),'refresh');
			}
		}
		
	}

    public function register()
    {
		check_already_warga_login();
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[warga.nama_pengguna]', 
		array(	'required' => '%s Harus Diisi',
				'is_unique' => '%s / nama pengguna sudah digunakan! gunakan useranme lain..'));

		$this->form_validation->set_rules('nik', 'No KTP', 'trim|required|min_length[16]', 
		array(	'required' => '%s Harus Diisi',
				'min_length' => '%s Minimal 16 digit'));

		$this->form_validation->set_rules('no_hp', 'No Handphone', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[25]',
			array(	'required' => '%s Harus Diisi',
					'min_length' => '%s Minimal 4 Karakter',
					'max_length' => '%s Maksimal 20 Karakter'));

		$this->form_validation->set_rules('nama', 'Nama Warga', 'trim|required',
			array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE) {
			
			$data['title'] = "Registrasi Data Warga";
			$data['copyright'] = "Adiher";
			$this->load->view('auth/register',$data);
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_warga->add($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('sukses','Registrasi Berhasil..! Anda bisa login sekarang');
				redirect(base_url('auth'),'refresh');
			}
		}
	}
	public function logout()
	{
		$param = ['wargaid', 'nama'];
		$this->session->unset_userdata($param);
		$this->session->set_flashdata('sukses_logout','Anda Berhasil Logout');
		redirect(base_url('auth'),'refresh');
	}
}

/* End of file Auth.php */
