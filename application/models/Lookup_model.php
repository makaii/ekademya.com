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


}
 ?>