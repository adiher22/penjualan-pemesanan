<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_customer');
        
    }
    
    public function index()
    {
        $data['title'] = "Halaman Manajemen Customer";
		$data['customer'] = $this->M_customer->get()->result();

		$this->template->load('admin/template', 'admin/customer/data',$data);
    }

}

/* End of file Controllername.php */
