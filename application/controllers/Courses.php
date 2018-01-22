<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Courses_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}		
	}

	public function search()
	{
		$search_string = $this->input->get('data');
		$search_result = $this->Courses_model->search_course($search_string);
		$page_data = array(
			'page_title' => 'Result of '.$search_string, 
		);

		if ($this->session->has_userdata('user_type'))
		{
			$user_type = $this->session->userdata('user_type');
			if ($user_type == 'user')
			{
				$this->load->view('template/headerUser',$page_data);
				$this->load->view('template/footer');
			}
			elseif ($user_type == 'instructor')
			{
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('template/footer');
			}
		}
		else
		{
			$this->load->view('template/header',$page_data);
			$this->load->view('template/footer');
		}
	}

	public function create_course()
	{
		if (($_SESSION['logged_in']==true) && ($_SESSION['user_type']=="instructor"))
		{
			$this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');
			$this->form_validation->set_rules('courseTitle', 'Course Title', 'required');
			$this->form_validation->set_rules('courseCategory', 'Course Category', 'required');
			if ($this->form_validation->run()==false)
			{
				// create fail
				$page_data = array('page_title' => 'Create Course', );
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/create_course');
				$this->load->view('template/footer');
			}
			else
			{
				// create success
				$title = $this->input->post('courseTitle');
				$author = $this->session->userdata('email');
				$date = date('Y-m-d H:i:s');
				$category = $this->input->post('courseCategory');
				// $this->session->set_userdata('title', $this->input->post('courseTitle'));
				// $this->session->set_userdata('author', $this->session->userdata('email'));
				// $this->session->set_userdata('date', date('Y-m-d'));
				// $this->session->set_userdata('category', $this->input->post('courseCategory'));
				if ($this->Courses_model->save_course($title, $author, $date, $category))
				{
					redirect(base_url('course/manage'));
				}
			}
		}
		else
		{
			show_404();
		}
	}

	public function manage($switch = null)
	{
		if (($_SESSION['logged_in']==true)&&($_SESSION['user_type'])=='instructor')
		{
			switch ($switch)
			{
				case 'goals':
					$page_data = array('page_title' => 'Manage Course Goals', );
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_goals');
					$this->load->view('template/footer');
					break;

				case 'landing_page':
					$page_data = array('page_title' => 'Manage Course Langind Page', );
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_landing_page');
					$this->load->view('template/footer');
					break;

				case 'curriculum':
					$page_data = array('page_title' => 'Manage Course Curriculum', );
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_curriculum');
					$this->load->view('template/footer');
					break;
				
				default:
					# code...
					break;
			}
		}
		else
			show_404();
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
		if ($_SESSION['logged_in'] == true)
		{
			$this->load->view('template/headerUser', $page_data);
			$this->load->view('courses/index', $nav_data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->load->view('template/header', $page_data);
			$this->load->view('courses/index', $nav_data);
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
		if ($_SESSION['logged_in'] == true)
		{
			$this->load->view('template/headerUser', $page_data);
			$this->load->view('courses/index', $nav_data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->load->view('template/header', $page_data);
			$this->load->view('courses/index', $nav_data);
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
		if ($_SESSION['logged_in'] == true)
		{
			$this->load->view('template/headerUser', $page_data);
			$this->load->view('courses/index', $nav_data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->load->view('template/header', $page_data);
			$this->load->view('courses/index', $nav_data);
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
		if ($_SESSION['logged_in'] == true)
		{
			$this->load->view('template/headerUser', $page_data);
			$this->load->view('courses/index', $nav_data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->load->view('template/header', $page_data);
			$this->load->view('courses/index', $nav_data);
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
		if ($_SESSION['logged_in'] == true)
		{
			$this->load->view('template/headerUser', $page_data);
			$this->load->view('courses/index', $nav_data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->load->view('template/header', $page_data);
			$this->load->view('courses/index', $nav_data);
			$this->load->view('template/footer');
		}
	}
}
