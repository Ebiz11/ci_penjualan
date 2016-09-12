<?php
/**
 *
 */
class Keranjang extends CI_Controller
{

  function __construct(){
		parent::__construct();

    if($this->session->userdata('status') != "login"){
			redirect('login');
		}
  }

  public function index(){
		$this->load->view('template/header');
    $this->load->view('template/navigasi');
		$data['judul'] = "Keranjang Belanja";
		$data['keranjang'] = $this->Keranjang_model->get_data_join();
		$this->load->view('Keranjang/index', $data);
    $this->load->view('template/footer');
  }

  public function tambah(){
		$data = $this->Barang_model->get_data_id($this->input->post('id_barang'));//cek stok barang
    $date = date("Y-m-d");
    if ($this->input->post('jumlah')<1 OR $this->input->post('jumlah') > $data['stok']) {
			if ($this->input->post('jumlah')<1) {
				echo "jumlah";
			}elseif($this->input->post('jumlah') > $data['stok']) {
				echo "stok";
			}else {
			  echo "error";
			}
		}else{
      $data = [
        'id_barang' => $this->input->post('id_barang'),
        'jumlah' => $this->input->post('jumlah'),
        'nama_barang' => $this->input->post('nama_barang'),
        'sub_total' => $data['harga_jual']*$this->input->post('jumlah'),
        'tanggal' => $date
      ];
	    echo $this->Keranjang_model->insert($data);
		}
	}

  public function hapus(){
    $id = $this->input->post('id');
    echo $this->Keranjang_model->delete($id);
  }

  public function load_data_barang(){
    $id = $this->input->post('parent_id');
    $data = $this->Keranjang_model->load_barang($id);
    return die(json_encode($data));
  }

  public function updateChart(){
    $cek_stok = $this->Barang_model->get_data_id($this->input->post('id_barangChart'));
    if ($this->input->post('jumlah') > $cek_stok['stok']) {
      echo "min_stok";
    }else{
      $data = [
      'sub_total' => $this->input->post('sub_total'),
      'jumlah' => $this->input->post('jumlah'),
      'id_keranjang' => $this->input->post('id_keranjang')
      ];
      echo $this->Keranjang_model->updateChart($data);
    }
  }

  public function ajax_list(){
		$list = $this->Keranjang_model->get_datatables();
    $total_final=$this->Keranjang_model->total_keranjang();
    '<input type="hidden" class="form-control" id="total_final" name="total_final" value="'.$total_final.'" required="">';
		$data = array();
		$no = $_POST['start']+1;
		foreach ($list as $rows) {

			$row = array();
      $row[] = $no++;
			$row[] = $rows->nama_barang;
      $harga=$rows->sub_total/$rows->jumlah;
			$row[] = '<input type="text" class="form-control"  onchange="update('."'".$rows->id_keranjang."'".')" id="jumlahChart'.$rows->id_keranjang.'" name="jumlah" value="'.$rows->jumlah.'" required="">
                <input type="hidden" class="form-control" id="hargaChart'.$rows->id_keranjang.'" name="harga" value="'.$harga.'" required="">
                <input type="hidden" class="form-control" id="id_barangChart'.$rows->id_keranjang.'" name="id_barangChart" value="'.$rows->id_barang.'" required="">';
			$row[] = number_format($rows->sub_total,0,',','.');

			$row[] = '<a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="hapus('."'".$rows->id_keranjang."'".')"><i class="fa fa-trash-o"></i></a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Keranjang_model->count_all(),
						"recordsFiltered" => $this->Keranjang_model->count_filtered(),
						"data" => $data,
				);

		echo json_encode($output);
	}

}
