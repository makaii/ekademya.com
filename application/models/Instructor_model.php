<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function save_course($title, $author, $category, $type)
	{
		if (!empty($title))
		{
			$course_data = array(
				'course_title' => $title ,
				'course_author' => $author,
				'course_category' => $category,
				'course_type' => $type,
				'course_code' => random_string('alnum',16),
			);
			$this->db->insert('course_tbl', $course_data);
			$course_id = $this->db->insert_id();
			if ($this->create_review_row($course_id))
			{
				return true;
			}
		}
		else
			return false;
	}
	public function create_review_row($course_id)
	{
		$review_data = array('review_course_id' => $course_id);
		$this->db->insert('review_tbl',$review_data);
		if ($this->db->affected_rows()==1)
		{
			return true;
		}
		else
			return false;
	}

	public function delete_course($course_id, $authorpass, $instructor_id, $instructor_email)
	{
		if (!empty($course_id)&&!empty($authorpass)&&!empty($instructor_id)&&!empty($instructor_email))
		{
			$this->load->model('Login_model');
			$real_author = $this->Login_model->authenticate($instructor_email,$authorpass);
			if ($real_author == true)
			{
				$this->db->trans_begin();
				$this->db->set('course_status',0);
				$this->db->where('course_id', $course_id);
				$this->db->where('course_author', $instructor_id);
				$query=$this->db->update('course_tbl');
				if ($this->db->trans_status()===true)
				{
					// archive success
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
	public function archive_course($course_id, $authorpass, $instructor_id, $instructor_email)
	{
		if (!empty($course_id)&&!empty($authorpass)&&!empty($instructor_id)&&!empty($instructor_email))
		{
			$this->load->model('Login_model');
			$real_author = $this->Login_model->authenticate($instructor_email,$authorpass);
			if ($real_author == true)
			{
				$this->db->trans_begin();
				$this->db->set('course_archive',1);
				$this->db->set('course_published',0);
				$this->db->where('course_id', $course_id);
				$this->db->where('course_author', $instructor_id);
				$query=$this->db->update('course_tbl');
				if ($this->db->trans_status()===true)
				{
					// archive success
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
	public function unarchive_course($course_id, $authorpass, $instructor_id, $instructor_email)
	{
		if (!empty($course_id)&&!empty($authorpass)&&!empty($instructor_id)&&!empty($instructor_email))
		{
			$this->load->model('Login_model');
			$real_author = $this->Login_model->authenticate($instructor_email,$authorpass);
			if ($real_author == true)
			{
				$this->db->trans_begin();
				$this->db->set('course_archive',0);
				$this->db->set('course_published',1);
				$this->db->where('course_id', $course_id);
				$this->db->where('course_author', $instructor_id);
				$query=$this->db->update('course_tbl');
				if ($this->db->trans_status()===true)
				{
					// archive success
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
			$query = $this->db->select()
			->where('course_id',$course_id)
			->where('course_author', $instructor_id)
			->where('course_status', 1)
			->join('user_tbl','user_tbl.user_id = course_tbl.course_author')
			->join('category_tbl','category_tbl.category_id = course_tbl.course_category')
			->get('course_tbl');
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
			$query = $this->db->select()
			->where('course_author', $instructor_id)
			->where('course_status', 1)
			->get('course_tbl');
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

	public function save_course_info($course_info)
	{
		if (!empty($course_info))
		{
			$this->db->where('course_id',$course_info['course_id']);
			$this->db->where('course_author',$course_info['course_author']);
			$this->db->update('course_tbl',$course_info);
			if ($this->db->affected_rows()==1)
			{
				return true;
			}
			else
				return false;
		}
		else
			return false;
	}
	public function save_course_thumbnail($file_name,$course_id)
	{
		if (!empty($file_name))
		{
			$this->db->set('course_img_url',$file_name)
			->where('course_id',$course_id)
			->update('course_tbl');
			if ($this->db->affected_rows()==1)
			{
				return true;
			}
			else
				return false;
		}
		return false;
	}


	public function del_outline($course_id,$outline_id,$week_id)
	{
		$this->db
		->set('outline_status',0)
		->where('outline_id',$outline_id)
		->where('outline_course_id',$course_id)
		->where('outline_week_id',$week_id)
		->update('outline_tbl');
		if ($this->db->affected_rows()==1) {
			return true;
		}
		else
			return fale;
	}
	public function add_outline($outline_array)
	{
		// $outline_array = [
		// 	'outline_course_id' => $course_id,
		//  'outline_week_id' =>
		// 	'outline_type' => 'video|lecture',
		// 	'video_title' =>
		// 	'video_description' =>
		// 	'video_url' =>
		// 	'video_embed_url' =>
		// 	'lecture_title' =>
		// 	'lecture_body' =>
		// ];
		if (!empty($outline_array))
		{
			$outline = $outline_array;
			$outline_data = array(
				'outline_course_id' => $outline['outline_course_id'],
				'outline_week_id' => $outline['outline_week_id'],
				'outline_type' => $outline['outline_type'],
			);
			$query = $this->db->insert('outline_tbl',$outline_data);
			$ref_outline_id = $this->db->insert_id();
			if ($this->db->affected_rows()==1)
			{
				if ($outline_array['outline_type']=="video")
				{
					if ($this->add_video($outline['video_title'],$outline['video_description'],$outline['video_url'],$outline['video_embed_url'],$ref_outline_id))
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
					if ($this->add_lecture($outline['lecture_title'],$outline['lecture_body'],$outline['lecture_url'],$outline['lecture_orig'],$ref_outline_id))
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
	public function add_video($title,$desc,$file,$iframe,$outline_id)
	{
		$video_file_array = array(
			'video_outline_id' => $outline_id,
			'video_title' => $title,
			'video_description' => $desc,
			'video_url' => $file,
			'video_embed_url' => $iframe,
		);
		$query = $this->db->insert('video_tbl', $video_file_array);
		if ($this->db->affected_rows() == 1)
		{
			return true;
		}
		else return false;
	}
	public function add_lecture($lecture_title, $lecture_body, $lecture_url, $lecture_orig, $outline_id)
	{
		$lecture_data = array(
			'lecture_title' => $lecture_title,
			'lecture_body' => $lecture_body,
			'lecture_url' => $lecture_url,
			'lecture_orig' => $lecture_orig,
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
	public function add_new_week($course_id)
	{
		$this->db->set('week_code',	random_string('alnum',16))
		->set('week_course_id',$course_id)
		->insert('week_tbl');
		if ($this->db->affected_rows()==1) {
			return $this->db->insert_id();
		}
		else
			return false;
	}
	public function get_week_code($week_id)
	{
		$query = $this->db->select('week_code')
		->where('week_id',$week_id)
		->where('week_status',1)
		->get('week_tbl');
		if ($query->num_rows()==1) {
			return $query->row_array();
		}
		else
			return null;
	}
	public function get_course_weeks($course_id)
	{
		$query = $this->db->select()
		->where('week_course_id',$course_id)
		->where('week_status',1)
		->get('week_tbl');
		if ($query->num_rows()>=1) {
			return $query->result_array();
		}
		else
			return null;
	}
	public function del_week($week_id)
	{
		$this->db->set('week_status',0)
		->where('week_id',$week_id)
		->update('week_tbl');
		if ($this->db->affected_rows()==1) {
			$this->db->set('outline_status',0)
			->where('outline_week_id',$week_id)
			->update('outline_tbl');
			if ($this->db->affected_rows()==1) {
				return true;
			}
			else
				return false;
		}
		else
			return false;
	}
	public function get_weekly_outline($course_id,$week_id)
	{
		$query = $this->db->select()
		->from('outline_tbl')
		->join('video_tbl', 'video_tbl.video_outline_id = outline_id', 'left')
		->join('lecture_tbl', 'lecture_tbl.lecture_outline_id = outline_id', 'left')
		->join('quiz_tbl', 'quiz_tbl.quiz_outline_id = outline_id', 'left')
		->join('week_tbl', 'week_tbl.week_id = outline_tbl.outline_week_id')
		->where('outline_course_id',$course_id)
		->where('outline_status',1)
		->where('week_id', $week_id)
		->order_by('outline_id')
		->get();
		return $query->result_array();
	}
	public function get_outline_video($outline_id)
	{
		$query = $this->db->select()
		->join('outline_tbl','outline_tbl.outline_id = video_tbl.video_outline_id','left')
		->where('video_outline_id',$outline_id)
		->get('video_tbl');
		if ($query->num_rows()==1)
		{
			return $query->row_array();
		}
		else
			return null;
	}
	public function get_outline_lecture($outline_id)
	{
		$query = $this->db->select()
		->join('outline_tbl','outline_tbl.outline_id = lecture_tbl.lecture_outline_id','left')
		->where('lecture_outline_id',$outline_id)
		->get('lecture_tbl');
		if ($query->num_rows()==1)
		{
			return $query->row_array();
		}
		else
			return null;
	}
	public function update_outline_video($title,$desc,$file,$iframe,$outline_id)
	{
		$video_data = array(
			'video_title' => $title,
			'video_description' => $desc,
			'video_url' => $file,
			'video_embed_url' => $iframe,
			'video_outline_id' => $outline_id
		);
		$this->db->where('video_outline_id',$outline_id);
		$this->db->update('video_tbl',$video_data);
		if ($this->db->affected_rows()==1)
		{
			return true;
		}
		else return false;
	}
	public function update_outline_lecture($outline_id, $title, $body, $url, $orig)
	{
		$lecture_data = array(
			'lecture_title' => $title,
			'lecture_body' => $body,
			'lecture_url' => $url,
			'lecture_orig' => $orig,
		);
		$this->db->where('lecture_outline_id',$outline_id);
		$this->db->update('lecture_tbl',$lecture_data);
		if ($this->db->affected_rows()==1)
		{
			return true;
		}
		else return false;
	}


	// course_review
	// 0 = draft
	// 1 = published
	// 2 = for review
	public function set_course_review_2($course_id)
	{
		if (!empty($course_id))
		{
			$this->db->set('course_review',2);
			$this->db->where('course_id',$course_id);
			$this->db->update('course_tbl');
			if ($this->db->affected_rows()==1)
			{
				return true;
			}
		}
		else return false;
	}
	public function get_course_review($course_id)
	{
		$query = $this->db->select()
		->where('review_course_id',$course_id)
		->get('review_tbl');
		if ($query->num_rows()==1) {
			return $query->row_array();
		}
		else return false;
	}


	public function get_course_students($course_id)
	{
		$query = $this->db->select()
		->where('enroll_course',$course_id)
		->where('enroll_status',1)	
		->from('enroll_tbl')
		->join('user_tbl','user_tbl.user_id = enroll_tbl.enroll_student')
		->get();
		if ($query->num_rows()>=1) {
			return $query->result_array();
		}
		else
			return null;
	}

	public function get_next_lesson($course_id,$offset)
	{
		$query = $this->db->select()
		->where('outline_course_id',$course_id)
		->offset($offset)
		->limit(2)
		->get('outline_tbl');
		if ($query->num_rows()>=1)
		{
			return $query->result_array();
		}
		else
			return null;
	}

	public function get_final_projects($course_id)
	{
		$query = $this->db->select()
		->from('project_tbl')
		->where('project_course',$course_id)
		->where('project_status',1)
		->join('user_tbl','user_tbl.user_id = project_tbl.project_student')
		->get();
		if ($query->num_rows()>=1) {
			return $query->result_array();
		}
		else
			return null;
	}

	// quiz

	public function post_new_quiz($course_id, $week_id) {
		$outline_data = array(
			'outline_course_id' => $course_id,
			'outline_week_id' => $week_id,
			'outline_type' => 'quiz',
		);
		$this->db->insert('outline_tbl', $outline_data);
		if ($this->db->affected_rows()==1) {
			$outline_id = $this->db->insert_id();
			if (!empty($outline_id)) {
				$quiz_data = array(
					'quiz_outline_id' => $outline_id,
				);
				$this->db->insert('quiz_tbl',$quiz_data);
				if ($this->db->affected_rows()==1) {
					return $this->db->insert_id();
				}
				else
					return fale;
			}
			else
				return false;
		}
		else
			return false;
	}
	public function get_quiz($outline_id) {
		$quiz = [];

		// quiz
		$query = $this->db->select()
		->where('quiz_outline_id',$outline_id)
		->where('quiz_status', 1)
		->get('quiz_tbl');
		if ($query->num_rows()==1) {
			$query = $query->row_array();
			$quiz = $query;


			// questions
			$query = $this->db->select()
			->where('question_quiz_id', $quiz['quiz_id'])
			->where('question_status', 1)
			->get('quiz_question_tbl');
			if ($query->num_rows()>=1) {
				$query = $query->result_array();
				$quiz['quiz_questions'] = $query;


				// choices
				foreach ($quiz['quiz_questions'] as $key => $value) {
					$query = $this->db->select()
					->where('choice_question_id',$value['question_id'])
					->where('choice_status', 1)
					->get('quiz_choice_tbl');
					if ($query->num_rows()>=1) {
						$query = $query->result_array();
						$quiz['quiz_questions'][$key]['question_choices'] = $query;
					}
				}
				return $quiz;
			}
			else
				return $quiz;
		}
		else
			return null;
	}
	public function update_quiz($quiz_data) {
		// update quiz
		$this->db->set('quiz_title', $quiz_data['quiz']['quiz_title'])
		->where('quiz_id', $quiz_data['quiz']['quiz_id'])
		->update('quiz_tbl');

		// update questions
		foreach ($quiz_data['questions'] as $key => $value) {
			$this->db->set('question_title', $value['question_title'])
			->where('question_id', $value['question_id'])
			->update('quiz_question_tbl');
		}

		// update choices
		foreach ($quiz_data['choices'] as $key => $value) {
			$this->db->set('choice_text', $value['choice_text'])
			->where('choice_id', $value['choice_id'])
			->update('quiz_choice_tbl');
		}
	}
	public function post_new_question($quiz_id) {
		$question_data = array(
			'question_quiz_id' => $quiz_id,
		);
		$this->db->insert('quiz_question_tbl',$question_data);

		$choice_question_id = $this->db->insert_id();

		if ($this->db->affected_rows()==1) {
			$choices_data = array(
				[
					'choice_question_id' => $choice_question_id,
					'choice_is_correct' => 1,
				],
				[
					'choice_question_id' => $choice_question_id,
					'choice_is_correct' => 0,
				],
				[
					'choice_question_id' => $choice_question_id,
					'choice_is_correct' => 0,
				],
				[
					'choice_question_id' => $choice_question_id,
					'choice_is_correct' => 0,
				]
			);
			$this->db->insert_batch('quiz_choice_tbl',$choices_data);
			if ($this->db->affected_rows()==4) {
				return true;
			}
			else
				return false;
		}
		else
			return false;
	}
	// /quiz

}
 ?>