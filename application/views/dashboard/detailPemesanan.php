 <!-- Section Content -->
        <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">#<?= $detail->id_pemesanan ?></h2>
              <p class="dashboard-subtitle">
                Pemesanan / Detail
              </p>
            </div>
            <div class="dashboard-content" id="transactionDetails">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                    
                        <div class="col-12 col-md-12">
                          <div class="row">
                            <div class="col-12 col-md-6">
                              <div class="product-title">Nama Customer</div>
                              <div class="product-subtitle"><?= $detail->nama_cust ?></div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Tanggal Pesan</div>
                              <div class="product-subtitle"><?= indo_date($detail->tgl_pesan) ?></div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Tanggal Batas Bayar</div>
                              <div class="product-subtitle"><?= indo_date($detail->tgl_batas) ?></div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Status</div>
                              <div class="product-subtitle text-danger">
                                <?= $detail->status_pemesanan ?>
                              </div>
                            </div>
                          
                            <div class="col-12 col-md-6">
                              <div class="product-title">Telepon</div>
                              <div class="product-subtitle"><?= $detail->no_telp ?></div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Deskripsi Pemesanan</div>
                              <div class="product-subtitle"><?= $detail->deskripsi_pemesanan ?></div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Bank Transfer</div>
                              <div class="product-subtitle">Nama bank : <?= $detail->nama_bank ?>, A/n : <?= $detail->nama_pemilik ?></div>
                            </div>
                            <?php if($detail->down_payment != null) {?>
                            <div class="col-12 col-md-6">
                              <div class="product-title">UangM Muka</div>
                              <div class="product-subtitle"><?= indo_curency($detail->down_payment) ?></div>
                            </div>
                            <?php }else{?>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Full Pembayaran</div>
                              <div class="product-subtitle"><?= indo_curency($detail->full_payment) ?></div>
                            </div>
                            <?php }?>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Alamat Customer</div>
                              <div class="product-subtitle"><?= $detail->alamat ?></div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Total</div>
                              <div class="product-subtitle"><?= indo_curency($detail->total) ?></div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 mt-5">
                          <h5>Detail Produk </h5>
                        </div>
                        <div class="col-12 mt-2">
                          <div class="row">
                            <div class="col-12 text-left">
                                <a href="" class="btn btn-primary mt-4">Cetak</a>
                            </div>
                            <div class="col-12">
                            <table class="table bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Produk</td>
                                        <td>Gambar</td>
                                        <td>Harga</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php   $no = 1;
                                foreach($produk->result() as $p):
                              
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $p->nama_produk?></td>
                                        <td><img src="<?= site_url('upload/produk/'. $p->gambar)?>" style="width: 100px;" alt=""></td>
                                        <td><?= indo_curency($p->harga)?></td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                      </div>
                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>