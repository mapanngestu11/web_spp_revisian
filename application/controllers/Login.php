<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_siswa');
	}


	public function index()
	{
		$this->load->view('Login/Index.php');
	}

	public function auth()
	{
		$username = strip_tags(str_replace("'", "", $this->input->post('username')));
		$password = strip_tags(str_replace("'", "", $this->input->post('password')));

		$u = $username;
		$p = $password;
		$cadmin = $this->M_login->cekadmin($u, $p);
		$csantri= $this->M_siswa->cek_santri($u, $p);

		json_encode($csantri);
		json_encode($cadmin);


		if ($cadmin->num_rows() > 0) {
            // echo "berhasil";
            // die();
			$this->session->set_userdata('masuk', true);
			$this->session->set_userdata('user', $u);
			$xcadmin = $cadmin->row_array();

            // var_dump($xcadmin['hak_akses']);
            // die;

			if ($xcadmin['hak_akses'] == 'admin' || $xcadmin['hak_akses'] == 'kepsek') {
				$this->session->set_userdata('akses', 'admin');
				$id_user = $xcadmin['id_user'];
				$nama_lengkap = $xcadmin['nama_lengkap'];
				$hak_akses = $xcadmin['hak_akses'];
				$this->session->set_userdata('id_user', $id_user);
				$this->session->set_userdata('nama_lengkap', $nama_lengkap);
				$this->session->set_userdata('hak_akses', $hak_akses);
				$data = array(
					'hak_akses'     => $hak_akses,
					'nama_lengkap' => $nama_lengkap,
					'user_id' => $id_user,
					'logged_in' => TRUE
				);


				redirect('Admin/Homepage', $data);
			} elseif ($xcadmin['hak_akses'] == 'Pln') {
				$this->session->set_userdata('akses', 'pln');
				$id = $xcadmin['id'];
				$nama_lengkap = $xcadmin['nama_lengkap'];
				$hak_akses = $xcadmin['hak_akses'];
				$this->session->set_userdata('id', $id);
				$this->session->set_userdata('nama_lengkap', $nama_lengkap);
				$this->session->set_userdata('hak_akses', $hak_akses);
				$data = array(
					'hak_akses'     => $hak_akses,
					'logged_in' => TRUE
				);

				redirect('Homepage', $data);
			}
		}else if ($csantri->num_rows() > 0) {
			$this->session->set_userdata('masuk', true);
			$this->session->set_userdata('user', $u);
			$xcsantri = $csantri->row_array();

			if ($xcsantri['hak_akses'] == 'santri') {
				$this->session->set_userdata('akses', 'santri');
				$nis = $xcsantri['nis'];
				$nama_santri = $xcsantri['nama_santri'];
				$hak_akses = $xcsantri['hak_akses'];
				$this->session->set_userdata('nis', $nis);
				$this->session->set_userdata('nama_santri', $nama_santri);
				$this->session->set_userdata('hak_akses', $hak_akses);
				$data = array(
					'hak_akses'     => $hak_akses,
					'nama_santri' => $nama_santri,
					'nis' => $nis,
					'logged_in' => TRUE
				);
				
				redirect('Admin/Homepage', $data);
			}
		} else {

			$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Username Atau Password Salah</div>');
			redirect('Login');
		}
	}

	public function logout()
	{
		       // Lakukan proses logout di sini
		$this->session->sess_destroy();

        // Redirect ke halaman setelah logout berhasil
		redirect('Login');
	}
}
