<?php
class M_kegiatan extends CI_Model
{

  private $_table = "tbl_kegiatan";

  function tampil_data()
  {
   $this->db->select('*');
   $this->db->from('tbl_kegiatan a');
   $this->db->join('tbl_user b', 'b.id_user = a.id_user');
   $query = $this->db->get();
   return $query;
 }

 function tampil_data_home()
 {
  $this->db->select('*');
  $this->db->from('tbl_kegiatan');
  $this->db->limit(3);
  $this->db->order_by("id_kegiatan", "DESC");
  return $this->db->get('');
}

function input_data($data, $table)
{
  $this->db->insert($table, $data);
}

public function jumlah_data_kegiatan()
{

  return $this->db->count_all('tbl_kegiatan');
} 

function delete_data($id_kegiatan)
{
  $hsl = $this->db->query("DELETE FROM tbl_kegiatan WHERE id_kegiatan='$id_kegiatan'");
  return $hsl;
}

function update_data($where, $data, $table)
{
  $this->db->where($where);
  $this->db->update($table, $data);
}
function jumlah_data()
{
  $this->db->select('count(tbl_kegiatan.id_kegiatan) as jumlah');
  $hsl = $this->db->get('tbl_kegiatan');
  return $hsl;
}
}
