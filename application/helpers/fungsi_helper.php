<?php 

function check_already_login() {

  $ci =& get_instance();
  $user_session = $ci->session->userdata('userid');
  if($user_session) {
  	redirect('admin/dashboard','refresh');
  }
}

function check_not_login() {

  $ci =& get_instance();
  $user_session = $ci->session->userdata('userid');
  if(!$user_session) {
  	redirect('admin/login','refresh');
  }
}

function check_already_user_login() {

    $ci =& get_instance();
    $user_session = $ci->session->userdata('customerid');
    if($user_session) {
        redirect('dashboard','refresh');
    }
  }
if(!function_exists('get_csrf_token')){
    function get_csrf_token(){
        $ci = get_instance();
        if(!$ci->session->csrf_token){
            $ci->session->csrf_token = hash('sha1', time());

        }

        return $ci->session->csrf_token;
    }
}
if(!function_exists('get_csrf_name')){
    function get_csrf_name(){
        return "token";
    }
}

if(!function_exists('cek_csrf')){
    function cek_csrf(){
    $ci = get_instance();;
    if( $ci->input->post('token') != $ci->session->csrf_token){
        $ci->session->unset_userdata('csrf_token');
        $ci->output->set_status_header(403);
		show_error('The action bamdmas');
        return false;
    }
    }
}

function check_not_user_login() {

    $ci =& get_instance();
    $user_session = $ci->session->userdata('customerid');
   
    if(!$user_session) {
        $ci->session->set_flashdata('warning', 'Silahkan login atau daftar dulu..!');
        redirect('auth','refresh');
    }
  }
function indo_curency($nominal){

  $result = "Rp. " . number_format($nominal,0,',','.');
  return $result;

}
function indo_date($date){
  $d = substr($date, 8,2);
  $m = substr($date, 5,2);
  $y = substr($date, 0,4);

  return $d.'-'.$m.'-'.$y;
}

//Format Medium date
    function date_lahir($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = medium_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.'-'.$bulan.'-'.$tahun;
    }
  
    function medium_bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Ags";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
 




