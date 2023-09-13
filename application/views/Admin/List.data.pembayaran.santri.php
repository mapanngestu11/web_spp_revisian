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

                  <a href="<?php echo base_url('Admin/Pembayaran/pembayaran_santri/') ?>" class="btn btn-primary block" style=" float: right;" data-keyboard="false">Tambah Data Pembayaran</a>

                  <!-- modal tambah -->

                  <!-- end modal -->
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama Lengkap</th>
                        <th>Bulan</th>
                        <th>Jumlah Bayar</th>
                        <th>Status</th>
                        <th>Trasaction Time</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama Lengkap</th>
                        <th>Bulan</th>
                        <th>Jumlah Bayar</th>
                        <th>Status</th>
                        <th>Trasaction Time</th>
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

                        $gross_amount      = $row['gross_amount'];
                        $payment_type      = $row['payment_type'];
                        $bulan             = $row['bulan'];   
                        $status_code      = $row['status_code'];
                        $transaction_time      = $row['transaction_time'];

                        ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $nis ?></td>
                          <td><?php echo $nama_santri;?></td>
                          <td><?php echo $bulan;?></td>
                          <td>Rp.<?php echo number_format($gross_amount);?></td>
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
                         <td>
                          <div class="form-button-action">
                            <a class="btn btn-sm btn-primary" style="color: white;" data-toggle="modal" data-target="#ModalEdit<?php echo $id_pembayaran; ?>">Detail</a>

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

      <!-- modal -->


      <!-- modal edit -->
      <?php foreach ($pembayaran->result_array() as $row) :
        $id_pembayaran = $row['id_pembayaran'];
        $nis = $row['nis'];
        $bulan = $row['bulan'];
        $nama_kelas = $row['nama_kelas'];
        $tahun_angkatan = $row['tahun_angkatan'];
        $nama_santri = $row['nama_santri'];
        $pesan = $row['pesan'];
        $payment_type = $row['payment_type'];
        $gross_amount = $row['gross_amount'];
        $va_number = $row['va_number'];
        $bank      = $row['bank'];
        $pdf_url = $row['pdf_url'];


        ?>
        <div class="modal fade " id="ModalEdit<?php echo $id_pembayaran; ?>" role="dialog" aria-hidden="true" data-backdrop="static">
          <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Detail Pembayaran</h5>
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
                  <form action="#" method="post" enctype="multipart/form-data">
                   <div class="row">
                    <div class="col-md-6">
                      <label>Nis</label>
                      <div class="form-group form-input">
                        <input type="text" class="form-control" value="<?php echo $nis;?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>Nama Santri</label>
                      <div class="form-group form-input">
                       <input type="text" class="form-control" value="<?php echo $nama_santri;?>" readonly>
                     </div>
                   </div>
                 </div>
                 <div class="row">
                  <div class="col-md-4">
                   <label>Bulan</label>
                   <div class="form-group form-input">
                    <input type="text" class="form-control" value="<?php echo $bulan;?>" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Nama Kelas</label>
                  <div class="form-group form-input">
                    <input type="text" class="form-control" value="<?php echo $nama_kelas;?>" readonly>
                  </div>
                </div>

                <div class="col-md-4">
                  <label>Tahun Angkatan</label>
                  <div class="form-group form-input">
                    <input type="text" class="form-control" value="<?php echo $tahun_angkatan;?>" readonly>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Pesan</label>
                  <div class="form-group form-input">
                    <textarea class="form-control" rows="6" readonly=""><?php echo $pesan;?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Metode Pembayaran</label>
                      <div class="form-group form-input">
                        <input type="text" class="form-control" value="<?php echo $payment_type;?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>Jumlah Pembayaran</label>
                      <div class="form-group form-input">
                        <input type="text" class="form-control" value="Rp.<?php echo number_format($gross_amount);?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <label>VA Number</label>
                      <div class="form-group form-input">
                        <input type="text" class="form-control" value="<?php echo $va_number;?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>BANK</label>
                      <div class="form-group form-input">
                        <input type="text" class="form-control" value="<?php echo $bank;?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label>Status</label>
                  <div class="form-group form-input">
                    <?php if ($status_code == '201') { ?>
                     <span class="badge badge-warning">Pending</span>
                   <?php }elseif ($status_code == '200') { ?>
                    <span class="badge badge-success">Sukses</span>
                  <?php }elseif ($status_code == '202') { ?>
                    <span class="badge badge-danger">Gagal</span>

                  <?php } ?>
                </div>
              </div>
              <div class="col-md-4">
                <label>Waktu Transaksi</label>
                <div class="form-group form-input">
                  <input type="text" class="form-control" value="<?php echo $transaction_time;?>" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <label>Download Tutorial</label>
                <div class="form-group form-input">
                  <a href="<?php echo $pdf_url;?>" target="_blank" class="btn btn-primary">Download</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary ml-1"  data-dismiss="modal">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Close</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- end modal -->

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
<
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