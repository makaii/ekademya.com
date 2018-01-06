<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function can_login($email, $password)
	{
		if (empty($email) && empty($password))
		{
			return false;
		}
		else
		{
			$can_login_query = $this->db->select('*')->from('user_tbl')->where('user_email', $email)->where('user_status', 1)->get();
			if ($can_login_query->num_rows() == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}

	public function get_acc_info($email, $password, $can_log_in=false)
	{
		if (empty($email) && $can_log_in == false) {
			return false;
		}
		elseif($can_log_in == true)
		{
			$get_acc_info_qeury = $this->db->select('*')->where('user_email', $email)->where('user_status', 1)->get('user_tbl');
			if ($get_acc_info_qeury->num_rows() == 1)
			{
				// return $get_acc_info_qeury->row();
				if ($this->authenticate($email, $password))
				{
					return $get_acc_info_qeury->row();
				}
			}
			else
			{
				return false;
			}
		}
	}

	public function register($email, $password)
	{
		if (empty($email) && empty($password))
		{
			return false;
		}
		else
		{
			$data = array(
				'user_email' => $email,
				'user_password' => password_hash($password, PASSWORD_BCRYPT),
				 );
			$this->db->insert('user_tbl', $data);
			return true;
		}
		
	}

	private function authenticate($email, $password)
	{
		$hash = $this->db->where('user_email', $email)->get('user_tbl')->row()->user_password;
		return password_verify($password, $hash);
	}

}
 ?>