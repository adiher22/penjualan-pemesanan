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
                <h3 class="card-title">Data Produk </h3>
               <div class="col-6 ml-auto mr-0">        
                <a href="<?= site_url('admin/master/tambahProduk') ?>" class="btn btn-danger float-right"><i class="fa fa-plus"></i> Tambah Produk</a>      
               </div> 
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTables1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Id Produk </th>
                    <th class="text-center">Nama Produk</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
               
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

<script>
  $(function () {
    $("#dataTables1").DataTable({
      // "buttons": ['pdf', 'print', 'excel', 'copy'],
      // "dom": "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
      //         "<'row'<'col-md-12'tr>>" +
      //         "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
      "responsive": true,
      "processing": true,
      "serverside": true,
      "ajax": {
                "url" : "<?= site_url('admin/master/get_ajax') ?>",
                "type" : "POST"
              },
      "columnDefs": [
            {
                "targets" : [0,1,2,3,4,5,6],
                "className": 'text-center'
            },
             {
                "targets" : [6,-1],
                "orderable": false
            }
      ]
     
    }).buttons().container().appendTo('#dataTables_wrapper .col-md-6:eq(0)');
   
  });
</script>