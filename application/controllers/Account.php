<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function index()
	{
		$page_data = array
		(
			'page_title' => 'welcome',
		);
		$this->load->view('template/headerUser', $page_data);
		$this->load->view('user/index');
		$this->load->view('template/footer');
	}
}
