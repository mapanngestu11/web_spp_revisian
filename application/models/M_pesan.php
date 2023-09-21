<?php
class M_pesan extends CI_Model
{

    private $_table = "tbl_pesan_wa";

    function tampil_data()
    {
        return $this->db->get('tbl_pesan_wa');
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_pesan)
    {
        $hsl = $this->db->query("DELETE FROM tbl_pesan_wa WHERE id_pesan='$id_pesan'");
        return $hsl;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function jumlah_data()
    {
        $this->db->select('count(tbl_pesan_wa.id_pesan) as jumlah');
        $hsl = $this->db->get('tbl_pesan_wa');
        return $hsl;
    }
}
