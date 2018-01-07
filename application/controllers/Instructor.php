<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Instructor_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == false)
		{
			redirect(base_url());
		}
	}

	public function index()
	{
		$page_data = array(
			'page_title' => 'Welcome',
		);
		$this->load->view('template/header', $page_data);
		$this->load->view('template/footer');
	}

		
}
