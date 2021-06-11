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
            if($batas <= $today && empty($item->bukti_bayar)){
                 $row[] = '<a href="" id="btn-hapus" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                          <a href="" data-toggle="modal" data-target="#modal-detail" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Detail</a>';
            }else{
                $row[] = '<a href="" data-toggle="modal" data-target="#modal-detail" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Detail</a>
                     <a href="" class="btn btn-success btn-sm"><i class="fas fa-paper-plane "></i> Kirim</a>';
            }
            
                
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->M_produk->count_all(),
                    "recordsFiltered" => $this->M_produk->count_filtered(),
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

}

/* End of file Pemesanan.php */
