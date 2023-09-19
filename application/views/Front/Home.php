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
										<li class="active"><a href="<?php echo base_url('Home/') ?>"><i class="fa fa-home"></i>Home</a></li>
										<li><a href="#"><i class="fa fa-users"></i>Guru</a> 
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

	<!-- Slider Area -->
	<section class="home-slider">
		<div class="slider-active">
			<!-- Single Slider -->
			<div class="single-slider overlay">
				<div class="slider-image" style="background-image:url('<?php echo base_url()."assets/front/images/bg.jpg"; ?>')"></div>
				<div class="container">
					<div class="row">
						<div class="col-lg-7 col-md-10 col-12">
							<!-- Slider Content -->
							<div class="slider-content">
								<h1 class="slider-title"><b> Rumah Qur'an Al-Mubarok </b></h1>
								<p class="slider-text"> Rumah Qur'an Al-Mubarok merupakan sebuah lembaga pendidikan Al-Qur'an Sebagai sarana pendidikan dalam belajar membaca dan menghafal Al-Qur'an dengan mengembangkan konsep nilai-nilai Al-Qur'an dan As-Sunnah dengan menekankan kurikulum karakter iman agar bisa terbentuknya generasi Qur’ani yang berilmu dan beradab calon pemimpin bangsa. </p>
								<!-- Button -->
								<div class="button">
									<a href="<?php echo base_url('Kegiatan/') ?>" class="btn white">Informasi Kegiatan</a>
									<a href="<?php echo base_url('Login/') ?>" class="btn white primary">Login</a>
								</div>
								<!--/ End Button -->
							</div>
							<!--/ End Slider Content -->
						</div>
					</div>
				</div>
			</div>
			<!--/ End Single Slider -->
		</div>
	</section>
	<!--/ End Slider Area -->

	<!-- Courses -->
	<section class="courses section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-12">
					<div class="section-title bg">
						<h2>Kegiatan Rumah Qur'an Al-Mubarok</h2>
						
						<div class="icon"><i class="fa fa-clone"></i></div>
					</div>
				</div>
			</div>
			<div class="row">

				<style type="text/css">
					.gambar_kegiatan{
						width: 1200px !important;
						height: 160px !important; 
					}
				</style>

				<?php foreach ($kegiatan->result_array() as $data_kegiatan) : 
					$nama_kegiatan  = $data_kegiatan['nama_kegiatan'];
					$foto         = $data_kegiatan['foto'];
					$isi_kegiatan   = $data_kegiatan['isi_kegiatan'];
					$waktu_kegiatan = $data_kegiatan['waktu'];
					?>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Course -->
						<div class="single-course">
							<!-- Course Head -->
							<div class="course-head overlay">
								<img class="gambar_kegiatan" src="<?php echo base_url() . "assets/"; ?>admin/upload/<?php echo $foto ?>" alt="#">
								<!-- <a href="course-single.html" class="btn white primary">Register Now</a> -->
							</div>
							<!-- Course Body -->
							<div class="course-body">
								<div class="name-price">
									<div class="teacher-info">
										<img src="<?php echo base_url()."assets/Front/images/"; ?>icon.png" alt="#">
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
				<?php endforeach;?>
			</div>
		</div>
	</section>
	<!--/ End Courses -->	


	<!--/ End Blogs -->

	<!-- Footer -->
	<?php include 'Part/Footer.php';?>
	<!--/ End Footer -->
	<?php include 'Part/Js.php';?>

</body>
</html>