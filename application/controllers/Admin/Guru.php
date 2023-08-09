<?php defined('BASEPATH') or exit('No direct script access allowed');

class Guru  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_guru');


        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('Login');
            redirect($url);
        }
    }

    public function index()
    {

        $data['guru'] = $this->M_guru->tampil_data();
        $this->load->view('Admin/List.guru.php',$data);
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

                $nama_guru         = $this->input->post('nama_guru');
                $jenis_kelamin     = $this->input->post('jenis_kelamin');
                $mapel             = $this->input->post('mapel');
                $no_hp              = $this->input->post('no_hp');
                $email             = $this->input->post('email');


                $data = array(

                    'nama_guru' => $nama_guru,
                    'jenis_kelamin' => $jenis_kelamin,
                    'mapel' => $mapel,
                    'no_hp' => $no_hp,
                    'email' => $email,
                    'foto' => $foto

                );

                $this->M_guru->input_data($data, 'tbl_guru');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Guru');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Guru');
            }
        } else {

          echo $this->session->set_flashdata('msg', 'warning');
          redirect('Admin/Guru');
      }
  }
  public function delete($id_guru)
  {
    $id_guru = $this->input->post('id_guru');
    $this->M_guru->delete_data($id_guru);
    echo $this->session->set_flashdata('msg', 'success-hapus');
    redirect('Admin/Guru');
}
public function update($id_guru)
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
                $id_guru           = $this->input->post('id_guru');
                $nama_guru              = $this->input->post('nama_guru');
                $jenis_kelamin     = $this->input->post('jenis_kelamin');
                $mapel             = $this->input->post('mapel');
                $no_hp              = $this->input->post('no_hp');
                $email             = $this->input->post('email');
             

                $data = array(

                    'nama_guru' => $nama_guru,
                    'jenis_kelamin' => $jenis_kelamin,
                    'mapel' => $mapel,
                    'no_hp' => $no_hp,
                    'email' => $email,
                    'foto' => $foto

                );

                $where = array(
                    'id_guru' => $id_guru
                );

                $this->M_guru->update_data($where, $data, 'tbl_guru');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Guru');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Guru');
            }
        } else {

            $id_guru           = $this->input->post('id_guru');
            $nama_guru              = $this->input->post('nama_guru');
            $jenis_kelamin     = $this->input->post('jenis_kelamin');
            $mapel             = $this->input->post('mapel');
            $no_hp              = $this->input->post('no_hp');
            $email             = $this->input->post('email');
          

            $data = array(

                'nama_guru' => $nama_guru,
                'jenis_kelamin' => $jenis_kelamin,
                'mapel' => $mapel,
                'no_hp' => $no_hp,
                'email' => $email
                
            );

            $where = array(
                'id_guru' => $id_guru
            );

            $this->M_guru->update_data($where, $data, 'tbl_guru');
            echo $this->session->set_flashdata('msg', 'success');
            redirect('Admin/Guru');

        }

    }
}
