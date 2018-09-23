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
				'overview_active' => 'active',
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
				$this->load->view('admin/pages/signin_view', $page_data);
			}
			elseif ($this->Admin_model->authenticate_admin($email,$password) == false)
			{
				// invalid email or password
				$this->session->set_flashdata('error','invalid email or password');
				$page_data = array('page_title' => 'Ekademya | Sign Error', );
				$this->load->view('admin/pages/signin_view', $page_data);
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

	public function review()
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$page_data = array(
				'page_title' => 'Review Courses',
				'admin_email' => $this->session->userdata('admin_email'),
				'admin_type' => $this->session->userdata('admin_type'),
				'review_active' => 'active',
				'courses_review' => $this->Admin_model->get_unreviewed_courses(),
			);
			$this->load->view('admin/template/header',$page_data);
			$this->load->view('admin/pages/review');
			$this->load->view('admin/template/footer');
		}
		else
		{
			redirect(base_url('admin'));
		}
	}

	public function review_course($course_id)
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$course = $this->Admin_model->get_unreviewed_courses($course_id);
			$this->load->model('Instructor_model');
			$outline = $this->Instructor_model->get_outline($course_id);
			$review = $this->Admin_model->get_review_data($course_id);
				$review_info = unserialize($review['review_course_info']);
				$review_outline = unserialize($review['review_course_outline']);
			$page_data = array(
				'page_title' => 'Reviewing '.$course['course_title'],
				'admin_email' => $this->session->userdata('admin_email'),
				'admin_type' => $this->session->userdata('admin_type'),
				'review_active' => 'active',
				'course' => $course,
				'outline' => $outline,
				'course_id' => $course_id,
				'review_info' => $review_info,
				'review_outline' => $review_outline
			);
			// form rules
			$this->form_validation->set_rules('comment_title','Title Comment','trim');
			$this->form_validation->set_rules('comment_category','Description Comment','trim');
			$this->form_validation->set_rules('comment_description','Description Comment','trim');
			$this->form_validation->set_rules('comment_tools','Tools Comment','trim');
			$this->form_validation->set_rules('comment_audience','Audience Comment','trim');
			$this->form_validation->set_rules('comment_achievement','Achievement Comment','trim');
			$outln_num = 1;
			foreach ($outline as $key => $value) {
				$this->form_validation->set_rules("review_outline_$key","Outline #$outln_num",'trim');
				$outln_num++;
			}
			// form rules
			if (!$this->form_validation->run())
			{
				$this->load->view('admin/template/header',$page_data);
				$this->load->view('admin/pages/review_course');
				$this->load->view('admin/template/footer');
			}
			else
			{
				foreach ($outline as $key => $value) {
					$review_course_outline_data[] = $this->input->post("review_outline_$key");
				}
				$comment_array = array(
					'review_course_info' => [
						'review_title' => $this->input->post('comment_title'),
						'review_category' => $this->input->post('comment_category'),
						'review_description' => $this->input->post('comment_description'),
						'review_tools' => $this->input->post('comment_tools'),
						'review_audience' => $this->input->post('comment_audience'),
						'review_achievement' => $this->input->post('comment_achievement'),
					],
					'review_course_outline' => $review_course_outline_data,
				);
				if ($this->Admin_model->send_review_comments($course_id,$comment_array))
				{
					if ($this->Instructor_model->set_course_review_status($course_id,0))
					{
						$this->load->view('admin/template/header',$page_data);
						$this->load->view('admin/pages/review_course_success');
						$this->load->view('admin/template/footer');
					}
				}
				else
				{
					show_404();
				}
			}
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
