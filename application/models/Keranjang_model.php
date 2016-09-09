<?php

/**
 *
 */
class Keranjang_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  public function get_data_join(){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('keranjang',
                    'keranjang.id_barang = barang.id_barang');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function load_barang($id){
    $query = $this->db->get_where('barang', ['id_barang'=>$id]);
    return $query->result_array();
  }

  public function insert($harga){
    $date = date("Y-m-d");

    $data = [
      'id_barang' => $this->input->post('id_barang'),
      'jumlah' => $this->input->post('jumlah'),
      'sub_total' => $harga*$this->input->post('jumlah'),
      'tanggal' => $date
    ];

    $this->db->insert('keranjang', $data);
    redirect('keranjang/tambah');
  }

  public function delete($id){
    $this->db->delete('keranjang', ['id_keranjang' => $id]);
  }

}
