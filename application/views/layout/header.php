  <!-- Header and Navigation -->
  <header class="hk-hero">
         <nav id="hk-sticky-nav" class="navbar navbar-expand-lg navbar-light fixed-top hk-transparent-nav hk-navbar">
            <div class="container">
                
               <a class="navbar-brand" href="<?= site_url() ?>"><img src="<?= site_url('assets/front-end/images/smart-home.png')?>"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hk-stickynav" aria-controls="hk-stickynav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="hk-stickynav">
                  <ul class="navbar-nav mx-auto">
                     <li class="nav-item <?= activate_menu('home') ?>">
                        <a class="nav-link" href="<?= site_url('home') ?>">Halaman Utama <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item <?= activate_menu('tentang') ?>">
                        <a class="nav-link" href="<?= site_url('tentang')?>">Tentang</a>
                     </li>
                     <li class="nav-item <?= activate_menu('petunjuk')?>">
                        <a class="nav-link" href="<?= site_url('petunjuk')?>">Cara Pembayaran</a>
                     </li>
                  
                  </ul>
                  <ul class="navbar-nav mx-auto">
                  <?php if($this->session->userdata('wargaid')) { ?>
                  <li class="nav-item dropdown">
                     <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a><img src="<?= site_url('assets/front-end/images/user.png') ?>" class="img-circle elevation-2" style="width: 50px; height: auto;" alt=""> Hi, <span id="ses"></span></a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a href="<?= base_url('dashboard') ?>" class="dropdown-item"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                           <a href="<?= base_url('dashboard/profile') ?>" class="dropdown-item"><i class="fa fa-users"></i> Profil Saya</a>
                           
                           <a href="<?= base_url('auth/logout')?>" class="dropdown-item" id="btn-logout"><i class="fas fa-sign-out-alt"></i> Keluar </a>

                       </div>
                  </li>
                  <?php }else{ ?>
                  <a href="<?= site_url('auth') ?>" target="_blank" class="btn btn-main btn-navbar">Login</a>
                  <?php } ?>
                  </ul>
               </div>
            </div>
         </nav>
         <div class="hk-hero-box d-flex align-items-center h-100">
            <div class="container">
               <div class="row">
                  <div class="col-12 col-lg-6 order-2 order-lg-1">
                     <div class="hk-hero-content">
                        <h1 class="hk-hero-title">
                           Pembayaran jadi lebih mudah sekarang.
                        </h1>
                        <p class="hk-hero-txt mt-3 mt-lg-4">
                           Anda sibuk kerja ?, lakukan pembayaran di rumah melalui perangkat komputer yang terhubung internet!
                        </p>
                        <div class="hk-hero-btns mt-4">
                           <a href="<?= site_url('auth/register') ?>" class="btn btn-main">Daftar Sekarang</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-lg-6 order-1 order-lg-2">
                     <div class="hk-hero-img">
                        <svg class="svg-blob" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                           <g transform="translate(300,300)">
                              <path d="M139.3,-196.5C174.9,-166,193.9,-117.6,213.2,-67.2C232.4,-16.8,251.7,35.6,242.8,83.7C233.8,131.8,196.5,175.5,151.4,207C106.2,238.5,53.1,257.7,5.6,250.1C-41.9,242.4,-83.9,207.8,-121.3,173.7C-158.7,139.7,-191.6,106.3,-205.5,66.1C-219.4,26,-214.3,-21,-202.1,-67.8C-189.8,-114.6,-170.5,-161.3,-135.6,-191.9C-100.7,-222.6,-50.4,-237.3,0.8,-238.4C51.9,-239.5,103.8,-226.9,139.3,-196.5Z" fill="#f7f2f3" />
                           </g>
                        </svg>
                        <img class="img-fluid" src="<?= site_url('assets/front-end/images/undraw_buy_house_560d.svg')?>">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <svg class="waves-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7  c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4  c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
         </svg>
      </header>
	  