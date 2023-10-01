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
            <h1 class="h3 mb-0 text-gray-800"><span class="badge badge-primary">Data Guru</span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage/') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Guru</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
                  <button class="btn btn-primary block" style=" float: right;" data-toggle="modal" data-target="#default" data-backdrop="static" data-keyboard="false">Tambah Guru</button>

                  <!-- modal tambah -->
                  <div class="modal fade " id="default" role="dialog" aria-hidden="true" data-backdrop="static">>
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel1">Tambah Data Guru</h5>
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
                            <form action="<?php echo base_url() . 'Admin/Guru/add'; ?>" method="post" enctype="multipart/form-data">
                              <div class="row">
                                <div class="col-md-12">
                                  <label>Nama Lengkap</label>
                                  <div class="form-group form-input">
                                    <input type="text" name="nama_guru" placeholder="Nama Lengkap" class="form-control" required>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <label>Jenis Kelamin</label>
                                  <div class="form-group form-input">
                                    <select class="form-control" name="jenis_kelamin" required="">
                                      <option value="">-- Pilih --</option>
                                      <option value="L"> Laki - Laki </option>
                                      <option value="P"> Perempuan </option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <label>Mata Pelajaran</label>
                                  <div class="form-group form-input">
                                    <input type="text" name="mapel" class="form-control" required="">
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
                                  <label>Upload Foto</label>
                                  <input type="file" name="foto" class="form-control" required="">
                                  
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
                        <th>Jenis Kelamin</th>
                        <th>Mapel</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                       <th>No</th>
                       <th>Foto</th>
                       <th>Nama Lengkap</th>
                       <th>Jenis Kelamin</th>
                       <th>Mapel</th>
                       <th>Action</th>
                     </tr>
                   </tfoot>
                   <tbody>
                    <?php
                    $no = 0;
                    foreach ($guru->result_array() as $row) :

                      $no++;
                      $id_guru           = $row['id_guru'];
                      $foto              = $row['foto'];
                      $nama_guru         = $row['nama_guru'];
                      $jenis_kelamin     = $row['jenis_kelamin'];
                      $mapel             = $row['mapel'];
                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td> 
                          <img class="gambar-project" src="<?php echo base_url() . "assets/"; ?>admin/upload/<?php echo $foto ?>">
                        </td>
                        <td><?php echo $nama_guru ?></td>
                        <td>

                          <?php if ($jenis_kelamin == 'L') { ?>
                            Laki - Laki
                          <?php }else{ ?>
                            Perempuan 
                          <?php } ?>

                        </td>
                        <td><?php echo $mapel;?></td>
                        <td>
                          <div class="form-button-action">
                            <a class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#ModalEdit<?php echo $id_guru; ?>"><span class="fa fa-edit" style="color:white;"></span></a>
                            <a class="btn btn-link btn-danger btn-lg" data-toggle="modal" data-target="#ModalHapus<?php echo $id_guru; ?>"><i class=" fa fa-times" data-original-title="Edit Task" style="color:white;"></i></a>
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
      <?php foreach ($guru->result_array() as $row) :
        $id_guru = $row['id_guru'];
        $nama_guru = $row['nama_guru'];
        ?>
        <div class="modal fade" id="ModalHapus<?php echo $id_guru; ?>" tabindex="-1" role="dialog" aria-labelledby="">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button> -->
                <h4 class="modal-title" id="myModalLabel">Hapus Guru</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Guru/delete' ?>" method="post">
                <div class="modal-body">
                  <input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>" />

                  <p>Apakah Anda yakin mau menghapus <b><?php echo $nama_guru; ?></b> ?</p>

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
      <?php foreach ($guru->result_array() as $row) :
        $id_guru = $row['id_guru'];
        $nama_guru = $row['nama_guru'];
        $jenis_kelamin = $row['jenis_kelamin'];
        $mapel = $row['mapel'];
        $no_hp = $row['no_hp'];
        $email = $row['email'];
        $foto = $row['foto'];

        ?>
        <div class="modal fade " id="ModalEdit<?php echo $id_guru; ?>" role="dialog" aria-hidden="true" data-backdrop="static">
          <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Update Data Guru</h5>
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
                  <form action="<?php echo base_url() . 'Admin/Guru/update'; ?>" method="post" enctype="multipart/form-data">
                   <div class="row">
                    <div class="col-md-12">
                      <label>Nama Lengkap</label>
                      <div class="form-group form-input">
                        <input type="hidden" name="id_guru" value="<?php echo $id_guru?>">
                        <input type="text" name="nama_guru" value="<?php echo $nama_guru?>"  class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label>Jenis Kelamin</label>
                      <div class="form-group form-input">
                        <select class="form-control" name="jenis_kelamin" required="">
                          <option value="<?php echo $jenis_kelamin;?>"><?php if ($jenis_kelamin == 'L') { 
                            echo "Laki - Laki";
                            ?><?php }else{ echo "Perempuan"; } ?>

                          </option>
                          <option value="L"> Laki - Laki</option>
                          <option value="P"> Perempuan </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label>Mata Pelajaran</label>
                      <div class="form-group form-input">
                        <input type="text" name="mapel" class="form-control" value="<?php echo $mapel?>">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-6">
                      <label>Nomor Handphone</label>
                      <input type="number" name="no_hp" class="form-control" value="<?php echo $no_hp?>">
                    </div>
                    <div class="col-md-6">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="<?php echo $email?>">
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-12">
                      <label>Upload Foto</label>
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
                  <span class="d-none d-sm-block">Simpan</span>
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
        text: "Proses Gagal ! ",
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