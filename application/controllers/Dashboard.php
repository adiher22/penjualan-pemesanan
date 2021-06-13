<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
public function __construct()
{
		parent::__construct();  
        //Do your magic here
		// check_not_user_login();
		$this->load->model('M_customer');
		$this->load->model('M_pemesanan');
		$this->load->model('M_produk');
		check_not_user_login();

	}
	

	public function dasbor()
	{
		
		
		$data['title'] = "Halaman Dashboard Customer";
		$data['footer'] = "Adiher";
		$data['pemesanan'] = $this->M_pemesanan->get();
	
		$this->template->load('dashboard/template', 'dashboard/dashboard',$data);
	}

	public function pemesanan()
	{
		$id = $this->session->userdata('customerid');
		$data['title'] = "Halaman Dashboard Pemesanan";
		$data['footer'] = "Adiher";
		$data['pemesanan'] = $this->M_pemesanan->get()->result_array();
	
		$this->template->load('dashboard/template', 'dashboard/pemesanan',$data);
	}
	
	public function detailPemesanan($id)
	{
	
		$data['title'] = "Halaman Detail Pemesanan";
		$data['footer'] = "Adiher";
		$data['detail'] = $this->M_pemesanan->getDetailPemesanan($id)->row();
		$data['sum'] = $this->M_pemesanan->getSubtotal($id)->row_array();
		$data['produk'] = $this->M_pemesanan->getProduk($id);
		$this->template->load('dashboard/template', 'dashboard/detailPemesanan',$data);
	}
	
	public function upload_bukti()
    {
		
			  // variable dari data gambar
			$post = $this->input->post(null, TRUE);
			$id_cust = $this->session->userdata('customerid');

				$config['upload_path'] = './upload/bukti/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 2048;
				$config['file_name'] = 'bukti-bayar'.date('ymd').'-'.substr(md5(rand()),0,01); 

			$this->load->library('upload', $config);
			// Upload bukti
			if($this->upload->do_upload('bukti_bayar')){
			$post['bukti_bayar'] = $this->upload->data('file_name');
			$this->M_pemesanan->upload_bukti($post);
			$this->M_customer->editRekUpload($post,$id_cust);

			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('sukses','Bukti bayar berhasil diupload');
				redirect(base_url('dashboard/pemesanan'),'refresh');
			}
			}else{
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error',$error);
				redirect(base_url('dashboard/pemesanan'),'refresh');
			}
      
    }

    
    public function cetak() {
        $id = $this->uri->segment(4);

        $query = $this->M_pembayaran->get($id);
        if($query->num_rows() > 0){
            $data['title'] = "Cetak Bukti Pembayaran Iuran Keamanan";
            $data['k'] = $query->row_array();
            
            $this->load->view('pembayaran/cetak', $data, FALSE);
            
        }else{
            echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='".site_url('pembayaran/IuranKeamanan')."';</script>";
        }
        
    }
	public function profile(){

	   $customer_id = $this->session->userdata('customerid');
    

	   $valid = $this->form_validation;

	   $valid->set_rules('nama', 'Nama Customer', "required|min_length[5]|max_length[50]|regex_match[/[a-zA-Z]+$/]", 
			   array(	'required'		=> '%s harus diisi',
					    'min_length'	=> '%s nama harus lebih dari 5 karakter',
					    'max_length'	=> '%s nama harus kurang dari 50 karakter',
					    'regex_match'	=> '%s harus diisi huruf'));

	   $valid->set_rules('no_hp', 'No Handphone', 'required|min_length[11]', 
			   array(	'required'		=> '%s harus diisi',
					   'min_length'	=> '%s harus diisi minimal 11 angka'));

		$valid->set_rules('norek', 'No Rekening', 'required', 
		array(	'required'		=> '%s tidak boleh kosong'));			   
	 
	   

	   if($valid->run()===FALSE) {
		 $data = [   'title' => 'Halaman Profile Customer',
					 'row'   => $this->M_customer->get($customer_id)->row()
					 
			   ];
		   
	    $this->template->load('dashboard/template', 'dashboard/user_profile',$data);
	   
	   } else{ 
		   $post = $this->input->post(null, true);
		   $this->M_customer->edit($post);
		   if($this->db->affected_rows() > 0 ){
			   $this->session->set_flashdata('sukses_edit', 'Profil berhasil diperbaharui..!');
			   redirect(base_url('dashboard'),'refresh');
		   }


	   }
	}
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */