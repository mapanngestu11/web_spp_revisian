    <?php defined('BASEPATH') or exit('No direct script access allowed');

    class Pesan  extends CI_Controller
    {


        function __construct()
        {
            parent::__construct();
            $this->load->model('M_pesan');

            if ($this->session->userdata('masuk') != TRUE) {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
                $url = base_url('login');
                redirect($url);
            }
        }


        public function index()
        {
            $data['pesan_wa'] = $this->M_pesan->tampil_data();
            $this->load->view('Admin/List.pesan.php', $data);
        }
        public function add()
        {
            date_default_timezone_set("Asia/Jakarta");
            $nis = $this->input->post('nis');
            $nama_santri = $this->input->post('nama_santri');
            $no_hp_ortu  = $this->input->post('no_hp_ortu');
            $pesan  = $this->input->post('pesan');
            $waktu =  date('Y-m-d h:i:s');


            $data = array(
                'nis' => $nis,
                'nama_santri' => $nama_santri,
                'no_hp_ortu' => $no_hp_ortu,
                'pesan' => $pesan,
                'waktu' => $waktu
            );
            $input = $this->M_pesan->input_data($data, 'tbl_pesan_wa');

            $curl = curl_init();
            $token = "ytTsN7yw6Xh3z8S1IJe8GKyO4gFT1F9J2ukCSObdu8y0xusoFGr0V5Nqk7kbykBu";
            $data = [
                'phone' => $no_hp_ortu,
                'message' => $pesan,
            ];
            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array(
                    "Authorization: $token",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL,  "https://jogja.wablas.com/api/send-message");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);
  
            

            echo $this->session->set_flashdata('msg', 'success');
            redirect('Admin/Pesan');
        }

        public function delete($id_pesan)
        {
            $id_pesan = $this->input->post('id_pesan');
            $this->M_pesan->delete_data($id_pesan);
            echo $this->session->set_flashdata('msg', 'success-hapus');
            redirect('Admin/Pesan');
        }

        public function update($id_pesan)
        {
            date_default_timezone_set("Asia/Jakarta");
            $id_pesan = $this->input->post('id_pesan');
            $pesan  = $this->input->post('pesan');
            $waktu =  date('Y-m-d h:i:s');
            

            $data = array(
                'pesan' => $pesan,
                'waktu' => $waktu
            );

            $where = array(
                'id_pesan' => $id_pesan
            );

            $this->M_pesan->update_data($where, $data, 'tbl_pesan_wa');
            echo $this->session->set_flashdata('msg', 'info-update');
            redirect('Admin/Pesan');
        }
    }
