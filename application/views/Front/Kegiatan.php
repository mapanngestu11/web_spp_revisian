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

	<!-- Title -->
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
										<li class="active"><a href="<?php echo base_url('Kegiatan/') ?>"><i class="fa fa-bullhorn"></i>Info Kegiatan</a></li>
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

	<!-- Breadcrumb -->
	<div class="breadcrumbs overlay" style="background-image:url('images/breadcrumb-bg.jpg')">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12">
					<h2>Kegiatan Rumah Qur'an Al-Mubarok</h2>
				</div>
				<div class="col-lg-6 col-md-6 col-12">
					<ul class="bread-list">
						<li><a href="index.html">Home<i class="fa fa-angle-right"></i></a></li>
						<li class="active"><a href="#">Kegiatan<i class="fa fa-angle-right"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Breadcrumb -->

	<!-- Courses -->
	<section class="courses archive section">
		<div class="container">
			<div class="row">
				<?php foreach ($kegiatan->result_array() as $data_kegiatan) { 
					$nama_kegiatan = $data_kegiatan['nama_kegiatan'];
					$isi_kegiatan  = $data_kegiatan['isi_kegiatan'];
					$foto          = $data_kegiatan['foto'];
					$waktu_kegiatan = $data_kegiatan['waktu'];
					?>

					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Course -->
						<div class="single-course">
							<!-- Course Head -->
							<style type="text/css">
								.gambar_kegiatan{
									width: 379px !important;
									height: 300px !important;
								}
							</style>
							<div class="course-head overlay ">
								<img  class="gambar_kegiatan" src="<?php echo base_url() . "assets/"; ?>admin/upload/<?php echo $foto ?>" alt="foto_kegiatan">
							</div>
							<!-- Course Body -->
							<div class="course-body">
								<div class="name-price">
									<div class="teacher-info">
										<img class="" src="<?php echo base_url()."assets/Front/images/"; ?>icon.png" alt="#">
										<h4 class="title"><?php echo $nama_kegiatan;?></h4>
									</div>
									<!-- <span class="price">$350</span> -->
								</div>
								<h4 class="c-title"><a href="course-single.html"><?php echo $nama_kegiatan;?></a></h4>
								<p><?php echo $isi_kegiatan;?></p>
							</div>
							<!-- Course Meta -->
							<div class="course-meta">
								<!-- Course Info -->
								<div class="course-info">
									<?php 
									$old_date = $waktu_kegiatan;
									$new_date = date('d-m-y', strtotime($old_date));
									?>
									<span><i class="fa fa-calendar-o"></i><?php echo $new_date;?></span>
									
								</div>
							</div>
							<!--/ End Course Meta -->
						</div>
						<!--/ End Single Course -->
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!--/ End Courses -->	

	<!-- Footer -->
	<?php include 'Part/Footer.php';?>
	<!--/ End Footer -->

	<?php include 'Part/Js.php';?>
</body>
</html>