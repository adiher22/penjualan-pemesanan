<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
			
		
		  
		
	</style>
</head>
<body >
	<table width="100%">
		<tr>
			<td>
				<img src="<?= base_url('assets/template/dist/img/logo.png') ?>" style="margin-left: 20px;" width="200px" height="130px">
			</td>
			<td align="center">
			<h3 style="margin-right:25%;">
	
			PT KOGAWA TEKNIK INDONESIA<br><br><strong style="color: black; font-size: 40px; margin-top:2%;">Laporan Pemesanan Customer</strong><br><br>
		</tr>
	</table>
	<br/>
	<hr/>
	<h3 align="center">Data dari tanggal: <?= date_lahir($_GET['dari'])?>, Sampai Tanggal <?= date_lahir($_GET['sampai']) ?></h3>	
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>Tanggal Pesan</th>
		<th>Nama Customer</th>
		<th>Id Pemesanan</th>
        <th>Status Pemesanan</th>
	
		<th>Total </th>
	</tr>
	<?php 
	
	$i=1;
    foreach($report as $r){
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= indo_date($r->tgl_pesan)?></td>
		<td align="center"><?= $r->nama_cust ?></td>
		<td align="center"><?= $r->id_pemesanan ?>
		</td>
		<td align="center">
			<?= $r->status_pemesanan ?>
		</td>
		
		<td align="center"><?= indo_curency($r->total)?></td>
	</tr>
	<?php $i++; } ?>
	



	</table>


	
</body>
</html>
<script type="text/javascript">
	window.print();
</script>