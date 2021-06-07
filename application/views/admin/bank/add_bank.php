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
     <div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title"><?= $title ?></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
            <form action="<?= site_url('admin/master/tambahBank') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_bank">Nama Bank</label>
                
                    <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Nama Bank"
                    data-validation="length " data-validation-length="3-20" data-validation-error-msg="Minimal 3 karakter">
                    <?= form_error('nama_bank')?>
                </div>
                <div class="form-group">
                    <label for="nomor_rekening">Nomor Rekening</label>
                
                    <input type="text" class="form-control" name="nomor_rekening" id="nomor_rekening" placeholder="Nama Rekening"
                    data-validation="length number " data-validation-length="10-22" data-validation-error-msg="Minimal 10 angka ">
                    <?= form_error('nomor_rekening')?>
                </div>
                <div class="form-group">
                    <label for="nama_pemilik">Nama Pemilik</label>
                
                    <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik"
                    data-validation="length " data-validation-length="5-25" data-validation-error-msg="Minimal 5 karakter">
                    <?= form_error('nama_pemilik')?>
                </div>  
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
            </form>
         </div>
    <!-- /.card -->
     </div>    
 </div>  
</div>
