<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == true) 
		{
			redirect(base_url('courses'));
		}
		$this->load->helper('url');
	}

	public function art_design()
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
		$this->load->view('template/header', $page_data);
		$this->load->view('courses/index', $nav_data);
		$this->load->view('template/footer');
	}

	public function business()
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
		$this->load->view('template/header', $page_data);
		$this->load->view('courses/index', $nav_data);
		$this->load->view('template/footer');
	}

	public function culinary()
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
		$this->load->view('template/header', $page_data);
		$this->load->view('courses/index', $nav_data);
		$this->load->view('template/footer');
	}

	public function film()
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
		$this->load->view('template/header', $page_data);
		$this->load->view('courses/index', $nav_data);
		$this->load->view('template/footer');
	}

	public function Technology()
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
		$this->load->view('template/header', $page_data);
		$this->load->view('courses/index', $nav_data);
		$this->load->view('template/footer');
	}
}