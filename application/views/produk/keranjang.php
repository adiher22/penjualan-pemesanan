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
                            <tr>
                                <td colspan="2" class="text-center" style="width: 20%;">
                                    <div class="product-title"> Total Harga</div>
                                </td>
                                <td  style="width: 35%;">
                                    <div class="product-title"><?= indo_curency($sum['harga']) ?></div>
                                    <div class="product-subtitle">Total Harga</div>
                                </td>
                            </tr>
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
            <form action="<?= site_url('pemesanan/add') ?>" method="POST" enctype="multipart/form-data">
            <div  class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="addressOne">Alamat Perusahaan</label>
                        <input type="text"  class="form-control" value="Perum The Citaville Blok B1 No.10 RT 005 RW 005, Jl. Citarik Raya Jati Baru Cikarang Timur, Bekasi" />
                        <input type="hidden" id="id_pemesanan" name="id_pemesanan" value="<?= encrypt_url($id_pemesanan) ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="addressTwo">Alamat Customer</label>
                        <input type="text" id="addressTwo" name="alamat_cust" class="form-control" value="<?= $cust->alamat ?>" />
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
                        <input type="number" id="down_payment" name="full_payment" class="form-control" value="" />
                    </div>
                </div>    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bank">Pilih Bank</label>
                        <select id="bank" name="bank" v-model="id_bank" @change="getBank()" class="form-control">
                        <?php foreach($bank as $b) : ?>
                            <option value="<?= encrypt_url($b->id_bank) ?>"><?= $b->nama_bank ?></option>
                        <?php endforeach ?>
                        </select>
                        <strong><?= form_error('bank') ?></strong>
                    </div>
                    
                </div>  
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="rekening">No Rekening Anda</label>
                        <input type="text" id="no_rek" name="no_rek" class="form-control" value="<?php if($cust->no_rek != null) { echo $cust->no_rek;} else{ echo "Rekening Anda Kosong"; } ?>" />  
                    </div>
                    <strong><?= form_error('no_rek') ?>  </strong>
                </div>  
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="mobile">Nama Pemilik Rekening</label>
                        <input type="text" disabled id="norek_pemilik" name="nama_pemilik" v-model="nama_pemilik" class="form-control" />
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="mobile">Nomor Rekening</label>
                        <input type="text" disabled id="norek_pemilik"  name="norek_pemilik" v-model="nomor_rekening" class="form-control" />
                    </div>
                </div>    
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="mobile">Deskripsi Pemesanan</label>
                        <textarea type="text" id="deskripsi" name="deskripsi_pemesanan" class="form-control" value=""></textarea>
                        <p>*Boleh kosong</p>
                    </div>
                </div>
                
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <hr>
                </div>
                <div class="col-12">
                    <h2 class="mb-1">Informasi Pembayaran</h2>
                </div>
            </div>
            <?php 
                $ppn = number_format($sum['harga'] / 1.10 * 0.10,0,',','');
                $kirim = 20000;
                $asuransi = 5000;
                $total = $ppn + $kirim + $asuransi + $sum['harga'];
            ?>

            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-4 col-md-2">
                    <div class="product-title"><?= indo_curency($ppn) ?></div>
                    <div class="product-subtitle">Pajak Negara</div>
                </div>
                <div class="col-4 col-md-3">
                    <div class="product-title"><?= indo_curency($asuransi) ?></div>
                    <div class="product-subtitle">Product Asuransi</div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="product-title"><?= indo_curency($kirim) ?></div>
                    <div class="product-subtitle">Biaya Pengiriman</div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="product-title text-primary"><?= indo_curency($total) ?>
                    <input type="hidden" name="pajak" value="<?= $ppn ?>">
                    <input type="hidden" name="produk_asuransi" value="<?= $asuransi ?>">
                    <input type="hidden" name="biaya_pengiriman" value="<?= $kirim ?>">
                    <input type="hidden" name="total" value="<?= $total ?>">
                    
                    </div>
                    <div class="product-subtitle">Total Keseluruhan</div>
                </div>
                <div class="col-8 col-md-3">
                    <button type="submit" class="btn btn-primary mt-4 px-4 btn-block">Pesan Sekarang</button>
                </div>
            </div>
            </form>
        </div>
    </section>
  </div>
  <!-- End Page Content -->

  <!-- Aos & vue & axios -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="<?= site_url('assets/front-end/vendor/vue/vue.js') ?>"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>
  
       var pemesanan_detail = new Vue({
        el: '#pemesanan_detail',
        mounted() {
          AOS.init();
        },
         
      data: {
          
            is_dp: true,
            nama_pemilik : "",
            nomor_rekening : "",
            id_bank : "",
          
      },
       methods: {
                getBank(){
                var self = this
                axios.get('<?= site_url('keranjang/getBank/') ?>' + self.id_bank)
                .then(function(response){
                    self.nama_pemilik = response.data.nama_pemilik,
                    self.nomor_rekening = response.data.nomor_rekening
                })
            },    
            }
  });
  </script>