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
    <div class="callout callout-danger">
      <h5><i class="fas fa-info"></i> Perhatian:</h5>
      Ketika anda sudah melakukan tambah pembayaran, segera lakukan pembayaran & upload bukti bayar sebelum transaksi kadaluwarsa.<br> 
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pembayaran Keamanan <?= $this->fungsi->user_login()->nama; ?></h3>
               <div class="col-6 ml-auto mr-0">
               <a href="<?= site_url('pembayaran/cekTunggakan/'. sha1($this->fungsi->user_login()->id_warga)) ?>" class="btn btn-warning float-right"><i class="fas fa-edit"></i> Cek Tunggakan</a>
               <a href="<?= site_url('pembayaran/TambahIuranKeamanan') ?>" class="btn btn-primary float-right"><i class="fa fa-user-plus"></i> Tambah Pembayaran</a>
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
                    <th class="text-center">Status</th>
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
                    $detail = $this->M_pembayaran->getdetail(array('id_pembayaran' => $p['id_pembayaran']));
                    ?>

                    <td><?php foreach ($detail as $key) {
                        // Ambil data bulan 
                     echo $key['bulan'].'<br>'; } ?></td> 
                    <td class="text-center"><?= indo_date($p['tgl_bayar'])?></td>  
                    <!-- Jika bukti bayar tidak kosong -->
                    <?php if(!empty($p['bukti_bayar'])) { ?>
                        <!-- Maka sudah bayar  -->
                     <td class="text-center"><span class="label label-success">Sudah Bayar</span></td>
                     <?php }else{?>
                        <!-- Jika bukti bayar kosong -->
                     <td class="text-center"><span class="label label-danger">Belum Bayar</span></td> 
                     <?php } if(!empty($p['bukti_bayar'])) { ?>
                      <!-- Jika image ada -->
                     <td><img src="<?= site_url('upload/bukti/'.$p['bukti_bayar']) ?>" id="myImg" data-toggle="modal" data-target="#modal-image" style="width: 100px; height:auto" data-id_pembayaran="<?= $p['id_pembayaran'] ?>" data-bukti="<?= site_url('upload/bukti/'.$p['bukti_bayar']) ?>" alt=""></td>     
                     <?php } else{?>
                      <!-- Jika image kosong -->
                      <td><span>Belum Ada </span></td>
                      <?php } ?>
                     <td class="text-center"><?= indo_curency($p['total_biaya']) ?></td>
                     <td class="text-center">
                       <?php if(empty($p['bukti_bayar'])){ ?>
                        <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-upload"><i class="fas fa-upload"></i> Upload Bukti</a>
                      <?php }else{ ?>
                   
                      <a href="<?= site_url('pembayaran/cetak/'.sha1($p['id_pembayaran']))?>" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak</a>
                      <a href="<?= site_url('pembayaran/hapusPembayaran/'.$p['id_pembayaran'])?>" class="btn btn-danger btn-sm" id="btn-hapus"><i class="fas fa-trash-alt"></i> Hapus</a>
                        <?php } ?>
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
<!-- Modal upload bukti bayar -->
  <div class="modal" id="modal-upload" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Bukti Bayar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('pembayaran/update_bayar') ?>" method="POST" id="form-upload" enctype="multipart/form-data">
      <div class="modal-body">
       
          
         <div class="form-group">
         <label for="bukti_bayar">Bukti Bayar</label>
             <input type="hidden" name="id_pembayaran" value="<?= $keamanan->id_pembayaran ?>">
             <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar" onchange="return fileValidation() "/>   
             <p class="text-danger">*JPG|PNG|JPEG</p> 
             <div id="imagePreview"></div>
         </div>
         <div class="form-group">
           <label for="norek">Nomor Rekening Anda</label>
           <input type="text" class="form-control" id="norek" name="norek" readonly value="<?= $warga['no_rek'] ?>">
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
<script> 
        function fileValidation() { 
            var fileInput = document.getElementById('bukti_bayar'); 
              
            var filePath = fileInput.value; 
          
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png)$/i; 
              
            if (!allowedExtensions.exec(filePath)) { 
               
                Swal.fire('File tipe tidak sesuai');
                fileInput.value = ''; 
                return false; 
            }  
            else  
            { 
              
                // Image preview 
                if (fileInput.files && fileInput.files[0]) { 
                    var reader = new FileReader(); 
                    reader.onload = function(e) { 
                        document.getElementById( 
                            'imagePreview').innerHTML =  
                            '<img src="' + e.target.result 
                            + '" style="width:200px; height:auto;"/>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 
        } 
     
    </script> 

    <!-- Priview Image -->

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