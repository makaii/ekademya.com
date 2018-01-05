<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == true)
		{
			redirect(base_url('account'));
		}
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
			// login successful
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if ($this->Login_model->register($email,$password) == true)
			{
				$this->session->set_userdata('signup_success', true);
				redirect(base_url('signup/success'));
			}
		}
	}

	public function success()
	{
		if ($this->session->userdata('signup_success') == true)
		{
			$this->session->unset_userdata('signup_success');
			$this->load->view('template/header');
			$this->load->view('login/signup_success_view');
			$this->load->view('template/footer');
		}
		else
			redirect(base_url('signup'));
		
	}
}
