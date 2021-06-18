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
		$data['customer'] = $this->M_admin->count('customer');
		$data['produk'] = $this->M_admin->count('produk');
		$data['order'] = $this->M_admin->count('pemesanan');
	
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
	public function pengiriman()
	{
	
		$data['title'] = "Halaman Dashboard Pengiriman";
		$data['footer'] = "Adiher";
		$data['pemesanan'] = $this->M_pemesanan->get()->result_array();
	
		$this->template->load('dashboard/template', 'dashboard/pengiriman',$data);
	}
	public function pelacakan()
	{
		$post = $this->input->post(null, TRUE);
		


		$valid = $this->form_validation;


		$valid->set_rules('no_resi', 'No Resi', 'required|min_length[17]|max_length[17]', 
				array(	'required'		=> '%s harus diisi',
							'min_length'	=> '%s harus diisi minimal 17 angka',
							'max_length' 	=> '%s harus diisi maximal 17 angka'));

				
		
			$valid->set_error_delimiters('<span class="text-danger"></span>');

	   if($valid->run()===FALSE) {  //jika  data kosong
		
		$data['title'] = "Halaman Dashboard Pelacakan Pengiriman";
	
		$this->template->load('dashboard/template', 'dashboard/pelacakan',$data);

		}else{
			$query = $this->M_pemesanan->get_track($post)->row_array();
			
				if($post['no_resi'] != $query['no_resi']) {
					$this->session->set_flashdata('gagal','No resi anda salah!.. cek kembali no resi anda.');
					redirect(base_url('dashboard/pengiriman'),'refresh');
				}else{

					$data['title'] = "Halaman Dashboard Pelacakan Pengiriman";
					$data['row'] = $this->M_pemesanan->get_track($post)->row_array();
					$data['prod'] = $this->M_pemesanan->get_track($post)->result_array();
					$this->template->load('dashboard/template', 'dashboard/pelacakan_data',$data);
					}
			}
			
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
		

				$config['upload_path'] = './upload/bukti/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 2048;
				$config['file_name'] = 'bukti-bayar'.date('ymd').'-'.substr(md5(rand()),0,01); 

			$this->load->library('upload', $config);
			// Upload bukti
			if($this->upload->do_upload('bukti_bayar')){
			$post['bukti_bayar'] = $this->upload->data('file_name');
			$this->M_pemesanan->upload_bukti($post);
		
			
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('sukses','Bukti bayar berhasil diupload');
					redirect(base_url('dashboard/pemesanan'),'refresh');
				}
			}else{
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('gagal',$error);
				redirect(base_url('dashboard/pemesanan'),'refresh');
			}
      
    }

	public function terima_barang() //terima barang
	{
		$id = $this->uri->segment(3);

		$this->M_pemesanan->terima_barang($id);
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('sukses', 'Barang anda telah berhasil diterima..!');
			redirect(base_url('dashboard/pengiriman'),'refresh');
		}else{
			  $this->session->set_flashdata('gagal', 'Data tidak ditemukan..!');
			   redirect(base_url('dashboard/pengiriman'),'refresh');
		}
	}
	public function akunSaya(){

	   $customer_id = $this->session->userdata('customerid');
    

	   $valid = $this->form_validation;

	   $valid->set_rules('nama_cust', 'Nama Customer', "required|min_length[5]|max_length[50]|regex_match[/[a-zA-Z]+$/]", 
			   array(	'required'		=> '%s harus diisi',
					    'min_length'	=> '%s nama harus lebih dari 5 karakter',
					    'max_length'	=> '%s nama harus kurang dari 50 karakter',
					    'regex_match'	=> '%s harus diisi huruf'));

	   $valid->set_rules('no_telp', 'No Telepon', 'required|min_length[11]|is_numeric', 
			   array(	'required'		=> '%s harus diisi',
					    'min_length'	=> '%s harus diisi minimal 11 angka',
						'is_numeric' => '%s Harus diisi angka'));

		$valid->set_rules('no_rek', 'No Rekening', 'required', 
		array(	'required'		=> '%s tidak boleh kosong'));			   
	 
	    $valid->set_error_delimiters('<span class="text-danger" role="alert"></span>');

	   if($valid->run()===FALSE) {
		 $data = [   'title' => 'Akun Saya',
					 'cust'   => $this->M_customer->get($customer_id)->row()
					 
			   ];
		   
	    $this->template->load('dashboard/template', 'dashboard/user_profile',$data);
	   
	   } else{ 
		   $post = $this->input->post(null, true);
		   $this->M_customer->editProfile($post,$customer_id);
		   if($this->db->affected_rows() > 0 ){
			   $this->session->set_flashdata('sukses', 'Profil berhasil diperbaharui..!');
			   redirect(base_url('dashboard/dasbor'),'refresh');
		   }else{
			     $this->session->set_flashdata('gagal', 'Profil Tidak diperbaharui..!');
			   redirect(base_url('dashboard/dasbor'),'refresh');
		   }


	   }
	}
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */