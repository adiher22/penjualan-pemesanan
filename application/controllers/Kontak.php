<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Petunjuk extends CI_Controller {

    public function index()
    {
        $data['title'] = "Profil Perumahan Grand Cikarang City";
        $data['isi'] = 'home/kontak';
        $this->load->view('layout/wrapper',$data);
    }

}