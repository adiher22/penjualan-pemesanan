<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_produk');
        $this->load->model('M_kategori');
		$this->load->model('M_bank');
		
		check_not_login();
    }
     function get_ajax() {
        $list = $this->M_produk->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->id_produk;
            $row[] = $item->nama_produk;
            $row[] = $item->kategori;
            $row[] = indo_curency($item->harga);
            $row[] = $item->deskripsi;
            $row[] = $item->gambar != null ? '<img src="'.site_url('upload/produk/'.$item->gambar).'" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="'.site_url('admin/master/editProduk/'.sha1($item->id_produk)).'" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                    <a href="'.site_url('admin/master/hapusProduk/'.$item->id_produk).'" id="btn-hapus" class="btn btn-warning btn-sm"><i class="fas fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->M_produk->count_all(),
                    "recordsFiltered" => $this->M_produk->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    public function produk()
    {
        $data['title'] = "Manajemen Produk";
        $data['produk'] = $this->M_produk->get()->result();
        $this->template->load('admin/template', 'admin/produk/produk_data', $data);
    }

    public function tambahProduk()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required', 
            array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('id_kategori', 'Kategori Produk', 'trim|required',
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('harga', 'Harga Produk', 'trim|required|is_numeric',
		array(	'required' => '%s Harus Diisi',
				'is_numeric' => '%s Harus Berupa Angka'));
				
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'trim|required',
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE) {
            
            $data['title'] = "Tambah Produk";
            $data['kd'] = $this->M_produk->id_produk();
			$data['kategori'] = $this->M_kategori->get()->result();
            $this->template->load('admin/template', 'admin/produk/add_produk', $data);
		}else {
			$post = $this->input->post(null, TRUE);
				// upload gambar produk
			$config['upload_path'] = './upload/produk/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['file_name'] = 'produk-'.date('ymd').'-'.substr(md5(rand()),0,01); 

			$this->load->library('upload', $config);
			// Upload foto
			if($this->upload->do_upload('gambar')){
			$post['gambar'] = $this->upload->data('file_name');

			$this->M_produk->add($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan');
					redirect(base_url('admin/master/produk'),'refresh');
				}
			}else{
				$error = $this->upload->display_errors();
			 	$this->session->set_flashdata('error',$error);
				redirect(base_url('admin/master/produk'),'refresh');
    		 	}
			}
	}



    public function editProduk()
    {
        $id = $this->uri->segment(4);


		// upload gambar produk
		$config['upload_path'] = './upload/produk/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 2048;
		$config['file_name'] = 'produk-'.date('ymd').'-'.substr(md5(rand()),0,01); 

		$this->load->library('upload', $config);
		
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required', 
            array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('id_kategori', 'Kategori Produk', 'trim|required',
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('harga', 'Harga Produk', 'trim|required|is_numeric',
		array(	'required' => '%s Harus Diisi',
				'is_numeric' => '%s Harus Berupa Angka'));
				
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'trim|required',
		array(	'required' => '%s Harus Diisi'));
	
	  

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE) {
			$query = $this->M_produk->get_edit($id);
			if($query->num_rows() > 0){
                $data['row'] = $query->row();
                $data['title'] = "Edit Data Produk";
				$data['kategori'] = $this->M_kategori->get()->result();

				$this->template->load('admin/template', 'admin/produk/edit_produk',$data);

			}else{
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('admin/master/produk')."';</script>";
			}
			
		}else {
			
			$post = $this->input->post(null, TRUE);
				// Upload foto
			if($_FILES['gambar']['name'] != null) {
				// jika gambar tidak ksong = ada maka upload
				if($this->upload->do_upload('gambar')){
			

				$produk = $this->M_produk->get_edit($id)->row();
				// jika gambar tidak kosong maka replace gambar
					if($produk->gambar != null){
						$target_file = './upload/produk/'.$produk->gambar;
						unlink($target_file);
					}
				$post['gambar'] = $this->upload->data('file_name');
				$this->M_produk->edit($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('sukses','Data Berhasil Diubah Beserta Gambar');
					redirect(base_url('admin/master/produk'),'refresh');
				}
			  }
			}else{
				$post['gambar'] = null;
				// jika gambar kosong / tidak kosong tapi fled ada maka 
				$this->M_produk->edit($post);
				if($this->db->affected_rows() > 0) {
					// jika gambar tidak di upload
				$this->session->set_flashdata('sukses','Data disimpan tanpa merubah gambar');
				redirect(base_url('admin/master/produk'),'refresh');
				}
			
			}
			
			

		}
	}
	public function hapusProduk(){
		$id = $this->uri->segment(4);
		$produk = $this->M_produk->get($id)->row();
		$target_file = './upload/produk/'.$produk->gambar;
		unlink($target_file);
		$this->M_produk->del($id);
		
		// Jika berhasil dihapus
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
			
		} 
		redirect(site_url('admin/master/produk '), 'refresh');
	}
	
	public function kategori()
	{
		$data['title'] = "Manajemen Data Kategori";
        $data['kategori'] = $this->M_kategori->get()->result();
        $this->template->load('admin/template', 'admin/kategori/data', $data);
	}

	public function tambahKategori()
	{
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required',
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE) {
            
            $data['title'] = "Tambah Data Kategori";
			$data['kd'] = $this->M_kategori->id_kategori();
            
            $this->template->load('admin/template', 'admin/kategori/add_kategori', $data);
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_kategori->add($post);
			if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sukses','Data Berhasil Ditambahkan');
                redirect(base_url('admin/master/kategori'),'refresh');
            }
		}
	}
	public function editKategori()
    {
        $id = $this->uri->segment(4);

       $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required',
		array(	'required' => '%s Harus Diisi'));

	  

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE) {
			$query = $this->M_kategori->get_edit($id);
			if($query->num_rows() > 0){
                $data['row'] = $query->row();
                $data['title'] = "Edit Data Kategori";

				$this->template->load('admin/template', 'admin/kategori/edit_kategori',$data);

			}else{
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('admin/master/kategori')."';</script>";
			}
			
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_kategori->edit($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('sukses','Data Berhasil Diubah');
				redirect(base_url('admin/master/kategori'),'refresh');
			}else{
				$this->session->set_flashdata('warning','Data Tidak Diubah');
				redirect(base_url('admin/master/kategori'),'refresh');
			}

		}
	}
	public function hapusKategori(){
		$id = $this->uri->segment(4);
	
		$this->M_kategori->del($id);
		// Jika berhasil dihapus
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
			redirect(site_url('admin/master/kategori '), 'refresh');
		}

	}

	public function bank()
	{
		$data['title'] = "Manajemen Bank";
        $data['bank'] = $this->M_bank->get()->result();
        $this->template->load('admin/template', 'admin/bank/data', $data);
	}
	
	public function tambahBank()
	{
		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|required',
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'trim|required',
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'trim|required',
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE) {
            
            $data['title'] = "Tambah Data Rekening";
		
            
            $this->template->load('admin/template', 'admin/bank/add_bank', $data);
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_bank->add($post);
			if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sukses','Data Berhasil Ditambahkan');
                redirect(base_url('admin/master/bank'),'refresh');
            }
		}
	}
	public function editBank()
    {
        $id = $this->uri->segment(4);

       	$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|required',
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'trim|required',
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'trim|required',
		array(	'required' => '%s Harus Diisi'));

	  

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE) {
			$query = $this->M_bank->get_edit($id);
			if($query->num_rows() > 0){
                $data['row'] = $query->row();
                $data['title'] = "Edit Data Bank";

				$this->template->load('admin/template', 'admin/bank/edit_bank',$data);

			}else{
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('admin/master/bank')."';</script>";
			}
			
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_bank->edit($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('sukses','Data Berhasil Diubah');
				redirect(base_url('admin/master/bank'),'refresh');
			}else{
				$this->session->set_flashdata('warning','Data Tidak Diubah');
				redirect(base_url('admin/master/bank'),'refresh');
			}

		}
	}
	public function hapusBank()
	{
		$id = $this->uri->segment(4);
	
		$this->M_bank->del($id);
		// Jika berhasil dihapus
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
			redirect(site_url('admin/master/bank '), 'refresh');
		}
	}
}

/* End of file Master.php */


