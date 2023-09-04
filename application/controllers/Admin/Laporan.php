<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pembayaran');
        $this->load->model('M_status_pembayaran');


        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('login');
            redirect($url);
        }
    }


    public function index()
    {
        $data['laporan'] = $this->M_pembayaran->laporan_data();
        $this->load->view('Admin/List.laporan.php', $data);
    }

    public function cetak()
    {
        $tanggal = $this->input->post('tanggal');
        $tahun = date('Y', strtotime($tanggal));
        $bulan = date('F', strtotime($tanggal));
        
        $data['laporan'] = $this->M_pembayaran->cetak_laporan($bulan,$tahun);
        $this->load->view('Admin/Cetak_laporan.php',$data);

    }

}
