<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
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
            <form action="<?= site_url('pembayaran/TambahIuranKeamanan') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Pembayaran</label>
                    <input type="hidden" name="id_warga" value="<?= $this->fungsi->user_login()->id_warga ?>">
                    <input type="text" readonly class="form-control" name="id_pembayaran" id="id_pembayaran" value="<?= $kd_keamanan ?>">
                 
                </div>
                <div class="form-group">
                    <label for="bulan">Bulan</label>
                    <select name="bulan[]" id="bulan" class="select2bs4" style="width: 100%"; multiple="multiple" data-placeholder="Pilih bulan">
                     <?php foreach($bulan as $bln) {?>
                      <option value="<?= $bln ?>"><?= $bln ?></option>
                     <?php } ?>
                    </select>
                
                  </div>
                  <div class="form-group">
                        <label for="nominal">Tahun</label>
                        <input type="text" class="form-control" name="tahun" id="tahun" placeholder=" Masukan Tahun" value="<?= date('Y')?>"
                        >
                        <?= form_error('tahun') ?>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="hidden" name="rek_warga" value="<?= $w->no_rek ?>">
                        <input type="text" class="form-control" name="nominal" id="nominal" placeholder=" Masukan Nominal "
                        data-validation="required" data-validation-error-msg="Nominal harus diisi">
                        <?= form_error('nominal') ?>
                    </div>
                    <div class="form-group">
                      <label for="rekening">No Rekening </label>
                      <select name="rekening" class="form-control" id="">
                        <option value="">--Pilih Rekening--</option>
                        <?php foreach($rekening as $r){?>
                          <option value="<?= $r->id_rekening ?>"><?= $r->nama_pemilik ?>/<?= $r->nomor ?></option>
                          <?php } ?>
                      </select>
                      <?= form_error('rekening') ?>
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="tgl_bayar">Tanggal Bayar</label>
                    <div class="input-group date" id="tgl_bayar" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="tgl_bayar" data-validation="required" data-validation-error-msg="Tgl bayar harus diisi" placeholder="Tanggal Bayar" data-target="#tgl_bayar"/>
                        <div class="input-group-append" data-target="#tgl_bayar" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                        </div>
                    </div>
                    </div>
                    <label for="total_biaya">Total Biaya</label>
                    <div class="col-6">

                   
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Rp.</span>
                        </div>
                          <input type="text" class="form-control" name="total_biaya" id="total_biaya" 
                          >
                     
                      </div>  
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
