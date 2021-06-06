  <!-- Page Content -->
  <div class="page-content page-cart">
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
                 Cart
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="store-cart">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-12 table-responsive">
                    <table class="table table-borderless table-cart">
                        <thead>
                            <tr>
                                <td>Gambar</td>
                                <td>Nama Produk</td>
                                <td>Harga</td>
                                <td>Opsi</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php foreach($produk->result_array() as $produk) : ?>
                            <tr>
                                <td style="width: 20%;">
                                    <img src="<?= site_url('upload/produk/' . $produk['gambar']) ?>"
                                     alt=""  class="cart-image">
                                </td>
                                <td style="width: 35%;">
                                    <div class="product-title"><?= $produk['nama_produk'] ?></div>
                                 
                                </td>
                                <td style="width: 35%;">
                                    <div class="product-title"><?= indo_curency($produk['harga']) ?></div>
                                    <div class="product-subtitle">Rupiah</div>
                                </td>
                                <td style="width: 20%;">
                                    <a href="#" class="btn btn-remove-cart">Remove</a>
                                </td>
                            </tr>
                        <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <hr>
                </div>
                <div class="col-12">
                    <h2 class="mb-4">Pemesanan Detail</h2>
                </div>
            </div>
         
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="addressOne">Alamat Perusahaan</label>
                        <input type="text" id="addressOne" name="addressOne" class="form-control" value="Perum The Citaville Blok B1 No.10 RT 005 RW 005, Jl. Citarik Raya Jati Baru Cikarang Timur, Bekasi" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="addressTwo">Alamat Customer</label>
                        <input type="text" id="addressTwo" name="addressTwo" class="form-control" value="<?= $cust->alamat ?>" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="province">Pilih Metode Pembayaran</label>
                        <select id="province" name="metode" class="form-control">
                            <option value="DP">Down Payment</option>
                            <option value="FP">Full Payment</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">Pilih Bank</label>
                        <select id="city" name="city" class="form-control">
                            <option value="Bekasi">Bekasi</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="postalCode">Postal Code</label>
                        <input type="text" id="postalCode" name="postalCode" class="form-control" value="17533" />
                    </div>
                </div>
          
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile">No Telepon</label>
                        <input type="text" id="no_telp" name="no_telp" class="form-control" value="<?= $cust->no_telp ?>" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile">Deskripsi Pemesanan</label>
                        <input type="text" id="deskripsi" name="deskripsi" class="form-control" value="" />
                        <p>*Boleh kosong</p>
                    </div>
                </div>
                
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <hr>
                </div>
                <div class="col-12">
                    <h2 class="mb-1">Payment Information</h2>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-4 col-md-2">
                    <div class="product-title">$10</div>
                    <div class="product-subtitle">Country Tax</div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="product-title">$200</div>
                    <div class="product-subtitle">Product Insurance</div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="product-title">$500</div>
                    <div class="product-subtitle">Ship to Bandung</div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="product-title text-primary">$394,200</div>
                    <div class="product-subtitle">Total</div>
                </div>
                <div class="col-8 col-md-3">
                    <a href="success.html" class="btn btn-primary mt-4 px-4 btn-block">Checkout Now</a>
                </div>
            </div>
        </div>
    </section>
  </div>
  <!-- End Page Content -->