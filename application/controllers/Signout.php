<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signout extends CI_Controller {

	public function index()
	{
		$logged_in = $this->session->userdata('logged_in');
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if (($logged_in==1) || ($admin_logged_in==1))
		{
			if ($logged_in==1)
			{
				$this->session->sess_destroy();
				redirect(base_url('signin'));
			}
			elseif ($admin_logged_in==1)
			{
				$this->session->sess_destroy();
				redirect(base_url('admin/signin'));
			}

			
		}
		else
			show_404();		
	}
}
