<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == true)
		{
			redirect(base_url('account'));
		}
	}

	public function index()
	{
		$page_data = array(
			'page_title' => 'Signin',
		);

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		

		if ($this->form_validation->run() == false)
		{
			// login failed
			$this->load->view('template/header', $page_data);
			$this->load->view('login/signin_view');
			$this->load->view('template/footer');
		}
		elseif ($this->Login_model->authenticate($email, $password) == false)
		{
			$this->session->set_flashdata('error','invalid email or password');
			$this->load->view('template/header', $page_data);
			$this->load->view('login/signin_view');
			$this->load->view('template/footer');
		}
		else
		{
			// login successful
			$acc = $this->Login_model->get_acc_info($email, $password, true);
			$this->session->set_userdata('email', $acc->user_email);
			$this->session->set_userdata('logged_in', true);
			redirect(base_url('account'));
		}
	}
}
