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
		// $this->Setup_model->create_tables();
		$this->Setup_model->create_admin_table();
		$this->Setup_model->create_user_table();
		$this->Setup_model->create_course_table();
		$this->Setup_model->create_outline_table();
		$this->Setup_model->create_enroll_table();
		$this->Setup_model->create_settings_table();
		$page_data = array(
			'page_title' => 'Database Installation',
			'admin' => $this->Setup_model->getTableStructure('admin_tbl'),
			'user' => $this->Setup_model->getTableStructure('user_tbl'),
			'course' => $this->Setup_model->getTableStructure('course_tbl'),
			'enrollees' => $this->Setup_model->getTableStructure('enroll_tbl'),
		);
		$this->load->view('template/headerWoNav', $page_data);
		$this->load->view('setup/success_view');
		$this->load->view('template/footer');
	}
}
