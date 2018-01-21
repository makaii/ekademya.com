<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function search_course($input)
	{
		$query = $this->db->select()->from('course_tbl')
				->where('course_status', 1)
					->group_start()
						->where('course_title',$input)
						->or_where('course_description',$input)
						->or_group_start()
							->like('course_title',$input,'before')
							->or_like('course_title',$input,'after')
							->or_like('course_title',$input,'both')
							->or_like('course_description',$input,'after')
							->or_like('course_description',$input,'after')
							->or_like('course_description',$input,'both')
						->group_end()
					->group_end()->get();
	}

	public function save_course($title, $author, $date, $category)
	{
		if (!empty($title))
		{
			$course_data = array(
				'course_title' => $title ,
				'course_author' => $author,
				'course_creation_date' => $date,
				'course_category' => $category,
			);
			$this->db->insert('course_tbl', $course_data);
			return true;
		}
		else
			return false;
	}

}
 ?>