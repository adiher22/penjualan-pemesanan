<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Halaman <?= $title ?></h1>
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
            <form action="<?= site_url('admin/master/tambahWarga') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                    data-validation="length" data-validation-length="5-20" data-validation-error-msg="Username anda miminal 5 karakter">
                    <?= form_error('username') ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password"
                    data-validation="length" data-validation-length="4-20" data-validation-error-msg="Password anda miminal 4 karakter">
                    <?= form_error('password') ?>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Warga"
                    data-validation="required" data-validation-error-msg="Nama warga harus diisi">
                    <?= form_error('nama') ?>
                </div>
                <div class="form-group">
                    <label for="nik">No KTP</label>
                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Nomor KTP"
                    data-validation="required length" data-validation-length="16" data-validation-error-msg="Nomor KTP harus 16 digit">
                    <?= form_error('nik') ?>
                </div>
                <div class="form-group">
                    <label for="no_hp">No Hanphone</label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Handphone"
                    data-validation="required length" data-validation-length="11-12" data-validation-error-msg="No HP harus 11-12 digit">
                    <?= form_error('no_hp') ?>
                </div>
                <div class="form-group">
                    <label for="no_kk">No KK</label>
                    <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kartu Keluarga">
                    <p>*Boleh kosong</p>
                </div>
                <div class="form-group">
                    <label for="no_rek">No Rekening</label>
                    <input type="text" class="form-control" name="no_rek" id="no_rek" placeholder="No Rekening">
                    <p>*Boleh kosong</p>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Lengkap"
                    data-validation="required" data-validation-length="10" data-validation-error-msg="Alamat harus diisi"></textarea>

                </div>
             
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
         </div>
    <!-- /.card -->
     </div>    
 </div>  
</div>
