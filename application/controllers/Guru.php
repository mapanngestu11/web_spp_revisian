<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_guru');

	}


	public function index()
	{

		$data['guru'] = $this->M_guru->tampil_data();
		$this->load->view('Front/Guru',$data);
	}
}
