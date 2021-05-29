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
                <h3 class="card-title">Laporan Pembayaran Berdasarkan Tanggal</h3>
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
  </div>

  