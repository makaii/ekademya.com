<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Instructor_model');
		$this->load->model('Admin_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == false && $this->session->userdata('user_type')!='instructor')
		{
			redirect(base_url());
		}
	}

	public function index()
	{
		$page_data = array(
			'page_title' => 'Welcome',
		);
		$this->session->unset_userdata('course_id');
		$this->load->view('template/headerInstructor', $page_data);
		$this->load->view('instructor/index');
		$this->load->view('template/footer');
	}

	public function profile()
	{
		$page_data = array(
			'page_title' => 'Instructor Profile', 
		);
		$this->load->view('template/headerInstructor', $page_data);
		// $this->load->view('instructor/profile');
		$this->load->view('template/footer');

	}

	public function edit_profile()
	{

	}

	public function create_course()
	{
		if (($_SESSION['logged_in']==true) && ($_SESSION['user_type']=="instructor"))
		{
			$this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');
			$this->form_validation->set_rules('courseTitle', 'Course Title', 'required|is_unique[course_tbl.course_title]');
			$this->form_validation->set_rules('courseCategory', 'Course Category', 'required|in_list[Art & Design,Business,Culinary,Film & Photography,Technology]');
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
				if ($this->Instructor_model->save_course($title, $author, $date, $category))
				{
					$id = $this->Instructor_model->get_course_id($title,$_SESSION['email']);
					$this->session->set_userdata('course_id', $id);
					redirect(base_url('course/manage/goals/'.$id));
				}
			}
		}
		else
		{
			show_404();
		}
	}

	public function delete_course()
	{
		if (($_SESSION['logged_in']==true)&&($_SESSION['user_type']=='instructor'))
		{
			$this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');
			$this->form_validation->set_rules('courseTitle', 'Course Title', 'required');
			$this->form_validation->set_rules('courseAuthor', 'Course Author', 'required|valid_email');
			$course_title = $this->input->post('courseTitle');
			$course_author = $this->input->post('courseAuthor');
			if ($this->form_validation->run()==false)
			{
				// delete fail
				$page_data = array('page_title' => 'Delete Course', );
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/delete_course');
				$this->load->view('template/footer');
			}
			elseif($this->Instructor_model->archieve_course($course_title,$course_author,$_SESSION['email'])==false)
			{
				// delete fail
				$this->session->set_flashdata('error','Invalid Course or Email');
				$page_data = array('page_title' => 'Delete Course', );
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/delete_course');
				$this->load->view('template/footer');
			}
			else
			{
				// delete success
				$page_data = array('page_title' => 'Delete Course Success', );
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/delete_course_success');
				$this->load->view('template/footer');
			}
		}
		else
		{
			show_404();
		}
	}

	public function manage_goals($id=null)
	{
		if (($_SESSION['logged_in']==true)&&($_SESSION['user_type']=='instructor'))
		{
			if ($this->Instructor_model->check_if_their_course($_SESSION['email'],$id))
			{
				$course = $this->Instructor_model->get_course_info($_SESSION['email'],$id);
				$this->Instructor_model->get_course_id($course['course_title'],$_SESSION['email']);
				$this->session->set_userdata('course_id',$id);
				$page_data = array(
					'page_title' => 'Manage Course Goals',
					'course_title' => $course['course_title'],
					'course_author' => $course['course_author'],
					'course_tools' => $course['course_tools'],
					'course_audience' => $course['course_audience'],
					'course_achievement' => $course['course_achievement'],
				);
				$this->form_validation->set_rules('courseTools','Course Knowledge and Requirement','required');
				$this->form_validation->set_rules('courseAudience','Course Audience','required');
				$this->form_validation->set_rules('courseAchievement','Course Achievements','required');
				$author = $course['course_author'];
				$tools = $this->input->post('courseTools');
				$audience = $this->input->post('courseAudience');
				$achievement = $this->input->post('courseAchievement');
				if ($this->form_validation->run()==false)
				{
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_goals');
					$this->load->view('template/footer');
				}
				elseif ($this->Instructor_model->manage_course_goals($tools,$audience,$achievement,$id,$author))
				{
					$course = $this->Instructor_model->get_course_info($_SESSION['email'],$id);
					$update_alert = '<div class="alert alert-success" role="alert">Update Successful!</div>';
					$page_data = array(
						'page_title' => 'Manage Course Goals',
						'page_alert' => $update_alert,
						'course_title' => $course['course_title'],
						'course_author' => $course['course_author'],
						'course_tools' => $course['course_tools'],
						'course_audience' => $course['course_audience'],
						'course_achievement' => $course['course_achievement'],
					);
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_goals');
					$this->load->view('template/footer');
				}
				else
				{
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_goals');
					$this->load->view('template/footer');
				}
			}
			else
				show_404();
		}
		else
			show_404();
	}

	public function manage_landing_page($id=null)
	{
		if (($_SESSION['logged_in']==true)&&($_SESSION['user_type']=='instructor'))
		{
			if ($this->Instructor_model->check_if_their_course($_SESSION['email'],$id))
			{
				$course = $this->Instructor_model->get_course_info($_SESSION['email'],$id);
				$page_data = array(
					'page_title' => 'Manage Course Goals',
					'course_title' => $course['course_title'],
					'course_author' => $course['course_author'],
					'course_description' => $course['course_description'],
				);
				$this->form_validation->set_rules('courseTitle','Course Title','required');
				$this->form_validation->set_rules('courseDescription','Course Description','required');
				$author = $course['course_author'];
				$title = $this->input->post('courseTitle');
				$description = $this->input->post('courseDescription');
				if ($this->form_validation->run()==false)
				{
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_landing_page');
					$this->load->view('template/footer');
				}
				elseif ($this->Instructor_model->manage_coourse_landing_page($title,$description,$id,$author))
				{
					$course = $this->Instructor_model->get_course_info($_SESSION['email'],$id);
					$update_alert = '<div class="alert alert-success" role="alert">Update Successful!</div>';
					$page_data = array(
						'page_title' => 'Manage Course Goals',
						'page_alert' => $update_alert,
						'course_title' => $course['course_title'],
						'course_author' => $course['course_author'],
						'course_description' => $course['course_description'],
					);
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_landing_page');
					$this->load->view('template/footer');
				}
				else
				{
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_landing_page');
					$this->load->view('template/footer');
				}
			}
			else
				show_404();
		}
		else
			show_404();
	}

	public function manage_outline($id=null)
	{
		if ($this->Instructor_model->check_if_their_course($_SESSION['email'],$id))
		{
			$course = $this->Instructor_model->get_course_info($_SESSION['email'],$id);
			$page_data = array(
				'page_title' => 'Manage Course Outline',
				'course_title' => $course['course_title'],
				'course_author' => $course['course_author'],
				'course_description' => $course['course_description'],
			);
			if (!$this->form_validation->run())
			{
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_outline');
				$this->load->view('template/footer');
			}
		}
		else show_404();

		
	}
		
}