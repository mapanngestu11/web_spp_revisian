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
										<li><a href="#"><i class="fa fa-users"></i>Guru</a> 
											<ul class="dropdown">
												<li><a href="<?php echo base_url('Guru/') ?>">Detail Pengajar</a></li>
											</ul>
										</li>
										<!-- <li><a href="<?php echo base_url('Pembayaran/') ?>"><i class="fa fa-clone"></i>Info Pembayaran</a></li> -->
										<li><a href="<?php echo base_url('Kegiatan/') ?>"><i class="fa fa-bullhorn"></i>Info Kegiatan</a></li>
										<li class="active"><a href="<?php echo base_url('Kontak/') ?>"><i class="fa fa-address-book"></i>Kontak</a> </li>
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

	<!-- Breadcrumb -->
	<div class="breadcrumbs overlay" style="background-image:url('images/breadcrumb-bg.jpg')">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12">
					<h2>Kontak</h2>
				</div>
				<div class="col-lg-6 col-md-6 col-12">
					<ul class="bread-list">
						<li><a href="index.html">Home<i class="fa fa-angle-right"></i></a></li>
						<li class="active"><a href="contact.html">Kontak</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Breadcrumb -->

	<!-- Contact Us -->
	<section id="contact" class="contact section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-12">
					<div class="section-title bg">
						<h2>Hubungi Kami</h2>
						<div class="icon"><i class="fa fa-paper-plane"></i></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-8 col-md-8 col-12">
					<div class="form-head">
						<p><?php echo $this->session->flashdata('msg'); ?></p>
						<!-- Contact Form -->
						<form class="form" action="<?php echo base_url() . 'Kontak/add'; ?>" method="POST">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<i class="fa fa-user"></i>
										<input name="nama" type="text" placeholder="Nama Lengkap">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<i class="fa fa-phone"></i>
										<input name="no_hp" type="text" placeholder="089xxxxxxx">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group message">
										<i class="fa fa-pencil"></i>
										<textarea name="pesan" placeholder="Isi Pesan"></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<div class="button">
											<button type="submit" class="btn primary">Kirim Pesan</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<!--/ End Contact Form -->
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-12">
					<div class="contact-right">
						<!-- Contact-Info -->
						<div class="contact-info">
							<div class="icon"><i class="fa fa-map"></i></div>
							<h3>Alamat</h3>
							<p>Kampung Tahfidz, Kampung Alang Kecil, Ds. Kebon Cau, Teluk Naga, Kab. Tangerang</p>
						</div>
						<!-- Contact-Info -->
						<div class="contact-info">
							<div class="icon"><i class="fa fa-address-book"></i></div>
							<h3>Kontak</h3>
							<li><i class="fa fa-phone"></i> Phone: 082311112250 </li>
							<li><i class="fa fa-instagram"></i> Instagram: rumahquran.almubarok </li>
							<li><i class="fa fa-envelope"></i> Email: <a href="mailto:info@youremail.com">rumahquran.almubarok12@gmail.com</a></li>
							<li><i class="fa fa-youtube"></i> Youtube: Rumah Qur'an Al-Mubarok </li>
							<li><i class="fa fa-map-o"></i> Address: Kampung Tahfidz, Kampung Alang Kecil, Ds. Kebon Cau, Teluk Naga, Kab.Tangerang
							</li>
						</div>
						<!-- Contact-Info -->
					</div>
				</div>
			</div>
		</div>		
	</section>
	<!--/ End Contact Us -->

	<!-- Footer -->
	<?php include 'Part/Footer.php';?>
	<!--/ End Footer -->
	<?php include 'Part/Js.php';?>
</body>
</html>