<?php
/**
 *
 */
class Barang_model extends CI_Model
{

  function __construct()
  {
    // $this->load->database();
  }

  public function get_data(){
    $this->db->order_by('id_barang');
    $query = $this->db->get('barang');

    return $query->result_array();
  }

  public function insert($data){
    $this->db->insert('barang', $data);
    return $this->db->insert_id();
  }

  public function delete($id_barang){
    $hapus = $this->db->delete('barang', ['id_barang' => $id_barang]);
    return $hapus? 'success':'error';
  }

  public function get_data_id($id_barang){
    $query = $this->db->get_where('barang', ['id_barang'=>$id_barang]);
    return $query->row_array();
  }

  public function update($data){
    $this->db->where('id_barang', $data['id_barang']);
    $update = $this->db->update('barang', $data);
    return $update? 'success':'error';
  }
}
