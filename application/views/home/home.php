<!-- Page Content -->
   <div class="page-content page-home">
     <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
              <div class="jumbotron jumbotron-fluid">
                <div class="container-fluid text-center">
                  <h1 class="display-4">Selamat Datang!!</h1>
                  <p class="lead" id="jumbotron"></p>
                  <a class="btn btn-primary btn-lg" href="<?= site_url('produk') ?>" role="button">Lihat Produk</a>
                </div>
              </div>
            </div>
          </div>
        </div>
     </section>
<section id="services" class="container">
   <h2 class="display-4 text-center mt-5 mb-3" data-aos="fade-out">Layanan Kami</h2>
   
   <div class="row text-center" data-aos="zoom-out">
      <div class="col-md-4 mb-4">
         <div class="card h-100">
            <img class="card-img mt-4" src="<?= site_url('assets/front-end/images/deliv2.jpg') ?>" alt="Design">
            <div class="card-body">
               <h4 class="card-title">Pengiriman</h4>
               <p class="card-text">Pengiriman lebih efisien, pelacakan pengiriman dilakukan oleh customer!</p>
            </div>
            <div class="card-footer py-4">
               <a href="#pemesanan" class="btn btn-secondary">Lihat &raquo;</a>
            </div>
         </div>
      </div>
      
      <div class="col-md-4 mb-4">
         <div class="card h-100">
            <img class="card-img-top h-200 " src="<?= site_url('assets/front-end/images/jumbotron.jpg') ?>" alt="Development">
            <div class="card-body">
               <h4 class="card-title">Pemesanan</h4>
                  <p class="card-text">Pesan produk yang tersedia untuk melakukan pemesanan!</p>
            </div>
            <div class="card-footer py-4">
               <a href="#pemesanan" class="btn btn-secondary">Lihat Produk &raquo;</a>
            </div>
         </div>
      </div>
      
      <div class="col-md-4 mb-4">
         <div class="card h-100">
            <img class="card-img-top h-200" src="<?= site_url('assets/front-end/images/asw.png')?>" alt="Analytics">
            <div class="card-body">
               <h4 class="card-title">Produk</h4>
               <p class="card-text">Lihat produk yang anda cari, berdasarkan dengan kategori!</p>
            </div>
            <div class="card-footer py-4">
               <a href="<?= site_url('produk') ?>" class="btn btn-secondary">Lihat Produk &raquo;</a>
            </div>
         </div>
      </div>
   </div>
</section>
<section id="pemesanan" class="container">
    <h2 class="display-4 text-center mt-5 mb-3" data-aos="fade-down"> Tata Cara Pemesanan</h2>
   
         <div class="row d-flex align-items-center h-100" data-aos="zoom-out">
               <div class="col-12 col-lg-6 order-2 order-lg-1">
                  <div class="services-box mt-4 mt-lg-0">
                     
                     <div class="services-listbox">
                        <ul class="list-styled">
                            <li>
                              <h3 class="services-list-title">Pendaftaran</h3>
                              <p class="services-list-txt">Untuk melakukan pendaftaran, anda bisa melakukan pendaftaran di halaman register</p>
                           </li>
                           <li>
                              <h3 class="services-list-title">Login</h3>
                              <p class="services-list-txt">Setelah berhasil melakukan pendaftaran, silahkan login, masukan email dan password anda.</p>
                           </li>
                           <li>
                              <h3 class="services-list-title">Dashboard Customer</h3>
                              <p class="services-list-txt">Pada halaman dashboard customer, terdapat beberapa menu, anda bisa melihat riwayat produk yang sudah dipesan.
                           </li>
                           <li>
                              <h3 class="services-list-title">Halaman Produk</h3>
                              <p class="services-list-txt">Halaman produk menampilkan produk yang bisa anda lihat secara detail.</p>
                           </li>
                           <li>
                              <h3 class="services-list-title">Pemesanan</h3>
                              <p class="services-list-txt">Untuk melakukan anda perlu memilih produk dan membeli serta melakukan pembayaran.</p>
                           </li>
                           <li>
                              <h3 class="services-list-title">Pengiriman</h3>
                              <p class="services-list-txt">Jika pembayaran sudah selesai, anda bisa melihatnya di halaman dashboard customer, untuk menunggu barang yang sudah dikirim.</p>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-lg-6 order-1 order-lg-2">
                  <div class="services-img">
                     <img class="img-fluid" src="<?= site_url('assets/front-end/images/undraw_Booking_re_gw4j.svg') ?>"><br><br>
                     <img class="img-fluid" src="<?= site_url('assets/front-end/images/undraw_Mobile_pay_re_sjb8.svg')?>" alt="">
                  </div>
               </div>
         </div>
 </section>
