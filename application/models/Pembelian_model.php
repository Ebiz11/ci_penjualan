<?php
/**
 *
 */
class Pembelian_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  // public function get_data(){
  //   $query = $this->db->get('pembelian');
  //   return $query->result_array();
  // }

  public function get_data_join(){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('pembelian',
                    'pembelian.id_barang = barang.id_barang');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function chart(){
    $this->db->select('*');
    $this->db->select_sum('jumlah', 'stok_total');
    $this->db->from('pembelian');
    $this->db->join('barang','barang.id_barang = pembelian.id_barang');
    $this->db->group_by('nama_barang');
    $query = $this->db->get();
    $data = $query->result_array();
    $rows = array();
    foreach ($data as $chart) {
      $row[0] = $chart['nama_barang'];
    	$row[1] = $chart['jumlah'];
    	array_push($rows,$row);
    }
    return json_encode($rows, JSON_NUMERIC_CHECK);
  }

  public function insert($last_id){
    $date = date("Y-m-d");

    $data = [
      'id_barang' => $this->input->post('id_barang'),
      'id_transaksi' => $last_id,
      'jumlah' => $this->input->post('jumlah'),
      'sub_total' => $this->input->post('sub_total'),
      'tanggal' => $date
    ];

    $this->db->insert('pembelian', $data);
  }

  public function insert_pembelian_barang($id_transaksi, $id_barang, $stok, $sub_total){
    $date = date("Y-m-d");
    $total = $stok * $sub_total;
    $data = [
      'id_barang' => $id_barang,
      'id_transaksi' => $id_transaksi,
      'jumlah' => $this->input->post('stok'),
      'sub_total' => $total,
      'tanggal' => $date
    ];

    $insert = $this->db->insert('pembelian', $data);
    return $insert? 'success':'error';
  }

  public function insert_stok($data){
    $update_stok = $this->db->insert('pembelian', $data);
    return $update_stok? 'success':'error';
  }

  public function delete($id){
    $this->db->delete('pembelian', ['id_pembelian' => $id]);
  }

}
