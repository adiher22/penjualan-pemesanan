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
    <title> <?= $title ?> </title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="<?= site_url('assets/front-end/style/main.css') ?>" rel="stylesheet" />
     <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('assets/login/vendor/sweetalert2/dist/sweetalert2.min.css')?>">
  </head>
  <style>
    
    .jumbotron {
        background: url("<?= site_url('assets/front-end/images/banner2.jpg') ?>") no-repeat center;
    }
    h1,p.lead{
      color: #f6f6f6;
    }
    .btn-secondary{
        background-color: transparent;
        border-color: #007bff;
        color: #007bff;
    }
  </style>
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
          <?php if($this->session->userdata('customerid') == null) {?>
           <li class="nav-item">
            <a href="<?= site_url('auth/register') ?>" class="nav-link">Register</a> 
          </li>
          <li class="nav-item">
            <a href="<?= site_url('auth') ?>" class="btn btn-primary nav-link px-4 text-white">Login</a> 
          </li>
          <?php  }else{?>
            <!-- Dekstop menu -->
              <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                
                <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                  <img src="<?= site_url('assets/front-end/images/man.png') ?>" alt="" class="rounded-circle mr-2 profile-picture">
                  Hi, <?= $this->fungsi->user_login()->nama_cust ?>
                </a>
                <div class="dropdown-menu">
                  <a href="<?= site_url('dashboard') ?>" class="dropdown-item">Dashboard</a>
                  <a href="/dashboard-account.html" class="dropdown-item">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a href="<?= site_url('auth/logout') ?>" id="btn-logout" class="dropdown-item">Logout</a>
                </div>
                  
              </li>
              <li class="nav-item">
              <?php
                $id_customer = $this->session->userdata('customerid');
                $query = $this->db->where(['id_cust'=>$id_customer])->from("keranjang")->count_all_results(); ?>
                <a href="<?= site_url('keranjang') ?>" class="nav-link d-inline-block mt-2">
                  <img src="<?= site_url('assets/front-end/images/icon-cart-filled.svg') ?>" alt="" />
                  <div class="card-badge"><?= $query ?></div>
                </a>
              </li>
              </ul>
              <!-- Mobile Menu -->
              <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Hi, Adi
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link d-inline-block">
                    Cart
                  </a>
                </li>
              </ul>
              <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
   