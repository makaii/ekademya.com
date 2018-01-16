<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('parsedown/Parsedown.php');

		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == true)
		{
			redirect(base_url('account'));
		}
	}

	public function signup_user()
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
			// signup failed
			$this->load->view('template/header', $page_data);
			$this->load->view('login/signup_view');
			$this->load->view('template/footer');
		}
		else
		{
			// signup successful
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if ($this->Login_model->register($email,$password,"user") == true)
			{
				$this->session->set_userdata('signup_success', true);
				redirect(base_url('signup/success'));
			}
		}
	}

	public function signup_instructor()
	{
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_tbl.user_email]|max_length[320]|min_length[6]', array('is_unique' => 'Email is already taken'));
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[60]|min_length[8]');
		$this->form_validation->set_rules('repassword', 'Confirm Password', 'required|matches[password]');

		// Basic
		$this->form_validation->set_rules('username', 'Name', 'required');
		$this->form_validation->set_rules('headline', 'Headline', '');
		$this->form_validation->set_rules('bio', 'Bio', '');

		// Links
		$this->form_validation->set_rules('website', 'Persone Website', 'valid_url');
		$this->form_validation->set_rules('facebook', 'Facebook Link', 'valid_url');
		$this->form_validation->set_rules('googleplus', 'Goggle Plus Link', 'valid_url');
		$this->form_validation->set_rules('linkedin', 'Linkedin Link', 'valid_url');
		$this->form_validation->set_rules('youtube', 'Youtube Link', 'valid_url');
		

		$page_data = array('page_title' => 'Become an Instructor!', );

		if ($this->form_validation->run() == false)
		{
			// signup failed
			$this->load->view('template/header', $page_data);
			$this->load->view('login/signup_instructor_view');
			$this->load->view('template/footer');
		}
		else
		{
			// signup successful
			$data = array(
				'user_email' => $this->input->post('email'),
				'user_password' => $this->input->post('password'),
			);
			$instructor_data = array(
				// basic
				'instructor_name' => $this->input->post('username'),
				'instructor_headline' => $this->input->post('headline'),
				'instructor_bio' => $this->input->post('bio'),
				// links
				'instructor_website' => $this->input->post('website'),
				'instructor_facebook' => $this->input->post('facebook'),
				'instructor_googleplus' => $this->input->post('googleplus'),
				'instructor_linkedin' =>  $this->input->post('linkedin'),
				'instructor_twitter' =>  $this->input->post('twitter'),
				'instructor_youtube' =>  $this->input->post('youtube'),
			);
			
			if ($this->Login_model->register_instructor($data, $instructor_data) == true)
			{
				$this->session->set_userdata('signup_success', true);
				redirect(base_url('signup/success'));
			}
		}
	}

	public function signup_success()
	{
		if ($this->session->userdata('signup_success') == true)
		{
			$page_data = array('page_title' => 'Signup Successful!', );
			$this->session->unset_userdata('signup_success');
			$this->load->view('template/header', $page_data);
			$this->load->view('login/signup_success_view');
			$this->load->view('template/footer');
		}
		else
			redirect(base_url('signup'));
	}

	public function signin()
	{
		$page_data = array(
			'page_title' => 'Signin',
		);

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		

		if ($this->form_validation->run() == false)
		{
			// login failed
			$this->load->view('template/header', $page_data);
			$this->load->view('login/signin_view');
			$this->load->view('template/footer');
		}
		elseif ($this->Login_model->authenticate($email, $password) == false)
		{
			$this->session->set_flashdata('error','invalid email or password');
			$this->load->view('template/header', $page_data);
			$this->load->view('login/signin_view');
			$this->load->view('template/footer');
		}
		else
		{
			// login successful
			$user_type = $this->session->userdata('user_type');
			if ($user_type == "user")
			{
				$this->session->set_userdata('logged_in', true);
				redirect(base_url('account'));
			}
			if ($user_type == "instructor")
			{
				$this->session->set_userdata('logged_in', true);
				redirect(base_url('instructor'));
			}
		}
	}
}
