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

}
 ?>