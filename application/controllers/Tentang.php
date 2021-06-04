<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

    public function index()
    {
        $data['title'] = "Profil Perusahaan";
        $data['isi'] = 'home/tentang';
        $data['footer'] = "Adiher";
        $this->load->view('layout/wrapper',$data);
    }

}
