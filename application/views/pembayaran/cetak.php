<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body {
			font-family: sans-serif;
			font-size: 14px;
		}
		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #F5F5F5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
	<style type="text/css" media="screen">
		body {
			font-family: Times New Roman;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #F5F5F5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
		
	</style>
</head>
<body  onload="print()">
	<div class="cetak">
		
	<h1>Detail Pembayaran <?php echo $title ?></h1>
    <hr><br>
			<table class="table table-bordered">
			<thead>
				<tr>
					<th width="20%">Nama Warga</th>
					<th>: <?php echo $k['nama'] ?></th>
				</tr>
				<tr>
					<th width="20%">No KTP</th>
					<th>: <?php echo $k['nik'] ?></th>
				</tr>
        <tr>
					<th width="20%">No KK</th>
					<th>: <?php echo $k['no_kk'] ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tanggal</td>
					<td>: <?php echo indo_date($k['tgl_bayar']) ?></td>
                </tr>
                <?php 
                    // Load get data detail keamanan
                    $detail = $this->M_pembayaran->getdetail(array('id_pembayaran' => $k['id_pembayaran']));
                    ?>
                <tr>
					<td>Bulan</td>
					<td>: <?php foreach($detail as $key) { echo $key['bulan'].', '; } ?></td>
                </tr>
                
				<tr>
					<td>Nominal </td>
					<td>: <?php echo indo_curency($k['nominal']) ?></td>
                </tr>
                
				<tr>
					<td>Status </td>
					<td>: <?php if(!empty($k['bukti_bayar'])) { echo "Sudah Dibayar"; } ?></td>
				</tr>
			
                <tr>
					<td>Total Biaya </td>
					<td>: <?php echo indo_curency($k['total_biaya']) ?></td>
				</tr>
			
			</tbody>
		</table>
</body>
</html>