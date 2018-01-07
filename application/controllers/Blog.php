<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
	}

	public function index()
	{
		$page_data = array(
			'page_title' => 'Ekademya Blog',
		);
		$this->load->view('template/header', $page_data);
		// load 5 article in 1 page
		$this->load->view('template/footer');
	}

	public function article($article_id=0)
	{
		$page_data = array(
			'page_title' => $article_title,
		);
		$this->load->view('template/header', $page_data);
		$this->load->view('template/footer');
	}

		
}
