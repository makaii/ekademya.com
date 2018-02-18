<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == false)
		{
			redirect(base_url());
		}
		$this->load->model('Admin_model');
		$this->load->model('Account_model');
	}

	public function edit()
	{
		$profile_data = $this->Account_model->get_profile_info($this->session->userdata('user_id'));
		$page_data = array(
			'page_title' => 'Edit Profile Information',
			'profile_fname' => $profile_data['user_fname'],
			'profile_lname' => $profile_data['user_lname'],
			'profile_name' => $profile_data['user_fname']." ".$profile_data['user_lname'],
			'profile_pubemail' => $profile_data['user_pubemail'],
			'profile_photo' => $profile_data['user_img_url'],
			'profile_headline' => $profile_data['user_headline'],
			'profile_bio' => $profile_data['user_bio'],
			'profile_website' => $profile_data['user_website'],
			'profile_facebook' => $profile_data['user_facebook'],
			'profile_googleplus' => $profile_data['user_googleplus'],
			'profile_linkedin' => $profile_data['user_linkedin'],
			'profile_twitter' => $profile_data['user_twitter'],
			'profile_youtube' => $profile_data['user_youtube'],
		);
		if ($this->session->userdata('user_type')!=false)
		{
			if ($this->session->userdata('user_type')=='student')
			{
				$this->load->view('template/headerUser', $page_data);
				$this->load->view('profile/edit');
				$this->load->view('template/footer');
			}
			elseif ($this->session->userdata('user_type')=='instructor')
			{
				$this->load->view('template/headerInstructor', $page_data);
				$this->load->view('profile/edit');
				$this->load->view('template/footer');
			}
		}
		
	}

	public function photo()
	{
		$profile_data = $this->Account_model->get_profile_info($this->session->userdata('user_id'));
		$page_data = array(
			'page_title' => 'Edit Profile Photo',
			'profile_name' => $profile_data['user_fname']." ".$profile_data['user_lname'],
			'profile_photo' => $profile_data['user_img_url'],
		);
		if ($this->session->userdata('user_type')!=false)
		{
			if ($this->session->userdata('user_type')=='student')
			{
				$this->load->view('template/headerUser', $page_data);
				$this->load->view('profile/photo');
				$this->load->view('template/footer');
			}
			elseif ($this->session->userdata('user_type')=='instructor')
			{
				$this->load->view('template/headerInstructor', $page_data);
				$this->load->view('profile/photo');
				$this->load->view('template/footer');
			}
		}
	}

	public function preview()
	{
		$profile_data = $this->Account_model->get_profile_info($this->session->userdata('user_id'));
		$page_data = array(
			'page_title' => 'Profile Preview',
			'name' => $profile_data['user_fname']." ".$profile_data['user_lname'],
			'pubemail' => $profile_data['user_pubemail'],
			'photo' => $profile_data['user_img_url'],
			'headline' => $profile_data['user_headline'],
			'bio' => $profile_data['user_bio'],
			'website_link' => $profile_data['user_website'],
			'facebook_link' => $profile_data['user_facebook'],
			'googleplus_link' => $profile_data['user_googleplus'],
			'linkedin_link' => $profile_data['user_linkedin'],
			'twitter_link' => $profile_data['user_twitter'],
			'youtube_link' => $profile_data['user_youtube'],
		);
		if ($this->session->userdata('user_type')!=false)
		{
			if ($this->session->userdata('user_type')=='student')
			{
				$this->load->view('template/headerUser', $page_data);
				$this->load->view('profile/preview');
				$this->load->view('template/footer');
			}
			elseif ($this->session->userdata('user_type')=='instructor')
			{
				$this->load->view('template/headerInstructor', $page_data);
				$this->load->view('profile/preview');
				$this->load->view('template/footer');
			}
		};
	}

	public function delete()
	{
		$profile_data = $this->Account_model->get_profile_info($this->session->userdata('user_id'));
		$page_data = array(
			'page_title' => 'Delete Profile',
			'profile_name' => $profile_data['user_fname']." ".$profile_data['user_lname'],
		);
		if ($this->session->userdata('user_type')!=false)
		{
			if ($this->session->userdata('user_type')=='student')
			{
				$this->load->view('template/headerUser', $page_data);
				$this->load->view('profile/delete');
				$this->load->view('template/footer');
			}
			elseif ($this->session->userdata('user_type')=='instructor')
			{
				$this->load->view('template/headerInstructor', $page_data);
				$this->load->view('profile/delete');
				$this->load->view('template/footer');
			}
		}
	}
}
