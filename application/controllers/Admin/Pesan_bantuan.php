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

        public function add()
        {
         date_default_timezone_set("Asia/Jakarta");
         $nis = $this->input->post('nis');
         $nama_santri = $this->input->post('nama_santri');
         $pesan = $this->input->post('pesan');
         $no_hp = $this->input->post('no_hp');
         $status = '0';
         $waktu = date('Y-m-d H:i:s');

         $data = array(
            'nis' => $nis,
            'nama_santri' => $nama_santri,
            'pesan' => $pesan,
            'no_hp' => $no_hp,
            'status' => $status,
            'waktu' => $waktu
        );

         $this->M_kontak->input_data($data, 'tbl_kontak');
         echo $this->session->set_flashdata('msg', 'success');
         redirect('Admin/Pesan_bantuan');
     }


     public function delete($id_kontak)
     {
        $id_kontak = $this->input->post('id_kontak');
        $this->M_kontak->delete_data($id_kontak);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('Admin/Pesan_bantuan');
    }


}
