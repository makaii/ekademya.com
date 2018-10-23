<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Account_model');
		$this->load->model('Lookup_model');
		$this->load->model('Student_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == false)
		{
			redirect(base_url());
		}
		if ($this->session->userdata('user_type') != 'student')
		{
			redirect(base_url());
		}
	}

	public function index()
	{
		$student_id = $this->session->userdata('user_id');
		$courses = $this->Student_model->get_student_courses($student_id);
		$page_data = array
		(
			'page_title' => 'Welcome '.$this->session->userdata('user_name'),
			'course_categories' => $this->Lookup_model->get_category(),
			'courses' => $courses,
		);
		$this->load->view('template/headerUser', $page_data);
		$this->load->view('student/index');
		$this->load->view('template/footer');
	}

	public function mycourse($course_id)
	{
		$this->load->model('Instructor_model');
		$user_id = $this->session->userdata('user_id');
		$outline = [];

		$course = $this->Student_model->get_mycourse_data($course_id);
		$weeks = $this->Instructor_model->get_course_weeks($course_id);
		if (!empty($weeks)) {
			foreach ($weeks as $key => $value) {
				$outline[] = $this->Instructor_model->get_weekly_outline($course_id,$value['week_id']);
			}	
		}
		$progress = $this->Student_model->get_mycourse_progress($user_id,$course_id);
		$page_data = array(
			'page_title' => ucwords($course['course_title']),
			'course_categories' => $this->Lookup_model->get_category(),
			'course_id' => $course_id,
			'course' => $course,
			'outline' => $outline,
			'p' => $progress,
		);
		$this->load->view('template/headerUser',$page_data);
		$this->load->view('student/mycourse');
		$this->load->view('template/footer');
	}

	public function mycourse_outline_video($course_id, $outline_id)
	{
		//
		$user_id = $this->session->userdata('user_id');
		$current_progress = $this->Student_model->check_if_progress_exist($user_id,$course_id,$outline_id);
		if (!$current_progress) {
			$this->Student_model->post_progress($user_id,$course_id,$outline_id);
		}
		// /
		$video = $this->Student_model->get_mycourse_outline_video($outline_id);
		$course = $this->Student_model->get_mycourse_data($course_id);
		$outline = $this->Student_model->get_mycourse_outline_only($course_id);
		$progress = $this->Student_model->get_mycourse_progress($user_id,$course_id);
		$page_data = array(
			'page_title' => ucwords($video['video_title'].' - '.$course['course_title']),
			'course_categories' => $this->Lookup_model->get_category(),
			'c' => $course,
			'course_id' => $course_id,
			'v' => $video,
			'outline_id' => $outline_id,
			'o' => $outline,
			'p' => $progress,
			'next_lesson' => null,
			'next_lesson_type' => null,
			'current_progress' => $current_progress,
		);
		//
		$new_key = null;
		foreach ($outline as $key => $value) {
			if ($value['outline_id'] == $outline_id) {
				$new_key = $key+1;
				break;
			}
		}
		if (array_key_exists($new_key,$outline)) {
			$page_data['next_lesson'] = $outline[$new_key]['outline_id'];
			$page_data['next_lesson_type'] = $outline[$new_key]['outline_type'];
		}
		// /
		$this->load->view('template/headerUser',$page_data);
		$this->load->view('student/outline_video');
		$this->load->view('template/footer');
	}
	public function mycourse_outline_lecture($course_id, $outline_id)
	{
		//
		$user_id = $this->session->userdata('user_id');
		if (!$this->Student_model->check_if_progress_exist($user_id,$course_id,$outline_id)) {
			$this->Student_model->post_progress($user_id,$course_id,$outline_id);
		}
		// /
		$lecture = $this->Student_model->get_mycourse_outline_lecture($outline_id);
		$course = $this->Student_model->get_mycourse_data($course_id);
		$outline = $this->Student_model->get_mycourse_outline_only($course_id);
		$progress = $this->Student_model->get_mycourse_progress($user_id,$course_id);
		$page_data = array(
			'page_title' => ucwords($lecture['lecture_title'].' - '.$course['course_title']),
			'course_categories' => $this->Lookup_model->get_category(),
			'c' => $course,
			'course_id' => $course_id,
			'l' => $lecture,
			'outline_id' => $outline_id,
			'o' => $outline,
			'p' => $progress,
			'next_lesson' => null,
			'next_lesson_type' => null,
		);
		//
		$new_key = null;
		foreach ($outline as $key => $value) {
			if ($value['outline_id'] == $outline_id) {
				$new_key = $key+1;
				break;
			}
		}
		if (array_key_exists($new_key,$outline)) {
			$page_data['next_lesson'] = $outline[$new_key]['outline_id'];
			$page_data['next_lesson_type'] = $outline[$new_key]['outline_type'];
		}
		// /
		
		$this->load->view('template/headerUser',$page_data);
		$this->load->view('student/outline_lecture');
		$this->load->view('template/footer');
	}
	public function mycourse_final_project($course_id)
	{
		$user_id = $this->session->userdata('user_id');
		$course = $this->Student_model->get_mycourse_data($course_id);
		$project = $this->Student_model->get_mycourse_project($user_id, $course_id);
		$page_data = array(
			'page_title' => 'Final Project - '.ucwords($course['course_title']),
			'course_categories' => $this->Lookup_model->get_category(),
			'course_id' => $course_id,
			'c' => $course,
			'project' => $project,
			'upload_error' => null,
			'page_alert' => null,
		);
		$this->load->view('template/headerUser',$page_data);
		$this->load->view('student/final_project');
		$this->load->view('template/footer');
	}
	public function mycourse_final_project_validation($course_id)
	{
		$user_id = $this->session->userdata('user_id');
		$course = $this->Student_model->get_mycourse_data($course_id);
		$project = $this->Student_model->get_mycourse_project($user_id, $course_id);
		$page_data = array(
			'page_title' => 'Final Project - '.ucwords($course['course_title']),
			'course_categories' => $this->Lookup_model->get_category(),
			'course_id' => $course_id,
			'c' => $course,
			'project' => $project,
			'page_alert' => null,
			'upload_error' => null,
		);
		$user_name = explode(" ",$this->session->userdata('user_name'));
		$user_name = implode("_", $user_name);
		$file_config = array(
			'upload_path' => './z/projects',
			'file_name' => $user_name,
			'allowed_types' => 'zip|rar|7z',
			'max_size' => 0,
			// 'max_width' => 1024,
			// 'max_height' => 576,
			// 'min_width' => 384,
			// 'min_height' => 216,
			'remove_spaces' => true,
			'file_ext_tolower' => true,
			'detect_mime' => true,
			'mod_mime_fix' => true,
			'overwrite' => true,
			'max_filename' => 255,
		);
		$this->upload->initialize($file_config);
		if (!$this->upload->do_upload('project_file')) {
			// fail
			$page_data['upload_error'] = $this->upload->display_errors();
			$this->load->view('template/headerUser',$page_data);
			$this->load->view('student/final_project');
			$this->load->view('template/footer');
		}
		else
		{
			// success
			$project = $this->Student_model->get_mycourse_project($user_id, $course_id);
			$page_data['project'] = $project;
			$user_id = $this->session->userdata('user_id');
			$file = $this->upload->data('file_name');
			if ($this->Student_model->post_final_project($user_id, $course_id, $file)) {
				$page_data['page_alert'] = 'post';
				$this->load->view('template/headerUser',$page_data);
				$this->load->view('student/final_project');
				$this->load->view('template/footer');
			}
			elseif($this->Student_model->post_final_project($user_id, $course_id, $file)==false)
			{
				$page_data['page_alert'] = 'update';
				$this->load->view('template/headerUser',$page_data);
				$this->load->view('student/final_project');
				$this->load->view('template/footer');
			}
		}
	}
}
