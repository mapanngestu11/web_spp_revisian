<!DOCTYPE html>
<html lang="en">
<?php include 'Part/Head.php';?>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include 'Part/Sidebar.php';?>
    <!-- Sidebar -->

    <!-- midtrans -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Rz3hfPR6PQADNdY7"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


    <!-- end -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include 'Part/Topbar.php';?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pembayaran SPP Santri</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pembayaran SPP</li>
              <?php 

              $nama = $this->session->userdata('nama_santri');

              ?>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $nama;?></li>
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
                  <?php foreach ($siswa->result_array() as $row) :
                    $id_santri = $row['id_santri'];
                    $nis = $row['nis'];
                    $nama_santri = $row['nama_santri'];
                    $tahun_angkatan = $row['tahun_angkatan'];
                    $nama_kelas = $row['nama_kelas'];
                    $jenis_kelamin =  $row['jenis_kelamin'];
                    $no_hp = $row['no_hp'];
                    $email = $row['email'];
                    $alamat = $row['alamat'];
                    $nama_ayah = $row['nama_ayah'];
                    $nama_ibu = $row['nama_ibu'];
                    $no_hp_ortu = $row['no_hp_ortu'];
                    $foto =  $row['foto'];
                    ?>

                    <style type="text/css">
                      .gambar_santri{
                       height: 100px;
                       padding-left: 40px;
                     }
                   </style>
                   <form action="<?= site_url() ?>midtrans/snap/finish"  id="payment-form" method="post">

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nis</label>
                          <input type="text" name="nis" class="form-control" readonly="" value="<?php echo $nis;?>" id="nis">
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
                          <textarea class="form-control" name="pesan" id="pesan" rows="5"></textarea>
                        </div>
                      </div>

                      <div class="col-lg-6">

                        <div class="form-group">
                          <label>Jumlah Pembayaran</label>
                          <input type="text" class="form-control" name="jumlah_bayar" value="Rp.<?php echo number_format($pembayaran[0]->jumlah_bayar);?>" readonly>
                          <input type="hidden" name="jumlah_bayar" id="jumlah_bayar" value="<?php echo $pembayaran[0]->jumlah_bayar;?>">
                        </div>

                        <div class="form-group">
                          <label>Bulan</label>
                          <input type="month" name="bulan" class="form-control" id="bulan">
                          <input type="hidden" name="no_hp_ortu" value="<?php echo $no_hp_ortu;?>" id="no_hp_ortu">
                          <input type="hidden" name="nama_kelas" value="<?php echo $nama_kelas;?>" id="nama_kelas">
                          <input type="hidden" name="alamat" value="<?php echo $alamat;?>" id="alamat">
                          <input type="hidden" name="email" value="<?php echo $email;?>" id="email">
                          <input type="hidden" name="tahun_angkatan" value="<?php echo $tahun_angkatan;?>" id="tahun_angkatan">
                          <input type="hidden" name="result_type" id="result-type" value="">
                          <input type="hidden" name="result_data" id="result-data" value="">
                        </div>

                      </div>


                    </div>


                    <button type="button" id="pay-button" class="btn btn-primary">Bayar</button>
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
      icon: 'success',
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
  <script type="text/javascript">
    $(document).ready(function() {
      $('#masking1').mask('#.##0', {
        reverse: true
      });
      $('#masking2').mask('#.##0,0', {
        reverse: true
      });
      $('#masking3').mask('#,##0.00', {
        reverse: true
      });
    });

    $('#pay-button').click(function(event) {

      event.preventDefault();
      $(this).attr("disabled", "disabled");

      var nis = $('#nis').val();
      var nama_santri = $('#nama_santri').val();
      var jumlah_bayar = $('#jumlah_bayar').val();
      var bulan = $('#bulan').val();
      var pesan = $('#pesan').val();

      var nama_kelas = $('#nama_kelas').val();
      var alamat = $('#alamat').val();

      var email = $('#email').val();
      var no_hp_ortu = $('#no_hp_ortu').val();

      var tahun_angkatan =  $('#tahun_angkatan').val();

      $.ajax({
        type: 'POST',
        url: '<?= base_url () ?>midtrans/snap/token',
        data: {
          nis: nis,
          nama_santri: nama_santri,
          jumlah_bayar: jumlah_bayar,
          bulan : bulan,
          pesan : pesan,
          nama_kelas : nama_kelas,
          alamat : alamat,
          email : email, 
          no_hp_ortu : no_hp_ortu,
          tahun_angkatan : tahun_angkatan
        },
        cache: false,

        success: function(data) {
                    //location = data;

                    console.log('token = ' + data);

                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    console.log(resultData);

                    function changeResult(type, data) {
                      $("#result-type").val(type);
                      $("#result-data").val(JSON.stringify(data));
                      // resultType.innerHTML = type;
                      // resultData.innerHTML = JSON.stringify(data);
                    }

                    snap.pay(data, {

                      onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                      },
                      onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                      },
                      onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                      }
                    });
                  }
                });
    });
  </script>


</body>

</html>