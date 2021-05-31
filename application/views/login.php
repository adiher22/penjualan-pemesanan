<!DOCTYPE html>
<html lang="en">
<head>
	<title>Halaman Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url('assets/template/dist/img/logo.png') ?>"/>		
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/animate/animate.css') ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/select2/select2.min.css') ?>">
<!--===============================================================================================-->
 <!-- SweetAlert2 -->
 <link rel="stylesheet" href="<?= base_url('assets/login/vendor/sweetalert2/dist/sweetalert2.min.css')?>">
<!-- ============================================================================================== -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/css/util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/css/main.css')?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?= site_url('assets/login/images/undraw_Website_setup_re_d4y9.svg')?>" alt="IMG">
				</div>
				
				<form action="<?= base_url('admin/login/proses') ?>" method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Admin Login
					</span>
						
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
					
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="login">
							Login
						</button>
						
					</div>

					<div class="text-center p-t-12">
					
						<a class="txt2">
						Masukan Username & Password
						</a>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?= base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/login/vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?= base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/login/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
    <script src="<?= base_url('assets/login/vendor/tilt/tilt.jquery.min.js')?>"></script>
    
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/login/vendor/sweetalert2/dist/sweetalert2.min.js')?>"></script>

	
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
  <!--===============================================================================================-->
  <script src="<?= base_url('assets/login/js/main.js')?>"></script>
  <!-- ============================================================================================ -->
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
