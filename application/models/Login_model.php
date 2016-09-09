<?php

/**
 *
 */
class Login_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  	function cek_login($where){
  	return $this->db->get_where('admin',$where);
    
  	}
}
