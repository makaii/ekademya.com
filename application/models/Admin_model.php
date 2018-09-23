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
				$this->session->set_userdata('admin_data', $admin); // whole array
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
	public function get_unreviewed_courses($course_id=null)
	{
		if (empty($course_id))
		{
			$this->db->select();
			$this->db->where('course_status',1);
			$this->db->where('course_review',2);
			$this->db->where('course_published',0);
			$this->db->join('user_tbl','user_tbl.user_id = course_tbl.course_author');
			$this->db->join('category_tbl','category_tbl.category_id = course_tbl.course_category');
			$query = $this->db->get('course_tbl');
			if ($query->num_rows()>=1)
			{
				// return all
				return $query->result_array();
			}
			else
				return null;
		}
		elseif (!empty($course_id))
		{
			$this->db->select();
			$this->db->from('course_tbl');
			$this->db->where('course_id',$course_id);
			$this->db->join('user_tbl','user_tbl.user_id = course_tbl.course_author');
			$this->db->join('category_tbl','category_tbl.category_id = course_tbl.course_category');
			$query = $this->db->get();
			if ($query->num_rows()==1)
			{
				// return specific
				return $query->row_array();
			}
			else
				return false;
		}
		
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



	public function count_users()
	{
		$this->db->where('user_type','student');
		$this->db->where('user_status',1);
		$this->db->from('user_tbl');
		$query = $this->db->count_all_results();
		if ($query>=0)
		{
			return $query;
		}
		else return null;
	}
	public function count_instructors()
	{
		$this->db->where('user_type','instructor');
		$this->db->where('user_status',1);
		$this->db->from('user_tbl');
		$query = $this->db->count_all_results();
		if ($query>=0)
		{
			return $query;
		}
		else return null;
	}
	public function count_pubished_courses()
	{
		$this->db->where('course_status',1);
		$this->db->where('course_review',1);
		$this->db->where('course_published',1);
		$this->db->from('course_tbl');
		$query = $this->db->count_all_results();
		if ($query>=0)
		{
			return $query;
		}
		else return null;
	}
	public function count_courses_for_review()
	{
		$this->db->where('course_status',1);
		$this->db->where('course_review',2);
		$this->db->where('course_published',0);
		$this->db->from('course_tbl');
		$query = $this->db->count_all_results();
		if ($query>=0)
		{
			return $query;
		}
		else return null;
	}

	public function send_review_comments($course_id,$comment_array)
	{
		$serl_info = serialize($comment_array['review_course_info']);
		$serl_outline = serialize($comment_array['review_course_outline']);
		$this->db->trans_begin();
		$this->db->where('review_course_id',$course_id);
		$this->db->set('review_course_info',$serl_info);
		$this->db->set('review_course_outline',$serl_outline);
		$this->db->update('review_tbl');
		$this->db->trans_complete();
		if ($this->db->affected_rows()==1)
		{
			return true;
		}
		else
			return false;
	}
	public function publish_course($course_id)
	{
		// set course_published=1 && course_review=1
		if ($this->set_course_review_status($course_id,1))
		{
			$this->db->set('course_published',1);
			$this->db->set('course_review',1);
			$this->db->where('course_id',$course_id);
			$this->db->where('course_status',1);
			$this->db->update('course_tbl');
			if ($this->db->affected_rows()==1)
			{
				return true;
			}
			else
				return false;
		}
		else
			return false;
	}
	public function set_course_review_status($course_id,$value)
	{
		// set course_review
		// 0=draft
		// 1=published
		// 2=to be reviewd
		$this->db->set('course_review',$value);
		$this->db->where('course_id',$course_id);
		$this->db->where('course_status',1);
		$this->db->update('course_tbl');
		if ($this->db->affected_rows()==1)
		{
			return true;
		}
		else
			return false;
	}
	public function get_review_data($course_id)
	{
		$query = $this->db->select()->where('review_course_id',$course_id)->get('review_tbl');
		if ($query->num_rows()==1)
		{
			return $query->row_array();
		}
	}

}
 ?>