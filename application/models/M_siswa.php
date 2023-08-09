<?php
class M_siswa extends CI_Model
{

    private $_table = "tbl_santri";

    function tampil_data()
    {
        return $this->db->get('tbl_santri');
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_santri)
    {
        $hsl = $this->db->query("DELETE FROM tbl_santri WHERE id_santri='$id_santri'");
        return $hsl;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function jumlah_data()
    {
        $this->db->select('count(tbl_santri.id_santri) as jumlah');
        $hsl = $this->db->get('tbl_santri');
        return $hsl;
    }
    function cek_nisn($nis)
    {
        $this->db->select('
            A.nis as nis,
            A.nama_santri as nama_santri,
            A.kelas as kelas,
            A.no_hp_ortu as no_hp_ortu,
            A.email as email,
            A.alamat as alamat,
            A.tahun_angkatan,
            B.jumlah_bayar');
        $this->db->join('tbl_info_bayar as B', 'tbl_info_bayar.tahun_angkatan = A.tahun_angkatan');
        $this->db->where('nis', $nis);
        $hsl = $this->db->get('tbl_santri AS A')->result();
        return $hsl;
    }
    function cek_santri($u, $p)
    {

        $hasil = $this->db->query("SELECT * FROM tbl_santri WHERE nis='$u' AND password =md5('$p')");
        return $hasil;
    }
    function cek_nis($nis)
    {
        $this->db->select('*');
        $this->db->join('tbl_info_bayar as b', 'b.tahun_angkatan = a.tahun_angkatan');
        $this->db->where('nis',$nis);
        $hsl = $this->db->get('tbl_santri as a')->result();
        return $hsl;
    }
}
