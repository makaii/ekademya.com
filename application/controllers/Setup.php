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
		$this->Setup_model->createTablesSchema();
		$page_data = array(
			'page_title' => 'Database Installation',
			'table' => $this->Setup_model->getTableStructure('user_tbl'));
		// $this->load->model('Setup_model');
		$this->Setup_model->createTablesSchema();
		$this->load->view('template/headerWoNav', $page_data);
		$this->load->view('setup/success_view');
		$this->load->view('template/footer');
	}
}
