<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
  
        $this->load->model('M_customer');
        $this->load->model('M_bank');
        
        $this->load->model('M_pemesanan');
        $this->load->model('M_produk');
        
        
    }
    private function delCart($id)
    {
        
      
        $this->db->where('id_cust', $id);
        $this->db->delete('keranjang');  
       
    }
    
    public function add()
    {
        $id = $this->session->userdata('customerid'); // ambil id dari user custmer yg sedang login
        $post = $this->input->post(null, TRUE);
        
        $this->form_validation->set_rules('bank', 'Bank', 'trim|required', 
            array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('no_rek', 'Nomor Rekening Anda', 'trim|required|is_numeric|min_length[11]', 
            array(	'required' => '%s Harus Diisi',
                    'is_numeric' => '%s Harus diisi angka',
                    'min_length' => '%s Minimal 11 angka'));

        $this->form_validation->set_error_delimiters('<span class="text-danger"></span>');
        
		if($this->form_validation->run() == FALSE) {
            
           $id_cust = $this->session->userdata('customerid');

            $data['title'] = "Pemesanan Produk";
            $data['isi'] = 'produk/keranjang';
            $data['footer'] = "Adiher";
            $data['produk'] = $this->M_produk->getCartProduk($id_cust);
            $data['cust'] = $this->M_customer->getCust($id_cust)->row();
            $data['id_pemesanan'] = $this->M_pemesanan->id_pemesanan();
            $data['id_transaksi'] = $this->M_pemesanan->id_transaksi();
            $data['bank'] = $this->M_bank->get()->result();
         
            $data['sum'] = $this->M_produk->getCartTotal($id_cust)->row_array();

            
            $this->load->view('layout/wrapper', $data);
		}else {
			$post = $this->input->post(null, TRUE);
         
            $cart = $this->M_pemesanan->getCart($id)->result_array(); // get data dari keranjang
         
			$this->M_pemesanan->add($post); // insert / add table pemesanan
            $this->M_customer->edit($post,$id); // edit table customer
            $this->M_pemesanan->addDetail($post,$cart);//inset data transaksi detail
            $this->delCart($id); // delete table cart jadi 0
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('sukses','Pemesanan Berhasil... Cek Data Pemesanan!!');
					redirect(base_url('dashboard/pemesanan'),'refresh');
				}
			}
        
    }

}

/* End of file Pemesanan.php */
