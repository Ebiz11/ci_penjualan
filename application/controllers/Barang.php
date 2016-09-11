<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

  public function __construct(){
    parent::__construct();

    // cek session
    if($this->session->userdata('status') != "login"){
      redirect('login');
    }
    //
  }

	public function index(){
    $this->load->view('template/header');
    $this->load->view('template/navigasi');
    $data['judul'] = "Data Barang";
    // $data['barang'] = $this->Barang_model->get_data();
		$this->load->view('barang/index', $data);
    $this->load->view('template/footer');
	}

  public function detail_barang(){
    $id = $this->input->post('id');
    $data = $this->Barang_model->get_data_id($id);
    echo json_encode($data);

  }

  public function tambah(){
    $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
		$this->form_validation->set_rules('harga_beli', 'harga_beli', 'required');
		$this->form_validation->set_rules('harga_jual', 'harga_jual', 'required');

    if($this->form_validation->run() === FALSE){
    echo "error";
    }else{
    $total = $this->input->post('harga_beli') * $this->input->post('stok');
    $date = date("Y-m-d");
    $data = [
      'nama_barang' => $this->input->post('nama_barang'),
      'harga_beli' => $this->input->post('harga_beli'),
      'harga_jual' => $this->input->post('harga_jual'),
      'tanggal' => $date
    ];
    $last_id_transaksi = $this->Penjualan_model->insert_transaksi_beli($total);
    $last_id_barang = $this->Barang_model->insert($data);
    echo $this->Pembelian_model->insert_pembelian_barang($last_id_transaksi, $last_id_barang, $this->input->post('stok'), $this->input->post('harga_beli') );
    }
  }

  public function hapus(){
    $id = $this->input->post('id');
    echo $this->Barang_model->delete($id);
  }

  public function update(){
    $date = date("Y-m-d");
    $data = [
      'id_barang' => $this->input->post('id_barangEdit'),
      'nama_barang' => $this->input->post('nama_barangEdit'),
      'harga_beli' => $this->input->post('harga_beliEdit'),
      'harga_jual' => $this->input->post('harga_jualEdit'),
      'stok' => $this->input->post('stokEdit'),
      'tanggal' => $date
    ];
    echo $update = $this->Barang_model->update($data);
  }

  public function update_stok(){
    $this->form_validation->set_rules('id_barangStok', 'id_barangStok', 'required');
		$this->form_validation->set_rules('jumlahStok', 'jumlahStok', 'required');
		$this->form_validation->set_rules('sub_totalStok', 'sub_totalStok', 'required');

    if($this->form_validation->run() === FALSE){
    echo "error";
    }else{
  		$last_id = $this->Penjualan_model->insert_transaksi_beli($this->input->post('sub_totalStok'));
      $date = date("Y-m-d");
      $data = [
        'id_barang' => $this->input->post('id_barangStok'),
        'id_transaksi' => $last_id,
        'jumlah' => $this->input->post('jumlahStok'),
        'sub_total' => $this->input->post('sub_totalStok'),
        'tanggal' => $date
      ];
  		echo $this->Pembelian_model->insert_stok($data);
    }
  }

  public function chart(){
    $this->load->view('template/header');
    $this->load->view('template/navigasi');
    // $data['judul'] = "Data Barang";
    $data['chart'] = $this->Barang_model->get_data();
		$this->load->view('barang/chart', $data);
    $this->load->view('template/footer');
  }

  public function ajax_list(){
		$list = $this->Barang_model->get_datatables();
		$data = array();
		$no = $_POST['start']+1;
		foreach ($list as $barang) {
			// $no++;
			$row = array();
			$row[] = $no++;
			$row[] = $barang->nama_barang;
			$row[] = $barang->harga_beli;
			$row[] = $barang->harga_jual;
			$row[] = $barang->stok;
			// $row[] = $barang->tanggal;
			$row[] = '<a href="javascript:void(0)" onclick="addStok('."'".$barang->id_barang."'".')" class="btn btn-xs btn-info"><i class="fa fa-plus-square"></i></a>';

			//add html for action
      $row[] = '<a class="btn btn-xs btn-warning" href="javascript:void(0)" onclick="editBarang('."'".$barang->id_barang."'".')"><i class="fa fa-pencil-square-o"></i></a>
				  <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="hapus('."'".$barang->id_barang."'".')"><i class="fa fa-trash-o"></i></a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Barang_model->count_all(),
						"recordsFiltered" => $this->Barang_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

}
