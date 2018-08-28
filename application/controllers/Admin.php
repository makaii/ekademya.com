<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if (!$this->session->has_userdata('admin_logged_in'))
		{
			$this->session->set_userdata('admin_logged_in', false);
		}
	}

	public function index()
	{
		
		if ($this->session->userdata('admin_logged_in') == true)
		{
			$page_data = array(
				'page_title' => 'Welcome Admin',
				'admin_email' => $this->session->userdata('admin_email'),
				'admin_type' => $this->session->userdata('admin_type'),
				'dashboard_active' => 'active',
				'no_courses' => $this->Admin_model->count_pubished_courses(),
				'no_instructors' => $this->Admin_model->count_instructors(),
				'no_user' => $this->Admin_model->count_instructors()
			);
			$this->load->view('admin/template/header', $page_data);
			$this->load->view('admin/pages/index');
			$this->load->view('admin/template/footer');
		}
		elseif ($this->session->userdata('admin_logged_in') == false) {
			redirect(base_url('admin/signin'));
		}

	}

	public function signin()
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==false)
		{
			// not looged in
			$this->form_validation->set_rules('adminEmail', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('adminPassword', 'Password', 'required');
			$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
			$email = $this->input->post('adminEmail');
			$password = $this->input->post('adminPassword');

			if ($this->form_validation->run() == false)
			{
				// validation failed
				$page_data = array('page_title' => 'Ekademya | Admin Signin', );
				$this->load->view('admin/template/header', $page_data);
				$this->load->view('admin/pages/signin_view');
				$this->load->view('admin/template/footer');
			}
			elseif ($this->Admin_model->authenticate_admin($email,$password) == false)
			{
				// invalid email or password
				$this->session->set_flashdata('error','invalid email or password');
				$page_data = array('page_title' => 'Ekademya | Sign Error', );
				$this->load->view('admin/template/header', $page_data);
				$this->load->view('admin/pages/signin_view');
				$this->load->view('admin/template/footer');
			}
			else
			{
				// login successful
				redirect(base_url('admin'));
			}
		}
		else
		{
			// already logged in
			redirect(base_url('admin'));
		}
		
	}

	public function settings()
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$page_data = array(
				'page_title' => 'Admin Settings',
				'admin_email' => $this->session->userdata('admin_email'),
				'admin_type' => $this->session->userdata('admin_type'),
				'settings_active' => 'active',
			);
			$this->form_validation->set_rules('userdata', '', 'trim');
			$this->form_validation->set_rules('feedback', '', 'trim');
			if ($this->form_validation->run()==false)
			{
				$this->load->view('admin/template/header',$page_data);
				$this->load->view('admin/pages/settings_view');
				$this->load->view('admin/template/footer');
			}
			elseif ($this->form_validation->run()==true)
			{
				$userdata = $this->input->post('userdata');
				$feedback = $this->input->post('feedback');
				if (isset($userdata))
				{
					$this->Admin_model->set_display_userdata($userdata);
				}
				if (isset($feedback))
				{
					$this->Admin_model->set_display_feedback($feedback);
				}
				$page_data = array(
					'page_title' => 'Admin Settings Updated',
					'admin_email' => $this->session->userdata('admin_email'),
					'admin_type' => $this->session->userdata('admin_type'),
					'settings_active' => 'active',
				);
				$this->load->view('admin/template/header',$page_data);
				$this->load->view('admin/pages/settings_view');
				$this->load->view('admin/template/footer');
			}
		}
		else
		{
			redirect(base_url('admin'));
		}
		
	}

	public function courses()
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$page_data = array(
				'page_title' => 'Courses',
				'admin_email' => $this->session->userdata('admin_email'),
				'admin_type' => $this->session->userdata('admin_type'),
				'courses_active' => 'active',
			);
			$this->load->view('admin/template/header',$page_data);
			$this->load->view('admin/pages/courses');
			$this->load->view('admin/template/footer');
		}
		else
		{
			redirect(base_url('admin'));
		}
	}

	public function course_review()
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$page_data = array(
				'page_title' => 'Review Courses',
				'admin_email' => $this->session->userdata('admin_email'),
				'admin_type' => $this->session->userdata('admin_type'),
				'course_review_active' => 'active',
				'courses_review' => $this->Admin_model->get_unreviewed_courses(),
			);
			$this->load->view('admin/template/header',$page_data);
			$this->load->view('admin/pages/course_review');
			$this->load->view('admin/template/footer');
		}
		else
		{
			redirect(base_url('admin'));
		}
	}

	public function courses_review($course_id)
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$course = $this->Admin_model->get_unreviewed_courses($course_id);
			$this->load->model('Instructor_model');
			$outline = $this->Instructor_model->get_outline($course_id);
			$page_data = array(
				'page_title' => 'Reviewing '.$course['course_title'],
				'admin_email' => $this->session->userdata('admin_email'),
				'admin_type' => $this->session->userdata('admin_type'),
				'course_review_active' => 'active',
				'course' => $course,
				'outline' => $outline,
			);
			$this->load->view('admin/template/header',$page_data);
			$this->load->view('admin/pages/courses_review');
			$this->load->view('admin/template/footer');
		}
		else
		{
			redirect(base_url('admin'));
		}
	}

	public function categories()
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$this->load->model('Lookup_model');
			$categories = $this->Lookup_model->get_category();
			$page_data = array(
				'page_title' => 'Categories',
				'admin_email' => $this->session->userdata('admin_email'),
				'admin_type' => $this->session->userdata('admin_type'),
				'categories_active' => 'active',
				'categories' => $categories,
			);
			$this->load->view('admin/template/header',$page_data);
			$this->load->view('admin/pages/categories');
			$this->load->view('admin/template/footer');
		}
		else
		{
			redirect(base_url('admin'));
		}
	}

	public function add_category()
	{
		$this->form_validation->set_rules('categoryName','Category Name', 'required|alpha');
		$this->form_validation->set_rules('categoryCode','Category Code','required|regex_match[/^[A-Za-z_]{2,30}$/]');
	}

		
}
