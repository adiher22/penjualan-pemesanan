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
                <form action="<?= site_url('admin/master/editProduk') ?>" enctype="multipart/form-data" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="hidden" name="kd" value="<?= sha1($row->id_produk) ?>">
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="<?=$this->input->post('nama_produk') ?$this->input->post('nama_produk') : $row->nama_produk?>"
                        data-validation="length" data-validation-length="3-200" data-validation-error-msg="Nama pemilik kategori miminal 3 karakter">
                          <?= form_error('nama_produk')?>
                    </div>
                    <div class="from-group">
                        <label for="kategori">Kategori Produk</label>
                        <select name="id_kategori" id="" class="form-control">
                        
                          <?php $prod_kat = $this->input->post('id_kategori') ? $this->input->post('id_kategori') : $row->id_kategori ?>
                              <?php foreach($kategori as $k) { ?>
                              <option <?php if($prod_kat==$k->id_kategori) { echo 'selected'; } ?> value="<?= $k->id_kategori ?>"><?= $k->kategori ?></option>
                          <?php } ?>
                          <?php form_error('id_kategori') ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                          <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Produk" value="<?= $this->input->post('harga') ? $this->input->post('harga') : $row->harga?>"
                            data-validation="number" data-validation-error-msg="Harus diisi angka">
                            <?= form_error('harga')?>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Produk</label>
                          <?php if($row->gambar != null ) {?>
                                <div>
                                      <img src="<?= site_url('upload/produk/'.$row->gambar) ?>" width="200px" height="auto" alt=""> 
                                </div>
                          <?php }else{  echo "<p class='text-danger'>*Tidak Ada Gambar</p>"; }  ?>
                              
                        
                          <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Gambar Produk"
                             onchange="return fileValidation()">
                               <p class="text-danger">*PNG|JPG|JPEG</p>
                      
                         <?= form_error('gambar')?>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi Produk</label>
                        <textarea name="deskripsi" id="textarea" class="form-control" id="deskripsi"><?= $this->input->post('deskripsi') ? $this->input->post('deskripsi') : $row->deskripsi?></textarea>
                        <?= form_error('deskripsi') ?>
                    </div>
                      
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="reset" class="btn btn-danger"><i class="fas fa-times"></i> Reset</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
                </form>
            </div>
        <!-- /.card -->
        </div>    
    </div>  
</div>
<script> 
        function fileValidation() { 
            var fileInput = document.getElementById('gambar'); 
              
            var filePath = fileInput.value; 
          
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png)$/i; 
              
            if (!allowedExtensions.exec(filePath)) { 
               
                Swal.fire('File tipe tidak sesuai');
                fileInput.value = ''; 
                return false; 
            }  
            else  
            { 
              
                // Image preview 
                if (fileInput.files && fileInput.files[0]) { 
                    var reader = new FileReader(); 
                    reader.onload = function(e) { 
                        document.getElementById( 
                            'imagePreview').innerHTML =  
                            '<img src="' + e.target.result 
                            + '" style="width:200px; height:auto;"/>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 
        } 
     
    </script> 