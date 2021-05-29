<style>
  #myImg:hover {
    opacity: 0.7;
    cursor: pointer;
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
  }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
             <?php foreach($this->uri->segments as $segment):?>
              <?php 
                $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
                $is_active =  $url == $this->uri->uri_string;
            ?>
            <!-- <li><a href="index.html">Home</a></li> -->
            <li <?php echo $is_active ? 'class="breadcrumb-item active"': 'class="breadcrumb-item"' ?>>
            <?php if($is_active): ?>
              <?php echo ucfirst($segment) ?>
                <?php else: ?>
                  <a href="<?php echo site_url($url) ?>"><?php echo ucfirst($segment) ?></a>
                <?php endif; ?>
            </li>
              <?php endforeach;?>
          </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <section class="content">
    <div class="callout callout-warning">
      <h5><i class="fas fa-info"></i> Catatan:</h5>
        Data tersebut diambil dari semua data warga yang melakukan pembayaran, untuk pengecekan lebih lanjut bisa dengan cek tunggakan dari masing-masing data warga.<br> 
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pembayaran Keamanan </h3>
               <div class="col-6 ml-auto mr-0">
             
              
               </div> 
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTables" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama </th>
                    <th class="text-center">Bulan</th>
                    <th class="text-center">Tanggal Bayar</th>
                
                    <th class="text-center">Bukti Bayar</th>
                    <th class="text-center">Total Biaya</th>
                    <th class="text-center">Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1;
                    foreach($pembayaran as $p) {?>
                  <tr>
                    <td class="text-center"><?= $no++?></td>
                    <td class="text-center"><?= $p['nama']?></td>
                    <?php 
                    // Load get data detail keamanan
                    $detailSpp = $this->M_pembayaran->getdetail(array('id_pembayaran' => $p['id_pembayaran']));
                    
                    ?>

                    <td><?php foreach ($detailSpp as $key) {
                        // Ambil data bulan 
                     echo $key['bulan'].'<br>'; } ?></td> 
                    <td class="text-center"><?= indo_date($p['tgl_bayar'])?></td> 
                    <td><img src="<?= site_url('upload/bukti/'.$p['bukti_bayar']) ?>" id="myImg" data-toggle="modal" data-id="<?= $p['id_pembayaran'] ?>" data-bukti="<?= site_url('upload/bukti/'.$p['bukti_bayar']) ?>" data-target="#modal-image" style="width: 100px; height:auto" alt=""></td>     
                    <td class="text-center"><?= indo_curency($p['total_biaya']) ?></td>
                    <td class="text-center">
                   
                    <a href="<?= site_url('admin/pembayaran/cekTunggakan/'.sha1($p['id_warga']))?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Cek Tunggakan</a>
                    <a href="<?= site_url('admin/pembayaran/detailPembayaran/'.sha1($p['id_pembayaran']))?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Detail</a>
                     
                    </td>
                    </form>
                  </tr>
                    <?php }?>
         
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

    <!-- Priview Image -->

    <!--Modal: Name-->
    <div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">

        <!--Content-->
        <div class="modal-content">

          <!--Body-->
          <div class="modal-body mb-0 p-0">

            <div class="embed-responsive">
                <img src="" id="gambar" class="img-fluid w-100 h-100"  alt="Responsive image">
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

    <script>
    $(document).ready(function(){
        $(document).on('click','#myImg', function() {
            var id_pembayaran = $(this).data('id');
            var bukti_bayar = $(this).data('bukti');
            $('#gambar').attr("src", bukti_bayar);
      
        


        });

    });
    </script>