<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		check_not_login();
		$this->load->model('M_pemesanan');
		$this->load->model('M_customer');
		$this->load->model('M_produk');
		
		
	}
	

	public function index()
	{
		
		$data['title'] = "Halaman Dashboard";
		$data['pemesanan'] = $this->M_pemesanan->getDasbor(5);

		$this->template->load('admin/template', 'admin/dashboard',$data);
	}

	public function kotak_pesan()
	{
		$data['title'] = "Halaman Kotak Pesan Pengunjung";
		$data['kontak'] = $this->M_customer->getKontak()->result_array();

		$this->template->load('admin/template', 'admin/customer/kontak_pesan', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */