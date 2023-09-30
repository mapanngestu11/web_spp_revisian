<!DOCTYPE html>
<html lang="en">
<?php include 'Part/Head.php';?>
<style type="text/css">
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Santri</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Data Santri</li>
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Santri</h6>
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
                   <form action="<?php echo base_url() . 'Admin/Siswa/update_data_santri'; ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-3">
                        <img src="<?php echo base_url() . "assets/admin/upload/"; ?><?php echo $foto;?>" class="gambar_santri">
                        <div class="form-group mt-2">
                          <div class="custom-file">
                            <label>Upload ulang foto</label>
                            <input type="file"  name="foto" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <label for="exampleInputEmail1">Nis</label>
                        <input type="text" class="form-control" name="nis" readonly="" value="<?php echo $nis;?>">
                        <small>Nis digunakan sebagai username santri.</small>
                        <input type="hidden" name="id_santri" value="<?php echo $id_santri;?>">
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Nama Santri</label>
                          <input type="text" name="nama_santri" class="form-control" value="<?php echo $nama_santri;?>" readonly>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Alamat</label>
                          <textarea class="form-control" name="alamat" rows="9"><?php echo $alamat;?></textarea>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                         <label>Password</label>
                         <input type="password" name="password" class="form-control" placeholder="Ubah Password" minlength="8" required="">

                       </div>

                       <div class="form-group mt-2">
                        <label>Jenis Kelamin</label>

                        <?php 
                        if ($jenis_kelamin == 'P') {
                          $jenkel = 'Perempuan';
                        }else{
                          $jenkel = 'Laki-Laki';
                        }

                        ?>
                        <input type="text" class="form-control" readonly="" value="<?php echo $jenkel;?>">
                        <input type="hidden" name="jenis_kelamin" value="<?php echo $jenis_kelamin;?>">
                      </div>

                      <div class="form-group mt-2">
                        <label>Nomor Handphone</label>
                        <input type="text" class="form-control" readonly="" value="<?php echo $no_hp;?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" value="<?php echo $nama_kelas;?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" readonly="" value="<?php echo $email;?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" name="nama_ayah" class="form-control" readonly="" value="<?php echo $nama_ayah;?>"> 
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" name="nama_ibu" class="form-control" readonly="" value="<?php echo $nama_ibu;?>">
                      </div>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Ubah Data</button>
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

<!-- msg -->
<?php if ($this->session->flashData('msg') == 'warning') : ?>
  <script type="text/javascript">
    Swal.fire({
      type: 'warning',
      title: 'Perhatian !',
      heading: 'Success',
      text: "Proses Gagal !",
      showHideTransition: 'slide',
      icon: 'warning',
      hideAfter: false,
      bgColor: '#7EC857'
    });
  </script>

  <?php elseif ($this->session->flashData('msg') == 'success') : ?>
    <script type="text/javascript">
      Swal.fire({
        type: 'success',
        title: 'Sukses',
        heading: 'Success',
        text: "Data Berhasil Di Tambahkan.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        bgColor: '#7EC857'
      });
    </script>
    <?php elseif ($this->session->flashData('msg') == 'success-excel') : ?>
      <script type="text/javascript">
        Swal.fire({
          type: 'success',
          title: 'Sukses',
          heading: 'Success',
          text: "File berhasil Upload, Segera Tambahkan Foto profil Pada Siswa.",
          showHideTransition: 'slide',
          icon: 'success',
          hideAfter: false,
          bgColor: '#7EC857'
        });
      </script>
      <?php elseif ($this->session->flashData('msg') == 'success-update') : ?>
        <script type="text/javascript">
          Swal.fire({
            type: 'success',
            title: 'Sukses',
            heading: 'Success',
            text: "Data Berhasil di Update !",
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: false,
            bgColor: '#7EC857'
          });
        </script>
        <?php elseif ($this->session->flashData('msg') == 'info-update') : ?>
          <script type="text/javascript">
            Swal.fire({
              type: 'success',
              title: 'Sukses',
              heading: 'Success',
              text: "Data Berhasil Di Update.",
              showHideTransition: 'slide',
              icon: 'success',
              hideAfter: false,
              bgColor: '#7EC857'
            });
          </script>
          <?php elseif ($this->session->flashData('msg') == 'success-hapus') : ?>
            <script type="text/javascript">
              Swal.fire({
                type: 'success',
                title: 'Sukses',
                heading: 'Success',
                text: "Data Berhasil dihapus.",
                showHideTransition: 'slide',
                icon: 'success',
                hideAfter: false,
                bgColor: '#7EC857'
              });
            </script>
            <?php else : ?>

            <?php endif; ?>
          </body>

          </html>