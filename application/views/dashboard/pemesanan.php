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
                              <?php foreach($pemesanan->result() as $p) : ?>
                                  <tr>
                                      <td><?= $p->id_pemesanan ?></td>
                                      <td class="text-danger"><?= $p->status_pemesanan?></td>
                                      <td><?= indo_date($p->tgl_pesan)?></td>
                                      <td class="text-danger"><?= indo_date($p->tgl_batas)?></td>
                                      <td class="text-center">
                                          <a href="" class="btn btn-secondary btn-sm">Detail</a>
                                          <a href="" class="btn btn-primary btn-sm">Upload Bukti</a>
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
      <script>
        // script untuk memanggil id sesuai dengan data pemesanan
          $(document).ready(function(){
              $(document).on('click','#colaps', function() {
                  var nama_produk = $(this).data('nama_produk');
                  var harga = $(this).data('harga');
                  var gambar = $(this).data('gambar');

                  $('#nama_produk').html(nama_produk);
                  $('#harga').html(harga);
            
                  $('#gambar').attr("src", gambar);
           


              });

          });
      </script>