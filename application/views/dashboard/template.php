<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <!-- Icon -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/login/images/icons/smart-home.png') ?>"/>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= site_url('assets/template/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Summernote -->
  <link rel="stylesheet" href="<?= site_url('assets/template/plugins/summernote/summernote-bs4.min.css') ?>">
  <!-- Datatables -->
  <link rel="stylesheet" href="<?= site_url('assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?= site_url('assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?= site_url('assets/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')?>">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= site_url('assets/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= site_url('assets/template/plugins/toastr/toastr.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= site_url('assets/template/dist/css/adminlte.min.css')?>">
  <!-- jQuery Validation -->
  <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css"
  rel="stylesheet" type="text/css" />
    <!-- Select2 -->
  <link rel="stylesheet" href="<?= site_url('assets/template/plugins/select2/css/select2.min.css')?>">
  <link rel="stylesheet" href="<?= site_url('assets/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= site_url('assets/template/plugins/daterangepicker/daterangepicker.css')?>">
  <!-- Sweet Alert 2 -->
  <link rel="stylesheet" href="<?= site_url('assets/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
    
        <a href="<?= site_url('home') ?>" class="nav-link"><i class="fas fa-home"></i> Home</a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
       
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
        
          <div class="dropdown-divider"></div>
          
      </li>
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item d-none d-sm-inline-block">

        <a href="<?= base_url('auth/logout') ?>" id="btn-logout" class="nav-link"> <i class="fas fa-sign-out-alt"></i> Keluar</a>
      </li>
      
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link navbar-primary">
      <img src="<?= base_url('assets/login/images/icons/smart-home.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PPIK Grand Cikarang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/front-end/images/user.png')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->fungsi->user_login()->nama ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      
       
           <li class="nav-header">TRANSAKSI</li>
           <li class="nav-item">
            <a href="<?= site_url('pembayaran/IuranKeamanan') ?>" class="nav-link  <?= $this->uri->segment(2) == 'IuranKeamanan' || $this->uri->segment(2) == 'TambahIuranKeamanan' || $this->uri->segment(2) == 'cekTunggakan' ? 'active' : ''; ?>">
            <i class="fas fa-money-check-alt"></i>
              <p>
                Iuran Keamanan
              
              </p>
            </a>
            
          </li>
        
         
        
          <li class="nav-header">MODUL</li>
          <li class="nav-item">
            <a href="<?= site_url('dashboard/profile') ?>" class="nav-link <?= $this->uri->segment(2) == 'profile' ? 'active' : ''; ?>">
            <i class="fas fa-user"></i>
              <p>Profile </p>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <?php echo $contents ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y') ?> Developer Indonesia.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
     
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= site_url('assets/template/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= site_url('assets/template/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Datatables  -->
<script src="<?= site_url('assets/template/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= site_url('assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?= site_url('assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?= site_url('assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<script src="<?= site_url('assets/template/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?= site_url('assets/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
<script src="<?= site_url('assets/template/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
<script src="<?= site_url('assets/template/plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
<script src="<?= site_url('assets/template/plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
<script src="<?= site_url('assets/template/plugins/jszip/jszip.min.js')?>"></script>
<script src="<?= site_url('assets/template/plugins/pdfmake/pdfmake.min.js')?>"></script>
<script src="<?= site_url('assets/template/plugins/pdfmake/vfs_fonts.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= site_url('assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- Select2 -->
<script src="<?= site_url('assets/template/plugins/select2/js/select2.full.min.js')?>"></script>
<!-- Summernote -->
<script src="<?= site_url('assets/template/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= site_url('assets/template/plugins/chart.js/Chart.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?= site_url('assets/template/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- jQUery Validation -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<!-- Sweet Alert 2 -->
<script src="<?= site_url('assets/template/plugins/sweetalert2/sweetalert2.min.js')?>"></script>

<!-- Toastr -->
<script src="<?= site_url('assets/template/plugins/toastr/toastr.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= site_url('assets/template/dist/js/adminlte.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= site_url('assets/template/dist/js/demo.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= site_url('assets/template/dist/js/pages/dashboard.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= site_url('assets/template/plugins/moment/moment.min.js')?>"></script>
<script src="<?= site_url('assets/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<!-- Sweet Alert  -->
<?php if($this->session->flashdata('sukses_login')) { ?>
<script>
  Swal.fire({
    title: 'Anda Berhasil Login',
    text: '<?= $this->session->flashdata('sukses_login')?>',
    icon: 'success'
        })
  
  
</script>

<?php } ?>
<!-- =================================================== -->

<?php if($this->session->flashdata('sukses_edit')) { ?>
<script>
  Swal.fire({
    title: 'Berhasil..',
    text: '<?= $this->session->flashdata('sukses_edit')?>',
    icon: 'success'
        })
    
</script>
<?php } ?>

<!-- Untuk sweetalert hapus & logout -->
<script>
  $(document).on('click', '#btn-hapus', function(e){
      e.preventDefault();
      var link = $(this).attr('href');

      Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location = link;
        }
      })
  })

  // Logout
  $(document).on('click', '#btn-logout', function(e){
      e.preventDefault();
      var link = $(this).attr('href');

      Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda akan keluar!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Keluar!'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location = link;
        }
      })
  })

  $(document).on('click','#myImg', function(){
            var id_keamanan = $(this).data('id_keamanan');
            var bukti = $(this).data('bukti');
     
        
            $('#bukti').attr("src", bukti);
          
           
  });
</script>
<!-- Get Datatables Config -->
<script>
  $(function () {
    $("#dataTables").DataTable({
      // "buttons": ['pdf', 'print', 'excel', 'copy'],
      // "dom": "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
      //         "<'row'<'col-md-12'tr>>" +
      //         "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
                     
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "processing": true,
     
    }).buttons().container().appendTo('#dataTables_wrapper .col-md-6:eq(0)');
   
  });
</script>
<!-- jQuery Validation -->
<script>
  $.validate({
    modules : 'location, date, security, file',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
    }
  });
  $(function(){
    // /Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>
<!-- Toastr Alert -->
<?php if($this->session->flashdata('sukses')) { ?>
<script>
 // Display a success toast, with a title
toastr.success('<?= $this->session->flashdata('sukses') ?>', 'Berhasil!')
</script>
<?php } ?>
<?php if($this->session->flashdata('warning')) { ?>
<script>
 // Display a success toast, with a title
toastr.warning('<?= $this->session->flashdata('warning') ?>', 'Perihatian!')
</script>
<?php } ?>
<?php if($this->session->flashdata('error')) { ?>
<script>
 // Display a success toast, with a title
toastr.error('<?= $this->session->flashdata('error') ?>', 'Gagal!')
</script>
<?php } ?>
<script>
  $(document).ready(function() {
  $('#textarea').summernote();
});
</script>
<!-- Daterange  -->
<script type="text/javascript">
            $(function () {
                // Samakan id dengan yang di form tanggal lahir
                $('#tgl_lahir').datetimepicker({
                  viewMode: 'years',
                    format: 'L',
                    format: 'YYYY-MM-DD'
                });
            });
            $(function () {
                // Samakan id dengan yang di form tanggal bayar
                $('#tgl_bayar').datetimepicker({
                  viewMode: 'years',
                    format: 'L',
                    format: 'YYYY-MM-DD'
                });
            });
        // Hitung nominal Spp 
        // Menghitung setiap klik bulan pada select option dropdown
        $(document).ready(function(){
        $("#bulan").on('change', function(){
          total_ops = $(":selected", this).length;
        });
        $("#nominal").on('keyup', function(){  
        
            var nominal = $('#nominal').val();
            
            total = parseInt(nominal) * parseInt(total_ops);

              if(isNaN(total)){
                total=0;
              }
                  
                  $('#total_biaya').val(total);
                
              });
  
      });
</script>
</body>
</html>
