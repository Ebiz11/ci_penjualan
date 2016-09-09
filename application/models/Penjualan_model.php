<?php
/**
 *
 */
class Penjualan_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
    // $this->load->model('Keranjang_model');
  }

  public function get_data_join_details($id){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where('id_transaksi', $id);
    $this->db->join('penjualan',
                    'penjualan.id_barang = barang.id_barang');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function chart(){
    $this->db->select('*');
    $this->db->select_sum('jumlah', 'stok_total');
    $this->db->from('penjualan');
    $this->db->join('barang','barang.id_barang = penjualan.id_barang');
    $this->db->group_by('nama_barang');
    $query = $this->db->get();
    $data = $query->result_array();
    $rows = array();
    foreach ($data as $chart) {
      $row[0] = $chart['nama_barang'];
    	$row[1] = $chart['stok_total'];
    	array_push($rows,$row);
    }
    return json_encode($rows, JSON_NUMERIC_CHECK);
  }

  public function get_data_join(){
    $this->db->select('*');
    $this->db->select_sum('sub_total','total');
    $this->db->group_by('id_transaksi');
    $this->db->order_by('id_transaksi','DESC');
    $query = $this->db->get('penjualan');
    return $query->result_array();
  }

  public function insert_transaksi($total){
    $date = date("Y-m-d");

    $data = [
      'sub_total' => $total,
      'jenis_transaksi' => "jual",
      'tanggal' => $date
    ];

    $this->db->insert('transaksi', $data);
    return $this->db->insert_id();
  }

  public function insert_transaksi_beli($total){
    $date = date("Y-m-d");

    $data = [
      'sub_total' => $total,
      'jenis_transaksi' => "beli",
      'tanggal' => $date
    ];

    $this->db->insert('transaksi', $data);
    return $this->db->insert_id();
  }

  public function get_keranjang(){
    $query = $this->db->get('keranjang');
    return $query->result_array();
  }

  public function insert($last_id){
    $date = date("Y-m-d");
    $keranjang = $this->get_keranjang();
    foreach ($keranjang as $row) {
      $data = [
        'id_barang' => $row['id_barang'],
        'id_transaksi' => $last_id,
        'jumlah' => $row['jumlah'],
        'sub_total' => $row['sub_total'],
        'tanggal' => $date
      ];

    $this->db->insert('penjualan', $data);
  }
  }

  public function delete($id){
    $this->db->delete('pembelian', ['id_pembelian' => $id]);
  }

  // public function delete_keranjang_id($id){
  //   $this->db->delete('keranjang', ['id_keranjang' => $id]);
  // }

  public function delete_keranjang(){
    $keranjang = $this->get_keranjang();
    foreach ($keranjang as $row) {
    $this->Keranjang_model->delete($row['id_keranjang']);
  }
  }
}
