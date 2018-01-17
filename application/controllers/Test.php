<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Test_model');
		$this->load->model('Login_model');
	}

	public function register_array(){
		$data = array(
			'user_email' => 'markk@gmail.com',
			'user_password' => 'markmark',
			 );
		$this->Login_model->register_instructor($data);
	}
	public function hash()
	{
		$email = "mork@gmail.com";
		$password = "morkmork";

		echo $this->Login_model->authenticate($email, $password);
	}
	public function test_search()
	{
		$this->load->model('Courses_model');
		$this->Courses_model->search_course('data');
		echo "<pre>";
		print_r($this->db->last_query());
		echo "</pre>";
	}
}
