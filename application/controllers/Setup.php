<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Setup_model');
	}

	public function index()
	{
		$page_data = array('page_title' => 'Database Installation', );
		// $this->load->model('Setup_model');
		$this->Setup_model->createTablesSchema();
		$this->load->view('template/headerWoNav', $page_data);
		$this->load->view('setup/success_view');
		$this->load->view('template/footer');
	}

	public function encryption()
	{
		$this->load->library('encryption');
		$plain_text = 'This is a plain-text message!';
		$ciphertext = $this->encryption->encrypt($plain_text);

		// Outputs: This is a plain-text message!
		echo $ciphertext."<br>";
		echo $this->encryption->decrypt($ciphertext);
	}
}
