<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_siswa');
        $this->load->model('M_kelas');
        $this->load->model('M_pembayaran');
        $this->load->model('M_status_pembayaran');


        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('Login');
            redirect($url);
        }
    }

    public function index()
    {
        $data['data_kelas'] = $this->M_kelas->tampil_data();
        $data['siswa'] = $this->M_siswa->tampil_data();
        $this->load->view('Admin/List.Pembayaran.php',$data);
    }

    public function add()
    {

        date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/admin/upload'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama_guru yang terupload nantinya
        $config['max_size']  = 200000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/admin/upload' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 360;
                $config['height'] = 360;
                $config['new_image'] = './assets/admin/upload' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $foto = $gbr['file_name'];

                $nis = $this->input->post('nis');
                $nama_santri = $this->input->post('nama_santri');
                $alamat = $this->input->post('alamat');
                $nis = $this->input->post('nis');
                $nama_kelas = $this->input->post('nama_kelas');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $tahun_angkatan = $this->input->post('tahun_angkatan');
                $nis = $this->input->post('nis');
                $no_hp_ortu = $this->input->post('no_hp_ortu');
                $email = $this->input->post('email');
                $jumlah_bayar = $this->input->post('jumlah_bayar');
                $bulan = $this->input->post('bulan');
                $tanggal_upload = date('Y-m-d');
                $pesan = 'pembayaran dilakukan secara langsung';
                $cek_bulan = date('F',strtotime($bulan));
                $tanggal_upload = date('Y-m-d');
                $payment_type = 'cash';
                $transaction_time = date('Y-m-d h:i:s');
                $status_code = '200';
                $tahun = date('Y');

                $data_pembayaran = array(

                    'nis' => $nis,
                    'nama_santri' => $nama_santri,
                    'nama_kelas' => $nama_kelas,
                    'no_hp_ortu' => $no_hp_ortu,
                    'pesan' => $pesan,
                    'jumlah_bayar' => $jumlah_bayar,
                    'email' => $email,
                    'alamat' => $alamat,

                    'bulan' => $cek_bulan,
                    'tanggal_upload' => $tanggal_upload
                    'nama_ayah' => $nama_ayah,
                    'nama_ibu' => $nama_ibu,
                    'no_hp_ortu' => $no_hp_ortu,
                    'foto' => $foto,


                );

                $data_status_pembayaran =  array(
                    'nis' => $nis,
                    'nama_santri' => $nama_santri,
                    'nama_kelas' => $nama_kelas,
                    'tahun_angkatan' => $tahun_angkatan,
                    'gross_amount' => $jumlah_bayar,
                    'payment_type' => $payment_type,
                    'transaction_time' => $transaction_time,
                    'status_code' => $status_code,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'foto' => $foto,
                );


                $this->M_pembayaran->insert_data($data_pembayaran, 'tbl_pembayaran');

                $this->M_status_pembayaran->insert_data($data_status_pembayaran,'tbl_status_pembayaran');

                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Pembayaran');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Siswa');
            }
        } 


    }
    public function delete($id_santri)
    {
        $id_santri = $this->input->post('id_santri');
        $this->M_siswa->delete_data($id_santri);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('Admin/Siswa');
    }
    public function update()
    {

        date_default_timezone_set("Asia/Jakarta");
                $config['upload_path'] = './assets/admin/upload'; //path folder
                $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //nama_guru yang terupload nantinya
                $config['max_size']  = 200000; //Batas Ukuran

                $this->upload->initialize($config);
                if (!empty($_FILES['foto']['name'])) {
                    if ($this->upload->do_upload('foto')) {
                        $gbr = $this->upload->data();
                //Compress Image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/admin/upload' . $gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '100%';
                        $config['width'] = 360;
                        $config['height'] = 360;
                        $config['new_image'] = './assets/admin/upload' . $gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        $foto = $gbr['file_name'];
                        $id_santri           = $this->input->post('id_santri');
                        $nis                    = $this->input->post('nis');
                        $nama_santri             = $this->input->post('nama_santri');
                        $tahun_angkatan           = $this->input->post('tahun_angkatan');
                        $nama_kelas                  = $this->input->post('nama_kelas');
                        $jenis_kelamin          = $this->input->post('jenis_kelamin');


                        $no_hp                  = $this->input->post('no_hp');
                        $email                  = $this->input->post('email');
                        $alamat                  = $this->input->post('alamat');
                        $nama_ayah              = $this->input->post('nama_ayah');
                        $nama_ibu               = $this->input->post('nama_ibu');
                        $no_hp_ortu             = $this->input->post('no_hp_ortu');

                        $tanggal                = date('d-M-y');

                        $data = array(

                            'nis' => $nis,
                            'nama_santri' => $nama_santri,
                            'tahun_angkatan' => $tahun_angkatan,
                            'nama_kelas' => $nama_kelas,
                            'jenis_kelamin' => $jenis_kelamin,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'alamat' => $alamat,
                            'nama_ayah' => $nama_ayah,
                            'nama_ibu' => $nama_ibu,
                            'no_hp_ortu' => $no_hp_ortu,
                            'foto' => $foto,

                        );

                        $where = array(
                            'id_santri' => $id_santri
                        );

                        $this->M_siswa->update_data($where, $data, 'tbl_santri');
                        echo $this->session->set_flashdata('msg', 'success-update');
                        redirect('Admin/Siswa');
                    } else {
                        echo $this->session->set_flashdata('msg', 'warning');
                        redirect('Admin/Siswa');
                    }
                } else {

                    $id_santri           = $this->input->post('id_santri');
                    $nis           = $this->input->post('nis');
                    $nama_santri             = $this->input->post('nama_santri');
                    $tahun_angkatan           = $this->input->post('tahun_angkatan');
                    $nama_kelas                  = $this->input->post('nama_kelas');
                    $jenis_kelamin          = $this->input->post('jenis_kelamin');


                    $no_hp                  = $this->input->post('no_hp');
                    $email                  = $this->input->post('email');
                    $alamat                  = $this->input->post('alamat');
                    $nama_ayah              = $this->input->post('nama_ayah');
                    $nama_ibu               = $this->input->post('nama_ibu');
                    $no_hp_ortu             = $this->input->post('no_hp_ortu');

                    $data = array(

                        'nis' => $nis,
                        'nama_santri' => $nama_santri,
                        'tahun_angkatan' => $tahun_angkatan,
                        'nama_kelas' => $nama_kelas,
                        'jenis_kelamin' => $jenis_kelamin,
                        'no_hp' => $no_hp,
                        'email' => $email,
                        'alamat' => $alamat,
                        'nama_ayah' => $nama_ayah,
                        'nama_ibu' => $nama_ibu,
                        'no_hp_ortu' => $no_hp_ortu

                    );
                    $where = array(
                        'id_santri' => $id_santri
                    );

                    $this->M_siswa->update_data($where, $data, 'tbl_santri');
                    echo $this->session->set_flashdata('msg', 'success-update');
                    redirect('Admin/Siswa');

                }

            }
            public function cek_nis()
            {
                $data = (object)array();
                $nis = $this->input->post('input_check_nis');
        // $nis = '2022001';
                $cek_nis = $this->M_siswa->cek_nis($nis);

                $data_nis = json_encode($cek_nis);

                $decode_nis = json_decode($data_nis);

                if ($decode_nis != NULL) {

                    $hasil = "Data Ada";
                    $data->result  = $decode_nis;
                    $data->success         = TRUE;
                    $data->message        = "True !";

                }else{

                    $hasil = "Data Kosong";
                    $data->result = FALSE ;
                    $data->status = FALSE;
                }

                echo json_encode($data);

            }
        }
