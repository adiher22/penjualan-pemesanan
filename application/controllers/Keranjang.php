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
        $this->load->model('M_bank');
        
        check_not_user_login();
    }
    function getBank($id_bank)
    {
        
        
		 $query = $this->M_bank->getBank(decrypt_url($id_bank))->row_array();
       
         output_json($query);
         
         return $query;
    }
    public function index()
    {
        $id_cust = $this->session->userdata('customerid');
        $cart = $this->M_produk->getCartProduk($id_cust)->result();

        if(!empty($cart)){
            $data['title'] = "Pemesanan Produk";
            $data['isi'] = 'produk/keranjang';
            $data['footer'] = "Adiher";
            $data['produk'] = $this->M_produk->getCartProduk($id_cust);
            $data['cust'] = $this->M_customer->getCust($id_cust)->row();
            $data['id_pemesanan'] = $this->M_pemesanan->id_pemesanan();
            $data['kd_trx'] = $this->M_pemesanan->kd_transaksi();
            $data['bank'] = $this->M_bank->get()->result();
            
            $data['sum'] = $this->M_produk->getCartTotal($id_cust)->row_array();
        
        

            $this->load->view('layout/wrapper', $data);
        }else{
            $this->session->set_flashdata('gagal','Keranjang Anda Masih Kosong... Pilih produk anda..!');
			redirect(base_url('produk'),'refresh');
        }
      
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
				$this->session->set_flashdata('sukses','Berhasil Ditambahkan.. Cek keranjang anda..!');
				redirect(base_url('produk'),'refresh');
			
        }else{

            echo "Data not found";
        }
    }
    public function del($id_keranjang)
    {
        $id_keranjang = decrypt_url($id_keranjang);
        
        $this->db->where('id_keranjang', $id_keranjang);
        $this->db->delete('keranjang');  
        $this->session->set_flashdata('sukses','Keranjang Berhasil Dihapus...!');
        redirect(site_url('keranjang'));
    }
}

/* End of file Controllername.php */


