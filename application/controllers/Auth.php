<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_customer');
		
	}
	

    public function index()
    {
		check_already_user_login();
		$data['title'] = "Login Customer";
		$data['copyright'] = "Adiher";

        $this->load->view('auth/login',$data);
    }
    public function proses()
	{
	

		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('M_customer');
			$query = $this->M_customer->login($post);
			
			if($query->num_rows() > 0){
				$row = $query->row();

				$param = ['customerid' => $row->id_cust,
						  'nama'    => $row->nama_cust]; 
				if($row->email != $post['email']){
					$this->session->set_flashdata('warning', 'Email salah / belum terdaftar!');
					 redirect(site_url('auth'),'refresh');
				}else{
					$this->session->set_userdata($param);
			    	$this->session->set_flashdata('sukses_login', 'Klik Oke Untuk Lanjut');
					 redirect(site_url('dashboard/dasbor'),'refresh');
				}
				
			}
			else{
				$this->session->set_flashdata('warning', 'Email atau Password Salah!');
					 redirect(site_url('auth'),'refresh');
			}
		}
		
	}

    public function register()
    {
		
		check_already_user_login();
		$this->form_validation->set_rules('nama_cust', 'Nama Customer', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|is_unique[customer.email]|valid_email', 
		array(	'required' => '%s Harus Diisi',
				'is_unique' => '%s Sudah terdaftar pada sistem',
				'valid_email' => '%s Tidak valid!'));

		$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required|is_numeric|min_length[11]', 
		array(	'required' => '%s Harus Diisi',
				'is_numeric' => '%s Harus Diisi Angka',
				'min_length' => '%s Minimal 11 angka'));

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[25]',
			array(	'required' => '%s Harus Diisi',
					'min_length' => '%s Minimal 4 Karakter',
					'max_length' => '%s Maksimal 20 Karakter'));

		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_error_delimiters(' <span class="invalid-feedback" role="alert"></span>');

		if($this->form_validation->run() == FALSE) {
		
			
			$data['title'] = "Registrasi Data Customer";
			$data['copyright'] = "Adiher";
			$data['kd'] = $this->M_customer->id_customer();
			
			$this->load->view('auth/register',$data);
		}else {
			$post = $this->input->post(null, TRUE);
			$param = ['customerid' => decrypt_url($post['kd']),
					 'nama'    => $post['nama_cust']]; 
			
			$this->M_customer->add($post);
			$this->session->set_userdata($param);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('sukses','Registrasi Berhasil..! Anda bisa login sekarang');
				redirect(base_url('auth/sukses'),'refresh');
			}
		}
	}
	public function sukses(){
		$data['title'] = "Registrasi Sukses";

		$this->load->view('auth/sukses', $data);
	}
	public function logout()
	{
		$param = ['customerid', 'nama'];
		$this->session->unset_userdata($param);
		$this->session->set_flashdata('sukses_logout','Anda Berhasil Logout');
		redirect(base_url('auth'),'refresh');
	}

	function check_email(){
		
		$email = $this->input->get('email');
		$where = ['email' => $email];
		$query = $this->M_customer->where($where);
		 
		
		if($query->num_rows() > 0){
			echo  "Unvailable";
		}else{
			echo "Available";
		}
		
		return $query;
		
	}
}

/* End of file Auth.php */
