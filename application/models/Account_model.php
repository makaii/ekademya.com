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
			$query = $this->db->select()->where('enroll_student', $email)->get('enroll_tbl');
			if ($query->num_rows() >= 1)
			{
				return $query->result_array();
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

	public function update_profile_info($id , $data)
	{
		$this->db->trans_start();
		$this->db->where('user_id',$id)->update('user_tbl', $data);
		$this->db->trans_complete();

		$query = $this->db->select()->where('user_id',$id)->from('user_tbl')->get();
		$query = $query->row_array();
		$new_user_name = $query['user_fname']." ".$query['user_lname'];
		$this->session->set_userdata('user_name',$new_user_name);
		// if ($this->db->affected_rows()==1)
		// {
		// 	return true;
		// }
		// else return false;
	}

	public function update_profile_photo($id, $data)
	{
		$this->db->where('user_id',$id)->update('user_tbl', $data);
	}

	public function update_account_password($id, $currentpassword, $newpassword)
	{
		$query = $this->db->select()->from('user_tbl')->where('user_id',$id)->get();
		$query = $query->row_array();
		$hash = $query['user_password'];
		if (password_verify($currentpassword,$hash)==true)
		{
			$newpassword = password_hash($newpassword, PASSWORD_BCRYPT);
			$this->db->set('user_password',$newpassword)->where('user_id',$id)->update('user_tbl');
			return true;
		}
		else return false;
	}

	public function delete_account($id)
	{
		$this->db->where('user_id',$id)->set('user_status',0)->update('user_tbl');
		if ($this->db->affected_rows()==1)
		{
			return true;
		}
		return false;
	}

}
 ?>