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

    <title>Store Jaa </title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="<?= site_url('assets/front-end/style/main.css') ?>" rel="stylesheet" />
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
    data-aos="fade-down">
      <div class="container">
        <a href="#" class="navbar-brand">
          <img src="<?= site_url('assets/front-end/images/logo.svg') ?>" alt="Logo" />
        </a>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Categories</a> 
          </li>
        
         
        </ul>
      </div>
    </div>
  </nav>
   <div class="page-content page-auth" id="register">
     <div class="section-store-auth" data-aos="fade-up">
       <div class="container">
         <div class="row align-items-center justify-content-center row-login">
          
           <div class="col-lg-4">
             <h2>
               Memulai untuk jual beli <br> dengan cara terbaru
             </h2>
             <form class="mt-3">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="fullname" class="form-control is-valid" v-model="name" autofocus>
              </div>
              <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control is-invalid" v-model="email">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                <label>Store</label>
                <p class="text-muted">Apakah anda ingin membuka toko ?</p>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" name="is_store_open" id="OpenStoreTrue" v-model="is_store_open" :value="true">
                  <label for="OpenStoreTrue" class="custom-control-label">Iya, boleh</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" name="is_store_open" id="OpenStoreFalse" v-model="is_store_open" :value="false">
                  <label for="OpenStoreFalse" class="custom-control-label">Enggak, makasih</label>
                </div>
              </div>
              <div class="form-group" v-if="is_store_open">
                <label>Nama Toko</label>
                <input type="text" name="nama_toko" class="form-control">
              </div>
              <div class="form-group" v-if="is_store_open">
                <label>Kategori</label>
                <select name="category" id="" class="form-control">
                  <option value="" disable>Select Category</option>
                </select>
              </div>
              <button type="submit" name="registrasi" class="btn btn-info btn-block  mt-4">Registrasi Sekarang</button>
              <a href="#" class="btn btn-signup btn-block mt-2">Kembali ke halaman masuk</a>
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
    <script src="<?= site_url('assets/front-end/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
      AOS.init();
    </script>
    <script src="<?= site_url('assets/front-end/vendor/vue/vue.js') ?>"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: '#register',
        mounted() {
          AOS.init();
          this.$toasted.error(
            "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
            {
              position: "top-center",
              className: "rounded",
              duration: 1000,
            }
          );
        },
         data: {
         name: "Adi Hernawan",
         email: "adiher@marketplace.com",
         password: "",
         is_store_open: true,
         store_name: ""
        }
      });
    </script>
    <script src="<?= site_url('assets/front-end/script/navbar-scroll.js') ?>"></script>
  </body>
</html>
