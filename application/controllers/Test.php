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
}
