<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_instructor_profile($id)
	{
		$profile = $this->db->select()->where('instructor_id', $id)->get('instructor_tbl');
		if ($profile->num_rows() == 1 ) {
			return $profile->row();
		}
		else
			return false;
		
	}

}
 ?>