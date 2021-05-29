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
            <form action="<?= site_url('admin/pengguna/editPengguna') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="hidden" name="id_admin" value="<?= $row->id_admin ?>">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?=$this->input->post('username') ?$this->input->post('username') : $row->username?>"
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
                    data-validation="length alphanumeric" data-validation-length="4-20" data-validation-error-msg="Nama pengguna miminal 4 karakter">
                </div>
                 <div class="form-group">
                    <label for="gambar">Foto Profil</label>
                    <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Foto Profile" onchange="return fileValidation()">
                    <p class="text-danger">*Kosongan jika tidak ingin ganti foto profil</p>
                    <div id="imagePreview"></div>
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