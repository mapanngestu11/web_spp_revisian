<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_kegiatan');

	}


	public function index()
	{

		$data['kegiatan'] = $this->M_kegiatan->tampil_data();
		$this->load->view('Front/Kegiatan',$data);
	}
}
