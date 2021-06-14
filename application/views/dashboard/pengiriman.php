  <!-- Section Content -->
        <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Pemesanan</h2>
              <p class="dashboard-subtitle">
                 Lacak pengiriman dengan nomor resi!
              </p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-12">
                  <a href="<?= site_url('dashboard/pelacakan') ?>" class="btn btn-primary">
                    Lacak Status Pengiriman
                  </a>
                </div>
              </div>
              <div class="row mt-3">
                 <div class="col-12 mt-2">
                  <h5 class="mb-3">Pemesanan Terbaru</h5>
                    <div class="card card-body">
                      <div class="row">
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <td class="text-center">Id Pemesanan</td>
                                      <td class="text-center">Status Pemesanan</td>
                                      <td class="text-center">Tanggal Pesan</td>
                                      <td class="text-center">Nomor Resi</td>
                                      <td class="text-center">Dikrim Ke</td>
                                      <td class="text-center">Opsi</td>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php
                                 $id = $this->session->userdata('customerid');
                                 foreach($pemesanan as $p) : 
                                 if($p['id_cust'] == $id && $p['status_pemesanan'] == "DIKIRIM"){ ?>
                                  <tr>
                                      <td class="text-center"><?= $p['id_pemesanan'] ?></td>
                                     
                                      <td class="text-primary text-center"><?= $p['status_pemesanan']?></td>
                                 
                                      <td class="text-center"><?= indo_date($p['tgl_pesan'])?></td>
                                      <td class="text-center"><?= $p['no_resi']?></td>
                                      <td class="text-center"><?= $p['alamat']?></td>
                                      <td class="text-center">
                                          <a href="<?= site_url('dashboard/detailPemesanan/' . encrypt_url($p['id_pemesanan'])) ?>" class="btn btn-secondary btn-sm">Detail</a>
                                          <a href="<?= site_url('dashboard/terima_barang/' . encrypt_url($p['id_pemesanan'])) ?>" class="btn btn-success btn-sm">Terima Barang</a>
                                      </td>
                                  </tr>
                                  <?php } endforeach ?>
                              </tbody>
                          </table>
                      </div>
                    </div>             
                </div>
              </div>
            </div>
          </div>
        </div>