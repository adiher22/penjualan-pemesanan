     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       <!-- Section Content -->
        <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Pemesanan</h2>
              <p class="dashboard-subtitle">
                 Penting! untuk data pemesanan yang sudah melewati batas tanpa bukti bayar akan di hapus oleh admin!!
              </p>
            </div>
            <div class="dashboard-content">
             
              <div class="row mt-3">
                 <div class="col-12 mt-2">
                  <h5 class="mb-3">Pemesanan Terbaru</h5>
                    <div class="card card-body">
                      <div class="row">
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <td>Id Pemesanan</td>
                                      <td>Status Pemesanan</td>
                                      <td>Tanggal Pesan</td>
                                      <td>Tanggal Batas</td>
                                      <td class="text-center">Opsi</td>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php foreach($pemesanan->result_array() as $p) : 
                                 $today = (abs(strtotime(date('Y-m-d'))));
                                 $batas = (abs(strtotime($p['tgl_batas'])));?>
                                  <tr>
                                      <td><?= $p['id_pemesanan'] ?></td>
                                      <?php if(empty($p['bukti_bayar'])) { ?>
                                      <td class="text-danger"><?= $p['status_pemesanan']?></td>
                                      <?php }else if($batas < $today && empty($p['bukti_bayar'])){?>
                                      <td class="text-danger">EXPIRED!</td>
                                      <?php }else{ ?>
                                      <td class="text-info"><?= $p['status_pemesanan'] ?></td>
                                      <?php }?>
                                      <td><?= indo_date($p['tgl_pesan'])?></td>
                                      <td class="text-danger"><?= indo_date($p['tgl_batas'])?></td>
                                      <td class="text-center">
                                          <a href="<?= site_url('dashboard/detailPemesanan/' . encrypt_url($p['id_pemesanan'])) ?>" class="btn btn-secondary btn-sm">Detail</a>
                                          <?php if(empty($p['bukti_bayar'])) { ?>
                                          <a href="<?= site_url('dashboard/upload_bukti/' . encrypt_url($p['id_pemesanan'])) ?>" class="btn btn-primary btn-sm">Upload Bukti</a>
                                            <?php }else if($batas <= $today && empty($p['bukti_bayar'])) {?>
                                          <a href="<?= site_url('dashboard/detailPemesanan/' . encrypt_url($p['id_pemesanan'])) ?>" class="btn btn-secondary btn-sm">Detail</a>
                                          <?php }?>
                                      </td>
                                  </tr>
                                  <?php endforeach ?>
                              </tbody>
                          </table>
                      </div>
                    </div>             
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- </ Page Content Wrapper -->
       <!-- Modal upload bukti bayar -->
<div class="modal" id="modal-upload" data-backdrop="false" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Bukti Bayar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('dashboard/upload_bukti') ?>" method="POST" id="form-upload" enctype="multipart/form-data">
      <div class="modal-body">
         <div class="form-group">
         <label for="bukti_bayar">Bukti Bayar</label>
             <input type="hidden" name="id_pemesanan" id="upload_id" value="">
             <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar" onchange="return fileValidation() "/>   
             <p class="text-danger">*JPG|PNG|JPEG</p> 
             <div id="imagePreview"></div>
         </div>
         <div class="form-group">
           <label for="norek">Nomor Rekening Anda</label>
           <input type="text" class="form-control" id="norek" name="norek" readonly value="<?= $pesan['nomor_rekening'] ?>">
         </div>      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
 


    <!--Modal: Name-->
    <div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">

        <!--Content-->
        <div class="modal-content">

          <!--Body-->
          <div class="modal-body mb-0 p-0">

            <div class="embed-responsive">
                <img src="" id="bukti" class="img-fluid w-100 h-100"  alt="Responsive image">
            </div>

          </div>

          <!--Footer-->
          <div class="modal-footer justify-content-center">
          
            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>

          </div>

        </div>
        <!--/.Content-->

      </div>
    </div>