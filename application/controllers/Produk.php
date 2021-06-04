<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function index()
    {
        $data['title'] = "Halaman Produk";
        $data['footer'] = "Adiher";

        $this->load->view('layout/wrapper', $data, TRUE);
    }

}

/* End of file Controllername.php */
