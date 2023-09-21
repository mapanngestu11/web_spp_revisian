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
		$this->db->select('
			a.id_pembayaran,
			a.nis,
			a.nama_santri,
			a.nama_kelas,
			a.bulan,
			a.tanggal_upload,
			b.order_id,
			b.status_code');
		$this->db->group_by('b.order_id');
		$this->db->join('tbl_status_pembayaran as b','b.nis = a.nis','left');
		$hsl = $this->db->get('tbl_pembayaran as a');
		return $hsl;
	}

	public function jumlah_data()
	{

		return $this->db->count_all('tbl_pembayaran');
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
		$this->db->group_by('tbl_pembayaran.order_id');
		$hsl = $this->db->get('tbl_pembayaran');
		return $hsl;
	}
	function get_data_pembayaran_santri($nis)
	{
		$this->db->select('
			a.id_pembayaran,
			b.order_id,
			a.nis,
			a.pesan,
			a.nama_santri,
			a.nama_kelas,
			a.bulan,
			b.tahun_angkatan,
			b.gross_amount,
			b.payment_type,
			b.status_code,
			b.va_number,
			b.bank,
			b.transaction_time,
			b.pdf_url');
		$this->db->join('tbl_status_pembayaran as b','b.nis = a.nis','left');
		$this->db->where('a.nis',$nis);
		$this->db->group_by('b.order_id');
		$hsl = $this->db->get('tbl_pembayaran as a');
		return $hsl;
	}
	function get_data_pembayaran_all()
	{
		$this->db->select('
			a.id_pembayaran,
			b.order_id,
			a.nis,
			a.pesan,
			a.nama_santri,
			a.nama_kelas,
			a.bulan,
			b.tahun_angkatan,
			b.gross_amount,
			b.payment_type,
			b.status_code,
			b.va_number,
			b.bank,
			b.transaction_time,
			b.pdf_url');
		$this->db->join('tbl_status_pembayaran as b','b.nis = a.nis','left');
		
		$this->db->group_by('b.order_id');
		$hsl = $this->db->get('tbl_pembayaran as a');
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

	public function cek_pembayaran_siswa_bulan($cek_bulan,$nis)
	{
		$this->db->select('a.nis');
		$this->db->where('a.nis',$nis);
		$this->db->where('a.bulan',$cek_bulan);
		$this->db->where('b.status_code','200');
		$this->db->join('tbl_status_pembayaran as b','a.nis = b.nis','left');
		$hsl = $this->db->get('tbl_pembayaran as a')->result();
		return $hsl;

	}

	public function cek_pembayaran_detail($id_pembayaran)
	{
		$this->db->select('
			b.nis,
			b.nama_santri,
			a.nama_kelas,
			a.jumlah_bayar,
			a.pesan,

			a.bulan,
			a.tanggal_upload,
			c.gross_amount,
			c.payment_type,
			c.transaction_time,

			c.id_status_pembayaran,
			c.bank,
			c.va_number,
			c.pdf_url,
			c.status_code



			');
		$this->db->join('tbl_santri as b','a.nis = b.nis','left');
		$this->db->join('tbl_status_pembayaran as c', 'c.nis = a.nis', 'left');
		$this->db->where('a.id_pembayaran',$id_pembayaran);
		$this->db->group_by('a.nama_santri');
		$this->db->order_by('c.id_status_pembayaran', 'DESC');


		$hsl = $this->db->get('tbl_pembayaran as a');
		return $hsl;

	}

}