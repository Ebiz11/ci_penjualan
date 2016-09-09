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

		// $this->load->model('Barang_model');
    // $this->load->model('Keranjang_model');
		$this->load->helper('url');
		// $this->cek_login();
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

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_barang', 'id_barang', 'required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'required');

		if($this->form_validation->run() === FALSE){

		$this->load->view('template/header');
		$this->load->view('template/navigasi');
		$data['judul'] = "Form Transaksi";
		unset($_SESSION['post']);
		$this->load->view('keranjang/tambah', $data);
		$this->load->view('template/footer');

		}elseif ($this->input->post('jumlah')<0 OR $this->input->post('jumlah') > $data['stok']) {

			$this->load->view('template/header');
			$this->load->view('template/navigasi');

			// buat session
			if ($this->input->post('jumlah')<0) {
				$_SESSION['gagal'] = "Kolom jumlah tidak boleh minus"; //session notifikasi
			}else {
				$_SESSION['gagal'] = "Stok tidak mencukupi"; //session notifikasi
			}
			$_SESSION['post'] = $this->input->post(); // session data post
			//

			$data['judul'] = "Form Transaksi";
			$this->load->view('keranjang/tambah', $data);
			$this->load->view('template/footer');

		}else{
	    $this->Keranjang_model->insert($data['harga_jual']);
	    redirect('keranjang');
		}
	}

  public function hapus($id){
    $this->Keranjang_model->delete($id);
    redirect('keranjang');
  }

  public function load_data_barang(){
    $id = $this->input->post('parent_id');
    $data = $this->Keranjang_model->load_barang($id);
    die(json_encode($data));
  }

}
