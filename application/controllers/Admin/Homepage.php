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
        // var_dump($data['pengajuan']);
        // die;
        $this->load->view('Admin/Homepage.php',$data);
    }
}
