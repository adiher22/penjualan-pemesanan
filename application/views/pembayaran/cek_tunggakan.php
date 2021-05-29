<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-warning">
              <h5><i class="fas fa-info"></i> Catatan:</h5>
              Data di bawah ini disesuaikan, yang menghitung bulan yang belum bayar / masuk tunggakan.<br> 
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-user"></i> Detail Tunggakan Pembayaran Iuran Keamanan
                    <small class="float-right"> <?= date('d/M/Y') ?></small>
                  </h4> 
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                 
                  <address>
                    <strong>Nama Warga : <?= $warga['nama'] ?></strong><br>
                    NIK : <?= $warga['nik'] ?><br>
                    NO KK : <?= $warga['no_kk'] ?><br>
                    Alamat : <?= $warga['alamat'] ?>
                  </address>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
               
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                     
                      <th>Bulan Tunggakan</th>
                      
                    
                    </tr>
                    </thead>
                    <tbody>
                     <?php ?>
                    <tr>
                    
                      <td>
                      <?php 
                        // Array Bulan
                        $bulan = array(
                            'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember');
                        // panggil tahun 
                        $query= $this->M_pembayaran->get_tahun($warga['id_warga']);

                        $tgl = explode('-', $warga['tgl_daftar']);
                        $thn_masuk = $tgl['0'];
                        $bulan_masuk = $tgl['1'];
                        $batas_tunggakan = 30;

                        // Buat parameter bulan sekarang
                        
                        $thn_skr = date('Y');
                        $bulan_skr = date('m');
                        $tgl_skr = date('d');
                      

                        $tunggakan = 'Tidak Ada Tunggakan';
                        foreach($query as $tahun) {
                            $query2= $this->M_pembayaran->get_butun($warga['id_warga'], $tahun['tahun']);
                            if ($thn_masuk == $tahun['tahun'] and count($query) >1 and $tgl_skr > $batas_tunggakan) {
                                for($x=$bulan_masuk-1;$x<12;$x++){
                                    foreach ($query2 as $key) {
                                        if ($bulan[$x] == $key['bulan']) {
                                            unset($bulan[$x]);
                                            break;
                                        }
                                    }
                                }
                                for($a=$bulan_masuk-1;$a<12;$a++){      
                                    if (isset($bulan[$a])) {
                                        echo ' '.$bulan[$a].' '.$tahun['tahun'].', ';
                                        $tunggakan = null;
                                    }
                            }
                            }   elseif ($thn_masuk == $tahun['tahun'] and count($query) ==1 and $tgl_skr > $batas_tunggakan) {
                                for($x=$bulan_masuk-1;$x<$bulan_skr;$x++){
                                    foreach ($query2 as $key) {
                                        if ($bulan[$x] == $key['bulan']) {
                                            unset($bulan[$x]);
                                            break;
                                        }
                                    }
                                }
                                for($a=$bulan_masuk-1;$a<$bulan_skr;$a++){      
                                            if (isset($bulan[$a])) {
                                                echo ' '.$bulan[$a].' '.$tahun['tahun'].', ';
                                                $tunggakan = null;
                                            }
                                    }

                            } else{
                                $bulan = array(
                                'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember');

                                for($x=0;$x<$bulan_skr-1;$x++){
                                    foreach ($query2 as $key) {
                                        if ($bulan[$x] == $key['bulan']) {
                                            unset($bulan[$x]);
                                            break;
                                        }
                                    }
                                }

                                for($a=0;$a<$bulan_skr-1;$a++){      
                                        if (isset($bulan[$a])) {
                                            echo ' '.$bulan[$a].' '.$tahun['tahun'].', ';
                                            $tunggakan = null;
                                        }
                                }
                            }
                        }
                        echo $tunggakan;
                        
                        ?>

                      </td>

                     
                    </tr>
                  
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

          
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->