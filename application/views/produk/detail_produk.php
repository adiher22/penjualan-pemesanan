 <!-- Page Content -->
  <div class="page-content page-details">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?= site_url('produk') ?>">Produk</a>
                </li>
                <li class="breadcrumb-item active">
                 Detail Produk
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="store-gallery" id="gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-8" data-aos="zoom-in">
          
              <img src="<?= site_url('upload/produk/' . $d->gambar) ?>"  class="w-200 min-image" alt="">
            
          </div>
         
        </div>
      </div>
    </section>

    <div class="store-details-container mt-4" data-aos="fade-up">
      <section class="store-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <h1><?= $d->nama_produk ?></h1>
              <div class="owner">Adiher</div>
              <div class="price"><?= indo_curency($d->harga) ?></div>
            </div>
            <div class="col-lg-2" data-aos="zoom-in">
              <a href="<?= site_url('keranjang/add/' . encrypt_url($d->id_produk). '') ?>" class="btn btn-primary px-4 text-white btn-block mb-3">Tambah Ke Keranjang</a>
            </div>
          </div>
        </div>
      </section>
      <section class="store-description">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8">
              <p>
                <?= $d->deskripsi ?>
              </p>
            </div>
            
          </div>
        </div>
      </section>

     
    </div>
  </div>