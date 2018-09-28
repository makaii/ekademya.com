<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lookup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lookup_model');
		$this->load->model('Admin_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
	}

	public function user_profile($id)
	{
		
		$this->load->library('Parsedown/Parsedown.php');
		$row = $this->Lookup_model->get_user_profile($id);


		if (empty($row))
		{
			$page_data = array(
				'page_title' => 'User not found',
				'course_categories' => $this->Lookup_model->get_category(),
			);
			$this->load->view('template/header',$page_data);
			$this->load->view('errors/404_view');
			$this->load->view('template/footer');
		}
		else
		{
			$user_flname = $row['user_fname']." ".$row['user_lname'];
			$page_data = array(
				'page_title' => ucwords($user_flname)." | ".$row['user_headline'],
				'course_categories' => $this->Lookup_model->get_category(),
			);
			$profile_data = array(
				'name' => $user_flname,
				'headline' => $row['user_headline'],
				'bio' => $this->parsedown->text($row['user_bio']),
				'pubemail' => $row['user_pubemail'],
				'user_img_url' => $row['user_img_url'],
				'website_link' => $row['user_website'],
				'facebook_link' => $row['user_facebook'],
				'googleplus_link' => $row['user_googleplus'],
				'linkedin_link' => $row['user_linkedin'],
				'twitter_link' => $row['user_twitter'],
				'youtube_link' => $row['user_youtube'],
				 );
			if ($this->session->userdata('user_type')=='user')
			{
				$this->load->view('template/headerUser', $page_data);
				$this->load->view('profile/lookup', $profile_data);
				$this->load->view('template/footer');
			}
			elseif ($this->session->userdata('user_type')=='instructor')
			{
				$this->load->view('template/headerInstructor', $page_data);
				$this->load->view('profile/lookup', $profile_data);
				$this->load->view('template/footer');
			}
			else
			{
				$this->load->view('template/header', $page_data);
				$this->load->view('profile/lookup', $profile_data);
				$this->load->view('template/footer');
			}
		}		
	}

	public function search_course()
	{
		$page_data = array(
			'page_title' => 'Search',
			'course_categories' => $this->Lookup_model->get_category(),
			'search' => null,
		);
		$this->form_validation->set_rules('q','Search Input','trim');
		$page_data['q_string'] = $this->input->get('q');
		if (!$this->form_validation->run())
		{
			$search_string = $this->input->get('q');
			$search_result = $this->Lookup_model->search_course($search_string);
			if ($search_result!=null)
			{
				$page_data['search'] = $search_result;
				$page_data['page_title'] = 'Result of '.$search_string;
				if ($this->session->has_userdata('user_type'))
				{
					$user_type = $this->session->userdata('user_type');
					if ($user_type == 'user')
					{
						$this->load->view('template/headerUser',$page_data);
						$this->load->view('main/search');
						$this->load->view('template/footer');
					}
					elseif ($user_type == 'instructor')
					{
						$this->load->view('template/headerInstructor',$page_data);
						$this->load->view('main/search');
						$this->load->view('template/footer');
					}
				}
				else
				{
					$this->load->view('template/header',$page_data);
					$this->load->view('main/search');
					$this->load->view('template/footer');
				}
			}
			else
			{
				if ($this->session->has_userdata('user_type'))
				{
					$user_type = $this->session->userdata('user_type');
					if ($user_type == 'user')
					{
						$this->load->view('template/headerUser',$page_data);
						$this->load->view('main/search');
						$this->load->view('template/footer');
					}
					elseif ($user_type == 'instructor')
					{
						$this->load->view('template/headerInstructor',$page_data);
						$this->load->view('main/search');
						$this->load->view('template/footer');
					}
				}
				else
				{
					$this->load->view('template/header',$page_data);
					$this->load->view('main/search');
					$this->load->view('template/footer');
				}
			}
		}
		else
		{
			if ($this->session->has_userdata('user_type'))
			{
				$user_type = $this->session->userdata('user_type');
				if ($user_type == 'user')
				{
					$this->load->view('template/headerUser',$page_data);
					$this->load->view('main/search');
					$this->load->view('template/footer');
				}
				elseif ($user_type == 'instructor')
				{
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('main/search');
					$this->load->view('template/footer');
				}
			}
			else
			{
				$this->load->view('template/header',$page_data);
				$this->load->view('main/search');
				$this->load->view('template/footer');
			}
		}		
	}

	public function courses($course_id)
	{
		if (!empty($course_id))
		{
			$course = $this->Lookup_model->get_course($course_id);
			$this->load->model('Instructor_model');
			$outline = $this->Instructor_model->get_outline($course_id);
			$this->load->model('Account_model');
			$author = $this->Account_model->get_profile_info($course['course_author']);
			$page_data = array(
				'page_title' => ucwords($course['course_title']),
				'course_categories' => $this->Lookup_model->get_category(),
				'course_id' => $course_id,
				'course' => $course,
				'outline' => $outline,
				'author' => $author,
			);
			if ($_SESSION['logged_in']==true)
			{
				if ($_SESSION['user_type']=='student')
				{
					$this->load->view('template/headerUser',$page_data);
					$this->load->view('instructor/course_edit/course_preview');
					$this->load->view('template/footer');
				}
				elseif ($_SESSION['user_type']=='instructor')
				{
					$this->load->view('template/headerUser',$page_data);
					$this->load->view('instructor/course_edit/course_preview');
					$this->load->view('template/footer');
				}
			}
			else
			{
				$this->load->view('template/header',$page_data);
				$this->load->view('instructor/course_edit/course_preview');
				$this->load->view('template/footer');
			}
		}
		else
			show_404();
	}
	public function courses_cat($category)
	{

	}

		
}
