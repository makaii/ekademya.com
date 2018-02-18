<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Courses_model');
		$this->load->model('Admin_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}		
	}

	// public function search()
	// {
	// 	$search_string = $this->input->get('data');
	// 	$search_result = $this->Courses_model->search_course($search_string);
	// 	$page_data = array(
	// 		'page_title' => 'Result of '.$search_string, 
	// 	);

	// 	if ($this->session->has_userdata('user_type'))
	// 	{
	// 		$user_type = $this->session->userdata('user_type');
	// 		if ($user_type == 'user')
	// 		{
	// 			$this->load->view('template/headerUser',$page_data);
	// 			$this->load->view('template/footer');
	// 		}
	// 		elseif ($user_type == 'instructor')
	// 		{
	// 			$this->load->view('template/headerInstructor',$page_data);
	// 			$this->load->view('template/footer');
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$this->load->view('template/header',$page_data);
	// 		$this->load->view('template/footer');
	// 	}
	// }

	// public function create_course()
	// {
	// 	if (($_SESSION['logged_in']==true) && ($_SESSION['user_type']=="instructor"))
	// 	{
	// 		$this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');
	// 		$this->form_validation->set_rules('courseTitle', 'Course Title', 'required');
	// 		$this->form_validation->set_rules('courseCategory', 'Course Category', 'required');
	// 		if ($this->form_validation->run()==false)
	// 		{
	// 			// create fail
	// 			$page_data = array('page_title' => 'Create Course', );
	// 			$this->load->view('template/headerInstructor',$page_data);
	// 			$this->load->view('instructor/create_course');
	// 			$this->load->view('template/footer');
	// 		}
	// 		else
	// 		{
	// 			// create success
	// 			$title = $this->input->post('courseTitle');
	// 			$author = $this->session->userdata('email');
	// 			$date = date('Y-m-d H:i:s');
	// 			$category = $this->input->post('courseCategory');
	// 			if ($this->Courses_model->save_course($title, $author, $date, $category))
	// 			{
	// 				$id = $this->Courses_model->get_course_id($title,$_SESSION['email']);
	// 				$this->session->set_userdata('course_id', $id);
	// 				redirect(base_url('course/manage/'.$id.'/goals'));
	// 			}
	// 		}
	// 	}
	// 	else
	// 	{
	// 		show_404();
	// 	}
	// }

	// public function manage($id = null,$switch = null)
	// {
	// 	if (($_SESSION['logged_in']==true)&&($_SESSION['user_type'])=='instructor')
	// 	{
	// 		if ($this->Courses_model->check_if_their_course($_SESSION['email'],$id))
	// 		{
	// 			switch ($switch)
	// 			{
	// 				case 'goals':
	// 					$course = $this->Courses_model->get_course_info($_SESSION['email'],$id);
	// 					$this->Courses_model->get_course_id($course['course_title'],$_SESSION['email']);
	// 					$this->session->set_userdata('course_id',$id);
	// 					$page_data = array(
	// 						'page_title' => 'Manage Course Goals',
	// 						'course_title' => $course['course_title'],
	// 						'course_author' =>$course['course_author'],
	// 					 );
	// 					$this->load->view('template/headerInstructor',$page_data);
	// 					$this->load->view('instructor/course_goals');
	// 					$this->load->view('template/footer');
	// 					break;

	// 				case 'landing_page':
	// 					$course = $this->Courses_model->get_course_info($_SESSION['email'],$id);
	// 					$this->Courses_model->get_course_id($course['course_title'],$_SESSION['email']);
	// 					$this->session->set_userdata('course_id',$id);
	// 					$page_data = array(
	// 						'page_title' => 'Manage Course Goals',
	// 						'course_title' => $course['course_title'],
	// 						'course_author' =>$course['course_author'],
	// 					);
	// 					$this->load->view('template/headerInstructor',$page_data);
	// 					$this->load->view('instructor/course_landing_page');
	// 					$this->load->view('template/footer');
	// 					break;

	// 				case 'curriculum':
	// 					$page_data = array('page_title' => 'Manage Course Curriculum', );
	// 					$this->load->view('template/headerInstructor',$page_data);
	// 					$this->load->view('instructor/course_curriculum');
	// 					$this->load->view('template/footer');
	// 					break;
					
	// 				default:
	// 					show_404();
	// 					break;
	// 			}
	// 		}
	// 		else
	// 			show_404();
	// 	}
	// 	else
	// 		show_404();
	// }

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
