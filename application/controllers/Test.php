<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Test_model');
		$this->load->model('Login_model');
	}

	public function bool()
	{
		if (true == 1)
		{
			echo "true is == to 1"."<br>";
		}
		if (true === 1)
		{
			echo "true is == to 1"."<br>";
		}
		else{
			echo "true is not  === to 1"."<br>";
		}
	}

	public function hash()
	{
		echo $this->Login_model->authenticate('abc@gmail.com', 'markmark');


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
