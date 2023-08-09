<?php
class M_pembayaran extends CI_Model{

	private $_table = "tbl_pembayaran";

	public $id;

	function cek_pembayaran ($nis,$bulan) {
		$this->db->select('
			nama_santri');
		$this->db->where('nis',$nisn);
		$this->db->where('bulan',$bulan);
		$hsl = $this->db->get('tbl_pembayaran')->result();
		return $hsl;
	}
	
	function tampil_data(){
		$this->db->select('*');
		$this->db->group_by('tbl_pembayaran.nama_santri');
		$hsl = $this->db->get('tbl_pembayaran');
		return $hsl;
	}

	function hari_ini($hari_ini){

		$this->db->select('*');
		$this->db->group_by('tbl_pembayaran.nama_santri');
		$this->db->where('tanggal_upload',$hari_ini);
		$hsl = $this->db->get('tbl_pembayaran');
		return $hsl;
	}

	function insert_data($data_pembayaran,$table){
		$this->db->insert($table,$data_pembayaran);
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}


	function pembayaran_kelas_x(){
		$this->db->select('*');
		$this->db->where('jenjang','X');
		$hsl = $this->db->get('tbl_status_pembayaran');
		return $hsl;
	}
	function pembayaran_kelas_xi(){
		$this->db->select('*');
		$this->db->where('jenjang','XI');
		$hsl = $this->db->get('tbl_status_pembayaran');
		return $hsl;
	}
	function pembayaran_kelas_xii(){
		$this->db->select('*');
		$this->db->where('jenjang','XII');
		$hsl = $this->db->get('tbl_status_pembayaran');
		return $hsl;
	}
	function get_detail_siswa($nis){
		$this->db->select('*');
		
		// $this->db->join('tbl_pembayaran','tbl_status_pembayaran.nisn = tbl_pembayaran.nisn','inner');
		$this->db->where('tbl_status_pembayaran.nis',$nis);
		$this->db->where('tbl_status_pembayaran.status_code','201');
		$hsl = $this->db->get('tbl_status_pembayaran');
		return $hsl;
	}
	
	function get_detail_siswa_1($nis){
		$this->db->select('*');
		$this->db->join('tbl_siswa','tbl_pembayaran.nis = tbl_siswa.nis','left');
		$this->db->where('tbl_pembayaran.nisn',$nisn);
		$this->db->group_by('tbl_pembayaran.nama_santri');
		$hsl = $this->db->get('tbl_pembayaran');
		return $hsl;
	}

	
}