<?php
class M_status_pembayaran extends CI_Model{

	private $_table = "tbl_status_pembayaran";

	public $id;

	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	
	function insert_data($data_status_pembayaran,$table){
		$this->db->insert($table,$data_status_pembayaran);
	}

	function tampil_data(){
		$this->db->select('*');
		$this->db->group_by('tbl_status_pembayaran.nama_siswa');
		$hsl = $this->db->get('tbl_status_pembayaran');
		return $hsl;

	}

	public function jumlah_data()
	{

		return $this->db->count_all('tbl_status_pembayaran');
	} 

	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function cek_pembayaran ($nis,$bulan) {
		$this->db->select('a.transaction_time as transaction_time');
		$this->db->where('nis',$nis);
		$this->db->where('bulan',$bulan);
		$hsl = $this->db->get('tbl_status_pembayaran as a')->result();
		return $hsl;
	}

	function cek_pembayaran_siswa ($nis,$bulan,$tahun) {
		$this->db->select('nis,nama_siswa,kelas,gross_amount,bank,status_code,transaction_time');
		$this->db->where('nis',$nis);
		$this->db->where('bulan',$bulan);
		$this->db->where('tahun',$tahun);
		$hsl = $this->db->get('tbl_status_pembayaran as a')->result();
		return $hsl;
	}

	function tampil_data_now($tanggal){
		$this->db->select('*');
		$this->db->where('tanggal_upload',$tanggal);
		$hsl = $this->db->get('tbl_status_pembayaran');
		return $hsl;
	}
	function tunggakan (){
		$this->db->select('tbl_siswa.id,tbl_siswa.nis,tbl_siswa.nama_siswa,tbl_siswa.jenkel,tbl_siswa.kelas');
		$this->db->join('tbl_status_pembayaran','tbl_siswa.nis = tbl_status_pembayaran.nis','left');
		$this->db->where('status_code',NULL);
		$result = $this->db->get('tbl_siswa');
		return $result;
	}

	function get_detail_siswa($nis){
		$this->db->select('*');
		$this->db->where('nis',$nis);
		$hsl = $this->db->get('tbl_status_pembayaran');
		return $hsl;
	}

	function get_detail_siswa_1($nis){
		$this->db->select('*');
		$this->db->where('tbl_siswa.nis',$nis);
		$this->db->group_by('tbl_siswa.nama_siswa');
		$hsl = $this->db->get('tbl_siswa');
		return $hsl;
	}

	function tambah_data_hari_ini ($data, $table){
		$this->db->insert($table,$data);
	}

	function hapus_data_hari_ini ($id){
		$hsl=$this->db->query("DELETE FROM tbl_status_pembayaran WHERE id='$id'");
		return $hsl;
	}
	
}