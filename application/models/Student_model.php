<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_student_courses($student_id)
	{
		if (!empty($student_id))
		{
			$query = $this->db->select()
			->from('enroll_tbl')
			->where('enroll_student',$student_id)
			->where('enroll_status',1)
			->join('course_tbl','course_tbl.course_id = enroll_tbl.enroll_course')
			->join('user_tbl','user_tbl.user_id = course_tbl.course_author')
			->get();
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

	public function get_my_course_data($course_id)
	{
		$query = $this->db->select()
		->from('course_tbl')
		->where('course_id',$course_id)
		->join('user_tbl','user_tbl.user_id = course_tbl.course_author')
		->join('category_tbl','category_tbl.category_id = course_tbl.course_category')
		->get();
		if ($query->num_rows()==1) {
			return $query->row_array();
		}
		else
			return false;
	}
	public function get_my_course_outline($course_id)
	{
		$query = $this->db->query("
			SELECT *
			FROM outline_tbl AS o
			    LEFT OUTER JOIN lecture_tbl AS l ON o.outline_id = l.lecture_outline_id
			    LEFT OUTER JOIN video_tbl AS v ON o.outline_id = v.video_outline_id
			WHERE o.outline_course_id = $course_id
			ORDER BY o.outline_id
			");
		if ($query->num_rows()>=1)
		{
			return $query->result_array();
		}
		else
			return false;
	}

}
 ?>