<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Account_model');
		$this->load->model('Lookup_model');
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
		
		$page_data = array
		(
			'page_title' => 'welcome',
			'course_categories' => $this->Lookup_model->get_category(),
		);
		$this->load->view('template/headerUser', $page_data);
		$this->load->view('student/index');
		$this->load->view('template/footer');
	}
}
