<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="Site keywords here">
	<meta name="description" content="">
	<meta name='copyright' content=''>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php include 'Part/Css.php';?>

</head>
<body>
	
	<!-- Header -->
	<header class="header">
		<!-- Header Inner -->

		<style type="text/css">
			.logo_instansi{
				margin-top: 4px;
				width: 117px;
				height: 86px;
				margin-left: 35px;
			}
			.instansi{
				font-family: "Rubik", sans-serif !important;
				padding-bottom: 20px;
			}
		</style>
		<div class="header-inner overlay">
			<div class="container">
				<div class="row">
					<div class="col-lg-1 col-md-1 col-12">
						<img class="logo_instansi" src="<?php echo base_url()."assets/Front/images/"; ?>icon.png">
					</div>
					<div class="col-lg-5 col-md-3 col-12">
						<!-- Logo -->
						<div class="logo">

							<H3 class="instansi" style="color: #ae1d23"><u>Rumah Qur'an Al-Mubarok</u></H3>
						</div>
						<!--/ End Logo -->
						<div class="mobile-menu"></div>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<div class="menu-bar">
							<nav class="navbar navbar-default">
								<div class="navbar-collapse">
									<!-- Main Menu -->
									<ul id="nav" class="nav menu navbar-nav">
										<li><a href="<?php echo base_url('Home/') ?>"><i class="fa fa-home"></i>Home</a></li>
										<li  class="active"><a href="#"><i class="fa fa-users"></i>Guru</a> 
											<ul class="dropdown">
												<li><a href="<?php echo base_url('Guru/') ?>">Detail Pengajar</a></li>
											</ul>
										</li>
										<!-- <li><a href="<?php echo base_url('Pembayaran/') ?>"><i class="fa fa-clone"></i>Info Pembayaran</a></li> -->
										<li><a href="<?php echo base_url('Kegiatan/') ?>"><i class="fa fa-bullhorn"></i>Info Kegiatan</a></li>
										<li><a href="<?php echo base_url('Kontak/') ?>"><i class="fa fa-address-book"></i>Kontak</a> </li>
									</ul>
									<!-- End Main Menu -->
								</div> 
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->
	<style type="text/css">
		.foto_guru{
			height: 360px !important;
			
		}
	</style>
	<!-- Breadcrumb -->
	<div class="breadcrumbs overlay" style="background-image:url('images/breadcrumb-bg.jpg')">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12">
					<h2> Guru Rumah Qur'an Al-Mubarok </h2>
				</div>
				<div class="col-lg-6 col-md-6 col-12">
					<ul class="bread-list">
						<li><a href="index.html">Home<i class="fa fa-angle-right"></i></a></li>

						<li class="active"><a href="about.html">Daftar Guru</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Breadcrumb -->

	<!-- Teachers -->
	<section class="teachers archive section">
		<div class="container">
			<div class="row">

				<div class="col-lg-6 offset-lg-3 col-12">
					<div class="section-title bg">
						<h2> Daftar Guru Rumah Qur'an Al-Mubarok </h2>
						<p> Berikut beberapa guru yang mengajar di Rumah Qur'an Al-Mubarok </p>
						<div class="icon"><i class="fa fa-users"></i></div>
					</div>
				</div>

			</div>
			<div class="row">
				<?php foreach ($guru->result_array() as $data_guru) : 
					$nama_guru     = $data_guru['nama_guru'];
					$jenis_kelamin = $data_guru['jenis_kelamin'];
					$mapel         = $data_guru['mapel'];
					$no_hp          = $data_guru['no_hp'];
					$email         = $data_guru['email'];
					$foto          = $data_guru['foto'];
					?>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Teacher -->
						<div class="single-teacher">
							<div class="teacher-head overlay">
								<img src="<?php echo base_url() . "assets/"; ?>admin/upload/<?php echo $foto ?>" alt="foto_guru" class="foto_guru">
								<ul class="social">
									<li><a href="<?php echo $email;?>"><i class="fa fa-envelope"></i></a></li>
									<li><a href="<?php echo $no_hp;?>"><i class="fa fa-phone"></i></a></li>
								</ul>
							</div>
							<div class="teacher-content">
								<h4><?php echo $nama_guru;?><span><?php echo $mapel;?></span></h4>
							</div>
						</div>
						<!--/ End Single Teacher -->
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</section>
	<!--/ End Teachers -->

	<!-- Footer -->
	<?php include 'Part/Footer.php';?>
	<!--/ End Footer -->

	<?php include 'Part/Js.php';?>
</body>
</html>