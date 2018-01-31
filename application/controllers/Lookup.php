<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lookup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lookup_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
	}

	public function instructor_profile($data)
	{
		
		$this->load->library('Parsedown/Parsedown.php');
		$row = $this->Lookup_model->get_instructor_profile($data);


		if (empty($row))
		{
			$page_data = array('page_title' => 'Instructor not found', );
			$this->load->view('template/header',$page_data);
			$this->load->view('errors/404_view');
			$this->load->view('template/footer');
		}
		else
		{
			$page_data = array(
				'page_title' => $row->instructor_name.' | '.$row->instructor_headline,
				 );
			$profile_data = array(
				'name' => $row->instructor_name,
				'headline' => $row->instructor_headline,
				'bio' => $this->parsedown->text($row->instructor_bio),
				'instructor_img_url' => $row->instructor_img_url
				 );
			$this->load->view('template/header', $page_data);
			$this->load->view('instructor/profile_view', $profile_data);
			$this->load->view('template/footer');
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
