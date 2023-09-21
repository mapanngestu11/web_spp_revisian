<html>
<head>
	<title>Laporan SPP</title>
</head>
<body>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	<style type="text/css">
		.logo{
			height: 100px;
			padding-left: 200px;
		}
		.judul{
			padding-left: 136px;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<img src="<?php echo base_url()."assets/Front/images/icon.png"; ?>" class="logo">
			</div>
			<div class="col-md-10">
				<h1 class="judul">Laporan Pembayaran SPP <br> Rumah Qur'an Al-Mubarok</h1>
			</div>
		</div>
	</div>
	

	<hr>
	<style type="text/css">
		.tanggal{
			text-align: right;
			margin-right: 30px;
		}
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}

	</style>
	<p class="tanggal">Tangerang, <?php echo date('d-M-Y');?> </p>
	<center>
		<h3>Data Pembayaran Santri</h3>
	</center>
	<table>
		<tr>
			<th>No.</th>
			<th>Nis</th>
			<th>Nama Santri</th>
			<th>Nama Kelas</th>
			<th>Pesan</th>
			<th>Jumlah Bayar</th>
			<th>Bulan</th>
			<th>Status Pembayaran</th>
			<th>Waktu</th>
		</tr>
		<?php 
		$no = 0 ;
		foreach ($laporan as $data) { 
			$no++;
			$nis = $data->nis;
			$nama_santri = $data->nama_santri;
			$nama_kelas = $data->nama_kelas;
			$pesan = $data->pesan;
			$jumlah_bayar = $data->jumlah_bayar;
			$bulan = $data->bulan;
			$status_code = $data->status_code;
			$waktu = $data->transaction_time;
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $nis;?></td>
				<td><?php echo $nama_santri;?></td>
				<td><?php echo $nama_kelas;?></td>
				<td><?php echo $pesan;?></td>
				<td>Rp.<?php echo number_format($jumlah_bayar);?></td>
				<td><?php echo $bulan;?></td>
				<td>
					<?php if ($status_code == '200') { ?>
						Lunas
					<?php }elseif($status_code == '201') { ?>
						Pending
					<?php }else{?>
						Belum
					<?php }?>
				</td>
				<td><?php echo $waktu;?></td>
			</tr>
		<?php } ?>
	</table>

	<script type="text/javascript">
		window.print();
	</script>


</body>
</html>