<!-- Produk konten -->
 <div class="page-content page-home">
   <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
              <div class="jumbotron jumbotron-fluid">
                <div class="container-fluid text-center">
                  <h1 class="display-4">Produk</h1>
                   <p class="lead">Produk Yang Tersedia</p>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
     </section>
  <section class="store-trend-categories">
       <div class="container">
         <div class="row">
           <div class="col-12" data-aos="fade-up">
              <h5>Kategori</h5>
           </div>
         </div>
         <div class="row">
          <?php foreach($kategori as $k) : ?>
           <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="500">
            <a href="<?= site_url('produk/kategori/' . $k->slug) ?>" @click="produkKategoriAvailability()" class="component-categories d-block">
              <div class="categories-image">
                <img src="<?= site_url('assets/front-end/images/categories-tools.svg') ?>" alt="" class="w-100">
              </div>
              <p class="categories-text">
                <?= $k->kategori ?>
              </p>
            </a>
           </div>
          <?php endforeach ?>
         </div>
       </div>

  </section>
  <section class="store-new-products">
       <div class="container">
         <div class="row">
           <div class="col-12" data-aos="fade-up">
             <h5>Produk</h5>
           </div>
         </div>
         <div class="row">
           <?php foreach($produk as $p) : ?>
           <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
             <a href="<?= site_url('produk/detail/' . $p->slug_produk)  ?>"  class="component-products d-block">
              <div class="products-thumbnail">
                <div class="products-image" style="background-image: url('<?= site_url('upload/produk/' . $p->gambar) ?>');">

                </div>
              
              </div>
              <div class="products-text">
                <?= $p->nama_produk ?>
              </div>
              <div class="products-price">
                <?= indo_curency($p->harga) ?>
              </div>
             </a>
            </div>
            <?php endforeach ?>
         </div>
       </div>
     </section>