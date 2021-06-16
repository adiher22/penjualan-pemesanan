<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_pemesanan');
        $this->load->model('M_bank');
        $this->load->model('M_produk');
        check_not_login();
        

    }
    function get_ajax() {
        $list = $this->M_pemesanan->get_datatables();
        
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $today = (abs(strtotime(date('Y-m-d'))));
            $batas = (abs(strtotime($item->tgl_batas)));
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->id_pemesanan;
            $row[] = $item->nama_cust;
            if(!empty($item->bukti_bayar)) {
                $row[] = '<span class="text-success">' . $item->status_pemesanan. '</span>';
            }else{
                $row[] = '<span class="text-danger">' . $item->status_pemesanan. '</span>';
            }
            $row[] = indo_date($item->tgl_pesan);
            $row[] = indo_date($item->tgl_batas);
            $row[] = indo_curency($item->total);
            if(!empty($item->down_payment)) {
                $row[] = '<span class="text-danger"> DP :  ' . indo_curency($item->down_payment) . '</span>';
            }else{
                $row[] = '<span class="text-success"> FP : ' . indo_curency($item->full_payment) . '</span>';
            }
            $row[] = $item->nama_bank;
            // add html for action
            // jika batas bayar sudah lewat hari ini dan bukti bayar kosong
            if($batas <= $today && empty($item->bukti_bayar)){
                 $row[] = '<a href="" id="btn-hapus" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                          <a href="'.site_url('admin/transaksi/detailPemesanan/' . encrypt_url($item->id_pemesanan)) .'" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Detail</a>';
            }else{
                $row[] = '<a href="'.site_url('admin/transaksi/detailPemesanan/' . encrypt_url($item->id_pemesanan)) .'"" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Detail</a>';
            }
            
                
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->M_pemesanan->count_all(),
                    "recordsFiltered" => $this->M_pemesanan->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
    function get_ajax_pengiriman() {
        $list = $this->M_pemesanan->get_datatables();
        
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            if($item->status_pemesanan == "DIKIRIM") {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->id_pemesanan;
            $row[] = $item->nama_cust;
            $row[] = '<span class="text-primary">' . $item->status_pemesanan. '</span>';
            $row[] = indo_date($item->tgl_pesan);
            $row[] = indo_curency($item->total);
            // add html for action
           
            $row[] = '<a target="_blank" href="'.site_url('admin/transaksi/cetak_pengiriman/' . encrypt_url($item->id_pemesanan)) .'"" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Cetak Invoice</a>';

            $data[] = $row;
            }
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->M_pemesanan->count_all(),
                    "recordsFiltered" => $this->M_pemesanan->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
    public function pemesanan()
    {
        $data['title'] = "Transaksi Pemesanan";
       	$data['pemesanan'] = $this->M_pemesanan->get();
        $this->template->load('admin/template', 'admin/pemesanan/pemesanan_data', $data);
    }
    public function pengiriman()
    {
        $data['title'] = "Data Pengiriman";
       	$data['pemesanan'] = $this->M_pemesanan->get();
        $this->template->load('admin/template', 'admin/pengiriman/pengiriman_data', $data);
    }
    public function detailPemesanan($id)
    {
        $data['title'] = "Detail Pemesanan";
        $data['detail'] = $this->M_pemesanan->getDetailPemesanan($id)->row();
		$data['produk'] = $this->M_pemesanan->getProduk($id);
        $data['sum'] = $this->M_pemesanan->getSubtotal($id)->row_array();
        $data['no_resi'] = $this->M_pemesanan->no_resi();
        $this->template->load('admin/template', 'admin/pemesanan/detail_pemesanan', $data);
    }

    public function update_pengiriman()
    {
            $post = $this->input->post(null, TRUE);
            $detail = $this->M_pemesanan->get($post['id_pemesanan'])->row();
            if($detail->bukti_bayar != null ) {
          
                    $this->M_pemesanan->update_pengiriman($post);
                

                    if($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('sukses','Data berhasil diupdate');
                        redirect(base_url('admin/transaksi/pemesanan'),'refresh');
                    
                    }else{
                    
                        $this->session->set_flashdata('error','Data tidak diupdate');
                        redirect(base_url('admin/transaksi/pemesanan'),'refresh');
                    }
            }else{
                  $this->session->set_flashdata('error','Anda belum upload bukti bayar');
                        redirect(base_url('admin/transaksi/pemesanan'),'refresh');
            }
    }

    public function cetak_pengiriman()
    {
         $id = $this->uri->segment(4);

        $query = $this->M_pemesanan->getDetailPemesanan($id);
        $prod = $this->M_pemesanan->getProduk($id);
        if($query->num_rows() > 0 && $prod->num_rows() > 0){
            $data['title'] = "Cetak Invoice Pengiriman";
            $data['p'] = $query->row_array();
            $data['produk'] = $prod->result_array();
            $data['sum'] = $this->M_pemesanan->getSubtotal($id)->row_array();
            
            $this->load->view('admin/pengiriman/cetak', $data, FALSE);
            
        }else{
             $this->session->set_flashdata('error','Data tidak ditemukan!');
                        redirect(base_url('admin/transaksi/pengiriman'),'refresh');
        }
    }

}

/* End of file Pemesanan.php */
