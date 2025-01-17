<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Account_model');
		$this->load->model('Admin_model');
		$this->load->model('Lookup_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == false)
		{
			redirect(base_url());
		}
		if ($this->session->userdata('user_type')=='instructor')
		{
			redirect(base_url('instructor'));
		}
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$profile_data = $this->Account_model->get_profile_info($user_id);
		$page_data = array
		(
			'page_title' => 'welcome',
			'user_name' => $profile_data['profile_fname']." ".$profile_data['profile_lname'],
			'course_categories' => $this->Lookup_model->get_category(),
		);
		$this->load->view('template/headerUser', $page_data);
		$this->load->view('account/index');
		$this->load->view('template/footer');
	}
}
