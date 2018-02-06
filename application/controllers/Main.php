<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == true) 
		{
			redirect(base_url('account'));
		}
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$page_data = array
		(
			'page_title' => 'Welcome',
		);
		$this->load->view('template/header', $page_data);
		$this->load->view('main/index');
		$this->load->view('template/footer');
	}
}
