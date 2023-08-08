<!DOCTYPE html>
<html lang="en">

<?php include 'Part/Head.php';?>
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
            <h1 class="h3 mb-0 text-gray-800"><span class="badge badge-primary">Data Kelas</span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage/') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Kelas</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                  <button class="btn btn-primary block" style=" float: right;" data-toggle="modal" data-target="#default" data-backdrop="static" data-keyboard="false">Tambah Kelas</button>

                  <!-- modal tambah -->
                  <div class="modal fade " id="default" role="dialog" aria-hidden="true" data-backdrop="static">>
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel1">Tambah Data Kelas</h5>
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
                            <form action="<?php echo base_url() . 'Admin/Kelas/add'; ?>" method="post">

                              <div class="row">
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
                                <label>Nama Kelas</label>
                                <div class="form-group form-input">
                                  <input type="text" class="form-control" name="nama_kelas" placeholder="Nama Kelas" required>
                                </div>
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
                      <th>Kelas</th>
                      <th>Tahun Ajaran</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kelas</th>
                      <th>Tahun Ajaran</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($kelas->result_array() as $row) :

                      $no++;
                      $id_kelas       = $row['id_kelas'];
                      $nama_kelas     = $row['nama_kelas'];
                      $tahun_angkatan = $row['tahun_angkatan'];

                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $nama_kelas ?></td>
                        <td><?php echo $tahun_angkatan ?></td>
                        <td>
                          <div class="form-button-action">
                            <a class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#ModalEdit<?php echo $id_kelas; ?>"><span class="fa fa-edit" style="color:white;"></span></a>
                            <a class="btn btn-link btn-danger btn-lg" data-toggle="modal" data-target="#ModalHapus<?php echo $id_kelas; ?>"><i class=" fa fa-times" data-original-title="Edit Task" style="color:white;"></i></a>
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
      <?php foreach ($kelas->result_array() as $row) :
        $id_kelas = $row['id_kelas'];
        $nama_kelas = $row['nama_kelas'];
        ?>
        <div class="modal fade" id="ModalHapus<?php echo $id_kelas; ?>" tabindex="-1" role="dialog" aria-labelledby="">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button> -->
                <h4 class="modal-title" id="myModalLabel">Hapus Kelas</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Kelas/delete' ?>" method="post">
                <div class="modal-body">
                  <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>" />

                  <p>Apakah Anda yakin mau menghapus <b><?php echo $nama_kelas; ?></b> ?</p>

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
      <?php foreach ($kelas->result_array() as $row) :
        $id_kelas = $row['id_kelas'];
        $nama_kelas    = $row['nama_kelas'];
        $tahun_angkatan = $row['tahun_angkatan'];

        ?>
        <div class="modal fade " id="ModalEdit<?php echo $id_kelas; ?>" role="dialog" aria-hidden="true" data-backdrop="static">>
          <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Update Data Kelas</h5>
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
                  <form action="<?php echo base_url() . 'Admin/Kelas/update'; ?>" method="post">
                   <div class="row">
                    <div class="col-md-6">
                      <label>Tahun Angkatan</label>
                      <div class="form-group form-input">
                       <select name="jenjang" class="form-control" required="">
                        <option value="<?php echo $tahun_angkatan;?>"><?php echo $tahun_angkatan;?></option>
                        <option value="2020">2020 </option>
                        <option value="2021">2021 </option>
                        <option value="2022">2022 </option>
                        <option value="2023">2023 </option>
                        <option value="2024">2024 </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Nama Kelas</label>
                    <div class="form-group form-input">
                      <input type="hidden" name="id_kelas" value="<?php echo $id_kelas;?>">
                      <input type="text" class="form-control" name="nama_kelas" value="<?php echo $nama_kelas;?>" required>
                    </div>
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