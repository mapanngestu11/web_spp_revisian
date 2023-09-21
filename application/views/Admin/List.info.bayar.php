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
            <h1 class="h3 mb-0 text-gray-800"><span class="badge badge-primary">Data Info Pembayaran</span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage/') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Info Pembayaran</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Info Pembayaran</h6>

                  <!-- modal tambah -->
                  <button class="btn btn-primary block" style=" float: right;" data-toggle="modal" data-target="#default" data-backdrop="static" data-keyboard="false">Tambah Info Pembayaran</button>


                  <!-- modal tambah -->
                  <div class="modal fade " id="default" role="dialog" aria-hidden="true" data-backdrop="static">>
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel1">Tambah Data Pembayaran</h5>
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
                            <form action="<?php echo base_url() . 'Admin/Info_bayar/add'; ?>" method="post">
                              <div class="row">
                                <div class="col-md-6">
                                  <label>Tahun Angkatan</label>
                                  <div class="form-group form-input">
                                    <select class="form-control" name="tahun_angkatan" required="">
                                      <option value="">Pilih</option>
                                      <option value="2021">2021</option>
                                      <option value="2022">2022</option>
                                      <option value="2023">2023</option>
                                      <option value="2024">2024</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label>Jumlah Bayaran</label>
                                  <input type="number" name="jumlah_bayar" class="form-control" required="">
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
                        <th>Tahun Angkatan</th>
                        <th>Info Jumlah Pembayaran</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Tahun Angkatan</th>
                        <th>Info Jumlah Pembayaran</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($info->result_array() as $row) :

                        $no++;
                        $id_info_bayar    = $row['id_info_bayar'];
                        $tahun_angkatan     = $row['tahun_angkatan'];
                        $jumlah_bayar     = $row['jumlah_bayar'];

                        ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $tahun_angkatan ?></td>
                          <td>Rp.<?php echo number_format($jumlah_bayar)?></td>
                          <td>
                            <div class="form-button-action">
                              <a class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#ModalEdit<?php echo $id_info_bayar; ?>"><span class="fa fa-edit" style="color:white;"></span></a>
                              <a class="btn btn-link btn-danger btn-lg" data-toggle="modal" data-target="#ModalHapus<?php echo $id_info_bayar; ?>"><i class=" fa fa-times" data-original-title="Edit Task" style="color:white;"></i></a>
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

        <!-- modal edit -->
        <?php foreach ($info->result_array() as $row) :
          $id_info_bayar = $row['id_info_bayar'];
          $tahun_angkatan  = $row['tahun_angkatan'];
          $jumlah_bayar  = $row['jumlah_bayar'];

          ?>
          <div class="modal fade " id="ModalEdit<?php echo $id_info_bayar; ?>" role="dialog" aria-hidden="true" data-backdrop="static">>
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel1">Update Data Pembayaran</h5>
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
                    <form action="<?php echo base_url() . 'Admin/Info_bayar/update'; ?>" method="post">
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
                        <label>Jumlah Pembayaran</label>
                        <div class="form-group form-input">
                          <input type="text" name="jumlah_bayar" value="<?php echo $row['jumlah_bayar']; ?>" class="form-control">
                          <input type="hidden" name="id_info_bayar" value="<?php echo $row['id_info_bayar']; ?>">
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



      <!-- modal hapus -->
      <?php foreach ($info->result_array() as $row) :
        $id_info_bayar = $row['id_info_bayar'];
        $tahun_angkatan = $row['tahun_angkatan'];
        ?>
        <div class="modal fade" id="ModalHapus<?php echo $id_info_bayar; ?>" tabindex="-1" role="dialog" aria-labelledby="">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button> -->
                <h4 class="modal-title" id="myModalLabel">Hapus Info Bayar</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Info_bayar/delete' ?>" method="post">
                <div class="modal-body">
                  <input type="hidden" name="id_info_bayar" value="<?php echo $id_info_bayar; ?>" />

                  <p>Apakah Anda yakin mau menghapus <b><?php echo $tahun_angkatan; ?></b> ?</p>

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
        text: "Proses Gagal ! .",
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