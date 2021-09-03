<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ResetPassword extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_customer');
		
	}

    public function index()
    {
        check_already_user_login();

		$data['title'] = "Reset Password Anda";
		$data['copyright'] = "Adiher";

        $this->load->view('auth/lupa_pw',$data);
    }

	public function newpassword()
	{
		check_already_user_login(); // helper 
		
		$id = $this->uri->segment(3);

		if($id == $this->session->userdata('reset')){

			$this->form_validation->set_rules('password', 'Password', 'trim|required',
			array(	'required' => '%s Harus Diisi'));

			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'trim|required|matches[password]',
			array(	'required' => '%s Harus Diisi',
					'matches' => '%s Password tidak sama'));

		

			$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

			if($this->form_validation->run() == FALSE) {

				$data['title'] = "Password baru";
				$data['copyright'] = "Adiher";

				$this->load->view('auth/pwbaru', $data);
				
			}else {
				$post = $this->input->post(null, TRUE);	
				$email = $this->session->userdata('email');
				
				$this->M_customer->ubahPw($post,$email);

				if($this->db->affected_rows() > 0) {
					$this->session->unset_userdata('reset','email');

					$this->session->set_flashdata('sukses','Data Berhasil Diubah..Silahkan login!');
					redirect(base_url('auth'),'refresh');
				}else{
					$this->session->set_flashdata('warning','Data Tidak Diubah');
					redirect(base_url('auth'),'refresh');
				}

			}

			$data['title'] = "Password baru";
			$data['copyright'] = "Adiher";

			$this->load->view('auth/pwbaru', $data);

		}else{
			$this->session->set_flashdata('gagalToken','Token invalid..! Kirim ulang..');
					redirect(base_url('resetPassword'),'refresh');
		}
       	
	}
	public function sendEmail()
	{
		check_already_user_login(); // helper 

		$this->load->library('email'); // load libary email
		// set config SMPTP Gmail
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'Kogawa';
		$config['protocol'] = 'smtp';
		$config['mailtype'] = 'html';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '5';
		$config['smtp_user'] = 'adihernawan5@gmail.com'; //isidengan gmail
		$config['smtp_pass'] = ''; //isi dengan pass
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);

		$key = md5(md5(time()));


		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email', 
		array(	'required' => '%s Harus Diisi',
				'valid_email' => '%s Tidak valid!'));

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

        if($this->form_validation->run() == FALSE) { 
			
			$data['title'] = "Reset Password Anda";
			$data['copyright'] = "Adiher";

			$this->load->view('auth/lupa_pw',$data);
			
			
		}else {
			$post = $this->input->post(null, TRUE);

			$this->email->from('adihernawan5@gmail.com', 'Name');
			$this->email->to($post['email']);
	
			$this->email->subject('Reset Password');
			$this->email->message('Apakah anda lupa dengan password anda ? Silahkan klik  
						<a href="'.base_url().'resetPassword/newpassword/'.$key.'">DI SINI</a> . Jika anda merasa tidak merequest fitur ini, Silahkan abaikan pesan ini');
			
			
			if($this->email->send()) {
				$data = [
					'reset' => $key,
					'email' => $post['email']
				];
				$this->session->set_userdata( $data );
				
				$this->session->set_flashdata('sukses','Berhasil dikirim ke email anda!');
				redirect(base_url('resetPassword'),'refresh');
			}else{
				$this->session->set_flashdata('warning','Email gagal dikirim!!');
				redirect(base_url('resetPassword'),'refresh');
			}
		}
		

		
		
		
	}
}

/* End of file ResetPassword.php */
