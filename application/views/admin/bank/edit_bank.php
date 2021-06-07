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
            <form action="<?= site_url('admin/master/editBank') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_bank">Nama Bank</label>
                    <input type="hidden" name="id_bank" value="<?= encrypt_url($row->id_bank) ?>">
                    <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Nama Bank" value="<?=$this->input->post('nama_bank') ?$this->input->post('nama_bank') : $row->nama_bank?>"
                    data-validation="length" data-validation-length="3-20" data-validation-error-msg="Nama pemilik kategori miminal 3 karakter">
                </div>
                <div class="form-group">
                    <label for="nomor_rekening">Nomor Rekening</label>
                  
                    <input type="text" class="form-control" name="nomor_rekening" id="nomor_rekening" placeholder="Nomor Rekening" value="<?=$this->input->post('nomor_rekening') ?$this->input->post('nomor_rekening') : $row->nomor_rekening?>"
                    data-validation="length number" data-validation-length="10-22" data-validation-error-msg="Nomor rekening minimal 10 angka">
                </div>
                  <div class="form-group">
                    <label for="nama_pemilik">Nama Pemilik</label>
                  
                    <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nomor Pemilik" value="<?=$this->input->post('nama_pemilik') ?$this->input->post('nama_pemilik') : $row->nama_pemilik?>"
                    data-validation="length" data-validation-length="5-22" data-validation-error-msg="Nomor rekening minimal 5 karakter">
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
