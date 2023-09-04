<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_status_pembayaran');
		$this->load->model('M_siswa');
		$this->load->helper('url');

	}


	public function index()
	{
		$this->load->view('Front/Pembayaran');
	}



	public function cek_pembayaran()
	{

		$data = (object)array();
		$nis = $this->input->post('input_check_nisn');
		// $nis = '2022001';
		$bulan = date('F');
		$tahun = date('Y');
		$cek_nisn = $this->M_status_pembayaran->cek_pembayaran_siswa($nis,$bulan,$tahun);
// data siswa
		$data_nisn = json_encode($cek_nisn);

		$decode_nisn = json_decode($data_nisn);


		if($cek_nisn == NULL){
			$data = (object)array();

			$siswa['siswa']=$this->M_siswa->cek_nisn($nis);
			
			

		// data siswa
			$data_siswa = json_encode($siswa);

			$decode_siswa = json_decode($data_siswa);

			if ($decode_siswa != NULL) {

				$decode_siswa_data = $decode_siswa[0];

				$hasil = "Data Ada";
				$data->result  = $decode_siswa_data ;
				$data->success         = TRUE;
				$data->message        = "True !";

			}else{

				$hasil = "Data Kosong";
				$data->result = FALSE ;
				$data->status = FALSE;
			}

			echo json_encode($data);
		}else{

			$data = (object)array();
			
			$hasil = "Data Kosong";
			$data->result = FALSE ;
			$data->status = FALSE;
			echo json_encode($data);
		}
	}

}
