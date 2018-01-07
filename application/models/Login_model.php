<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	// private function authenticate($email, $password)
	// {
	// 	$hash = $this->db->where('user_email', $email)->get('user_tbl')->row()->user_password;
	// 	return password_verify($password, $hash); 
	// }

	public function authenticate($email, $password)
	{
		if (empty($email) && empty($password))
		{
			return false;
		}
		else
		{
			$authenticate_query = $this->db->select('*')->from('user_tbl')->where('user_email', $email)->where('user_status', 1)->get();

			$hash = $this->db->where('user_email', $email)->get('user_tbl')->row()->user_password;
			$password_verify = password_verify($password, $hash);
			if (($authenticate_query->num_rows()) == 1 &&($password_verify == 1))
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
			$get_acc_info_qeury = $this->db->select('*')->where('user_email', $email)->where('user_password', $password)->where('user_status', 1)->get('user_tbl');
			if ($get_acc_info_qeury->num_rows() == 1)
			{
				return $get_acc_info_qeury->row();
				// if ($this->authenticate($email, $password))
				// {
				// 	return $get_acc_info_qeury->row();
				// }
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
				// 'user_password' => $password,
				 );
			$this->db->insert('user_tbl', $data);
			return true;
		}
		
	}

	public function register_instructor($data, $instructor_data)
	{
		$this->db->insert('instructor_tbl',$instructor_data);
		$this->register($data['user_email'], $data['user_password']);
		return true;
	}

}
 ?>