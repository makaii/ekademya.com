<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_courses($email)
	{
		if (!empty($email))
		{
			$query = $this->db->select()->from('enroll_tbl')->where('enroll_email', $email)->get();
			if ($query->num_rows() != 0)
			{
				// return result array
			}
			elseif ($query->num_rows() == 0)
			{
				return null;
			}
		}
		else
			return false;
	}

	public function get_profile_info($id)
	{
		$query = $this->db->select()->from('user_tbl')->where('user_id', $id)->get();
		
		if (!empty($id))
		{
			if ($query->num_rows()==1)
			{
				return $query->row_array();
			}
			else
				show_404();
		}
		else
			show_404();
	}

}
 ?>