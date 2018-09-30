<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Courses_model');
		$this->load->model('Admin_model');
		$this->load->model('Lookup_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
	}

	public function category($category_name)
	{
		$user_type = $this->session->userdata('user_type');
		$courses = $this->Courses_model->get_courses_by_category($category_name);
		$page_data = array(
			'page_title' => ucwords($category_name." Courses"),
			'course_categories' => $this->Lookup_model->get_category(),
			'courses' => $courses,
		);
		if ($user_type=='student') {
			$this->load->view('template/headerUser',$page_data);
			$this->load->view('courses/category');
			$this->load->view('template/footer');
		}
		elseif ($user_type=='instructor') {
			$this->load->view('template/headerInstructor',$page_data);
			$this->load->view('courses/category');
			$this->load->view('template/footer');
		}
		else {
			$this->load->view('template/header',$page_data);
			$this->load->view('courses/category');
			$this->load->view('template/footer');
		}
	}

	public function course_enroll($course_id)
	{
		if ($this->session->userdata('user_type')=='student')
		{
			$course = $this->Lookup_model->get_course($course_id);
			$page_data = array(
				'page_tit;e' => 'Enrolled to',
				'course' => $course,
			);
			if ($this->Courses_model->enroll_course($course_id,$_SESSION['user_id']))
			{
				$this->load->view('template/headerUser',$page_data);
				$this->load->view('template/footer');
			}
			else
			{
				// $this->load->view('template/headerUser',$page_data);
				// $this->load->view('template/footer');
				echo "already enrolled";
			}
		}
		else
		{
			redirect(base_url('signin/'.$course_id));
		}
	}

	public function art_design($page = 0)
	{
		$page_data = array(
			'page_title' => 'Art & Design Course',
		);

		$nav_data = array(
			'n1' => anchor(base_url('courses/art_design'),'Art & Design', 'class="nav-link active"'),
			'n2' => anchor(base_url('courses/business'),'Business', 'class="nav-link"'),
			'n3' => anchor(base_url('courses/culinary'),'Culinary', 'class="nav-link"'),
			'n4' => anchor(base_url('courses/film'),'Film & Photography', 'class="nav-link"'),
			'n5' => anchor(base_url('courses/technology'),'Technology', 'class="nav-link"'),
		);
		$user_type = $this->session->userdata('user_type');
		$logged_in = $this->session->userdata('logged_in');
		if (($logged_in==true)&&($user_type=='user'))
		{
			$this->load->view('template/headerUser', $page_data);
			$this->load->view('courses/art_&_design_view', $nav_data);
			$this->load->view('template/footer');
		}
		elseif (($logged_in==true)&&($user_type=='instructor'))
		{
			$this->load->view('template/headerInstructor', $page_data);
			$this->load->view('courses/art_&_design_view', $nav_data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->load->view('template/header', $page_data);
			$this->load->view('courses/art_&_design_view', $nav_data);
			$this->load->view('template/footer');
		}
	}

	public function business($page = 0)
	{
		$page_data = array(
			'page_title' => 'Business Courses',
		);

		$nav_data = array(
			'n1' => anchor(base_url('courses/art_design'),'Art & Design', 'class="nav-link"'),
			'n2' => anchor(base_url('courses/business'),'Business', 'class="nav-link active"'),
			'n3' => anchor(base_url('courses/culinary'),'Culinary', 'class="nav-link"'),
			'n4' => anchor(base_url('courses/film'),'Film & Photography', 'class="nav-link"'),
			'n5' => anchor(base_url('courses/technology'),'Technology', 'class="nav-link"'),
		);
		$user_type = $this->session->userdata('user_type');
		$logged_in = $this->session->userdata('logged_in');
		if (($logged_in==true)&&($user_type=='user'))
		{
			$this->load->view('template/headerUser', $page_data);
			$this->load->view('courses/business_view', $nav_data);
			$this->load->view('template/footer');
		}
		elseif (($logged_in==true)&&($user_type=='instructor'))
		{
			$this->load->view('template/headerInstructor', $page_data);
			$this->load->view('courses/business_view', $nav_data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->load->view('template/header', $page_data);
			$this->load->view('courses/business_view', $nav_data);
			$this->load->view('template/footer');
		}
	}

	public function culinary($page = 0)
	{
		$page_data = array(
			'page_title' => 'Culinary Courses',
		);

		$nav_data = array(
			'n1' => anchor(base_url('courses/art_design'),'Art & Design', 'class="nav-link"'),
			'n2' => anchor(base_url('courses/business'),'Business', 'class="nav-link"'),
			'n3' => anchor(base_url('courses/culinary'),'Culinary', 'class="nav-link active"'),
			'n4' => anchor(base_url('courses/film'),'Film & Photography', 'class="nav-link"'),
			'n5' => anchor(base_url('courses/technology'),'Technology', 'class="nav-link"'),
		);
		$user_type = $this->session->userdata('user_type');
		$logged_in = $this->session->userdata('logged_in');
		if (($logged_in==true)&&($user_type=='user'))
		{
			$this->load->view('template/headerUser', $page_data);
			$this->load->view('courses/culinary_view', $nav_data);
			$this->load->view('template/footer');
		}
		elseif (($logged_in==true)&&($user_type=='instructor'))
		{
			$this->load->view('template/headerInstructor', $page_data);
			$this->load->view('courses/culinary_view', $nav_data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->load->view('template/header', $page_data);
			$this->load->view('courses/culinary_view', $nav_data);
			$this->load->view('template/footer');
		}
	}

	public function film($page = 0)
	{
		$page_data = array(
			'page_title' => 'Film Courses',
		);

		$nav_data = array(
			'n1' => anchor(base_url('courses/art_design'),'Art & Design', 'class="nav-link"'),
			'n2' => anchor(base_url('courses/business'),'Business', 'class="nav-link"'),
			'n3' => anchor(base_url('courses/culinary'),'Culinary', 'class="nav-link"'),
			'n4' => anchor(base_url('courses/film'),'Film & Photography', 'class="nav-link active"'),
			'n5' => anchor(base_url('courses/technology'),'Technology', 'class="nav-link"'),
		);
		$user_type = $this->session->userdata('user_type');
		$logged_in = $this->session->userdata('logged_in');
		if (($logged_in==true)&&($user_type=='user'))
		{
			$this->load->view('template/headerUser', $page_data);
			$this->load->view('courses/film_&_photography_view', $nav_data);
			$this->load->view('template/footer');
		}
		elseif (($logged_in==true)&&($user_type=='instructor'))
		{
			$this->load->view('template/headerInstructor', $page_data);
			$this->load->view('courses/film_&_photography_view', $nav_data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->load->view('template/header', $page_data);
			$this->load->view('courses/film_&_photography_view', $nav_data);
			$this->load->view('template/footer');
		}
	}

	public function Technology($page = 0)
	{
		$page_data = array(
			'page_title' => 'Technology Courses',
		);

		$nav_data = array(
			'n1' => anchor(base_url('courses/art_design'),'Art & Design', 'class="nav-link"'),
			'n2' => anchor(base_url('courses/business'),'Business', 'class="nav-link"'),
			'n3' => anchor(base_url('courses/culinary'),'Culinary', 'class="nav-link"'),
			'n4' => anchor(base_url('courses/film'),'Film & Photography', 'class="nav-link"'),
			'n5' => anchor(base_url('courses/technology'),'Technology', 'class="nav-link active"'),
		);
		$user_type = $this->session->userdata('user_type');
		$logged_in = $this->session->userdata('logged_in');
		if (($logged_in==true)&&($user_type=='user'))
		{
			$this->load->view('template/headerUser', $page_data);
			$this->load->view('courses/technology_view', $nav_data);
			$this->load->view('template/footer');
		}
		elseif (($logged_in==true)&&($user_type=='instructor'))
		{
			$this->load->view('template/headerInstructor', $page_data);
			$this->load->view('courses/technology_view', $nav_data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->load->view('template/header', $page_data);
			$this->load->view('courses/technology_view', $nav_data);
			$this->load->view('template/footer');
		}
	}
}
