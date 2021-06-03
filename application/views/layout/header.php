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
    <title> PT KOGAWA TEKNIK INDONESIA - <?= $title ?> </title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="<?= site_url('assets/front-end/style/main.css') ?>" rel="stylesheet" />
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
        <a href="#" class="navbar-brand">
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
            <a href="#" class="nav-link">Tentang Perusahaan</a> 
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">Kontak</a> 
          </li>
           <li class="nav-item">
            <a href="<?= site_url('auth/register') ?>" class="nav-link">Register</a> 
          </li>
          <li class="nav-item">
            <a href="<?= site_url('auth') ?>" class="btn btn-primary nav-link px-4 text-white">Login</a> 
          </li>
        </ul>
      </div>
    </div>
  </nav>
   <!-- Page Content -->
   <div class="page-content page-home">
     <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
              <div class="jumbotron jumbotron-fluid">
                <div class="container-fluid text-center">
                  <h1 class="display-4">Halo, Selamat Datang!!</h1>
                  <p class="lead" id="jumbotron"></p><br>
                  <a class="btn btn-primary btn-lg" href="#" role="button">Lihat Produk</a>
                </div>
              </div>
            </div>
          </div>
        </div>
     </section>