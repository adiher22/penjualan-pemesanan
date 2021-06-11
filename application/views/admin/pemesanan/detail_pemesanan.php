<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
              <li class="breadcrumb-item active">Detail Pemesanan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-primary"></i> Catatan:</h5>
              Halaman detail bisa sekaligus dilakukan pengiriman barang jika sudah siap kirim, anda sebagai user juga bisa update status pemesanan.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-list-alt"></i> Informasi Pemesanan Customer
                    <small class="float-right">Tanggal : <?= date('d-m-Y') ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Data Customer
                  <address>
                    <strong>Nama Customer : <?= $detail->nama_cust ?>.</strong><br>
                    Alamat : <?= $detail->alamat ?><br>   
                    Email: <?= $detail->email ?><br>
                    No Telepon : <?= $detail->no_telp ?><br>
                    No Rekening : <?= $detail->no_rek != null ? $detail->no_rek : "No Rekening Kosong"; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Data Pemesanan
                  <address>
                    <br>
                    Metode Pembayaran : <?= $detail->down_payment != null ? $detail->down_payment : $detail->full_payment ?><br>
                    Nama Rekening Yang Ditransfer : <?= $detail->nama_pemilik ?><br>
                    Norek : <?= $detail->nomor_rekening ?><br>
                    Bank : <?= $detail->nama_bank ?>

                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Data Pemesanan<br>
                  ID Pemesanan:</b> <?= $detail->id_pemesanan ?><br>
                  Tanggal Batas Bayar:</b> <?= indo_date($detail->tgl_batas) ?><br>
                  Deskripsi Pemesanan:</b> <?= $detail->deskripsi_pemesanan != null ? $detail->deskripsi_pemesanan : "Tidak ada deskripsi"; ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Produk</th>
                      <th>Nama Produk</th>
                      <th>Gambar</th>
                      <th>Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; 
                    foreach($produk->result_array() as $produk) : 
                    ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $produk['id_produk'] ?></td>
                      <td><?= $produk['nama_produk']?></td>
                      <td><img src="<?= site_url('upload/produk/' . $produk['gambar']) ?>" style="width: 80px; height: auto" alt=""></td>
                      <td><?= indo_curency($produk['harga']) ?></td>
                    </tr>
                    <?php endforeach?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Bukti Bayar:</p>
                   <?php if(!empty($detail->bukti_bayar)) { ?>
                   <img src="<?= site_url('upload/bukti/' . $detail->bukti_bayar) ?>" style="width: 500px;" alt="">
                    <?php } else{ echo "Belum ada bukti bayar"; } ?>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   Harap periksa kembali apakah data bukti bayar sudah sesuai dengan data customer atau tidak. <br>
                   Jika terjadi kesalahan karena <b>tidak teliti</b>, maka akan sangat merugikan perusahaan dan anda sendiri.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Tanggal Pesan: <?= indo_date($detail->tgl_pesan) ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?= indo_curency($sum['subtotal']) ?></td>
                      </tr>
                      <tr>
                        <th>Pajak (10%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Biaya Pengiriman:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?= indo_curency($detail->total) ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->