
    <?= $this->load->view('layout/header.php') ?>
   <div class="page-content page-auth" id="register">
     <div class="section-store-auth" data-aos="fade-up">
       <div class="container">
         <div class="row align-items-center justify-content-center row-login">
          
           <div class="col-lg-4">
             <h2>
               Memulai untuk transaksi <br> dengan cara terbaru
             </h2>
             <form class="mt-3" action="<?= site_url('auth/register') ?>" method="post">
              <div class="form-group">
                <label>Nama Customer</label>
                <input type="text" name="nama" class="form-control is-valid" v-model="name" autofocus>
              </div>
              <div class="form-group">
               <label>Email Address</label>
             
               <input id="email" type="email"  v-model="email" @change="EmailAvailability()" class="form-control <?= form_error('email') ?>" 
               :class="{ 'is_invalid' : this.email_unavailable }"
               name="email" required="email">

               <!-- @error('email')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror -->
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                <label>Rekening </label>
                <p class="text-muted">Apakah anda ingin memasukan nomor rekening sekarang ?</p>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" name="is_rekening" id="OpenStoreTrue" v-model="is_rekening" :value="true">
                  <label for="OpenStoreTrue" class="custom-control-label">Iya, sekarang</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" name="is_rekening" id="OpenStoreFalse" v-model="is_rekening" :value="false">
                  <label for="OpenStoreFalse" class="custom-control-label">Enggak, nanti saja</label>
                </div>
              </div>
              <div class="form-group" v-if="is_rekening">
                <label>Nomor Rekening</label>
                <input type="text" name="no_rek" class="form-control">
              </div>
              <div class="form-group">
                <label>No Hanphone</label>
                  <input type="number" name="no_hp" class="form-control">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                  <textarea type="number" name="alamat" class="form-control"></textarea>
              </div>
              <button type="submit" name="registrasi" :disabled="this.email_unavailable" class="btn btn-primary btn-block  mt-4">Registrasi Sekarang</button>
              <a href="<?= site_url('auth') ?>" class="btn btn-signup btn-block mt-2">Kembali ke halaman masuk</a>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
   
  