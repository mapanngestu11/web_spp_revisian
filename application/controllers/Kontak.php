<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_kontak');

	}


	public function index()
	{
		$this->load->view('front/Kontak');
	}
	public function add()
	{
		date_default_timezone_set("Asia/Jakarta");
		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$pesan = $this->input->post('pesan');
		$waktu =  date('Y-m-d h:i:s');


		$data = array(
			'nama' => $nama,
			'no_hp' => $no_hp,
			'pesan' => $pesan,
			'waktu' => $waktu
		);

		$this->M_kontak->input_data($data, 'tbl_kontak');
		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Pesan Terkirim ! Silahkan menunggu Pesan dari Admin.</div>');
		redirect('Kontak');
	}
}
