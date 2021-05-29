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
     <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?= $title ?></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
            <form action="<?= site_url('admin/master/editWarga') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="hidden" name="id_warga" value="<?= $row->id_warga ?>">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?=$this->input->post('username') ?$this->input->post('username') : $row->nama_pengguna?>"
                    data-validation="length alphanumeric" data-validation-length="5-20" data-validation-error-msg="Username anda miminal 5 karakter">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?=$this->input->post('password')?>">
                    <p class="text-danger">*Kosongkan password jika tidak ingin diganti</p>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="<?= $this->input->post('nama') ? $this->input->post('nama'): $row->nama?>"
                    data-validation="length" data-validation-length="4-20" data-validation-error-msg="Nama pengguna miminal 4 karakter">
                </div>
                <div class="form-group">
                    <label for="no_hp">No Handphone</label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Handphone" value="<?= $this->input->post('no_hp') ? $this->input->post('no_hp'): $row->no_hp?>"
                    data-validation="length numeric" data-validation-length="11-12" data-validation-error-msg="Nomor Hanphone miminal 11-12 karakter">
                </div>
                <div class="form-group">
                    <label for="norek">No Rekeneing</label>
                    <input type="text" class="form-control" name="norek" id="norek" placeholder="Nomor Rekening" value="<?= $this->input->post('norek') ? $this->input->post('norek'): $row->no_rek?>"
                    data-validation="length" data-validation-length="10" data-validation-error-msg="Nomor Rekening miminal 10 karakter">
                    <?= form_error('norek') ?>
                </div>
                <div class="form-group">
                    <label for="no_ktp">No KTP</label>
                    <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Nomor KTP" value="<?= $this->input->post('no_ktp') ? $this->input->post('no_ktp'): $row->nik?>"
                    data-validation="length" data-validation-length="16" data-validation-error-msg="Nomor KTP harus 16 karakter">
                </div>
                <div class="form-group">
                    <label for="no_kk">No Kartu Keluarga</label>
                    <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Nomor Kartu Keluarga" value="<?= $this->input->post('no_kk') ? $this->input->post('no_kk'): $row->no_kk?>"
                    data-validation="length" data-validation-length="16" data-validation-error-msg="Nomor Kartu Keluarga harus 16 karakter">
                    <?= form_error('no_kk') ?>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" placeholder="Alamat" class="form-control" ><?= $this->input->post('alamat') ? $this->input->post('alamat'): $row->alamat ?></textarea>
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
