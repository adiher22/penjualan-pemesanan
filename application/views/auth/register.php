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
            <a href="#" class="nav-link">Tentang Perusahaan</a> 
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">Kontak</a> 
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
               Memulai untuk transaksi <br> dengan cara terbaru
             </h2>
             <form class="mt-3" action="<?= site_url('auth/register') ?>" method="POST">
              <div class="form-group">
                <label>Nama Customer</label>
                <input type="text" name="nama_cust" class="form-control is-valid" v-model="name" required>
                <input type="hidden" name="kd" value="<?= $kd ?>">
                  <strong><?= form_error('nama_cust') ?></strong>
              </div>
              <div class="form-group">
               <label>Email Address</label>
             
               <input id="email" type="email"  v-model="email" @change="EmailAvailability()" class="form-control" 
               :class="{ 'is_invalid' : this.email_unavailable }"
               name="email" required="email">
                  <strong><?= form_error('email') ?></strong>
                
           
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                  <strong><?= form_error('password') ?></strong>
              </div>
              <div class="form-group">
                <label>Rekening </label>
                <p class="text-muted">Apakah anda ingin memasukan nomor rekening sekarang ?</p>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" name="is_rekening" id="OpenStoreTrue" v-model="is_rekening" :value="true">
                  <label for="OpenStoreTrue" class="custom-control-label">Iya, sekarang</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" name="is_rekening" id="OpenStoreFalse" v-model="is_rekening" :value="false">
                  <label for="OpenStoreFalse" class="custom-control-label">Enggak, nanti saja</label>
                </div>
              </div>
              <div class="form-group" v-if="is_rekening">
                <label>Nomor Rekening</label>
                <input type="number" name="no_rek" class="form-control">
              </div>
              <div class="form-group">
                <label>No Hanphone</label>
                  <input type="number" name="no_hp" class="form-control" required="number">
                    <strong><?= form_error('no_hp') ?></strong>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                  <textarea type="number" name="alamat" class="form-control" required></textarea>
                    <strong><?= form_error('alamat') ?></strong>
              </div>
              <button type="submit" name="registrasi" :disabled="this.email_unavailable" class="btn btn-primary btn-block  mt-4">Registrasi Sekarang</button>
              <a href="<?= site_url('auth') ?>" class="btn btn-signup btn-block mt-2">Kembali ke halaman masuk</a>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
   <script src="<?= site_url('assets/front-end/vendor/jquery/jquery.slim.min.js') ?>"></script>
    <script src="<?= site_url('assets/front-end/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
      AOS.init();
    </script>
    <script src="<?= site_url('assets/front-end/vendor/vue/vue.js') ?>"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      Vue.use(Toasted);

       var register = new Vue({
        el: '#register',
        mounted() {
          AOS.init();
        },
     
    methods:{
      EmailAvailability: function(){
          var self = this;
          var email = this.email.trim();
          // Make a request for a user with a given ID
          axios.get('<?= site_url('auth/check_email') ?>', {
            params: {
              email:email
            }
          })
            .then(function (response) {

              if(response.data == 'Available'){
                self.$toasted.success(
                  "Email anda tersedia.. Silahkan lanjut langkah selanjutnya",
                  {
                    position: "top-center",
                    className: "rounded",
                    duration: 5000,
                  }
                );
                self.email_unavailable = false;
              }else{
                self.$toasted.error(
                  "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                  {
                    position: "top-center",
                    className: "rounded",
                    duration: 5000,
                  }
                );
                self.email_unavailable = true;
              }
            })
            .catch(function (error) {
              console.log(error);
            });
        
      }
    },
      data() {
          return {
            name: "",
            email: "",
            is_rekening: true,
            store_name: "",
            email_unavailable: false
          }
      }
  });
    </script>
    <script src="<?= site_url('assets/front-end/script/navbar-scroll.js') ?>"></script>
  </body>
</html>

  