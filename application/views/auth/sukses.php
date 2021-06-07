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

    <title><?= $title ?> </title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="<?= site_url('assets/front-end/style/main.css') ?>" rel="stylesheet" />
  </head>

  <body>
   <div class="page-content page-success">
     <div class="section-success" data-aos="zoom-in">
       <div class="container">
        
           <div class="row aligin-items-center row-login justify-content-center">
             <div class="col-lg-6 text-center">
               <img src="<?= site_url('assets/front-end/images/undraw_done_a34v.svg') ?>" width="300px" height="auto" alt="" class="mb-4">
               <h2>Selamat Datang!</h2>
               <p>Kamu sudah berhasil terdaftar <br> bersama kami. Let's grow up now</p>
               <div>
                 <a href="<?= site_url('dashboard') ?>" class="btn btn-primary w-50 mt-4">Dashboard Saya</a>
                 <a href="<?= site_url('home') ?>" class="btn btn-signup w-50 mt-2">Pergi Ke Home</a>
               </div>
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
            &copy; 2020 Copyright Store Jajan. All Right Reserved Adi Hernawan.
           </p>
         </div>
       </div>
     </div>
   </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= site_url('assets/front-end/vendor/jquery/jquery.slim.min.js') ?>"></script>
    <script src="<?= site_url('assets/front-end/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
    <script>
      AOS.init();
    </script>
    <script src="<?= site_url('assets/front-end/script/navbar-scroll.js') ?>"></script>
  </body>
</html>
