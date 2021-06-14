 <!-- Section Content -->
        <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title"><?= $title ?></h2>
              <p class="dashboard-subtitle">
                Ubah profile anda
              </p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-12">
                  <form action="<?= site_url('dashboard/akunSaya') ?>" method="POST">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Customer</label>
                                <input type="text" id="nama_cust" name="nama_cust" class="form-control" value="<?= $cust->nama_cust ?>" />
                                <?= form_error('nama_cust') ?>
                            </div>
                           </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" id="email" name="email" class="form-control" value="<?= $cust->email ?>" />
                                  
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="country">Password</label>
                                  <input type="password" id="password" name="password" class="form-control" />
                                    <p class="text-danger">*Kosongkan password jika tidak ingin diganti</p>
                              </div>
                            
                          </div>
                       
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="no_rek">Nomor Rekening Anda</label>
                                   <input type="number" name="no_rek" class="form-control" value="<?= $cust->no_rek != null ? $cust->no_rek : "Nomor Rekening Kosong"; ?>">
                                 <?= form_error('no_rek') ?>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="city">No Telepon</label>
                                  <input type="number" name="no_telp" class="form-control" value="<?= $cust->no_telp ?>">
                                  <?= form_error('no_telp') ?>
                              </div>
                          </div>
                         
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressOne">Alamat</label>
                                <textarea  id="addressOne" name="alamat" class="form-control"><?= $cust->alamat ?></textarea>
                            </div>
                           </div>
                        </div>
                        <div class="row">
                          <div class="col text-right">
                            <button type="submit" class="btn btn-success px-5">Simpan Data</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>