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
				<img src="<?= base_url('assets/front-end/images/houses.png')?>" style="margin-left: 20px;" width="130px" height="130px">
			</td>
			<td align="center">
			<h3 style="margin-right:25%;">
	
			Perumahan Grand Cikarang City<br><br><strong style="color: black; font-size: 40px; margin-top:2%;">Pembayaran Iuran Keamanan</strong><br><br>
		</tr>
	</table>
	<br/>
	<hr/>
	<h3 align="center">Data dari tanggal: <?= date_lahir($_GET['dari'])?>, Sampai Tanggal <?= date_lahir($_GET['sampai']) ?></h3>	
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>Tanggal Bayar</th>
		<th>Nama Warga</th>
		<th>NIK</th>
        <th>Bulan</th>
		<th>Nominal</th>
		<th>Total Biaya</th>
	</tr>
	<?php 
	
	$i=1;
    foreach($report as $r){
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= indo_date($r->tgl_bayar)?></td>
		<td align="center"><?= $r->nama ?></td>
		<td align="center"><?= $r->nik ?>
		</td>
		<td align="center">
			<?php foreach($reportDetail as $key) {
				if($r->id_pembayaran==$key['id_pembayaran']){
				  echo $key['bulan']."<br>";
				}else{
				  "Not Found";
				}
			   
			}?>
		</td>
		<td align="center"><?= indo_curency($r->nominal) ?></td>
		<td align="center"><?= indo_curency($r->total_biaya)?></td>
	</tr>
	<?php $i++; } ?>
	



	</table>


	
</body>
</html>
<script type="text/javascript">
	window.print();
</script>