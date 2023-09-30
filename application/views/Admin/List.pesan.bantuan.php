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
            <h1 class="h3 mb-0 text-gray-800"><span class="badge badge-primary">Data Pesan</span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage/') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pesan</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pesan Bantuan</h6>
                  

                  <?php if ($this->session->userdata('hak_akses')==='santri') : ?>
                    <button class="btn btn-primary block" style=" float: right;" data-toggle="modal" data-target="#default" data-backdrop="static" data-keyboard="false">Ajukan Pesan</button>
                  <?php endif;?>
                  <!-- modal tambah -->
                  <div class="modal fade " id="default" role="dialog" aria-hidden="true" data-backdrop="static">>
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel1">Tambah Data Pesan</h5>
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
                            <form action="<?php echo base_url() . 'Admin/Pesan_bantuan/add'; ?>" method="post">

                              <div class="row">
                                <div class="col-md-6">
                                  <label>Nis.</label>
                                  <?php
                                  $nis = $this->session->userdata('nis');
                                  ?>
                                  <div class="form-group form-input">
                                    <input type="text" name="nis" class="form-control" value="<?php echo $nis;?>" readonly="">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label>Nama Santri</label>
                                  <div class="form-group form-input">
                                    <?php
                                    $nama_santri = $this->session->userdata('nama_santri');
                                    ?>
                                    <input type="text" class="form-control" name="nama_santri" value="<?php echo $nama_santri;?>" readonly="">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <label>Pesan</label>
                                  <div class="form-group form-input">
                                    <textarea class="form-control" name="pesan" rows="6"></textarea>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label>Nomor Handphone</label>
                                  <div class="form-group form-input">
                                    <input type="number" name="no_hp" class="form-control">
                                  </div>
                                  <br>
                          <!--         <label>Upload Gambar</label>
                                  <div class="form-group form-input">
                                    <input type="file" name="gambar" class="form-control">
                                  </div> -->
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
                <?php if ($this->session->userdata('hak_akses')==='santri') : ?>
                 <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>No Hp</th>
                        <th>Isi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>No Hp</th>
                        <th>Isi</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($pesan_bantuan_santri->result_array() as $row) :

                        $no++;
                        $id_kontak           = $row['id_kontak'];
                        $nis = $row['nis'];
                        $nama = $row['nama_santri'];
                        $no_hp     = $row['no_hp'];
                        $pesan = $row['pesan'];
                        ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $nis ?></td>
                          <td><?php echo $nama ?></td>
                          <td><?php echo $no_hp ?></td>
                          <td><?php echo $pesan ?></td>
                          <td>
                            <div class="form-button-action">
                              <a class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#ModalEdit<?php echo $id_kontak; ?>"><span class="fa fa-eye" style="color:white;"></span></a>
                              <a class="btn btn-link btn-danger btn-lg" data-toggle="modal" data-target="#ModalHapus<?php echo $id_kontak; ?>"><i class=" fa fa-times" data-original-title="Edit Task" style="color:white;"></i></a>
                            </div>
                          </td>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                <?php endif;?>

                <?php if($this->session->userdata('hak_akses')==='admin'):?> 
                  <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                      <thead class="thead-light">
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>No Hp</th>
                          <th>Isi</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>No Hp</th>
                          <th>Isi</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        $no = 0;
                        foreach ($pesan_bantuan->result_array() as $row) :

                          $no++;
                          $id_kontak           = $row['id_kontak'];
                          $nama = $row['nama_santri'];
                          $no_hp     = $row['no_hp'];
                          $pesan = $row['pesan'];
                          ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $nama ?></td>
                            <td><?php echo $no_hp ?></td>
                            <td><?php echo $pesan ?></td>
                            <td>
                              <div class="form-button-action">
                                <a class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#ModalEdit<?php echo $id_kontak; ?>"><span class="fa fa-eye" style="color:white;"></span></a>
                                <a class="btn btn-link btn-danger btn-lg" data-toggle="modal" data-target="#ModalHapus<?php echo $id_kontak; ?>"><i class=" fa fa-times" data-original-title="Edit Task" style="color:white;"></i></a>
                              </div>
                            </td>
                          <?php endforeach; ?>

                        </tbody>
                      </table>
                    </div>
                  <?php endif;?>
                </div>
              </div>

            </div>
            <!--Row-->

            <!-- Documentation Link -->

          </div>
          <!---Container Fluid-->
        </div>


        <!-- modal hapus -->
        <?php foreach ($pesan_bantuan->result_array() as $row) :
          $id_kontak = $row['id_kontak'];
          $nama = $row['nama_santri'];

          ?>
          <div class="modal fade" id="ModalHapus<?php echo $id_kontak; ?>" tabindex="-1" role="dialog" aria-labelledby="">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button> -->
                  <h4 class="modal-title" id="myModalLabel">Hapus Pesan</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Pesan_bantuan/delete' ?>" method="post">
                  <div class="modal-body">
                    <input type="hidden" name="id_kontak" value="<?php echo $id_kontak; ?>" />

                    <p>Apakah Anda yakin mau menghapus <b>Pesan Tersebut.</b> ?</p>

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
        <?php foreach ($pesan_bantuan->result_array() as $row) :
          $id_kontak = $row['id_kontak'];
          $nama = $row['nama_santri'];
          $no_hp    = $row['no_hp'];

          ?>
          <div class="modal fade " id="ModalEdit<?php echo $id_kontak; ?>" role="dialog" aria-hidden="true" data-backdrop="static">>
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel1">Lihat Detail Pesan</h5>
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
                    <form action="#" method="post">
                      <div class="row">
                        <div class="col-md-6">
                          <label>Nama Lengkap</label>
                          <div class="form-group form-input">
                            <input type="text" name="nama" value="<?php echo $row['nama_santri']; ?>" class="form-control" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>Nomor Handphone</label>
                          <div class="form-group form-input">
                            <input type="text" name="nama" value="<?php echo $row['no_hp']; ?>" class="form-control" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label>Pesan</label>
                          <textarea class="form-control" readonly><?php echo $pesan;?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                      <i class="bx bx-x d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Batal</span>
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