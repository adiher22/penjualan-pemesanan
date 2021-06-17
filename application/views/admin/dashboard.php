<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>15</h3>

                <p>Data Customer</p>
              </div>
              <div class="icon">
              <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>100</h3>

                <p>Data Produk</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-friends"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>123</h3>

                <p>Transaksi</p>
              </div>
              <div class="icon">
                <i class="fas fa-cash-register"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Pengiriman</h3>

                <p>Data Pengiriman</p>
              </div>
              <div class="icon">
              <i class="fas fa-money-check-alt"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
         <!-- /.card-header -->
         <div class="card-body p-0">
                  <h3 class="mb-3"> Transaksi Pemesanan Terbaru </h3>
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Id Pemesanan</th>
                      <th>Nama Customer</th>
                      <th>Down Payment</th>
                      <th>Full Payment</th>
                      <th>Status Pemesanan</th>
                      <th>Total Biaya</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach($pemesanan->result_array() as $p) :?>
                    <tr>
                      <td><?= $p['id_pemesanan'] ?></td>
                      <td><?= $p['nama_cust']?></td>
                      <td>
                        <?= $p['down_payment'] != null ? indo_curency($p['down_payment']) : '<p class="text-danger">Kosong</p>' ?>
                      </td>
                      <td>
                        <?= $p['full_payment'] != null ? indo_curency($p['full_payment']) : '<p class="text-danger">Kosong</p>' ?>
                      </td>
                      <td><?= $p['status_pemesanan'] == "BELUM TRANSFER" ? '<span class="text-danger">'.$p['status_pemesanan'].'</span>' : $p['status_pemesanan']   ?></td>
                      <td> <?= indo_curency($p['total']) ?> </td>
                    </tr>
                        <?php endforeach?>
                    </tbody>
                  
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
           
            
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>