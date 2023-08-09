   <?php if($this->session->userdata('hak_akses')==='admin'):?> 
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('Admin/Homepage/') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Tampilan Dashboard
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Kegiatan/') ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Info Kegiatan</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Master Data
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Guru/') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Guru</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Siswa/') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Santri</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Kelas/') ?>">
            <i class="fas fa-fw fa-puzzle-piece"></i>
            <span>Data Kelas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Info_bayar/') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Jumlah Bayaran SPP</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Data Transaksi
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Pembayaran/') ?>">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Data Pembayaran</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Guru/') ?>">
            <i class="fas fa-fw fa-phone-square"></i>
            <span>Pesan Whatsapp</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Pesan_bantuan/') ?>">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Pesan Bantuan</span>
          </a>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Data Laporan
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Laporan/') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Pengaturan User
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/User/') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>User Pengguna</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="version" id="version-ruangadmin"></div>
      </ul>
      <?php elseif($this->session->userdata('hak_akses')==='santri'):?> 
       <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

          <div class="sidebar-brand-text mx-3">SANTRI</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
          </li>
          <hr class="sidebar-divider">
          <div class="sidebar-heading">
            Tampilan Dashboard
          </div>

          <hr class="sidebar-divider">
          <div class="version" id="version-ruangadmin"></div>
        </ul>
        <?php endif;?>