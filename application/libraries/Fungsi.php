<?php 

/**
* 
*/
class Fungsi 
{
	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
	}
	
	function admin_login() {
		$this->ci->load->model('M_admin');
		$admin_id = $this->ci->session->userdata('adminid');
		$user_data = $this->ci->M_admin->get_lib($admin_id)->row();

		return $user_data;
	}

	function user_login() {
		$this->ci->load->model('M_warga');
		$warga_id = $this->ci->session->userdata('wargaid');
		$user_data = $this->ci->M_warga->get_lib($warga_id)->row();

		return $user_data;
	}
}
