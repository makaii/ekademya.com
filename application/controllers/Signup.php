<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		$page_data = array(
			'page_title' => 'Signup',
		);

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_tbl.user_email]|max_length[320]|min_length[6]', array('is_unique' => 'Email is already taken'));
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[60]|min_length[8]');
		$this->form_validation->set_rules('repassword', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == false)
		{
			// login failed
			$this->load->view('template/header', $page_data);
			$this->load->view('login/signup_view');
			$this->load->view('template/footer');
		}
		else
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if ($this->Login_model->register($email,$password) == true)
			{
				redirect(base_url('signin'));
			}
		}
	}
}
