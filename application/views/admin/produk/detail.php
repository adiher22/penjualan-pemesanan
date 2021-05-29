<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Catatan:</h5>
              Berikut adalah data detail pembayaran dengan nama <b><?= $pembayaran->nama ?></b>
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-user"></i> Detail Data Pembayaran
                    <small class="float-right"> <?= date('d/M/Y') ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                 
                  <address>
                    <strong>Nama Warga : <?= $pembayaran->nama ?></strong><br>
                    NIK : <?= $pembayaran->nik ?><br>
                    NO KK : <?= $pembayaran->no_kk ?><br>
                    NO Rekening : <?= $pembayaran->no_rek ?><br>
                    No HP : <?= $pembayaran->no_hp ?> 
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
          
                  <address>
                    <strong></strong><br>
                    Pembayaran ke rekening : <?= $pembayaran->nomor ?> &nbsp; A/N ; <?= $pembayaran->nama_pemilik ?><br>
                    Alamat lengkap : <?= $pembayaran->alamat ?>
                    
                  </address>
                </div>
               
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Id Pembayaran</th>
                      <th>Tanggal Bayar</th>
                      <th>Bulan</th>
                      <th>Nominal</th>
                      <th>Total Biaya</th>
                   
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><?= $pembayaran->id_pembayaran ?></td>
                      <td><?= indo_date($pembayaran->tgl_bayar)?></td>
                      <td>
                      <?php foreach($detail as $key) {
                               echo $key['bulan']."<br>"; }?>
                      </td>
                      <td><?= indo_curency($pembayaran->nominal)?></td>
                      <td><?= indo_curency($pembayaran->total_biaya)?></td>
                    
                    </tr>
                  
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

          
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->