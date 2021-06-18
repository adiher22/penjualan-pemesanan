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
                <h3 class="card-title">Data Customer</h3>
               <div class="col-6 ml-auto mr-0">
             
               </div> 
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTables" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Id Customer</th>
                    <th class="text-center">Nama Customer</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">No Telp</th>
                    <th class="text-center">No Rekening</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Tanggal Daftar</th>
                 
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1;
                    foreach($customer as $cust) {?>
                  <tr>
                    <td class="text-center"><?= $no++?></td>
                    <td class="text-center"><?= $cust->id_cust?></td>
                    <td class="text-center"><?= $cust->nama_cust?></td>
                    <td class="text-center"><?= $cust->email?></td>
                    <td class="text-center"><?= $cust->no_telp?></td>
                    <td class="text-center"><?= $cust->no_rek != null ? $cust->no_rek : 'Norek Kosong' ?></td>
                    <td class="text-center"><?= $cust->alamat?></td>
                    <td class="text-center"><?= indo_date($cust->tgl_daftar)?></td>
                   
                  
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

  