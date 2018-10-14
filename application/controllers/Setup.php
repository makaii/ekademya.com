<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Setup_model');
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$this->Setup_model->create_admin_table();
		$this->Setup_model->create_user_table();
		$this->Setup_model->create_verify_table();
		$this->Setup_model->create_category_table();
		$this->Setup_model->create_course_table();
		$this->Setup_model->create_outline_table();
		$this->Setup_model->create_video_table();
		$this->Setup_model->create_lecture_table();
		$this->Setup_model->create_quiz_table();
		$this->Setup_model->create_enroll_table();
		$this->Setup_model->create_settings_table();
		$this->Setup_model->create_review_table();
		$this->Setup_model->create_progress_table();
		$this->Setup_model->create_final_project_table();
		$page_data = array(
			'page_title' => 'Database Installation',
			'admin' => $this->Setup_model->getTableStructure('admin_tbl'),
			'user' => $this->Setup_model->getTableStructure('user_tbl'),
			'category' => $this->Setup_model->getTableStructure('category_tbl'),
			'course' => $this->Setup_model->getTableStructure('course_tbl'),
			'outline' => $this->Setup_model->getTableStructure('outline_tbl'),
			'video' => $this->Setup_model->getTableStructure('video_tbl'),
			'lecture' => $this->Setup_model->getTableStructure('lecture_tbl'),
			'quiz' => $this->Setup_model->getTableStructure('quiz_tbl'),
			'enrollees' => $this->Setup_model->getTableStructure('enroll_tbl'),
			'settings' => $this->Setup_model->getTableStructure('settings_tbl'),
			'review' => $this->Setup_model->getTableStructure('review_tbl'),
		);
		$this->load->view('template/headerWoNav', $page_data);
		$this->load->view('setup/success_view');
		$this->load->view('template/footer');
	}
}