   <!-- Section Content -->
        <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title"><?= $title ?></h2>
              <p class="dashboard-subtitle">
                Upload bukti transfer anda disini ketika anda sudah selesai membayar!
              </p>
             </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-12">
                  <form action="<?= site_url('dashboard/upload_bukti') ?>" method="POST" enctype="multipart/form-data">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Product Name</label>
                              <input type="hidden" name="id_pemesanan" value="<?= encrypt_url($row->id_pemesanan) ?>">
                              <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar" onchange="return fileValidation() "/> 
                            
                                <p class="text-danger">*JPG|PNG|JPEG</p> 
                                <div id="imagePreview"></div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Nomor Rekening Anda</label>
                              <input type="text" name="no_rek" value="<?= $row->no_rek ?>" class="form-control">
                              <p>*Biarkan jika tidak ada perubahan nomor</p>
                            </div>
                          </div>
                         
                            <div class="col">
                              <button type="submit" class="btn btn-success btn-block">Simpan</button>
                            </div>
                           </div>
                          </div>
                         </div>
                        </form>
                       </div>
                     </div>
                   </div>
               </div>      
            </div> 
   <script> 
        function fileValidation() { 
            var fileInput = document.getElementById('bukti_bayar'); 
              
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

    <!-- Priview Image -->