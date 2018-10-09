<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_courses_by_category($course_code)
	{
		$query = $this->db->select()
		->from('course_tbl')
		->join('category_tbl','category_tbl.category_id = course_tbl.course_category')
		->join('user_tbl','user_tbl.user_id = course_tbl.course_author')
		->where('category_tbl.category_code',$course_code)
		->where('course_published',1)
		->where('course_status',1)
		->order_by('course_id')
		->get();
		if ($query->num_rows()>=1) {
			return $query->result_array();
		}
		else
			return null;
	}

	public function enroll_course($course_id,$user_id)
	{
		$query = $this->db->select()
		->where('enroll_course',$course_id)
		->where('enroll_student',$user_id)
		->get('enroll_tbl');
		if ($query->num_rows()>=1)
		{
			return false;
		}
		else
		{
			$enroll_data = array(
				'enroll_student' => $user_id,
				'enroll_course' => $course_id,
			);
			$this->db->insert('enroll_tbl',$enroll_data);
			if ($this->db->affected_rows()==1)
			{
				$this->access_first_outline($user_id,$course_id);
				$this->session->unset_userdata('enroll_course_id');
				return true;
			}
			else
				return false;
		}
	}

	public function access_first_outline($user_id,$course_id)
	{
		$first_outline = $this->db->select()
		->from('outline_tbl')
		->where('outline_course_id',$course_id)
		->order_by('outline_id')
		->get();
		$first_outline = $first_outline->row_array();
		$first_outline = $first_outline['outline_id'];
		$data = array(
			'progress_student' => $user_id,
			'progress_course' => $course_id,
			'progress_outline' => $first_outline,
		);
		$query = $this->db->insert('progress_tbl',$data);
	}

}
 ?>