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
    	<!-- SweetAlert2 -->
    <script src="<?= base_url('assets/login/vendor/sweetalert2/dist/sweetalert2.min.js')?>"></script>
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
    <script>
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
            text: "Data akan dihapus!",
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
		<!-- END -->
  </body>
</html>
