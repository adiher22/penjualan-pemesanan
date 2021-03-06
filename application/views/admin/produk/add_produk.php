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
            <form action="<?= site_url('admin/master/tambahProduk') ?>" enctype="multipart/form-data" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Produk</label>
                    <input type="hidden" name="id_produk" value="<?= $kd ?>">
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk"
                    data-validation="length " data-validation-length="3-300" data-validation-error-msg="Minimal 3 karakter">
                    <?= form_error('nama_produk')?>
                </div>
                <div class="from-group">
                    <label for="kategori">Kategori Produk</label>
                    <select name="id_kategori" id="" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                    <?php foreach($kategori as $k ) {?>
                       
                        <option value="<?= $k->id_kategori ?>"><?= $k->kategori ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Produk"
                    data-validation="number" data-validation-error-msg="Harus diisi angka">
                    <?= form_error('harga')?>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Produk</label>
                    <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Gambar Produk"
                    onchange="return fileValidation()">
                    <p class="text-danger">*PNG|JPG|JPEG</p>
                    <div id="imagePreview"></div>
                    <?= form_error('gambar')?>
                </div>
                <div class="form-group">
                    <label for="">Deskripsi Produk</label>
                    <textarea name="deskripsi" id="textarea" class="form-control" id="deskripsi"></textarea>
                </div>
                      <?= form_error('deskripsi') ?>
               
             
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