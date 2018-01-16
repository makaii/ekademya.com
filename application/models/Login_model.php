<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function authenticate($email, $password)
	{
		if (!empty($email) && !empty($password))
		{
			$authenticate_query = $this->db->select('*')
			->from('user_tbl')
			->where('user_email', $email)
			->where('user_status', 1)
			->get();

			if ($authenticate_query->num_rows()==1)
			{
				$hash = $authenticate_query->row()->user_password;				
				$password_verify = password_verify($password, $hash);
				if ($password_verify == 1)
				{
					$email = $authenticate_query->row()->user_email;
					$this->session->set_userdata('email', $email);
					$user_type = $authenticate_query->row()->user_type;
					$this->session->set_userdata('user_type', $user_type);
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	public function register($email, $password, $user_type)
	{
		if (!empty($email) && !empty($password))
		{
			$data = array(
				'user_email' => $email,
				'user_password' => password_hash($password, PASSWORD_BCRYPT),
				'user_type' => $user_type
				 );
			$this->db->insert('user_tbl', $data);
			return true;
		}
		else
			return false;
			
		
	}

	public function register_instructor($data, $instructor_data)
	{
		if (!empty($data) && !empty($instructor_data))
		{
			$this->db->insert('instructor_tbl',$instructor_data);
			$this->register($data['user_email'], $data['user_password'], "instructor");
			return true;
		}
		else
			return false;
		
	}

}
 ?>