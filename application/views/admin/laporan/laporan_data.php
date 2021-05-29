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
    <div class="content d-flex justify-content-center">
        <div class="col-sm-6">
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $title ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                    <form action="<?= site_url('admin/laporan/LaporanData') ?>" method="post">
                    <div class="card-body">
                
                        <div class="form-group">
                            <label for="nama">Dari Tanggal</label>
                            <input type="date" class="form-control" name="dari" id="dari" placeholder="Dari Tanggal"
                            data-validation="required" data-validation-error-msg="Dari tanggal harus diisi">
                        </div>
                        <div class="form-group">
                            <label for="sampai">Sampai Tanggal</label>
                            <input type="date" class="form-control" name="sampai" id="sampai" placeholder="Sampai Tanggal"
                            data-validation="required" data-validation-error-msg="Sampai tanggal harus diisi">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="submit"class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            <!-- /.card -->
            </div>    
        </div>                  
    <!-- /.content -->
    <br>
    <hr>
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pembayaran Dari Tanggal : <?= indo_date($this->input->post('dari')) ?>, Sampai Tanggal: <?= indo_date($this->input->post('sampai')) ?></h3>
               <div class="col-6 ml-auto mr-0">
               <a href="<?= site_url('admin/laporan/cetak'.'?dari='.set_value('dari').'&sampai='.set_value('sampai')) ?>" target="_blank" class="btn btn-primary float-right"><i class="fa fa-print"></i> Print</a>
               </div> 
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tanggal Bayar </th>
                    <th class="text-center">Nama Warga</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Bulan</th>
                    <th class="text-center">Nominal</th>
                    <th class="text-center">Total Biaya</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1;
                    foreach($report as $r) {
                     if($r->bukti_bayar!=null) { ?>
                  <tr>
                    <td class="text-center"><?= $no++?></td>
                    <td class="text-center"><?= indo_date($r->tgl_bayar)?></td>
                    <td class="text-center"><?= $r->nama ?></td>   
                    <td class="text-center"><?= $r->nik?></td> 
                    <td class="text-center">
                        <?php foreach($reportDetail as $rd) {
                            if($r->id_pembayaran==$rd['id_pembayaran']){
                              echo $rd['bulan']."<br>";
                            }else{
                              "Not Found";
                            }
                           
                        }?>
                            
                    </td>
                    <td class="text-center"><?= indo_curency($r->nominal) ?></td>
                    <td class="text-center"><?= indo_curency($r->total_biaya) ?></td>   
               
                  </tr>
                    <?php } }?>
         
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

  