  <!-- Page Content -->
  <div class="page-content page-cart" id="pemesanan_detail">
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
                                    <a href="<?= site_url('keranjang/del/' . encrypt_url($produk['id_keranjang'])) ?>" id="btn-hapus" class="btn btn-remove-cart">Remove</a>
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
         
            <div  class="row mb-2" data-aos="fade-up" data-aos-delay="200">
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
                        <select id="province" id="metode" name="metode" v-model="is_dp" class="form-control">
                            <option  :value="true">Down Payment</option>
                            <option  :value="false">Full Payment</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" v-if="is_dp">
                    <div class="form-group">
                        <label for="postalCode">Down Payment</label>
                        <input type="number" id="down_payment" name="down_payment" class="form-control" value="" />
                    </div>
                </div>
                <div class="col-md-4" v-else="is_dp">
                    <div class="form-group">
                        <label for="postalCode">Full Payment</label>
                        <input type="number" id="down_payment" name="down_payment" class="form-control" value="" />
                    </div>
                </div>    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bank">Pilih Bank</label>
                        <select id="bank" name="bank" class="form-control">
                            <option value="BRI">BRI</option>
                        </select>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="rekening">No Rekening Anda</label>
                        <input type="text" id="no_rek" name="no_rek" class="form-control" value="<?php if($cust->no_rek != null) { echo $cust->no_rek;} echo "Rekening Anda Kosong"; ?>" />
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="mobile">Nama Pemilik Rekening</label>
                        <input type="text" disabled id="norek_pemilik" name="nama_pemilik_rekening" class="form-control" value="" />
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="mobile">Nomor Rekening</label>
                        <input type="text" disabled id="norek_pemilik" name="norek_pemilik" class="form-control" value="" />
                    </div>
                </div>    
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="mobile">Deskripsi Pemesanan</label>
                        <textarea type="text" id="deskripsi" name="deskripsi" class="form-control" value=""></textarea>
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
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="<?= site_url('assets/front-end/vendor/vue/vue.js') ?>"></script>
  <script>
  
       var pemesanan_detail = new Vue({
        el: '#pemesanan_detail',
        mounted() {
          AOS.init();
        },
      data() {
          return {
            is_dp: true,
          
          }
      }
  });
  </script>