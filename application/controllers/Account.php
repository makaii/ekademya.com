<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
		$page_data = array
		(
			'page_title' => 'welcome',
		);
		$this->load->view('template/headerUser', $page_data);
		// $this->load->view('main/index');
		$this->load->view('template/footer');
	}

	public function forgot_password()
	{
		$email = $this->input->post('email');
		$this->load->model('Account_model');
		if ($email)
		{
			
		}
	}
}
