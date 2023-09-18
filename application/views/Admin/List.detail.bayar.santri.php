<!DOCTYPE html>
<html lang="en">
<?php include 'Part/Head.php';?>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include 'Part/Sidebar.php';?>
    <!-- Sidebar -->



    <!-- end -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include 'Part/Topbar.php';?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Pembayaran Santri</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Pembayaran SPP</li>            
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pembayaran SPP</h6>
                </div>
                <div class="card-body">
                  <?php foreach ($pembayaran->result_array() as $row) :
                    $nis = $row['nis'];
                    $nama_santri = $row['nama_santri'];
                    $pesan = $row['pesan'];
                    $jumlah_bayar =  $row['jumlah_bayar'];
                    $payment_type  = $row['payment_type'];
                    $id_status_pembayaran = $row['id_status_pembayaran'];
                    $bank  = $row['bank'];
                    $va_number  = $row['va_number'];
                    $pdf_url  = $row['pdf_url'];
                    $transaction_time = $row['transaction_time'];
                    $status_code      = $row['status_code'];
                    ?>

                    <style type="text/css">
                      .gambar_santri{
                       height: 100px;
                       padding-left: 40px;
                     }
                   </style>
                   <form action="<?= site_url() ?>Admin/Pembayaran/update_detail" method="post">

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nis</label>
                          <input type="text" name="nis" class="form-control" readonly="" value="<?php echo $nis;?>" id="nis">
                          <input type="hidden" name="id_status_pembayaran" value="<?php echo $id_status_pembayaran;?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nama Santri</label>
                          <input type="text" name="nama_santri" class="form-control" readonly="" id="nama_santri" value="<?php echo $nama_santri;?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Pesan / Keterangan</label>
                          <textarea class="form-control" name="pesan" id="pesan" rows="5" readonly=""><?php echo $pesan;?></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label>Jumlah Bayar</label>
                            <input type="text" name="jumlah_bayar" class="form-control" value="Rp.<?php echo number_format($jumlah_bayar);?>" readonly>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label>Payment Type</label>
                            <input type="text" name="payment_type" class="form-control" value="<?php echo $payment_type;?>">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Nama Bank</label>
                          <input type="text" name="bank" class="form-control" value="<?php echo $bank;?>" readonly>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Virtual Account</label>
                          <input type="text" name="bank" class="form-control" value="<?php echo $va_number;?>" readonly>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Cetak Tutorial</label>
                          <style type="text/css">
                            .btn_pdf{
                             margin-bottom: -71px;
                             margin-left: -103px;
                           }
                         }
                       </style>
                       <a href="<?php echo $pdf_url;?>" target="_blank" class="btn btn-primary btn_pdf">PDF</a>
                     </div>
                   </div>
                 </div>
                 <hr>
                 <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Status Pembayaran</label>
                      <select class="form-control" name="status_code">
                        <
                        <option value="status_code">  
                          <?php if ($status_code == '201') { ?>
                            Pending
                          <?php } elseif ($status_code == '200') { ?>
                            Sukses
                          <?php } elseif ($status_code == '202') {?>
                            Gagal
                          <?php }?>
                        </option>
                        <option value="201">Pending</option>
                        <option value="200">Sukses</option>
                        <option value="202">Gagal</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Waktu Transaksi</label>
                      <input type="text" name="transaction_time" class="form-control" value="<?php echo $transaction_time;?>" readonly>
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Data</button>
              </form>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Form Sizing -->

        <!-- Horizontal Form -->

      </div>
    </div>
    <!--Row-->

    <!-- Documentation Link -->

    <!-- Modal Logout -->


  </div>
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
<?php if ($this->session->flashData('msg') == 'success-bayar') : ?>
  <script type="text/javascript">
    Swal.fire({
      type: 'success',
      title: 'Sukses !',
      heading: 'Success',
      text: "Berhasil Menambah data Pembayaran, Silahkan melanjutkan pembayaran sesuai metode pembayaran.",
      showHideTransition: 'slide',
      icon: 'warning',
      hideAfter: false,
      bgColor: '#7EC857'
    });
  </script>

  <?php elseif ($this->session->flashData('msg') == 'warning-sudah') : ?>
    <script type="text/javascript">
      Swal.fire({
        type: 'warning',
        title: 'Peringatan',
        heading: 'Peringatan',
        text: "Anda Sudah Melakukan Pembayaran Bulan ini.",
        showHideTransition: 'slide',
        icon: 'warning',
        hideAfter: false,
        bgColor: '#7EC857'
      });
    </script>
  <?php endif; ?>



</body>

</html>