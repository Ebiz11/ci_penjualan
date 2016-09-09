<?php

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		// $this->load->model('Login_model');

	}


	function index(){
		$this->load->view('login/index');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => $password
			);

		$cek = $this->Login_model->cek_login($where);

		if($cek->num_rows() > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
			// $this->login_validasi();

			redirect('admin');

		}else{
			echo "Username dan password salah !";

			// $pesan = "Username dan password salah !";
			// $this->session->set_userdata('pesan', $pesan);
      redirect('login');
		}
	}

// 	function login_validasi(){
//
// 	$timeout=5000;
// 	$_SESSION['expires_by']=time()+$timeout;
// 	}
//
// 	function cek_login(){
//
// 	$exp_time=$_SESSION['expires_by'];
//
// 	if(time()<$exp_time){
// 		$this->login_validasi();
// 	return true;
//
// 	}else{
// 	unset($_SESSION['expires_by']);
// 	$this->session->sess_destroy();
// 	return false;
// 	}
// }

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
