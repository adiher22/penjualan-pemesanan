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

    <!-- Main content -->
    <section class="content">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kepala Keluarga</h3>
               <div class="col-6 ml-auto mr-0">
               <a href="<?= site_url('admin/master/tambahWarga') ?>" class="btn btn-primary float-right"><i class="fa fa-user-plus"></i> Tambah Warga</a>
               </div> 
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTables" class="table table-bordered table-striped table-responsive">
                  <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama </th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">No HP</th>
                    <th class="text-center">No KK</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">No Rekening</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Tanggal Daftar</th>
                    <th class="text-center">Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1;
                    foreach($warga as $w) {?>
                  <tr>
                    <td class="text-center"><?= $no++?></td>
                    <td class="text-center"><?= $w->nama?></td>
                    <td class="text-center"><?= $w->nik?></td>
                    <td class="text-center"><?= $w->no_hp?></td>
                    <td class="text-center"><?= $w->no_kk?></td>
                    <td class="text-center"><?= $w->nama_pengguna?></td>
                    <td class="text-center"><?= $w->no_rek?></td>
                    <td class="text-center"><?= $w->alamat?></td>
                    <td class="text-center"><?= indo_date($w->tgl_daftar)?></td>
                    <td class="text-center">
                      <a href="<?= site_url('admin/master/editWarga/'. sha1($w->id_warga)) ?>" id="btn-edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                      <a href="<?= site_url('admin/master/hapusWarga/'.$w->id_warga)?>" id="btn-hapus" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  
                  </tr>
                    <?php }?>
         
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  