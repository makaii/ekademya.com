<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if (!$this->session->has_userdata('admin_logged_in'))
		{
			$this->session->set_userdata('admin_logged_in', false);
		}
	}

	public function index()
	{
		
		if ($this->session->userdata('admin_logged_in') == true)
		{
			$page_data = array(
				'page_title' => 'Welcome Admin',
			);
			$this->load->view('admin/template/header', $page_data);
			$this->load->view('admin/pages/index');
			$this->load->view('admin/template/footer');
		}
		elseif ($this->session->userdata('admin_logged_in') == false) {
			redirect(base_url('admin/signin'));
		}

	}

	public function signin()
	{
		$this->form_validation->set_rules('adminEmail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('adminPassword', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		$email = $this->input->post('adminEmail');
		$password = $this->input->post('adminPassword');

		if ($this->form_validation->run() == false)
		{
			// validation failed
			$page_data = array('page_title' => 'Ekademya | Admin Signin', );
			$this->load->view('admin/template/header', $page_data);
			$this->load->view('admin/pages/signin_view');
			$this->load->view('admin/template/footer');
		}
		elseif ($this->Admin_model->authenticate_admin($email,$password) == false)
		{
			// invalid email or password
			$this->session->set_flashdata('error','invalid email or password');
			$page_data = array('page_title' => 'Ekademya | Sign Error', );
			$this->load->view('admin/template/header', $page_data);
			$this->load->view('admin/pages/signin_view');
			$this->load->view('admin/template/footer');
		}
		else
		{
			// login successful
			redirect(base_url('admin'));
		}
	}

		
}
