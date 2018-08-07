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
				$this->session->set_userdata('admin_type', $admin->admin_type);
				return true;
			}			
		}
		else
		{
			return false;
		}
	}

	// display the categories
	public function display_categories()
	{
		$query = $this->db->select('category_name')->get('category_tbl');
		$query = $query->row_array();
		if ($query['category_name'])
		{
			return $query['category_name'];
		}
		else
			return false;
	}

	// settings functions
	public function display_userdata()
	{
		$query = $this->db->select('display_userdata')->get('settings_tbl');
		$query = $query->row_array();
		if ($query['display_userdata']==1)
		{
			return true;
		}
		else return false;
	}
	public function set_display_userdata($bool)
	{
		if (isset($bool))
		{
			$this->db->query("UPDATE settings_tbl SET display_userdata=$bool LIMIT 1");
		}
		else return false;
	}
	public function display_feedback()
	{
		$query = $this->db->select('display_feedback')->get('settings_tbl');
		$query = $query->row_array();
		if ($query['display_feedback']==1)
		{
			return true;
		}
		else return false;
	}
	public function set_display_feedback($bool)
	{
		if (isset($bool))
		{
			$this->db->query("UPDATE settings_tbl SET display_feedback=$bool LIMIT 1");
		}
		else return false;
	}

}
 ?>