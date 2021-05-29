<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registrasi</title>
    
    <!-- Icons font CSS-->
    <link rel="icon" type="image/png" href="<?= base_url('assets/login/images/icons/smart-home.png') ?>"/>
    <link href="<?= site_url('assets/regis/vendor/mdi-font/css/material-design-iconic-font.min.css')?>" rel="stylesheet" media="all">
    <link href="<?= site_url('assets/regis/vendor/font-awesome-4.7/css/font-awesome.min.css')?>" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?= site_url('assets/regis/vendor/select2/select2.min.css')?>" rel="stylesheet" media="all">
    <link href="<?= site_url('assets/regis/vendor/datepicker/daterangepicker.css')?>" rel="stylesheet" media="all">
  
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="<?= site_url('assets/regis/css/main.css')?>" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registrasi Data Warga</h2>
                    <form method="POST" action="<?= base_url('auth/register') ?>">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NIK KTP</label>
                                    <input class="input--style-4" type="text" name="nik">
                                    <?= form_error('nik') ?>
                                </div>
                               
                            </div>
                          
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NO HP</label>
                                    <input class="input--style-4" type="text" name="no_hp">
                                    <?= form_error('no_hp') ?>
                                </div>
                               
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Username</label>
                                    <input class="input--style-4" type="text" name="username">
                                    <?= form_error('username') ?>
                                </div>
                              
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="password">
                                    <?= form_error('password') ?>
                                </div>
                               
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Nama Warga</label>
                                    <input  class="input--style-4" type="text" name="nama">
                                    <?= form_error('nama') ?>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Alamat Rumah</label>
                                    <textarea  class="input--style-4" type="text" name="alamat"></textarea>
                                    <?= form_error('alamat') ?>
                                </div>
                           
                            </div>
                          
                        </div>       
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                    <br>
                    <p>Sudah punya akun ? Login disini  <a href="<?= site_url('auth') ?>" >Login</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?= site_url('assets/regis/vendor/jquery/jquery.min.js')?>"></script>
    <!-- Vendor JS-->
    <script src="<?= site_url('assets/regis/vendor/select2/select2.min.js')?>"></script>
    <script src="<?= site_url('assets/regis/vendor/datepicker/moment.min.js')?>"></script>
    <script src="<?= site_url('assets/regis/vendor/datepicker/daterangepicker.js')?>"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Main JS-->
    <script src="<?= site_url('assets/regis/js/global.js')?>"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->