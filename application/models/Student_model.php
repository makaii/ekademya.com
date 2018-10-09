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

	public function get_mycourse_data($course_id)
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
	public function get_mycourse_outline($course_id)
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
	public function get_mycourse_outline_only($course_id)
	{
		$query = $this->db->select()
		->where('outline_course_id',$course_id)
		->where('outline_status',1)
		->get('outline_tbl');
		if ($query->num_rows()>=1) {
			return $query->result_array();
		}
		else
			return null;
	}
	public function get_mycourse_outline_video($outline_id)
	{
		$query = $this->db->select()
		->from('video_tbl')
		->where('video_outline_id',$outline_id)
		->get();
		if ($query->num_rows()==1) {
			return $query->row_array();
		}
		else
			return show_404();
	}
	public function get_mycourse_outline_lecture($outline_id)
	{
		$query = $this->db->select()
		->from('lecture_tbl')
		->where('lecture_outline_id',$outline_id)
		->get();
		if ($query->num_rows()==1) {
			return $query->row_array();
		}
		else
			return show_404();
	}

	public function get_mycourse_progress($student_id,$course_id)
	{
		$query = $this->db->select()
		->from('outline_tbl')
		->where('outline_course_id',$course_id)
		->join('progress_tbl','progress_tbl.progress_outline = outline_tbl.outline_id','left')
		->get();
		if ($query->num_rows()>=1) {
			return $query->result_array();
		}
		else
			return null;
	}
	public function post_progress($student_id,$course_id,$outline_id)
	{
		$data = array(
			'progress_student' => $student_id,
			'progress_course' => $course_id,
			'progress_outline' => $outline_id,
		);
		$this->db->insert('progress_tbl',$data);
		if ($this->db->affected_rows()==1) {
			return true;
		}
		else
			return false;
	}
	public function check_if_progress_exist($student_id,$course_id,$outline_id)
	{
		$query = $this->db->select()
		->where('progress_student', $student_id)
		->where('progress_course', $course_id)
		->where('progress_outline', $outline_id)
		->get('progress_tbl');
		if ($query->num_rows()==1) {
			return true;
		}
		else
			return false;
	}
	public function post_final_project($user_id, $course_id, $file_name)
	{
		$query = $this->db->select()
		->from('project_tbl')
		->where('project_student',$user_id)
		->where('project_course',$course_id)
		->get();

		if ($query->num_rows()>=1) {
			$this->db->set('project_url',$file_name);
			$this->db->where('project_student',$user_id);
			$this->db->where('project_course',$course_id);
			$this->db->update('project_tbl');
			if ($this->db->affected_rows()==1) {
				return true;
			}
			else
				return false;
		}
		else
		{
			$data = array(
				'project_student' => $user_id,
				'project_course' => $course_id,
				'project_url' => $file_name,
			);
			$this->db->insert('project_tbl',$data);
			if ($this->db->affected_rows()==1) {
				return true;
			}
			else
				return false;
		}
	}
	public function get_mycourse_project($user_id, $course_id)
	{
		$query = $this->db->select()
		->where('project_student', $user_id)
		->where('project_course', $course_id)
		->get('project_tbl');
		if ($query->num_rows()==1) {
			return $query->row_array();
		}
		else
			return null;
	}

}
 ?>