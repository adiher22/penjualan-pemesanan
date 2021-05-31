<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
public function __construct()
{
parent::__construct();  
        //Do your magic here
		// check_not_user_login();
		$this->load->model('M_customer');
	

	}
	

	public function index()
	{
		// $id = $this->session->userdata('customerid');
		
		$data['title'] = "Halaman Dashboard Customer";
		// $data['paymen_last'] = $this->M_pembayaran->get_last(5,$id);
		$this->template->load('dashboard/template', 'dashboard/dashboard',$data);
	}

// 	public function profile(){

// 	   $customer_id = $this->session->userdata('customerid');
    

// 	   $valid = $this->form_validation;

// 	   $valid->set_rules('nama', 'Nama Customer', "required|min_length[5]|max_length[50]|regex_match[/[a-zA-Z]+$/]", 
// 			   array(	'required'		=> '%s harus diisi',
// 					    'min_length'	=> '%s nama harus lebih dari 5 karakter',
// 					    'max_length'	=> '%s nama harus kurang dari 50 karakter',
// 					    'regex_match'	=> '%s harus diisi huruf'));

// 	   $valid->set_rules('no_hp', 'No Handphone', 'required|min_length[11]', 
// 			   array(	'required'		=> '%s harus diisi',
// 					   'min_length'	=> '%s harus diisi minimal 11 angka'));

// 		$valid->set_rules('norek', 'No Rekening', 'required', 
// 		array(	'required'		=> '%s tidak boleh kosong'));			   
	 
	   

// 	   if($valid->run()===FALSE) {
// 		 $data = [   'title' => 'Halaman Profile Customer',
// 					 'row'   => $this->M_customer->get($customer_id)->row()
					 
// 			   ];
		   
// 	    $this->template->load('dashboard/template', 'dashboard/user_profile',$data);
	   
// 	   } else{ 
// 		   $post = $this->input->post(null, true);
// 		   $this->M_customer->edit($post);
// 		   if($this->db->affected_rows() > 0 ){
// 			   $this->session->set_flashdata('sukses_edit', 'Profil berhasil diperbaharui..!');
// 			   redirect(base_url('dashboard'),'refresh');
// 		   }


// 	   }
// 	}
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */