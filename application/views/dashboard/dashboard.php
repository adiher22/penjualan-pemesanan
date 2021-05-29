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
         <!-- TABLE: LATEST ORDERS -->
         <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Pembayaran Terakhir Anda</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Id Pembayaran</th>
                      <th>Nama</th>
                      <th>Bulan</th>
                      <th>Status</th>
                      <th>Nominal</th>
                      <th>Total Biaya</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($paymen_last)) {
                      foreach($paymen_last->result() as $p) {?>
                    <tr>
                      <td><?= $p->id_pembayaran ?></td>
                      <td><?= $p->nama?></td>
                      <td>
                        <?php 
                        // Load get data detail keamanan
                        $detail = $this->M_pembayaran->getdetail(array('id_pembayaran' => $p->id_pembayaran));
                        ?>

                        <?php foreach ($detail as $key) {
                            // Ambil data bulan 
                        echo $key['bulan'].'<br>'; } ?>
                      </td>
                      <td>
                         <?php if(!empty($p->bukti_bayar)) { ?>
                         <span class="badge badge-success">Sudah Bayar</span>
                         <?php }else{?>
                         <span class="badge badge-danger">Belum Bayar</span> 
                         <?php }?>
                      </td>
                      <td><?= indo_curency($p->nominal) ?></td>
                      <td> 
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?= indo_curency($p->total_biaya) ?></div>
                      </td>
                    </tr>
                    
                    </tbody>
                    <?php } }?>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
       
            
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>