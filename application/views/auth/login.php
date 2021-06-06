<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Icon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/template/dist/img/logo.png') ?>"/>
    <title>PT KOGAWA TEKNIK INDONESIA - <?= $title ?></title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="<?= site_url('assets/front-end/style/main.css') ?>" rel="stylesheet" />

	 <!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= base_url('assets/login/vendor/sweetalert2/dist/sweetalert2.min.css')?>">
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
    data-aos="fade-down">
      <div class="container">
        <a href="<?= site_url() ?>" class="navbar-brand">
          <img src="<?= site_url('assets/template/dist/img/logo.png') ?>" alt="Logo" />
        </a>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="<?= site_url() ?>" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('tentang') ?>" class="nav-link">Tentang Perusahaan</a> 
          </li>
           <li class="nav-item">
            <a href="<?= site_url('kontak') ?>" class="nav-link">Kontak</a> 
          </li>
          
         
        </ul>
      </div>
    </div>
  </nav>
   <div class="page-content page-auth">
     <div class="section-store-auth" data-aos="fade-up">
       <div class="container">
         <div class="row align-items-center row-login">
           <div class="col-lg-6 text-center">
             <img src="<?= site_url('assets/front-end/images/undraw_authentication_fsn5.svg') ?>" alt="" class="w-50 mb-4 mb-lg-none">
           </div>
           <div class="col-lg-5">
             <h2>
               Transaksi lebih mudah, <br> pemesanan lebih nyaman
             </h2><br>
             <form action="<?= site_url('auth/proses') ?>" method="POST" class="mt-3">
              <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control w-75" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control w-75" required>
              </div>
              <button type="submit" name="login" class="btn btn-primary btn-block w-75 mt-4">Masuk Untuk Akun Anda</button>
              <a href="<?= site_url('auth/register') ?>" class="btn btn-signup btn-block w-75 mt-2">Registrasi Akun</a>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
   
   <footer>
     <div class="container">
       <div class="row">
         <div class="col-12 text-center">
           <p class="pt-4 pb-2">
            &copy; 2021 Copyright. All Right Reserved <?= $copyright ?>.
           </p>
         </div>
       </div>
     </div>
   </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= site_url('assets/front-end/vendor/jquery/jquery.slim.min.js') ?>"></script>
    <script src="<?= site_url('assets/front-end/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		
	<!-- SweetAlert2 -->
	<script src="<?= base_url('assets/login/vendor/sweetalert2/dist/sweetalert2.min.js')?>"></script>

    <script>
      AOS.init();
    </script>
    <script src="<?= site_url('assets/front-end/script/navbar-scroll.js') ?>"></script>
	 <?php if($this->session->flashdata('sukses_logout')) { ?>
		<script>
			Swal.fire({
			title: 'Berhasil Logout',
			text: '<?= $this->session->flashdata('sukses_logout')?>',
			icon: 'success'
				})
		
		</script>
		<?php } ?>
		<?php if($this->session->flashdata('warning')) { ?>
		<script>
			Swal.fire({
			title: 'Gagal Login.!',
			text: '<?= $this->session->flashdata('warning')?>',
			icon: 'error'
				})
		</script>
		<?php } ?>
		<!-- END -->
  </body>
</html>
