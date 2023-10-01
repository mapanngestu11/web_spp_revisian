<!DOCTYPE html>
<html lang="en">

<?php include 'Part/Head.php';?>
<style type="text/css">
  .gambar-project{
    width: 85px;
    height: 75px;
    border-radius: 50%;
  }

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
            <h1 class="h3 mb-0 text-gray-800"><span class="badge badge-primary">Data Santri</span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage/') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Santri</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Santri</h6>
                  <div class="row" style="width: 800px;">
                    <div class="col-sm-4 ml-80">
                      <button class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#downloadExcel" style="float: right;">
                        <i class="fa fa-file-excel"></i>
                        Download Data Excel
                      </button>
                    </div>
                    <div class="col-sm-4">
                      <button class="btn btn-warning btn-round ml-auto" data-toggle="modal" data-target="#uploadExcel">
                        <i class="fa fa-file-excel"></i>
                        Upload Data Excel
                      </button>
                    </div>
                    <div class="col-sm-4">
                      <button class="btn btn-primary block ml-auto" style=" float: right;" data-toggle="modal" data-target="#default" data-backdrop="static" data-keyboard="false">Tambah Santri</button>
                    </div>
                  </div>




                  <!-- modal tambah -->
                  <div class="modal fade " id="default" role="dialog" aria-hidden="true" data-backdrop="static">>
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                      <div class="modal-content ">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel1">Tambah Data Santri</h5>
                          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                          </button>
                        </div>
                        <style>
                          .form-input {
                            padding-top: 5px;
                          }
                        </style>

                        <div class="modal-body">
                          <div class="modal-body">
                            <form action="<?php echo base_url() . 'Admin/Siswa/add'; ?>" method="post" enctype="multipart/form-data">
                              <div class="row">
                                <div class="col-md-6">
                                  <label>Nis</label>
                                  <div class="form-group form-input">
                                    <input type="number" name="nis" placeholder="Nomor Nis. " class="form-control" required>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label>Password</label>
                                  <div class="form-group form-input">
                                    <input type="text" name="password" class="form-control">
                                    <input type="hidden" name="hak_akses" value="santri">
                                    <input type="checkbox" name="password" value="12345">
                                    <label>Gunakan Password Default <strong>12345</strong></label> 
                                  </div>
                                </div>
                              </div>
                              <div class="row mt-4">
                                <div class="col-md-12">
                                  <label>Nama Lengkap</label>
                                  <div class="form-group form-input">
                                    <input type="text" name="nama_santri" placeholder="Nama Lengkap" class="form-control" required>
                                  </div>
                                </div>
                              </div>
                              <div class="row mt-4">
                                <div class="col-md-6">
                                  <label>Tahun Angkatan</label>
                                  <div class="form-group form-input">
                                   <select name="tahun_angkatan" class="form-control" required="">
                                    <option value="">--Pilih--</option>
                                    <option value="2020">2020 </option>
                                    <option value="2021">2021 </option>
                                    <option value="2022">2022 </option>
                                    <option value="2023">2023 </option>
                                    <option value="2024">2024 </option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label>Kelas</label>
                                <div class="form-group form-input">
                                  <select name="nama_kelas" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <?php foreach ($data_kelas->result_array() as $rk) { 
                                      $nama_kelas = $rk['nama_kelas'];
                                      ?>
                                      <option value="<?php echo $nama_kelas;?>"><?php echo $nama_kelas;?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="col-md-12">
                                <label>Jenis Kelamin</label>
                                <div class="form-group form-input">
                                  <select name="jenis_kelamin" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="col-md-6">
                                <label>Nomor Handphone</label>
                                <input type="number" name="no_hp" class="form-control">
                              </div>
                              <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="col-md-12">
                                <label>Alamat</label>
                                <div class="form-group form-input">
                                  <textarea class="form-control" name="alamat" required=""></textarea>
                                </div>
                              </div>
                            </div>

                            <span class="badge badge-primary mt-4">Data Orang Tua</span>
                            <div class="row mt-4">
                              <div class="col-md-6">
                                <label>Nama Ayah</label>
                                <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah">
                              </div>
                              <div class="col-md-6">
                                <label>Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu">
                              </div>
                            </div>

                            <div class="row mt-4">
                              <div class="col-md-12">
                                <label>Nomor Handphone OrangTua</label>
                                <input type="number" name="no_hp_ortu" class="form-control" placeholder="Nomor Handphone" required="">
                              </div>
                            </div>

                            <div class="row mt-4">
                              <div class="col-md-12">
                                <label>Upload Foto Siswa</label>
                                <input type="file" name="foto" class="form-control">

                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                          </button>
                          <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tambah</span>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- end modal -->
              </div>
              <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>Nama Lengkap</th>
                      <th>Kelas</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>Nama Lengkap</th>
                      <th>Kelas</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($siswa->result_array() as $row) :

                      $no++;
                      $id_santri   = $row['id_santri'];
                      $foto     = $row['foto'];
                      $nama_santri = $row['nama_santri'];
                      $jenis_kelamin = $row['jenis_kelamin'];
                      $nama_kelas      = $row['nama_kelas'];

                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td> 
                          <?php  if ($foto != Null) { ?>
                            <img class="gambar-project" src="<?php echo base_url() . "assets/"; ?>admin/upload/<?php echo $foto ?>">
                          <?php  } elseif ($jenis_kelamin == 'P') {?>
                           <img class="gambar-project" src="<?php echo base_url() . "assets/"; ?>admin/upload/santri_putri.png">
                         <?php  } else { ?>
                          <img class="gambar-project" src="<?php echo base_url() . "assets/"; ?>admin/upload/santri_putra.png">
                        <?php } ?>
                      </td>
                      <td><?php echo $nama_santri ?></td>
                      <td><?php echo $nama_kelas;?></td>
                      <td>
                        <div class="form-button-action">
                          <a class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#ModalEdit<?php echo $id_santri; ?>"><span class="fa fa-edit" style="color:white;"></span></a>
                          <a class="btn btn-link btn-danger btn-lg" data-toggle="modal" data-target="#ModalHapus<?php echo $id_santri; ?>"><i class=" fa fa-times" data-original-title="Edit Task" style="color:white;"></i></a>
                        </div>
                      </td>
                    <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!--Row-->

        <!-- Documentation Link -->



      </div>
      <!---Container Fluid-->
    </div>


    <!-- modal hapus -->
    <?php foreach ($siswa->result_array() as $row) :
      $id_santri = $row['id_santri'];
      $nama_santri = $row['nama_santri'];
      ?>
      <div class="modal fade" id="ModalHapus<?php echo $id_santri; ?>" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button> -->
              <h4 class="modal-title" id="myModalLabel">Hapus Data Santri</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Siswa/delete' ?>" method="post">
              <div class="modal-body">
                <input type="hidden" name="id_santri" value="<?php echo $id_santri; ?>" />

                <p>Apakah Anda yakin mau menghapus <b><?php echo $nama_santri; ?></b> ?</p>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Batal</span>
                </button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <!-- end modal hapus -->


    <!-- modal edit -->
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




      ?>
      <div class="modal fade " id="ModalEdit<?php echo $id_santri; ?>" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel1">Update Data Siswa</h5>
              <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <style>
              .form-input {
                padding-top: 5px;
              }
            </style>

            <div class="modal-body">

              <form action="<?php echo base_url() . 'Admin/Siswa/update'; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-12">
                    <label>Nis</label>
                    <div class="form-group form-input">
                      <input type="hidden" name="id_santri" value="<?php echo $id_santri;?>">
                      <input type="number" name="nis" placeholder="Nomor Nis. " class="form-control" value="<?php echo $nis;?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Nama Lengkap</label>
                    <div class="form-group form-input">
                      <input type="text" name="nama_santri" placeholder="Nama Lengkap" class="form-control" value="<?php echo $nama_santri;?>" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-6">
                    <label>Tahun Angkatan</label>
                    <div class="form-group form-input">
                      <select name="tahun_angkatan" class="form-control" required="">
                        <option value="<?php echo $tahun_angkatan;?>"> <?php echo $tahun_angkatan;?> </option>
                        <option value="2020">2020 </option>
                        <option value="2021">2021 </option>
                        <option value="2022">2022 </option>
                        <option value="2023">2023 </option>
                        <option value="2024">2024 </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Kelas</label>
                    <div class="form-group form-input">
                      <select name="nama_kelas" class="form-control">
                        <option value="<?php echo $nama_kelas;?>"> <?php echo $nama_kelas;?> </option>
                        <?php foreach ($data_kelas->result_array() as $rk) { 
                          $nama_kelas = $rk['nama_kelas'];
                          ?>
                          <option value="<?php echo $nama_kelas;?>"><?php echo $nama_kelas;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12">
                    <label>Jenis Kelamin</label>
                    <div class="form-group form-input">
                      <select name="jenis_kelamin" class="form-control">
                        <option value="<?php echo $jenis_kelamin;?>"><?php if ($jenis_kelamin == 'L') { 
                          echo "Laki - Laki";
                          ?><?php }else{ echo "Perempuan"; } ?>

                        </option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-6">
                    <label>Nomor Handphone</label>
                    <input type="number" name="no_hp" class="form-control" value="<?php echo $no_hp;?>">
                  </div>
                  <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email;?>">
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12">
                    <label>Alamat</label>
                    <div class="form-group form-input">
                      <textarea class="form-control" name="alamat" required="" value="<?php echo $alamat;?>"><?php echo $alamat;?></textarea>
                    </div>
                  </div>
                </div>

                <span class="badge badge-primary mt-4">Data Orang Tua</span>
                <div class="row mt-4">
                  <div class="col-md-6">
                    <label>Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" value="<?php echo $nama_ayah;?>">
                  </div>
                  <div class="col-md-6">
                    <label>Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" value="<?php echo $nama_ibu;?>">
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-12">
                    <label>Nomor Handphone OrangTua</label>
                    <input type="number" name="no_hp_ortu" class="form-control" placeholder="Nomor Handphone" required="" value="<?php echo $no_hp_ortu;?>">
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-12">
                    <label>Upload Foto Siswa</label>
                    <input type="file" name="foto" class="form-control" >

                  </div>
                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Batal</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1">
                  <i class="bx bx-check d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Tambah</span>
                </button>
              </div>
            </form>


          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <!-- end modal -->
    <!-- Footer -->
    <?php include 'Part/Footer.php';?>
    <!-- Footer -->
  </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>


<!-- modal -->
<div class="modal fade" id="downloadExcel" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          Download</span>
          <span class="fw-light">
            File Excel
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="small">Dimohon Untuk Tidak Mengubah Kolom dan Format Excel yang sudah diberikan.</p>
        <form action="#" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group form-group-default">
                <label>Format Excel</label>
                <a href="<?php echo base_url() . "assets/admin/template_upload.xlsx"; ?>">Download</a>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer no-bd">

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="uploadExcel" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          Download</span>
          <span class="fw-light">
            File Excel
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="small">Dimohon Untuk Tidak Mengubah Kolom dan Format Excel yang sudah diberikan.</p>
        <form action="<?php echo base_url() . 'admin/import/excel' ?>" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group form-group-default">
                <label>Format Excel</label>
                <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required="">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer no-bd">
          <button type="submit" class="btn btn-primary">Add</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- end modal -->


<?php include 'Part/Js.php';?>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

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