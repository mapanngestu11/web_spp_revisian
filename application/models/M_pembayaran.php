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
	function delete_data($id_pembayaran)
	{
		$hsl = $this->db->query("DELETE FROM tbl_pembayaran WHERE id_pembayaran='$id_pembayaran'");
		return $hsl;
	}

	function get_data_pembayaran($nis)
	{	
		$this->db->select('*');
		$this->db->join('tbl_santri as b','b.tahun_angkatan = a.tahun_angkatan');
		$this->db->where('b.nis',$nis);
		return $this->db->get('tbl_info_bayar as a');
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
	function laporan_data()
	{
		$this->db->select('*');
		$this->db->group_by('tbl_pembayaran.nama_santri');
		$hsl = $this->db->get('tbl_pembayaran');
		return $hsl;
	}
	function cetak_laporan($bulan,$tahun)
	{
		// $bulan = 'August';
		// var_dump($bulan);
		// die();
		$this->db->select('
			a.nis,
			a.nama_santri,
			a.nama_kelas,
			a.pesan,
			a.jumlah_bayar,
			b.bulan,
			b.status_code,
			b.transaction_time');
		$this->db->join('tbl_status_pembayaran as b','a.nis = b.nis','left');
		$this->db->where('b.bulan',$bulan);
		$hsl = $this->db->get('tbl_pembayaran as a')->result();
		return $hsl;
	}


}