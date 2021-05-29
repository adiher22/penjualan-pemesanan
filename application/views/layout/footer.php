 <!-- Footer -->
 <footer class="footer">
        <div class="container"> 
            <div class="row">
               <div class="col-12">
                  <div class="footer-credits text-center">
                     <p class="mb-0"><a href="#" >Yank</a> &copy; 2020 | Designed By - <a href="https://angrystudio.com">Angry Studio</a></p>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <script src="<?= site_url('assets/front-end/js/jquery.min.js')?>"></script>
      <script src="<?= site_url('assets/front-end/js/bootstrap.min.js')?>"></script>
      <script src="<?= site_url('assets/front-end/js/main.js')?>"></script>
      <!-- SweetAlert2 -->
      <script src="<?= base_url('assets/login/vendor/sweetalert2/dist/sweetalert2.min.js')?>"></script>
   </body>
</html>
<script>
    // Substring for name user 
      var ses = <?= json_encode($this->session->userdata('nama'))?>;
      var cut = ses.split(' ')[0]; // Script substr
      document.getElementById('ses').innerHTML = cut;

      
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
  })
</script>