<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $data['title'] = "PT KOGAWA TEKNIK INDONESIA";
        $data['isi'] = 'home/home';
        $data['footer'] = "Adiher";
        $this->load->view('layout/wrapper', $data, FALSE);
    }

}
