<html>
    <head>
    <title><?= $title ?></title>
        <style>
        #tabel
        {
        font-size:15px;
        border-collapse:collapse;
        }
        #tabel  td
        {
        padding-left:5px;
        border: 1px solid black;
        }
        </style>
    </head>
<body style='font-family:tahoma; font-size:8pt;' onload="print()">
<center>
<table style='width:800px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
    <td width="20%" align='center'>
    <img src="<?= site_url('assets/template/dist/img/logo.png') ?>" width="100px" alt="">
    </td>    
    <td width='50%' align='left' style='padding-right:80px; vertical-align:top'>
        <span style='font-size:9pt'><b>PT KOGAWA TEKNIK INDONESIA</b></span></br>
        Perum The Citaville Blok B1 No.10 RT 005 RW 005,<br> Jl. Citarik Raya Jati Baru Cikarang Timur, Bekasi </br>
        Telp : (021)82749828
    </td>
    <td style='font-size:9pt'><b>Invoice</b>
    
    </td>
    <!-- <td style='vertical-align:top' width='30%' align='left'>
        <b><span style='font-size:9pt'>FAKTUR PENJUALAN</span></b></br>
        No Trans. : 4</br>
        Tanggal :06 Januari 2016</br>
    </td> -->
</table><br><br><br>
<table style='width:700px; font-size:9pt; font-family:calibri; border-collapse: collapse;' border = '0'>
    <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
    Nama Customer : <b><?= $p['nama_cust'] ?></b> </br>
    Alamat : <?= $p['alamat'] ?><br>
    Tanggal Pesan : <?= indo_date($p['tgl_pesan']) ?><br>
    Metode: <?= $p['down_payment'] != null ? 'Down Payment '.''  : 'Full Payment'.''   ?>
    </td>
    <td style='vertical-align:top' width='30%' align='left'>
        No Telp : <?= $p['no_telp']?><br>
        Status : <?= $p['status_pemesanan']?><br>
        Tgl Cetak: <?= date('d/m/Y') ?>
    </td>
</table><br><br>
<table cellspacing='0' style='width:800px; font-size:9pt; font-family:calibri;  border-collapse: collapse;' border='1'>
    
    <tr align='center'>
        <td width='20%'>Id Produk</td>
        <td width='20%'>Nama Produk</td>
        <td width='13%'>Harga</td>
         <?php foreach($produk as $prod) :?>
    <tr align="center">
       
        <td><?= $prod['id_produk'] ?></td>
        <td><?= $prod['nama_produk']?></td>
        <td><?= indo_curency($prod['harga'])?></td>
        
    </tr>
    <?php endforeach?>
    <tr>
        <td colspan = '2'><div style='text-align:center'>Total Harga :</div></td>
        <td style='text-align:center'><?= indo_curency($sum['subtotal'])?></td>
    </tr>
  
    <tr>
        <td colspan = '2'><div style='text-align:right'>Pajak : </div></td>
        <td style='text-align:right'><?= indo_curency($p['pajak']) ?></td>
    </tr>
    <tr>
        <td colspan = '2'><div style='text-align:right'>Produk Asuransi : </div></td>
        <td style='text-align:right'><?= indo_curency($p['produk_asuransi']) ?></td>
    </tr>
    <tr>
        <td colspan = '2'><div style='text-align:right'>Biaya Pengiriman : </div></td>
        <td style='text-align:right'><?= indo_curency($p['biaya_pengiriman']) ?></td>
    </tr>
   <?php if($p['down_payment'] != null ) {?>
    <tr>
        <td colspan = '2'><div style='text-align:right'>Down Payment : </div></td>
        <td style='text-align:right'><?= indo_curency($p['down_payment']) ?></td>
    </tr>
    <?php }else{?>
     <tr>
        <td colspan = '2'><div style='text-align:right'>Full Payment : </div></td>
        <td style='text-align:right'><?= indo_curency($p['full_payment']) ?></td>
    </tr>
    <?php }?>
     <tr>
        <td colspan = '2'><div style='text-align:right'>Total Keseluruhan: </div></td>
        <td style='text-align:right'><?= indo_curency($p['total']) ?></td>
    </tr>
    <tr>
    <?php $sisadp = $p['total'] - $p['down_payment']?>
        <td colspan = '2'><div style='text-align:right'>Sisa : </div></td>
        <td style='text-align:right'><?= indo_curency($sisadp) ?></td>
    </tr>
</table><br><br><br>
 
<table style='width:850; font-size:8pt;' cellspacing='2'>
    <tr>
        <td align='center'>Diterima Oleh,</br></br><br><br><br><u>(.....................)</u></td>
        <td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
        <td align='center'>TTD,</br></br><br><br><br><u>(...........)</u></td>
    </tr>
</table>
</center>
</body>
</html>