<?php 

// defined('BASEPATH') OR exit('No direct script access allowed');

// class Pembayaran extends CI_Controller {
    
//     public function __construct()
//     {
//         parent::__construct();
//         //Do your magic here
//         $this->load->model('M_warga');
//         $this->load->model('M_pembayaran');
//         $this->load->model('M_rekening');
        
//     }
    

//     public function IuranKeamanan()
//     {
//         $id_warga = $this->session->userdata('wargaid');
        
//         $data['title'] = "Pembayaran Iuran Keamanan Warga";
//         $data['pembayaran'] = $this->M_pembayaran->get($id_warga)->result_array();
//         $data['warga'] = $this->M_warga->get($id_warga)->row_array();
//         $data['keamanan'] = $this->M_pembayaran->get()->row();
//         $data['detail'] = $this->M_pembayaran->detail($id_warga)->result_array();
// 		$this->template->load('dashboard/template', 'pembayaran/pembayaran_data',$data);
//     }

//     public function TambahIuranKeamanan()
//     {
//         $id_warga = $this->session->userdata('wargaid');

//         // Pnggil field no_rek
//         $query = $this->db->query("SELECT no_rek FROM warga WHERE id_warga='$id_warga' order by id_warga desc limit 1");
               
//         $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required',
//             array(	'required' => '%s Harus Diisi'));

//         $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required',
//             array(	'required' => '%s Harus Diisi'));

//         $this->form_validation->set_rules('tgl_bayar', 'Tanggal Bayar', 'trim|required',
//         array(	'required' => '%s Harus Diisi'));

//         $this->form_validation->set_rules('rekening', 'Nomor Rekening', 'trim|required',
//         array(	'required' => '%s Harus Diisi'));
//         $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

        

//         if($this->form_validation->run() == FALSE) {
            
//             $data['title'] = "Tambah Pembayaran Iuran Keamanan";
//              // Data bulan select option
//             $data['bulan'] = date('m');
//             $data['bulan'] = [  'Januari', 
//                                 'Februari',
//                                 'Maret',
//                                 'April',
//                                 'Mei',
//                                 'Juni',
//                                 'Juli',
//                                 'Agustus',
//                                 'September',
//                                 'Oktober',
//                                 'November',
//                                 'Desember'];
//             $data['kd_keamanan'] = $this->M_pembayaran->kd_keamanan();
//             $data['w']  = $this->M_warga->get($id_warga)->row();
//             $data['rekening'] = $this->M_rekening->get()->result();

//             $this->template->load('dashboard/template', 'pembayaran/add_pembayaran', $data);
//         }
//         // Memanggil query
//         else if($query->num_rows() > 0)  {
//             $row = $query->row();

//             // Jika nomor rekening kosong / null
//             if(empty($row->no_rek)) {
//                 // Maka tolak
//                 $this->session->set_flashdata('error','Data rekening anda masih kosong!.. harap isi di halaman profile!');
//                 redirect(base_url('pembayaran/IuranKeamanan'),'refresh');
//             }else{
//                 $post = $this->input->post(null, TRUE);
//                 $this->M_pembayaran->add_pembayaran($post);
//                 $this->M_pembayaran->add_detail($post);
            
//                 if($this->db->affected_rows() > 0) {
//                     $this->session->set_flashdata('sukses','Data Berhasil Ditambahkan');
//                     redirect(base_url('pembayaran/IuranKeamanan'),'refresh');
//                 }
//             }
            
            
//         }
//         // else if($query1->num_rows() > 0){
//         //     $row = $query1->row_array();
//         //     $row['bulan'];
//         //     $row['tahun'];
//         //     $post = $this->input->post(null, TRUE);


//         //     if($row['bulan'] == $post['bulan'] && $row['tahun'] == $post['tahun']){
//         //          // Maka beri peringatan
//         //          $this->session->set_flashdata('error',"Anda sudah membayar bulan ini pada tahun ini!");
//         //          redirect(base_url('pembayaran/IuranKeamanan'),'refresh');
//         //     }else{
//         //         $post = $this->input->post(null, TRUE);
//         //         $this->M_pembayaran->add_pembayaran($post);
//         //         $this->M_pembayaran->add_detail($post);
            
//         //         if($this->db->affected_rows() > 0) {
//         //             $this->session->set_flashdata('sukses','Data Berhasil Ditambahkan');
//         //             redirect(base_url('pembayaran/IuranKeamanan'),'refresh');
//         //         }
//         //     }
//         // }
//         else {
    
//             $post = $this->input->post(null, TRUE);
//             $this->M_pembayaran->add_pembayaran($post);
//             $this->M_pembayaran->add_detail($post);
        
//             if($this->db->affected_rows() > 0) {
//                 $this->session->set_flashdata('sukses','Data Berhasil Ditambahkan');
//                 redirect(base_url('pembayaran/IuranKeamanan'),'refresh');
//             }
//         }

//     }

//     public function update_bayar()
//     {
//         // variable dari data gambar
//         $post = $this->input->post(null, TRUE);
        

//          $config['upload_path'] = './upload/bukti/';
// 		    $config['allowed_types'] = 'jpg|png|jpeg';
// 		    $config['max_size'] = 2048;
// 		    $config['file_name'] = 'bukti-bayar'.date('ymd').'-'.substr(md5(rand()),0,01); 

//         $this->load->library('upload', $config);
//         // Upload bukti
// 		if($this->upload->do_upload('bukti_bayar')){
// 		$post['bukti_bayar'] = $this->upload->data('file_name');
//         $this->M_pembayaran->upload_bukti($post);
            
// 		if($this->db->affected_rows() > 0) {
//             $this->session->set_flashdata('sukses','Bukti bayar berhasil diupload');
// 			redirect(base_url('pembayaran/IuranKeamanan'),'refresh');
// 		}
//      	}else{
//      		$error = $this->upload->display_errors();
// 			 $this->session->set_flashdata('error',$error);
// 			redirect(base_url('pembayaran/IuranKeamanan'),'refresh');
//      	}
//     }

//     public function cekTunggakan() {
//         // Panggil id uri segment url ke 3 
//         $id = $this->uri->segment(3);

//         // Panggil data model dari m_pembayaran dengan parameter id 
//         $query = $this->M_pembayaran->detail($id);
//         if($query->num_rows() > 0){
//             // Jika number rows lebih dari 0 = 1 maka munculkan data yang dipanggl
//             $data['title'] = "Cek tunggakan warga";
//             $data['warga'] = $query->row_array();
        
//             $this->template->load('dashboard/template', 'pembayaran/cek_tunggakan', $data);
//         }else{
//             // Jika url ngaco maka tampilkan message error ini
//             echo "<script>alert('Data Tidak Ditemukan');</script>";
// 			echo "<script>window.location='".site_url('pembayaran/cekTungakan/'.$id)."';</script>";
//         }
        
//     }
//     public function cetak() {
//         $id = $this->uri->segment(4);

//         $query = $this->M_pembayaran->get($id);
//         if($query->num_rows() > 0){
//             $data['title'] = "Cetak Bukti Pembayaran Iuran Keamanan";
//             $data['k'] = $query->row_array();
            
//             $this->load->view('pembayaran/cetak', $data, FALSE);
            
//         }else{
//             echo "<script>alert('Data Tidak Ditemukan');</script>";
// 			echo "<script>window.location='".site_url('pembayaran/IuranKeamanan')."';</script>";
//         }
        
//     }

//     public function hapusPembayaran($id){

//         $this->M_pembayaran->del_pembayaran($id);
//         $this->M_pembayaran->del_detail($id);
// 		if($this->db->affected_rows() > 0)
// 		{
// 			// Jika data berhasil dihapus
// 			$this->session->set_flashdata('sukses','Data Berhasil Dihapus');
// 			redirect(base_url('pembayaran/IuranKeamanan'),'refresh');
// 		}
//     }
}

/* End of file Controllername.php */
