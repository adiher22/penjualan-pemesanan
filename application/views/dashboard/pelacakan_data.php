    <!-- style -->
    <link href="<?= site_url('assets/front-end/style/tracking.css') ?>" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= site_url('assets/front-end/vendor/fontawesome-free/css/all.min.css')?>">
    <!--  -->
    <!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title"><?= $title ?></h2>
        <p class="dashboard-subtitle">
        Lacak status pengiriman barang anda!
        </p>
    </div>
        <div class="container">
            <article class="card" data-aos="zoom-in" data-aos-delay="200">
                <header class="card-header"> Pengiriman / Pelacakan Pengiriman </header>
                <div class="card-body">
                    <h6>ID Pemesanan: <?= $row['id_pemesanan'] ?></h6>
                    <article class="card">
                        <div class="card-body row">
                            <?php $estimasi = date("Y-m-d", mktime(0,0,0, date("m"), date("d") + 3, date("Y")));?>
                            <div class="col"> <strong>Estimasi Waktu Sampai:</strong> <br><?= indo_date($estimasi) ?> </div>
                            <div class="col"> <strong>Dikirim Oleh:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                            <div class="col"> <strong>Status:</strong> <br> <?= $row['status_pemesanan'] ?> </div>
                            <div class="col"> <strong>No Resi #:</strong> <br> <?= $row['no_resi'] ?> </div>
                        </div>
                    </article>
                    <div class="track">
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">DIKONFIRMASI</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">DIKEMAS</span> </div>
                        <div class="step <?= $row['status_pemesanan'] == "DIKIRIM" ? 'active' : ''; ?>"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">DIKIRIM</span> </div>
                        <div class="step <?= $row['status_pemesanan'] == "BARANG SAMPAI" ? 'active' :'';?>"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">BARANG SAMPAI</span> </div>
                    </div>
                    <hr>
                    <ul class="row">
                        <?php foreach($prod as $prod) : ?>
                        <li class="col-md-4">
                            <figure class="itemside mb-3">
                                <div class="aside"><img src="<?= site_url('upload/produk/' . $prod['gambar']) ?>" class="img-sm border"></div>
                                <figcaption class="info align-self-center">
                                    <p class="title"><?= $prod['nama_produk'] ?> <br> </p> <span class="text-muted"><?= indo_curency($prod['harga']) ?> </span>
                                </figcaption>
                            </figure>
                        </li>
                        <?php endforeach?>
                    </ul>
                    <hr> <a href="<?= site_url('dashboard/pengiriman') ?>" class="btn btn-primary" data-abc="true"> <i class="fa fa-chevron-left"></i> Kembali</a>
                </div>
            </article>
        </div>
    </div>
</div>