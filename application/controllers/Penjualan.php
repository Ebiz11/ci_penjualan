<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect('login');
		}

		// $this->load->model('Penjualan_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('template/header');
    $this->load->view('template/navigasi');
		$data['judul'] = "Data Penjualan";
		$data['penjualan'] = $this->Penjualan_model->get_data_join();
		$this->load->view('penjualan/index', $data);
    $this->load->view('template/footer');
	}

	public function chart(){
		$this->load->view('template/header');
    $this->load->view('template/navigasi');
		$data['judul'] = "Chart Penjualan";
		$this->load->view('penjualan/chart', $data);
    $this->load->view('template/footer');
	}

	public function data_chart(){
		$data = $this->Penjualan_model->chart();
		echo $data;
	}

	public function details($id){
		$this->load->view('template/header');
    $this->load->view('template/navigasi');
		$data['judul'] = "Detail Transaksi";
		$data['penjualan'] = $this->Penjualan_model->get_data_join_details($id);
		$this->load->view('penjualan/detail',$data);
    $this->load->view('template/footer');
	}

	public function tambah($total){
		$last_id = $this->Penjualan_model->insert_transaksi($total);
		$this->Penjualan_model->insert($last_id);
		$this->Penjualan_model->delete_keranjang();
		redirect('keranjang');
	}

	public function hapus($id){
		$this->Penjualan_model->delete($id);
		redirect('penjualan');
	}
}
