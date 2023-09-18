<!DOCTYPE html>
<html lang="en">

<?php include 'Part/Head.php';?>
<style type="text/css">
  .gambar-project{
    width: 85px;
    height: 75px;
    border-radius: 50%;
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
            <h1 class="h3 mb-0 text-gray-800"><span class="badge badge-primary">Data Pembayaran</span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage/') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pembayaran</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>

                  <button class="btn btn-primary block" style=" float: right;" data-toggle="modal" data-target="#tambah_data" data-backdrop="static" data-keyboard="false">Tambah Data Pembayaran</button>

                  <!-- modal tambah -->
                  <div class="modal fade " id="tambah_data" role="dialog" aria-hidden="true" data-backdrop="static">>
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                      <div class="modal-content ">
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
                          .btn-cek{
                            margin-top: 40px;
                          }
                          .tambah_pembayaran{
                            display: none;
                          }
                        </style>

                        <div class="modal-body">
                          <div class="modal-body">

                            <div class="row">
                              <div class="col-md-6">
                                <label>Cek NIS</label>
                                <div class="form-group form-input">
                                  <input type="number" name="nis" placeholder="Nomor Nis. " class="form-control" required>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <button onclick="check_nis()" id="cek_nis" class="btn btn-primary btn-cek">Cek</button>
                              </div>
                            </div>
                            <form action="<?php echo base_url() . 'Admin/Pembayaran/add'; ?>" method="post" enctype="multipart/form-data" id="tambah_pembayaran" class="tambah_pembayaran">
                              <div class="row">
                                <div class="col-md-6">
                                  <label>Nis</label>
                                  <input type="text" name="nis" class="form-control" id="nis_baru" readonly="">
                                </div>
                                <div class="col-md-6">
                                  <label>Nama Santri</label>
                                  <input type="text" name="nama_santri" class="form-control" id="nama_santri" readonly="">
                                </div>
                              </div>
                              <div class="row mt-4">
                                <div class="col-md-6">
                                  <label>Alamat</label>
                                  <textarea rows="12" id="alamat" class="form-control" name="alamat"></textarea>
                                </div>
                                <div class="col-md-6">

                                  <div class="form-group">
                                    <label>Nama Kelas</label>
                                    <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" readonly="">
                                    <input type="hidden" name="tahun_angkatan" class="form-control" id="tahun_angkatan" readonly="">
                                  </div>

                                  <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" name="" class="form-control" id="jenis_kelamin_view" readonly="">
                                    <input type="hidden" name="jenis_kelamin" class="form-control" id="jenis_kelamin" readonly="">
                                  </div>

                                  <div class="form-group">
                                    <label>Nomor Handphone Orangtua</label>
                                    <input type="text" name="no_hp_ortu" class="form-control" id="no_hp_ortu" readonly="">
                                  </div>

                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" id="email" readonly="">
                                  </div>

                                </div>
                              </div>
                              <div class="row mt-4">
                                <div class="col-md-6">
                                 <label>Jumlah Bayar</label>
                                 <input type="text" name="" class="form-control" id="jumlah_bayar_view" readonly="">
                                 <input type="hidden" name="jumlah_bayar" class="form-control" id="jumlah_bayar" readonly="">
                               </div>
                               <div class="col-md-6">
                                <label>Bulan</label>
                                <input type="month" name="bulan" class="form-control" required="">
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="col-md-12">
                                <label>Upload Bukti</label>
                                <input type="file" name="foto" class="form-control">
                              </div>
                            </div>

                            <hr>

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
                      <th style="width: 10px">No</th>
                      <th>Nis</th>
                      <th>Nama Lengkap</th>
                      <th>Kelas</th>
                      <th>Bulan</th>
                      <!-- <th>Tanggal Upload</th> -->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nis</th>
                      <th>Nama Lengkap</th>
                      <th>Kelas</th>
                      <th>Bulan</th>
                      <!-- <th>Tanggal Upload</th> -->
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($pembayaran->result_array() as $row) :

                      $no++;
                      $id_pembayaran   = $row['id_pembayaran'];
                      $nis     = $row['nis'];
                      $nama_santri = $row['nama_santri'];
                      $nama_kelas      = $row['nama_kelas'];
                      $bulan      = $row['bulan'];
                      $tanggal_upload      = $row['tanggal_upload'];

                      ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $nis ?></td>
                        <td><?php echo $nama_santri;?></td>
                        <td><?php echo $nama_kelas;?></td>
                        <td><?php echo $bulan;?></td>
                        <!-- <td><?php echo $tanggal_upload;?></td> -->
                        <td>
                          <div class="form-button-action">

                            <a class="btn btn-link btn-primary btn-lg" href="<?php echo base_url('Admin/Pembayaran/detail_bayar/') ?><?php echo $id_pembayaran;?>"><span class="fa fa-edit" style="color:white;"></span></a>
                            <a class="btn btn-link btn-danger btn-lg" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pembayaran; ?>"><i class=" fa fa-times" data-original-title="Edit Task" style="color:white;"></i></a>
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
      <?php foreach ($pembayaran->result_array() as $row) :
        $id_pembayaran = $row['id_pembayaran'];
        $nama_santri = $row['nama_santri'];
        ?>
        <div class="modal fade" id="ModalHapus<?php echo $id_pembayaran; ?>" tabindex="-1" role="dialog" aria-labelledby="">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button> -->
                <h4 class="modal-title" id="myModalLabel">Hapus Data Santri</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Pembayaran/delete' ?>" method="post">
                <div class="modal-body">
                  <input type="hidden" name="id_pembayaran" value="<?php echo $id_pembayaran; ?>" />

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
  
  <!-- end modal -->


  <?php include 'Part/Js.php';?>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {

      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });

    function formatRupiah(angka) {
      var formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
      });

      return formatter.format(angka);
    }

    function check_nis() {

      var input_check_nis = $('[name="nis"]').val();

        // alert(input_check_nis);

        $.ajax({
          url: "<?= site_url('admin/pembayaran/cek_nis/') ?>",
          type: "POST",
          dataType: "JSON",
          data: {
            input_check_nis: input_check_nis
          },

          success: function(data) {
            console.log(data.message);


            if (data.result != 'false') {

              cek_jenis_kelamin = data.result[0].jenis_kelamin;
              var jumlah_pembayaran = formatRupiah(data.result[0].jumlah_bayar);

              if (cek_jenis_kelamin == 'L') {
               var jk = 'Laki - Laki';
             }else{
              var jk = 'Perempuan';
            }

            alert("Data Santri Ditemukan");
            document.getElementById("tambah_pembayaran").style.display = "block";      
            $('#nis_baru').val(data.result[0].nis);
            $('#nama_santri').val(data.result[0].nama_santri);
            $('#nama_kelas').val(data.result[0].nama_kelas);

            $('#jenis_kelamin_view').val(jk);
            $('#jenis_kelamin').val(data.result[0].jenis_kelamin);

            $('#no_hp_ortu').val(data.result[0].no_hp_ortu);

            $('#jumlah_bayar_view').val(jumlah_pembayaran);
            $('#jumlah_bayar').val(data.result[0].jumlah_bayar);

            $('#email').val(data.result[0].email);

            $('#alamat').val(data.result[0].alamat);
            $('#tahun_angkatan').val(data.result[0].tahun_angkatan);
            var textarea = document.getElementById("alamat");
            textarea.readOnly = true;


          }else if (data.result == 'false'){
            alert("Data Santri Tidak Ditemukan !");
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
      })
      }
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