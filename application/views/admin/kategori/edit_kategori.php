<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Halaman <?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
         
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
            <form action="<?= site_url('admin/master/editKategori') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_kategori">Kategori</label>
                    <input type="hidden" name="id_kategori" value="<?= sha1($row->id_kategori) ?>">
                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Pemilik Kategori" value="<?=$this->input->post('nama_kategori') ?$this->input->post('nama_kategori') : $row->kategori?>"
                    data-validation="length" data-validation-length="3-20" data-validation-error-msg="Nama pemilik kategori miminal 3 karakter">
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
