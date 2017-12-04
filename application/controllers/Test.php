<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Test_model');
	}

	public function hash()
	{
		$password = '';
		// echo $this->config->item('encryption_key');
		$hash = password_hash($password, PASSWORD_BCRYPT);
		// echo $hash."<br>";
		// echo strlen($hash)."<br>";

		$hash = $this->Test_model->get_hash_pass($password);
		// echo print_r($hash);

		if (password_verify($password, $hash))
		{
			echo "good";
		}
		else
			echo "bad";


	}

	public function sendmail()
	{
		// $this->load->library('email');

		$config = array(
			'porotcol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 25,
			'smtp_user' => 'spamnimark@gmail.com',
			'smtp_pass' => 'devinespam',
			'mailtype' => 'html',
			 );
		$this->load->library('email', $config);
		// $this->email->initialize($config);

		$this->email->set_newline("\r\n");

		$this->email->from('spamnimark@gmail.com', 'Mark');
		$this->email->to('markjoshuaevangelista@gmail.com');
		$this->email->subject('testing');
		$this->email->message('hoy');
		if ($this->email->send())
		{
			echo "email sent";
		}
		else
		{
			echo show_error($this->email->print_debugger());
		}
	}
}
