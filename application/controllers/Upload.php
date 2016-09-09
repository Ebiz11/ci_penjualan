<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

  public function __construct(){
    parent::__construct();

    if($this->session->userdata('status') != "login"){
			redirect('login');
		}

  }
	public function index(){
		if (isset($_POST['btnSubmit'])) {
      // $field_name="gambar";

      $config=[
        'upload_path' =>'./uploads/',
        'allowed_types' => 'gif|jpg|png',
        'max_size' => '2000'
      ];

      $this->load->library('upload',$config);

      if ($this->upload->do_upload()) {
        $this->load->views('upload_success_view', ['data'=>$this->upload->data()]);
      }else {
        $this->load->view('upload');
      }
    }else{
      $this->load->view('upload');
    }
	}
}
