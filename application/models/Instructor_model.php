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

	public function archieve_course($course_id, $authorpass, $instructor_id, $instructor_email)
	{
		if (!empty($course_id)&&!empty($authorpass)&&!empty($instructor_id)&&!empty($instructor_email))
		{
			$this->load->model('Login_model');
			$real_author = $this->Login_model->authenticate($instructor_email,$authorpass);
			if ($real_author == true)
			{
				$this->db->trans_begin();
				$this->db->set('course_status',0);
				$this->db->set('course_published',0);
				$this->db->where('course_id', $course_id);
				$this->db->where('course_author', $instructor_id);
				$query=$this->db->update('course_tbl');
				if ($this->db->trans_status()===true)
				{
					// archieve success
					$this->db->trans_complete();
					return true;
				}
				else
					$this->db->trans_rollback();
					return false;
			}
			else
				return fasle;		
		}
		else
			return false;
	}

	public function get_course_id($title, $instructor_id)
	{
		if (!empty($title)&&!empty($instructor_id))
		{
			$query = $this->db->select('course_id')->where('course_title',$title)->where('course_author',$instructor_id)->where('course_status',1)->get('course_tbl');
			if ($query->num_rows()==1)
			{
				$query = $query->row()->course_id;
				return $query;
			}
		}
	}

	public function check_if_their_course($instructor_id, $course_id)
	{
		if (!empty($instructor_id)&&!empty($course_id)) {
			$query = $this->db->select()->where('course_author',$instructor_id)->where('course_id', $course_id)->where('course_status',1)->get('course_tbl');
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

	public function get_course_info($instructor_id, $course_id)
	{
		if (!empty($instructor_id)&&!empty($course_id))
		{
			$query = $this->db->select()->where('course_id',$course_id)->where('course_author', $instructor_id)->where('course_status', 1)->get('course_tbl');
			if ($query->num_rows()>=1)
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

	public function get_instructors_courses($instructor_id)
	{
		if (!empty($instructor_id))
		{
			$query = $this->db->select()->where('course_author', $instructor_id)->where('course_status', 1)->get('course_tbl');
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

	public function manage_course_goals($tools,$audience,$achievement,$id,$author_id)
	{
		if ((isset($tools))&&(isset($audience))&&(isset($achievement))&&(isset($id))&&(isset($author_id)))
		{
			$this->db->set('course_tools',$tools);
			$this->db->set('course_audience',$audience);
			$this->db->set('course_achievement',$achievement);
			$this->db->where('course_id',$id);
			$this->db->where('course_author',$author_id);
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












	public function add_outline($outline_array)
	{
		if (!empty($outline_array))
		{
			$outline = $outline_array;
			$outline_data = array(
				'outline_course_id' => $outline['outline_course_id'],
				'outline_type' => $outline['outline_type'],
			);
			$query = $this->db->insert('outline_tbl',$outline_data);
			$ref_outline_id = $this->db->insert_id();
			if ($this->db->affected_rows()==1)
			{
				if ($outline_array['outline_type']=="video")
				{
					if ($this->add_video($outline['video_file_array'],$ref_outline_id))
					{
						return true;
					}
					else
					{
						return false;
					}
				}
				elseif ($outline_array['outline_type']=="lecture")
				{
					if ($this->add_lecture($outline['lecture_title'],$outline['lecture_body'],$ref_outline_id))
					{
						return true;
					}
					else
					{
						return false;
					}
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	public function add_video($video_file_array,$outline_id)
	{
		$query = $this->db->insert('outline_tbl', $video_file_array);
		if ($this->db->affected_rows() == 1)
		{
			return true;
		}
		else return false;
	}
	public function add_lecture($lecture_title, $lecture_body, $outline_id)
	{
		$lecture_data = array(
			'lecture_title' => $lecture_title,
			'lecture_body' => $lecture_body,
			'lecture_outline_id' => $outline_id,
		);
		$query = $this->db->insert('lecture_tbl',$lecture_data);
		if ($this->db->affected_rows()==1)
		{
			return true;	
		}
		else
		{
			return false;
		}
	}
	public function get_outline($course_id)
	{
		// $query = $this->db->select()->where('outline_course_id',$course_id)->get('outline_tbl');
		$query = $this->db->query("
			SELECT joined.* 
			FROM   (SELECT ot.outline_id, 
			               ot.outline_type, 
			               ot.outline_course_id, 
			               lt.lecture_id, 
			               lt.lecture_title,
			               lt.lecture_body,
			               NULL AS video_id, 
			               NULL AS video_title, 
			               NULL AS video_description, 
			               NULL AS video_url,
			               NULL AS video_thumbnail
			        FROM   outline_tbl ot 
			               INNER JOIN lecture_tbl lt 
			                       ON lt.lecture_outline_id = ot.outline_id 
			                          AND ot.outline_type = 'lecture' 
			        UNION ALL 
			        SELECT ot.outline_id, 
			               ot.outline_type, 
			               ot.outline_course_id, 
			               NULL AS lecture_id, 
			               NULL AS lecture_title, 
			               NULL AS lecture_body, 
			               vt.video_id, 
			               vt.video_title, 
			               vt.video_description, 
			               vt.video_url,
			               vt.video_thumbnail
			        FROM   outline_tbl ot 
			               INNER JOIN video_tbl vt 
			                       ON vt.video_outline_id = ot.outline_id 
			                          AND ot.outline_type = 'video') AS joined 
			WHERE  outline_course_id = $course_id; 	
		");
		if ($query->num_rows()>=1)
		{
			return $query->result_array();
		}
	}

}
 ?>