<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_hash_pass($password)
	{
		$query = $this->db->select()->where('user_password', $password)->get('user_tbl');
		$password = $query->row();
		return $password;
	}

}
 ?>