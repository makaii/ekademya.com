<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function show_courses_by_category($category)
	{
		if (!empty($category))
		{
			$query = $this->db->select()->from('course_tbl')->where('course_category',$category)->where('course_published',1)->get();
			if ($query->num_rows()>=1)
			{
				$query = $query->result_array();
				return $query;
			}
			else
				return null;
		}
		else
			return false;
	}

	public function enroll_course($course_id,$user_id)
	{
		$enroll_data = array(
			'enroll_student' => $user_id,
			'enroll_course' => $course_id,
		);
		$query = $this->db->insert('enroll_id',$enroll_data);
		if ($query->affected_rows()==1)
		{
			return true;
		}
		else
			return false;
	}

}
 ?>