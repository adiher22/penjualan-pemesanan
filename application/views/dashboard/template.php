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

    <title><?= $title  ?></title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="<?= site_url('assets/front-end/style/main.css') ?>" rel="stylesheet" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('assets/login/vendor/sweetalert2/dist/sweetalert2.min.css')?>">
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="<?= site_url('assets/front-end/images/dashboard-store-logo.svg') ?>" alt="" class="my-4">
          </div>
          <div class="list-group list-group-flush">
            <a href="dashboard.html" class="list-group-item list-group-item-action active">
              Dashboard
            </a>
            <a href="dashboard-product.html" class="list-group-item list-group-item-action">
              My Product
            </a>
            <a href="dashboard-transaction.html" class="list-group-item list-group-item-action">
              Transaction
            </a>
            <a href="dashboard-settings.html" class="list-group-item list-group-item-action">
              Store Settings
            </a>
            <a href="dashboard-account.html" class="list-group-item list-group-item-action">
              My Account
            </a>
            <a href="index.html" class="list-group-item list-group-item-action">
              Sign Out
            </a>
          </div>
        
      </div>
       <!-- /Sidebar -->
      <!-- Page Content -->
      <div id="page-content-wrapper">
       <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
          data-aos="fade-down">
            
            <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">&laquo; Menu</button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
              <!-- Dekstop menu -->
              <ul class="navbar-nav d-none d-lg-flex ml-auto">
                <li class="nav-item dropdown">
                
                <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                  <img src="<?= site_url('assets/front-end/images/cat.jpg') ?>" alt="" class="rounded-circle mr-2 profile-picture">
                  Hi, <?= $this->fungsi->user_login()->nama_cust ?>
                </a>
                <div class="dropdown-menu">
                  <a href="<?= site_url() ?>" class="dropdown-item">Ke Home</a>
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
            </div>
        </nav>
      <!-- Section Content -->
      <?php echo $contents ?>
      <!-- Page content wrapper -->
        <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <p class="pt-4 pb-2">
                &copy; 2020 Copyright. All Right Reserved <?= $footer ?>.
              </p>
            </div>
          </div>
        </div>
    </footer>
     </div>
    </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= site_url('assets/front-end/vendor/jquery/jquery.slim.min.js') ?>"></script>
    <script src="<?= site_url('assets/front-end/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      	<!-- SweetAlert2 -->
    <script src="<?= base_url('assets/login/vendor/sweetalert2/dist/sweetalert2.min.js')?>"></script>
    <script>
      AOS.init();
    </script>
     <script>
       $('#menu-toggle').click(function (e){
         e.preventDefault();
         $('#wrapper').toggleClass('toggled');
       });
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
        });
          // Hapus
          $(document).on('click', '#btn-hapus', function(e){
            e.preventDefault();
            var link = $(this).attr('href');

            Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data warga akan dihapus!",
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
        });
     </script>
      </script>
      <?php if($this->session->flashdata('sukses')) { ?>
      <script>
        Swal.fire({
        title: 'Berhasil ',
        text: '<?= $this->session->flashdata('sukses')?>',
        icon: 'success'
          })
      
      </script>
      <?php } ?>
      <?php if($this->session->flashdata('gagal')) { ?>
      <script>
        Swal.fire({
        title: 'Gagal!',
        text: '<?= $this->session->flashdata('gagal')?>',
        icon: 'error'
          })
      </script>
      <?php } ?>
  </body>
</html>
