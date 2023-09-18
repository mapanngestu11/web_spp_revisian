<?php defined('BASEPATH') or exit('No direct script access allowed');

class Homepage  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_login');
        $this->load->model('M_kelas');
        $this->load->model('M_siswa');
        $this->load->model('M_pembayaran');
        $this->load->model('M_status_pembayaran');
        $this->load->model('M_kegiatan');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('Login');
            redirect($url);
        }
    }

    public function index()
    {
        $nis = $this->session->userdata('nis');  
        $data['data_kelas'] = $this->M_kelas->tampil_data();
        $data['siswa'] = $this->M_siswa->tampil_data_by_nis($nis);
        $data['pembayaran'] = $this->M_pembayaran->get_data_pembayaran_santri($nis);

        $data['jumlah_bayar'] = $this->M_pembayaran->jumlah_data();
        $data['jumlah_status'] = $this->M_status_pembayaran->jumlah_data();
        $data['jumlah_santri'] = $this->M_siswa->jumlah_data_santri();
        $data['jumlah_kegiatan'] = $this->M_kegiatan->jumlah_data_kegiatan();

        $data['data_pembayaran'] = $this->M_pembayaran->get_data_pembayaran_all();

        $this->load->view('Admin/Homepage.php',$data);
    }
}
