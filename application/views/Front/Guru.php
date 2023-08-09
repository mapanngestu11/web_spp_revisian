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
	<?php include 'Part/Header.php';?>
	<!--/ End Header -->

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
						<li><a href="#">Pages<i class="fa fa-angle-right"></i></a></li>
						<li class="active"><a href="about.html">About</a></li>
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
								<img src="<?php echo base_url() . "assets/"; ?>admin/upload/<?php echo $foto ?>" alt="foto_guru">
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