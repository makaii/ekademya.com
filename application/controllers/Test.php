<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
	public function get_id()
	{
		$this->load->model('Courses_model');

		$id = $this->Courses_model->get_course_id('Python Programming',$_SESSION['email']);
		echo $id;
	}
	public function display_courses()
	{
		$this->load->model('Instructor_model');
		$courses = $this->Instructor_model->get_instructors_courses($_SESSION['email']);
		echo "<pre>";
		print_r($courses);
		echo "</pre>";
	}
	public function delete_course()
	{
		$title = "Python Programming";
		$author = "kramkram@gmail.com";
		$this->load->model('Instructor_model');
		$result = $this->Instructor_model->archieve_course($title,$author);
		echo $result;
	}
	public function make_tables()
	{
		$this->load->model('Instructor_model');
		$title = 'Python Gaming';
		$desc = 'hey';
		$id = 4;
		$author = 'kramkram@gmail.com';
		
		if ($this->Instructor_model->manage_coourse_landing_page($title,$desc,$id,$author))
		{
			echo "yes";
		}
	}
}
