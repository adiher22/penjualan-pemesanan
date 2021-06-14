<!--  -->
   
<!--  -->
   <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title"><?= $title ?></h2>
              <p class="dashboard-subtitle">
                  Gunakan nomor resi anda untuk melacak status pengiriman!
              </p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-6">
                  <form action="<?= site_url('dashboard/pelacakan') ?>" method="POST">
                    <div class="card">
                      <div class="card-body">
                        <div class="row"></div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nomor Resi</label>
                                <input type="text" id="no_resi" name="no_resi" class="form-control" value="" />
                               
                            </div>
                               
                                    <button type="submit" class="btn btn-primary px-5">Lacak</button>
                         
                
                           </div>
                          
                      
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
        </div>
<!--  -->
