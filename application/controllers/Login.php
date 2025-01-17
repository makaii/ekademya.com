<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Admin_model');
		$this->load->model('Lookup_model');
		$this->load->library('parsedown/Parsedown.php');

		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == true)
		{
			redirect(base_url());
		}
	}

	private function send_verification_mail($email_add)
	{
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'dev.ekademya@gmail.com',
			'smtp_pass' => 'plusultra',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE,
		);
		$this->email->initialize($config);
		$this->email->from('dev.ekademya@gmail.com');
		$this->email->to($email_add);
		$this->email->subject('EKademya Registration Verification');
		$code = random_string('alnum',16);
		$message = 'Click <a href="'.base_url('verify/'.$code).'">here</a> to verify your account.';
		$this->email->message($message);
		$this->email->set_newline("\r\n");
		if (!$this->email->send()) {
			// fail
			return false;
		}
		else {
			// success
			if ($this->Login_model->post_verification($email_add,$code)) {
				return true;
			}
			else
				return false;
		}
	}
	public function verify_user($code)
	{
		if (!empty($code)) {
			if ($this->Login_model->get_verification($code)) {
				$page_data = array(
					'page_title' => 'Verification Complete',
					'course_categories' => $this->Lookup_model->get_category(),
				);
				$this->load->view('template/header', $page_data);
				$this->load->view('login/verify_success');
				$this->load->view('template/footer');
			}
			else
				show_404();
		}
		else
			show_404();
	}

	public function signup_user()
	{
		$page_data = array(
			'page_title' => 'Signup',
			'course_categories' => $this->Lookup_model->get_category(),
		);

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_tbl.user_email]|max_length[320]|min_length[6]', array('is_unique' => 'Email is already taken'));
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[60]|min_length[8]');
		$this->form_validation->set_rules('repassword', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');

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
			$reg_data['user_email'] = $email;
			$reg_data['user_password'] = $this->input->post('password');
			$reg_data['user_fname'] = $this->input->post('fname');
			$reg_data['user_lname'] = $this->input->post('lname');
			$reg_data['user_type'] = 'student';
			if ($this->Login_model->register($reg_data)==true)
			{
				$this->send_verification_mail($email);
				$this->session->set_userdata('signup_success', true);
				redirect(base_url('signup/success'));
			}
		}
	}

	public function signup_instructor()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_tbl.user_email]|max_length[320]|min_length[6]', array('is_unique' => 'Email is already taken'));
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[60]|min_length[8]');
		$this->form_validation->set_rules('repassword', 'Confirm Password', 'required|matches[password]');

		// Basic
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('educ', 'Educational Attainment', 'required');
		$this->form_validation->set_rules('pubemail', 'Profile Email', 'required|valid_email');
		$this->form_validation->set_rules('headline', 'Headline');
		$this->form_validation->set_rules('bio', 'Bio');

		// Links
		$this->form_validation->set_rules('website', 'Persone Website', 'valid_url');
		$this->form_validation->set_rules('facebook', 'Facebook Link', 'valid_url');
		$this->form_validation->set_rules('googleplus', 'Goggle Plus Link', 'valid_url');
		$this->form_validation->set_rules('linkedin', 'Linkedin Link', 'valid_url');
		$this->form_validation->set_rules('youtube', 'Youtube Link', 'valid_url');
		

		$page_data = array(
			'page_title' => 'Become an Instructor!',
			'course_categories' => $this->Lookup_model->get_category(),
		);

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
			$email = $this->input->post('email');
			$reg_data['user_email'] = $email;
			$reg_data['user_password'] = $this->input->post('password');
			$reg_data['user_type'] = "instructor";
			$reg_data['user_fname'] = $this->input->post('fname');
			$reg_data['user_lname'] = $this->input->post('lname');
			$reg_data['user_educ'] = $this->input->post('educ');
			$reg_data['user_pubemail'] = $this->input->post('pubemail');
			$reg_data['user_headline'] = $this->input->post('headline');
			$reg_data['user_bio'] = $this->input->post('bio');
			$reg_data['user_website'] = $this->input->post('website');
			$reg_data['user_facebook'] = $this->input->post('facebook');
			$reg_data['user_googleplus'] = $this->input->post('googleplus');
			$reg_data['user_linkedin'] = $this->input->post('linkedin');
			$reg_data['user_twitter'] = $this->input->post('twitter');
			$reg_data['user_youtube'] = $this->input->post('youtube');
			if ($this->Login_model->register($reg_data)==true)
			{
				$this->send_verification_mail($email);
				$this->session->set_userdata('signup_success', true);
				redirect(base_url('signup/success'));
			}
		}
	}

	public function signup_success()
	{
		if ($this->session->userdata('signup_success') == true)
		{
			$page_data = array(
				'page_title' => 'Signup Successful!',
				'course_categories' => $this->Lookup_model->get_category(),
			);
			$this->session->unset_userdata('signup_success');
			$this->load->view('template/header', $page_data);
			$this->load->view('login/signup_success_view');
			$this->load->view('template/footer');
		}
		else
			redirect(base_url('signup'));
	}

	public function signin($course_id=null)
	{
		$page_data = array(
			'page_title' => 'Signin',
			'course_categories' => $this->Lookup_model->get_category(),
		);
		if (!empty($course_id))
		{
			$this->session->set_userdata('enroll_course_id',$course_id);
		}

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

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
			if ($user_type == "student")
			{
				$this->session->set_userdata('logged_in', true);
				if (!empty($this->session->has_userdata('enroll_course_id')))
				{
					$course_id = $this->session->userdata('enroll_course_id');
					redirect(base_url('course/enroll/'.$course_id));
				}
				else
				{
					redirect(base_url('student'));
				}
			}
			if ($user_type == "instructor")
			{
				$this->session->set_userdata('logged_in', true);
				redirect(base_url('instructor'));
			}
		}
	}

	public function forgot_password()
	{
		
	}

}
