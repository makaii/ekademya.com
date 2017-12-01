<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$page_data = array
		(
			'page_title' => 'welcome',
		);
		$this->load->view('main/index', $page_data);
	}
}
