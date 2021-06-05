<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_produk');
        $this->load->model('M_kategori');
    }
    
    public function index()
    {
        $data['title'] = "Halaman Produk";
        $data['isi'] = 'produk/list_produk';
        $data['footer'] = "Adiher";
        $data['produk'] = $this->M_produk->get()->result();
        $data['kategori'] = $this->M_kategori->get()->result();

        $this->load->view('layout/wrapper', $data);
    }
    public function detail($slug)
    {
        $data['title'] = "Detail Produk";
        $data['isi'] = 'produk/detail_produk';
        $data['footer'] = "Adiher";
        $data['d'] = $this->M_produk->detail($slug)->row(); 

        $this->load->view('layout/wrapper', $data);
    }

     public function kategori($slug)
    {
        $data['title'] = "Kategori";
        $data['isi'] = 'produk/list_produk';
        $data['footer'] = "Adiher";
        $query = $this->M_produk->getProdukKategori($slug)->result(); 
        $data['kategori'] = $this->M_kategori->get()->result();
        
        $data['produk'] = $query;

        $this->load->view('layout/wrapper', $data);
    }

}

/* End of file Controllername.php */
