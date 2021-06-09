
       <!-- Section Content -->
        <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Dasbor Customer</h2>
              <p class="dashboard-subtitle">
                 Lihat transaksi anda hari ini!
              </p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">
                        Customer
                      </div>
                      <div class="dashboard-card-subtitle">
                        15.902
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">
                        Revenue
                      </div>
                      <div class="dashboard-card-subtitle">
                        $39,900
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-2">
                    <div class="card-body">
                      <div class="dashboard-card-title">
                        Transaction
                      </div>
                      <div class="dashboard-card-subtitle">
                        22,333,545
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 mt-2">
                  <h5 class="mb-3">Transaksi Terbaru</h5>
                  <?php foreach($pemesanan->result() as $p) : ?>
                  <a href="dashboard-transactions-details.html" class="card card-list d-block">
                    <div class="card-body">
                      <div class="row">
                      
                        <div class="col-md-3">
                          <?= $p->nama_cust ?>
                        </div>
                        <div class="col-md-2">
                          <?= $p->status_pemesanan ?>
                        </div>
                        <div class="col-md-3">
                          Tanggal Pesan: <?= indo_date($p->tgl_pesan) ?>
                        </div>
                         <div class="col-md-3">
                          Tanggal Batas: <?= indo_date($p->tgl_batas) ?>
                        </div>
                        <div class="col-md-1 d-none d-md-block">
                          <img src="<?= site_url('assets/front-end/images/dashboard-arrow-right.svg') ?>" alt="">
                        </div>
                      </div>
                    </div>
                  </a>
                    <?php endforeach ?>
                </div>
              </div>
            </div>
          </div>
        </div>
     