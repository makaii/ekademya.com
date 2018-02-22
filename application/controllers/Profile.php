<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == false)
		{
			redirect(base_url());
		}
		if (empty($this->session->userdata('user_type')))
		{
			redirect(base_url());
		}
		$this->load->model('Admin_model');
		$this->load->model('Account_model');
	}

	public function edit()
	{
		$profile_data = $this->Account_model->get_profile_info($this->session->userdata('user_id'));
		$page_data = array(
			'page_title' => 'Edit Profile Information',
			'profile_fname' => $profile_data['user_fname'],
			'profile_lname' => $profile_data['user_lname'],
			'profile_name' => $profile_data['user_fname']." ".$profile_data['user_lname'],
			'profile_pubemail' => $profile_data['user_pubemail'],
			'profile_photo' => $profile_data['user_img_url'],
			'profile_headline' => $profile_data['user_headline'],
			'profile_bio' => $profile_data['user_bio'],
			'profile_website' => $profile_data['user_website'],
			'profile_facebook' => $profile_data['user_facebook'],
			'profile_googleplus' => $profile_data['user_googleplus'],
			'profile_linkedin' => $profile_data['user_linkedin'],
			'profile_twitter' => $profile_data['user_twitter'],
			'profile_youtube' => $profile_data['user_youtube'],
		);

		// SET RULES
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('pubemail', 'Profile Email', 'valid_email');
		$this->form_validation->set_rules('headline', 'Headline', '');
		$this->form_validation->set_rules('bio', 'Bio', '');
		$this->form_validation->set_rules('website', 'Personal Website', 'valid_url');
		$this->form_validation->set_rules('facebook', 'Facebook', 'valid_url');
		$this->form_validation->set_rules('googleplus', 'Googlep Plus', 'valid_url');
		$this->form_validation->set_rules('linkedin', 'Linkedin', 'valid_url');
		$this->form_validation->set_rules('twitter', 'Twitter', 'valid_url');
		$this->form_validation->set_rules('youtube', 'YouTube', 'valid_url');

		if ($this->form_validation->run()==false)
		{
			if ($this->session->userdata('user_type')=='student')
			{
				$this->load->view('template/headerUser', $page_data);
			}
			elseif ($this->session->userdata('user_type')=='instructor')
			{
				$this->load->view('template/headerInstructor', $page_data);
			}
			$this->load->view('profile/edit');
			$this->load->view('template/footer');
		}
		elseif ($this->form_validation->run()==true)
		{
			$id = $this->session->userdata('user_id');
			$profile_data['user_fname']= $this->input->post('fname');
			$profile_data['user_lname']= $this->input->post('lname');
			$profile_data['user_pubemail'] = $this->input->post('pubemail');
			$profile_data['user_headline'] = $this->input->post('headline');
			$profile_data['user_bio'] = $this->input->post('bio');
			$profile_data['user_website'] = $this->input->post('website');
			$profile_data['user_facebook'] = $this->input->post('facebook');
			$profile_data['user_googleplus'] = $this->input->post('googleplus');
			$profile_data['user_linkedin'] = $this->input->post('linkedin');
			$profile_data['user_twitter'] = $this->input->post('twitter');
			$profile_data['user_youtube'] = $this->input->post('youtube');
			$this->Account_model->update_profile_info($id , $profile_data);
			$profile_data = $this->Account_model->get_profile_info($this->session->userdata('user_id'));
			$page_data = array(
				'page_title' => 'Edit Profile Information',
				'profile_fname' => $profile_data['user_fname'],
				'profile_lname' => $profile_data['user_lname'],
				'profile_name' => $profile_data['user_fname']." ".$profile_data['user_lname'],
				'profile_pubemail' => $profile_data['user_pubemail'],
				'profile_photo' => $profile_data['user_img_url'],
				'profile_headline' => $profile_data['user_headline'],
				'profile_bio' => $profile_data['user_bio'],
				'profile_website' => $profile_data['user_website'],
				'profile_facebook' => $profile_data['user_facebook'],
				'profile_googleplus' => $profile_data['user_googleplus'],
				'profile_linkedin' => $profile_data['user_linkedin'],
				'profile_twitter' => $profile_data['user_twitter'],
				'profile_youtube' => $profile_data['user_youtube'],
			);
			$page_data['profile_updated']=true;
			$page_data['update_alert']='<div class="alert alert-success text-center" role="alert">Profile Updated Successful!</div>';
			if ($this->session->userdata('user_type')=='student')
			{
				$this->load->view('template/headerUser', $page_data);
			}
			elseif ($this->session->userdata('user_type')=='instructor')
			{
				$this->load->view('template/headerInstructor', $page_data);
			}
			$this->load->view('profile/edit');
			$this->load->view('template/footer');			
		}
			
		
	}

	public function photo()
	{
		$profile_data = $this->Account_model->get_profile_info($this->session->userdata('user_id'));
		$page_data = array(
			'page_title' => 'Edit Profile Photo',
			'profile_name' => $profile_data['user_fname']." ".$profile_data['user_lname'],
			'profile_photo' => $profile_data['user_img_url'],
			'error' => '',
		);
		
		if ($this->session->userdata('user_type')=='student')
		{
			$this->load->view('template/headerUser', $page_data);
			$this->load->view('profile/photo');
			$this->load->view('template/footer');
		}
		elseif ($this->session->userdata('user_type')=='instructor')
		{
			$this->load->view('template/headerInstructor', $page_data);
			$this->load->view('profile/photo');
			$this->load->view('template/footer');
		}
	}

	public function photo_upload()
	{
		$profile_data = $this->Account_model->get_profile_info($this->session->userdata('user_id'));
		$page_data = array(
			'page_title' => 'Edit Profile Photo',
			'profile_name' => $profile_data['user_fname']." ".$profile_data['user_lname'],
			'profile_photo' => $profile_data['user_img_url'],
			'error' => '',
		);

		$config['upload_path'] = './z/user';
		$config['allowed_types'] = 'jpg|png';
		$config['file_ext_tolower'] = true;
		// $config['encrypt_name'] = true;
		$config['file_name'] = $this->session->userdata('user_id');
		$config['overwrite'] = true;
		// $config['remove_spaces'] = true;
		$config['max_filename'] = 50;
		$config['max_size'] = 1024;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('photo'))
		{
			$page_data['error'] = $this->upload->display_errors();
			$this->load->view('template/headerInstructor', $page_data);
			$this->load->view('profile/photo');
			$this->load->view('template/footer');
		}
		else
		{
			$upload_data = $this->upload->data();
			$id = $this->session->userdata('user_id');
			$data['user_img_url'] = $upload_data['file_name'];
			$this->Account_model->update_profile_photo($id, $data);
			$profile_data = $this->Account_model->get_profile_info($this->session->userdata('user_id'));
			$page_data = array(
				'page_title' => 'Edit Profile Photo',
				'profile_name' => $profile_data['user_fname']." ".$profile_data['user_lname'],
				'profile_photo' => $profile_data['user_img_url'],
			);
			$page_data['photo_updated']=true;
			$page_data['update_alert']='<div class="alert alert-success text-center" role="alert">Photo Updated Successful!</div>';
			$this->load->view('template/headerInstructor', $page_data);
			$this->load->view('profile/photo');
			$this->load->view('template/footer');
		}
	}

	public function preview()
	{
		$profile_data = $this->Account_model->get_profile_info($this->session->userdata('user_id'));
		$page_data = array(
			'page_title' => 'Profile Preview',
			'name' => $profile_data['user_fname']." ".$profile_data['user_lname'],
			'pubemail' => $profile_data['user_pubemail'],
			'photo' => $profile_data['user_img_url'],
			'headline' => $profile_data['user_headline'],
			'bio' => $profile_data['user_bio'],
			'website_link' => $profile_data['user_website'],
			'facebook_link' => $profile_data['user_facebook'],
			'googleplus_link' => $profile_data['user_googleplus'],
			'linkedin_link' => $profile_data['user_linkedin'],
			'twitter_link' => $profile_data['user_twitter'],
			'youtube_link' => $profile_data['user_youtube'],
		);
		if ($this->session->userdata('user_type')!=false)
		{
			if ($this->session->userdata('user_type')=='student')
			{
				$this->load->view('template/headerUser', $page_data);
				$this->load->view('profile/preview');
				$this->load->view('template/footer');
			}
			elseif ($this->session->userdata('user_type')=='instructor')
			{
				$this->load->view('template/headerInstructor', $page_data);
				$this->load->view('profile/preview');
				$this->load->view('template/footer');
			}
		};
	}

	public function delete()
	{
		$id = $this->session->userdata('user_id');
		$profile_data = $this->Account_model->get_profile_info($id);
		$page_data = array(
			'page_title' => 'Delete Profile',
			'profile_name' => $profile_data['user_fname']." ".$profile_data['user_lname'],
			'profile_photo' => $profile_data['user_img_url'],
			'error' => '',
		);

		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('repassword', 'Confirm Password', 'required|matches[password]');
		if (!$this->form_validation->run())
		{
			if ($this->session->userdata('user_type')=='student')
			{
				$this->load->view('template/headerUser', $page_data);
			}
			elseif ($this->session->userdata('user_type')=='instructor')
			{
				$this->load->view('template/headerInstructor', $page_data);
			}
			$this->load->view('profile/delete');
			$this->load->view('template/footer');
		}
		else
		{
			$pass = $this->input->post('password');
			$email = $this->session->userdata('user_email');
			$this->load->model('Login_model');
			if (!$this->Login_model->authenticate($email,$pass))
			{
				$page_data['error'] = '<div class="row mt-4"><div class="col-md-4 offset-md-4"><div class="alert alert-danger text-center text-white bg-danger" role="alert">incorrect password</div></div></div>';
				if ($this->session->userdata('user_type')=='student')
				{
					$this->load->view('template/headerUser', $page_data);
				}
				elseif ($this->session->userdata('user_type')=='instructor')
				{
					$this->load->view('template/headerInstructor', $page_data);
				}
				$this->load->view('profile/delete');
				$this->load->view('template/footer');
			}
			else
			{
				if ($this->Account_model->delete_account($id))
				{
					redirect(base_url('signout'));
				}
				show_404();
			}
		}
	}

	public function account()
	{
		$profile_data = $this->Account_model->get_profile_info($this->session->userdata('user_id'));
		$page_data = array(
			'page_title' => 'Delete Profile',
			'profile_photo' => $profile_data['user_img_url'],
			'profile_name' => $profile_data['user_fname']." ".$profile_data['user_lname'],
			'profile_email' => $profile_data['user_email']
		);
		$this->form_validation->set_rules('currentpassword', 'Current Password', 'required');
		$this->form_validation->set_rules('newpassword', 'New Password', 'required');
		$this->form_validation->set_rules('renewpassword', 'Confirm New Password', 'required|matches[newpassword]');
		if (!$this->form_validation->run())
		{
			if ($this->session->userdata('user_type')=='student')
			{
				$this->load->view('template/headerUser', $page_data);
			}
			elseif ($this->session->userdata('user_type')=='instructor')
			{
				$this->load->view('template/headerInstructor', $page_data);
			}
			$this->load->view('profile/account');
			$this->load->view('template/footer');
		}
		else
		{
			$id=$this->session->userdata('user_id');
			$currentpassword=$this->input->post('currentpassword');
			$newpassword=$this->input->post('newpassword');
			if (!$this->Account_model->update_account_password($id,$currentpassword,$newpassword))
			{
				// fail
				$page_data['password_error'] = '<small class="text-danger">Wrong Password</small>'; 
				if ($this->session->userdata('user_type')=='student')
				{
					$this->load->view('template/headerUser', $page_data);
				}
				elseif ($this->session->userdata('user_type')=='instructor')
				{
					$this->load->view('template/headerInstructor', $page_data);
				}
				$this->load->view('profile/account');
				$this->load->view('template/footer');
			}
			else
			{
				// success
				$page_data['password_updated']=true;
				$page_data['update_alert']='<div class="alert alert-success text-center" role="alert">Password Updated Successful!</div>';
				if ($this->session->userdata('user_type')=='student')
				{
					$this->load->view('template/headerUser', $page_data);
				}
				elseif ($this->session->userdata('user_type')=='instructor')
				{
					$this->load->view('template/headerInstructor', $page_data);
				}
				$this->load->view('profile/account');
				$this->load->view('template/footer');
			}
			
		}
			


			
	}
}
