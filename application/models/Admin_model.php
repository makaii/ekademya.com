<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function authenticate_admin($email,$password)
	{
		if (!empty($email) && !empty($password))
		{
			$admin_query = $this->db->select()->where('admin_password',$password)->where('admin_email',$email)->where('admin_status', 1)->get('admin_tbl');
			if ($admin_query->num_rows() == 1)
			{
				$admin = $admin_query->row();
				$this->session->set_userdata('admin_logged_in', 1);
				$this->session->set_userdata('admin_data', $admin);
				$this->session->set_userdata('admin_email', $admin->admin_email);
				return true;
			}			
		}
		else
		{
			return false;
		}
	}

}
 ?>