<!DOCTYPE html>
<html lang="en">

<?php include 'Part/Head.php';?>
<style type="text/css">
  .body{
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Untuk mengisi tinggi viewport */
  }
</style>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include 'Part/Sidebar.php';?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include 'Part/Topbar.php';?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">

          <?php if ($this->session->userdata('hak_akses')==='santri') : ?>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">

              <?php $nama_santri = $this->session->userdata('nama_santri');?>
              <h1 class="h3 mb-0 text-gray-800">Selamat Datang, <?php echo $nama_santri;?></h1>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </div>
            <style type="text/css">
              .body{
                min-height: 100vh;
              }
            </style>
            <div class="body">
              <div class="col-xl-12 col-lg-7 mb-4">
                <div class="card">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                    <a class="m-0 float-right btn btn-danger btn-sm" href="<?php echo base_url('Admin/Pembayaran/data_pembayaran_santri') ?>">Lihat Keseluruhan <i
                      class="fas fa-chevron-right"></i></a>
                    </div>

                    <div class="table-responsive">
                      <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th>Order ID</th>
                            <th>Nama Santri</th>
                            <th>Bulan</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php
                         $no = 0;
                         foreach ($pembayaran->result_array() as $row) :

                          $no++;
                          $id_pembayaran   = $row['id_pembayaran'];
                          $order_id   = $row['order_id'];
                          $nis     = $row['nis'];
                          $nama_santri = $row['nama_santri'];
                          $nama_kelas      = $row['nama_kelas'];
                          $bulan      = $row['bulan'];
                          $tahun_angkatan      = $row['tahun_angkatan'];
                          $gross_amount      = $row['gross_amount'];
                          $payment_type      = $row['payment_type'];

                          $status_code      = $row['status_code'];
                          $va_number      = $row['va_number'];
                          $transaction_time      = $row['transaction_time'];

                          $pdf_url = $row['pdf_url'];

                          ?>
                          <tr>
                            <td><a href="<?php echo $pdf_url;?>" target="_blank"><?php echo $order_id;?></a></td>
                            <td><?php echo $nama_santri;?></td>
                            <td><?php echo $bulan;?></td>
                            <td>
                              <?php if ($status_code == '201') { ?>
                                <span class="badge badge-warning">Pending</span>
                              <?php }elseif ($status_code == '200') { ?>
                               <span class="badge badge-success">Sukses</span>
                             <?php }elseif ($status_code == '202'){ ?>
                               <span class="badge badge-danger">Gagal</span>
                             <?php }?>
                           </td>
                           <td><a href="<?php echo base_url('Admin/Pembayaran/data_pembayaran_santri') ?>" class="btn btn-sm btn-primary">Detail</a></td>
                         </tr>
                       <?php endforeach; ?>
                     </tbody>
                   </table>
                 </div>
                 <div class="card-footer"></div>
               </div>
             </div>

           </div>

         <?php endif;?>

         <?php if($this->session->userdata('hak_akses')==='admin' || $this->session->userdata('hak_akses')==='kepsek'):?> 
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </div>
        <div class="row mb-3">
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Data Pembayaran</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_bayar;?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-file fa-2x text-primary"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Earnings (Annual) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Transaksi Pembayaran</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_status;?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-folder fa-2x text-success"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- New User Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Data Santri</div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlah_santri;?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-users fa-2x text-info"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1"> Data Kegiatan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_kegiatan;?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-warning"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Invoice Example -->
          <div class="col-xl-12 col-lg-7 mb-4">
            <div class="card">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                <a class="m-0 float-right btn btn-danger btn-sm" href="<?php echo base_url('Admin/Pembayaran') ?>">Lihat Keseluruhan <i
                  class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ID Pembayaran</th>
                        <th>Nama Santri</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Status</th>
                        <th>Waktu Transaksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($data_pembayaran->result_array() as $row) :

                       $no++;
                       $id_pembayaran   = $row['id_pembayaran'];
                       $order_id   = $row['order_id'];
                       $nis     = $row['nis'];
                       $nama_santri = $row['nama_santri'];
                       $nama_kelas      = $row['nama_kelas'];
                       $bulan      = $row['bulan'];
                       $tahun_angkatan      = $row['tahun_angkatan'];
                       $gross_amount      = $row['gross_amount'];
                       $payment_type      = $row['payment_type'];

                       $status_code      = $row['status_code'];
                       $va_number      = $row['va_number'];
                       $transaction_time      = $row['transaction_time'];

                       $pdf_url = $row['pdf_url'];

                       ?>
                       <tr>
                        <td><a href="<?php echo $pdf_url;?>" target="_blank"><?php echo $order_id;?></a></td>
                        <td><?php echo $nama_santri;?></td>
                        <td><?php echo $bulan;?></td>
                        <td>
                          <?php if ($status_code == '201') { ?>
                            <span class="badge badge-warning">Pending</span>
                          <?php }elseif ($status_code == '200') { ?>
                           <span class="badge badge-success">Sukses</span>
                         <?php }elseif ($status_code == '202'){ ?>
                           <span class="badge badge-danger">Gagal</span>
                         <?php }?>
                       </td>
                       <td><?php echo $transaction_time;?></td>
                     </tr>
                   <?php endforeach; ?>
                 </tbody>
               </table>
             </div>
             <div class="card-footer"></div>
           </div>
         </div>



       </div>
     <?php endif;?>
     <!---Container Fluid-->
   </div>
   <!-- Footer -->
   <?php include 'Part/Footer.php';?>
   <!-- Footer -->
 </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<?php include 'Part/Js.php';?>

</body>

</html>