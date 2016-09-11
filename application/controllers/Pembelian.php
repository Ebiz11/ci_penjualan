<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {


	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect('login');
		}

		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('template/header');
    $this->load->view('template/navigasi');
		$data['judul'] = "Data Pembelian";
		$data['pembelian'] = $this->Pembelian_model->get_data_join();
		$this->load->view('pembelian/index', $data);
    $this->load->view('template/footer');
	}

	public function chart(){
		$this->load->view('template/header');
    $this->load->view('template/navigasi');
		$data['judul'] = "Chart Pembelian";
		$this->load->view('pembelian/chart', $data);
    $this->load->view('template/footer');
	}

	public function data_chart(){
		$data = $this->Pembelian_model->chart();
		echo $data;
	}

	public function tambah(){
		$this->load->helper('form');
    $this->load->library('form_validation');

		$this->form_validation->set_rules('id_barang', 'id_barang', 'required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'required');
		$this->form_validation->set_rules('sub_total', 'sub_total', 'required');

		if($this->form_validation->run() === FALSE){
		$this->load->view('template/header');
    $this->load->view('template/navigasi');
		$data['judul'] = "Form Data Pembelian";
    $this->load->view('pembelian/tambah', $data);
    $this->load->view('template/footer');
  }else{
		$last_id = $this->Penjualan_model->insert_transaksi_beli($this->input->post('sub_total'));
    $this->Pembelian_model->insert($last_id);
    redirect('pembelian');
  }
	}

	public function hapus($id){
		$this->Pembelian_model->delete($id);
		redirect('pembelian');
	}

}
