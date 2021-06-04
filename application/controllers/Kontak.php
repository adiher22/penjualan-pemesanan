<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function index()
    {
        $data['title'] = "Kontak Kami";
        $data['isi'] = 'home/kontak';
        $data['footer'] = "Adiher";
        $this->load->view('layout/wrapper',$data);
    }

}
