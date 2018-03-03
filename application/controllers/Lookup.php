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
			$page_data = array('page_title' => 'User not found', );
			$this->load->view('template/header',$page_data);
			$this->load->view('errors/404_view');
			$this->load->view('template/footer');
		}
		else
		{
			$user_flname = $row['user_fname']." ".$row['user_lname'];
			$page_data['page_title'] = ucwords($user_flname)." | ".$row['user_headline'];
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
		$search_string = $this->input->get('data');
		$search_result = $this->Lookup_model->search_course($search_string);
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

		
}
