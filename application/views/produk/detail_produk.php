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
              <a href="<?= site_url('keranjang/add') ?>" class="btn btn-primary px-4 text-white btn-block mb-3">Tambah Ke Keranjang</a>
            </div>
          </div>
        </div>
      </section>
      <section class="store-description">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Velit asperiores modi minima, debitis labore qui cumque dicta perferendis tempora dolores veniam vitae saepe accusantium nulla officia est neque harum necessitatibus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic molestias eligendi ipsa nemo expedita, natus accusamus? Ex natus debitis qui a ea esse! Veritatis, laboriosam eligendi laudantium asperiores dignissimos voluptatibus.
                

              </p>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Perferendis in odit cum laborum ipsa unde ipsam voluptatem obcaecati consequatur fuga suscipit, porro fugit magnam reprehenderit reiciendis doloremque voluptate minima hic!
              </p>
            </div>
            
          </div>
        </div>
      </section>

      <section class="store-riview">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8 mt-3 mb-3">
              <h5>Customer Riview (3)</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-8">
              <ul class="list-unstyled">
                <li class="media">
                  <img src="images/icon-testimonial-1.png" alt="" class="mr-3 rounded-circle">
                  <div class="media-body">
                    <h5 class="mb-2 mb-1">Audrey Lolita</h5>
                    I thought it was not good for living room. I really happy
                    to decided buy this product last week now feels like homey.
                  </div>
                </li>
                <li class="media">
                  <img src="images/icon-testimonial-2.png" alt="" class="mr-3 rounded-circle">
                  <div class="media-body">
                    <h5 class="mb-2 mb-1">Reva Elizabeth</h5>
                     Color is great with minimalist concept. Even I thought it was made by Cactus industry. 
                     I do really satisfied with this.
                  </div>
                </li>
                <li class="media">
                  <img src="images/icon-testimonial-3.png" alt="" class="mr-3 rounded-circle">
                  <div class="media-body">
                    <h5 class="mb-2 mb-1">Geraldine </h5>
                    When I saw at first, it was really awesome to have with.
                    Just let me know if there is another upcoming product like this. 
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>