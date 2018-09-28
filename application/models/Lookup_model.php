<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Lookup_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_user_profile($id)
	{
		$profile = $this->db->select()->where('user_id', $id)->where('user_status',1)->get('user_tbl');
		if ($profile->num_rows() == 1 ) {
			return $profile->row_array();
		}
		else
			return false;
		
	}

	public function search_course($input)
	{
		$query = $this->db->select()->from('course_tbl')
				->where('course_status', 1)
				->where('course_published',1)
				->where('course_review',1)
				->where('course_title',$input)
					// ->group_start()
					// 	->where('course_title',$input)
					// 	->or_where('course_description',$input)
					// 	->or_group_start()
					// 		->like('course_title',$input,'before')
					// 		->or_like('course_title',$input,'after')
					// 		->or_like('course_title',$input,'both')
					// 		->or_like('course_description',$input,'after')
					// 		->or_like('course_description',$input,'after')
					// 		->or_like('course_description',$input,'both')
					// 	->group_end()
					// ->group_end()
				->join('user_tbl','user_tbl.user_id = course_tbl.course_author')
				->join('category_tbl','category_tbl.category_id = course_tbl.course_category')
				->get();
		if ($query->num_rows()>=1)
		{
			return $query->result_array();
		}
		else
			return null;
	}

	public function get_category()
	{
		$query = $this->db->select()->get('category_tbl');
		if ($query->num_rows()>=1)
		{
			$query = $query->result_array();
			return $query;
		}
		else
			return false;
	}

	public function get_course($course_id)
	{
		$query = $this->db->select()
		->from('course_tbl')
		->where('course_id',$course_id)
		->where('course_status',1)
		->where('course_published',1)
		->join('user_tbl','user_tbl.user_id = course_tbl.course_author')
		->join('category_tbl','category_tbl.category_id = course_tbl.course_category')
		->get();
		if ($query->num_rows()==1)
		{
			return $query->row_array();
		}
		else
			return false;
	}
	// public function get_course_outline($course_id)
	// {
	// 	$query = $this->select()
	// 	->where
	// 	->from('outline');
	// 	if ($query->num_rows==1)
	// 	{
	// 		return $query->row_array();
	// 	}
	// 	else
	// 		return false;
	// }


}
 ?>