<?php

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect('login');
		}

		$this->load->helper('url');
	}

	function index(){
    $this->load->view('template/header');
    $this->load->view('template/navigasi');
		$this->load->view('template/index');
    $this->load->view('template/footer');
	}

	public function barang(){
		redirect('barang');
	}

	public function pembelian(){
		redirect('pembelian');
	}

	public function penjualan(){
		redirect('penjualan');
	}

	public function transaksi(){
		redirect('keranjang/tambah');
	}

	public function keranjang(){
		redirect('keranjang/index');
	}

	// function login_validasi(){
	//
	// $timeout=450000;
	// $_SESSION['expires_by']=time()+$timeout;
	// }
	//
	// function cek_login(){
	//
	// $exp_time=$_SESSION['expires_by'];
	//
	// if(time()<$exp_time){
	// login_validasi();
	// return true;
	//
	// }else{
	// unset($_SESSION['expires_by']);
	//
	// return false;
	// }
	//
	// }
}
