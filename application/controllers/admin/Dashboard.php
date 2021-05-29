<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		check_not_login();
		
		// $this->load->model('M_pembayaran');
		// $this->load->model('M_admin');
		
	}
	

	public function index()
	{
		
		$data['title'] = "Halaman Dashboard";
		// $data['rekening'] = $this->M_admin->count('rekening');
		// $data['warga'] = $this->M_admin->count('warga');
		// $data['pembayaran'] = $this->M_admin->count('pembayaran');
		// $data['admin'] = $this->M_admin->count('admin');
		// $data['iuran'] = $this->M_pembayaran->get_dash(5);
		$this->template->load('admin/template', 'admin/dashboard',$data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */