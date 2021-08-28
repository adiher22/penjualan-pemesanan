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

}

/* End of file ResetPassword.php */
