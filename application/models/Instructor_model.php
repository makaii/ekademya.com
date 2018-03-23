<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function save_course($title, $author, $date, $category)
	{
		if (!empty($title))
		{
			$course_data = array(
				'course_title' => $title ,
				'course_author' => $author,
				'course_date_created' => $date,
				'course_category' => $category,
			);
			$this->db->insert('course_tbl', $course_data);
			return true;
		}
		else
			return false;
	}

	public function archieve_course($title, $author, $instructor)
	{
		if (!empty($title)&&!empty($author)&&!empty($instructor))
		{
			if ($author == $instructor)
			{
				$query_data = array(
					'course_status' => 0,
					'course_published' => 0, 
				);
				$this->db->where('course_title', $title);
				$this->db->where('course_author', $author);
				$query = $this->db->update('course_tbl',$query_data);
				if ($this->db->affected_rows()==1)
				{
					// archieve success
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

	public function get_course_id($title, $email)
	{
		if (!empty($title)&&!empty($email))
		{
			$query = $this->db->select('course_id')->where('course_title',$title)->where('course_author',$email)->where('course_status',1)->get('course_tbl');
			if ($query->num_rows()==1)
			{
				$query = $query->row()->course_id;
				return $query;
			}
		}
	}

	public function check_if_their_course($email, $id)
	{
		if (!empty($email)&&!empty($id)) {
			$query = $this->db->select()->where('course_author',$email)->where('course_id', $id)->where('course_status',1)->get('course_tbl');
			if ($query->num_rows()>=1)
			{
				return true;
			}
			else
				return false;
		}
		else
			return false;
	}
	public function check_if_their_section($email,$id)
	{
		$query = $this->db->select()->from('section_tbl')->where('id',$id)->where('author',$email)->get();
		if ($query->num_rows()==1)
		{
			return true;
		}
		else
			return false;
	}

	public function get_course_info($email, $id)
	{
		if (!empty($email)&&!empty($id))
		{
			$query = $this->db->select()->where('course_id',$id)->where('course_author', $email)->where('course_status', 1)->get('course_tbl');
			if ($query->num_rows()==1)
			{
				$query = $query->row_array();
				return $query;
			}
			else
				return null;
		}
		else
			return false;
	}

	public function get_instructors_courses($email)
	{
		if (!empty($email))
		{
			$query = $this->db->select()->where('course_author', $email)->where('course_status', 1)->get('course_tbl');
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

	public function manage_course_goals($tools,$audience,$achievement,$id,$author)
	{
		if ((isset($tools))&&(isset($audience))&&(isset($achievement))&&(isset($id))&&(isset($author)))
		{
			$this->db->set('course_tools',$tools);
			$this->db->set('course_audience',$audience);
			$this->db->set('course_achievement',$achievement);
			$this->db->where('course_id',$id);
			$this->db->where('course_author',$author);
			$this->db->update('course_tbl');
			if ($this->db->affected_rows()==1)
			{
				return true;
			}
			else return false;
		}
		else return false;
	}
	public function manage_course_landing_page($title,$description,$id,$author)
	{
		if ((isset($title))&&(isset($description))&&(isset($id))&&(isset($author)))
		{
			$this->db->set('course_title',$title);
			$this->db->set('course_description',$description);
			$this->db->where('course_id',$id);
			$this->db->where('course_author',$author);
			$this->db->update('course_tbl');
			if ($this->db->affected_rows()==1)
			{
				return true;
			}
			else return false;
		}
		else return false;
	}

















	public function add_section($data)
	{
		$this->db->insert('outline_tbl', $data);
	}
	public function del_section($data)
	{
		$query = $this->db->where('outline_course_id',$data['outline_course_id'])
		->where('outline_section_title',$data['outline_section_title'])
		->delete('outline_tbl');
	}

	public function get_sections($data)
	{
		$query = $this->db->select()->from('outline_tbl')->where('outline_course_id',$data['outline_course_id'])->get();
		return $query->result_array();
	}
	public function get_section_title($course_id, $section_id)
	{
		$query = $this->db->select('outline_section_title')->from('outline_tbl')->where('outline_course_id',$course_id)->where('outline_id',$section_id)->get();
		if ($query->num_rows()==1)
		{
			$query = $query->row_array();
			return $query['outline_section_title'];
		}
	}
	public function add_video_lecture($video_file_array)
	{
		$query = $this->db->insert('outline_tbl', $video_file_array);
		if ($this->db->affected_rows() == 1)
		{
			return true;
		}
		else return false;
	}

}
 ?>