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
			$query = $this->db->select()->from('user_tbl')->where('user_email', $email)->where('user_status', 1)->get();

			if ($query->num_rows()==1)
			{
				$hash = $query->row()->user_password;				
				$password_verify = password_verify($password, $hash);
				if ($password_verify == 1)
				{
					$user_id = $query->row()->user_id;
					$this->session->set_userdata('user_id', $user_id);

					$user_name = $query->row()->user_fname." ".$query->row()->user_lname;
					ucwords($this->session->set_userdata('user_name', $user_name));

					$email = $query->row()->user_email;
					$this->session->set_userdata('user_email', $email);

					$user_type = $query->row()->user_type;
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

	public function register($data)
	{
		if (!empty($data))
		{
			$data['user_password'] = password_hash($data['user_password'], PASSWORD_BCRYPT);
			$this->db->insert('user_tbl', $data);
			return true;
		}
		else
			return false;
	}

	public function post_verification($email,$code)
	{
		$data = array(
			'verify_email' => $email,
			'verify_code' => $code,
		);
		$this->db->insert('verify_tbl',$data);
		if ($this->db->affected_rows()==1) {
			return true;
		}
		else
			return false;
	}

	public function get_verification($code)
	{
		$query = $this->db->select()
		->where('verify_code',$code)
		->where('verify_status',1)
		->get('verify_tbl');
		$verify_row = $query->row_array();
		if ($query->num_rows()==1) {
			$query = $this->db->select()
			->where('user_email',$verify_row['verify_email'])
			->where('user_verify',0)
			->get('user_tbl');
			if ($query->num_rows()==1) {

				$verify_update = $this->db->set('verify_status', 0)
				->where('verify_code', $code)
				->update('verify_tbl');
				if ($this->db->affected_rows()==1) {
					$user_update = $this->db->set('user_verify', 1)
					->where('user_email', $verify_row['verify_email'])
					->update('user_tbl');
					if ($this->db->affected_rows()==1) {
						return true;
					}
					else
						return false;
				}
				else
					return false;
			}
			else
				return false;
		}
		else
			return false;
	}

}
 ?>