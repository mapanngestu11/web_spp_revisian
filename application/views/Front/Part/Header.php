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