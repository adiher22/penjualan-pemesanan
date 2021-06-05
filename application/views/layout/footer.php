</div>
  <footer>
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
    <!-- Bootstrap core JavaScript -->
    <script src="<?= site_url('assets/front-end/vendor/jquery/jquery.slim.min.js')?>"></script>
    <script src="<?= site_url('assets/front-end/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="<?= site_url('assets/front-end/script/navbar-scroll.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
    <script>
      new Typed('#jumbotron',{
      strings : ['Beli produk kesayangan anda menjadi mudah....','Daftar->Pesan->Bayar->Kirim....','Biaya pengiriman gratis, sudah termasuk pemesanan...'],
      typeSpeed : 100,
      delaySpeed : 100,
      loop : true
    });
    </script>
  </body>
</html>
