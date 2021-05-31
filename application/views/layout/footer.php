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
