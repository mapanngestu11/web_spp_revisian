<?php
class M_kontak extends CI_Model
{

    private $_table = "tbl_kontak";

    function tampil_data()
    {
        return $this->db->get('tbl_kontak');
    }
    function tampil_data_santri($nis)
    {
        $this->db->where('nis',$nis);
        return $this->db->get('tbl_kontak');
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_kontak)
    {
        $hsl = $this->db->query("DELETE FROM tbl_kontak WHERE id_kontak='$id_kontak'");
        return $hsl;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function jumlah_data()
    {
        $this->db->select('count(tbl_kontak.kode_pegawai) as jumlah');
        $hsl = $this->db->get('tbl_kontak');
        return $hsl;
    }
}
