<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_bantuan  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kontak');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('login');
            redirect($url);
        }
    }


    public function index()
    {
        $data['pesan_bantuan'] = $this->M_kontak->tampil_data();
        $nis = $this->session->userdata('nis');
        $data['pesan_bantuan_santri'] = $this->M_kontak->tampil_data_santri($nis);
        $this->load->view('Admin/List.pesan.bantuan.php', $data);
    }


    public function delete($id_kontak)
    {
        $id_kontak = $this->input->post('id_kontak');
        $this->M_kontak->delete_data($id_kontak);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('Admin/Pesan_bantuan');
    }


}
