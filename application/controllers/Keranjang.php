<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_produk');
        $this->load->model('M_pemesanan');
        $this->load->model('M_customer');
        
    }
    
    public function index()
    {
        $id_cust = $this->session->userdata('customerid');

        $data['title'] = "Pemesanan Produk";
        $data['isi'] = 'produk/keranjang';
        $data['footer'] = "Adiher";
        $data['produk'] = $this->M_produk->getCartProduk($id_cust);
        $data['cust'] = $this->M_customer->getCust($id_cust)->row();
        $data['id_pemesanan'] = $this->M_pemesanan->id_pemesanan();

        
       

        $this->load->view('layout/wrapper', $data);
    }

    public function add($id_produk)
    {
        
        $id_produk = decrypt_url($id_produk);
        $id_cust = $this->session->userdata('customerid');
 
        $data = [
            'id_produk' => $id_produk,
            'id_cust' => $id_cust
        ];

        if($data!=null)
        {
            $this->db->insert('keranjang', $data);

            redirect(site_url('produk'));
        }else{

            echo "Data not found";
        }
    }
}

/* End of file Controllername.php */


