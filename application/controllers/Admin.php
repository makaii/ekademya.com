<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Instructor_model');
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
				'overview_active' => 'active',
				'no_courses' => $this->Admin_model->count_pubished_courses(),
				'no_instructors' => $this->Admin_model->count_instructors(),
				'no_user' => $this->Admin_model->count_instructors()
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
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==false)
		{
			// not looged in
			$this->form_validation->set_rules('adminEmail', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('adminPassword', 'Password', 'required');
			$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
			$email = $this->input->post('adminEmail');
			$password = $this->input->post('adminPassword');

			if ($this->form_validation->run() == false)
			{
				// validation failed
				$page_data = array('page_title' => 'Ekademya | Admin Signin', );
				$this->load->view('admin/pages/signin_view', $page_data);
			}
			elseif ($this->Admin_model->authenticate_admin($email,$password) == false)
			{
				// invalid email or password
				$this->session->set_flashdata('error','invalid email or password');
				$page_data = array('page_title' => 'Ekademya | Sign Error', );
				$this->load->view('admin/pages/signin_view', $page_data);
			}
			else
			{
				// login successful
				redirect(base_url('admin'));
			}
		}
		else
		{
			// already logged in
			redirect(base_url('admin'));
		}
		
	}

	public function instructors()
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$page_data = array(
				'page_title' => 'Instructors',
				'instructors_active' => 'active',
				'instructors' => $this->Admin_model->get_all_instructors(),
			);
			$this->load->view('admin/template/header',$page_data);
			$this->load->view('admin/pages/instructors');
			$this->load->view('admin/template/footer');
		}
		else
		{
			redirect(base_url('admin'));
		}
	}
	public function settings()
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$page_data = array(
				'page_title' => 'Admin Settings',
				'settings_active' => 'active',
			);
			$this->form_validation->set_rules('userdata', '', 'trim');
			$this->form_validation->set_rules('feedback', '', 'trim');
			if ($this->form_validation->run()==false)
			{
				$this->load->view('admin/template/header',$page_data);
				$this->load->view('admin/pages/settings_view');
				$this->load->view('admin/template/footer');
			}
			elseif ($this->form_validation->run()==true)
			{
				$userdata = $this->input->post('userdata');
				$feedback = $this->input->post('feedback');
				if (isset($userdata))
				{
					$this->Admin_model->set_display_userdata($userdata);
				}
				if (isset($feedback))
				{
					$this->Admin_model->set_display_feedback($feedback);
				}
				$page_data = array(
					'page_title' => 'Admin Settings Updated',
					'admin_email' => $this->session->userdata('admin_email'),
					'admin_type' => $this->session->userdata('admin_type'),
					'settings_active' => 'active',
				);
				$this->load->view('admin/template/header',$page_data);
				$this->load->view('admin/pages/settings_view');
				$this->load->view('admin/template/footer');
			}
		}
		else
		{
			redirect(base_url('admin'));
		}
		
	}

	public function courses()
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$page_data = array(
				'page_title' => 'Courses',
				'courses_active' => 'active',
				'courses' => $this->Admin_model->get_published_courses(),
			);
			$this->load->view('admin/template/header',$page_data);
			$this->load->view('admin/pages/courses');
			$this->load->view('admin/template/footer');
		}
		else
		{
			redirect(base_url('admin'));
		}
	}

	public function review()
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$page_data = array(
				'page_title' => 'Review Courses',
				'review_active' => 'active',
				'courses_review' => $this->Admin_model->get_unreviewed_courses(),
			);
			$this->load->view('admin/template/header',$page_data);
			$this->load->view('admin/pages/review');
			$this->load->view('admin/template/footer');
		}
		else
		{
			redirect(base_url('admin'));
		}
	}

	public function review_course($course_id)
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$course = $this->Admin_model->get_unreviewed_courses($course_id);
			$weeks = $this->Instructor_model->get_course_weeks($course_id);
			$outline = [];
			if (!empty($weeks)) {
				foreach ($weeks as $key => $value) {
					$outline[] = $this->Instructor_model->get_weekly_outline($course_id,$value['week_id']);
				}
			}
			$review = $this->Admin_model->get_review_data($course_id);
				$review_info = unserialize($review['review_course_info']);
				$review_outline = unserialize($review['review_course_outline']);
			$page_data = array(
				'page_title' => 'Reviewing '.$course['course_title'],
				'review_active' => 'active',
				'course' => $course,
				'outline' => $outline,
				'course_id' => $course_id,
				'review_info' => $review_info,
				'review_outline' => $review_outline
			);
			// form rules
			$this->form_validation->set_rules('comment_title','Title Comment','trim');
			$this->form_validation->set_rules('comment_category','Description Comment','trim');
			$this->form_validation->set_rules('comment_type','Course Type Comment','trim');
			$this->form_validation->set_rules('comment_description','Description Comment','trim');
			$this->form_validation->set_rules('comment_tools','Tools Comment','trim');
			$this->form_validation->set_rules('comment_audience','Audience Comment','trim');
			$this->form_validation->set_rules('comment_achievement','Achievement Comment','trim');
			$this->form_validation->set_rules('comment_project','Final Project Comment','trim');
			$outln_num = 1;
			if (!empty($outline)) {
				foreach ($outline as $week => $w) {
					foreach ($w as $key => $value) {
						// echo "review_outline_$key";
						$this->form_validation->set_rules("review_outline_$key","Outline #$outln_num",'trim');
						$outln_num++;
					}
					
				}
			}
			// form rules
			if (!$this->form_validation->run())
			{
				$this->load->view('admin/template/header',$page_data);
				$this->load->view('admin/pages/review_course');
				$this->load->view('admin/template/footer');
			}
			else
			{
				// inputs
				foreach ($outline as $key => $value) {
					$review_course_outline_data[] = $this->input->post("review_outline_$key");
				}
				$comment_array = array(
					'review_course_info' => [
						'review_title' => $this->input->post('comment_title'),
						'review_category' => $this->input->post('comment_category'),
						'review_type' => $this->input->post('comment_type'),
						'review_description' => $this->input->post('comment_description'),
						'review_tools' => $this->input->post('comment_tools'),
						'review_audience' => $this->input->post('comment_audience'),
						'review_achievement' => $this->input->post('comment_achievement'),
					],
					'review_course_outline' => $review_course_outline_data,
				);
				// /inputs
				if ($this->Admin_model->send_review_comments($course_id,$comment_array))
				{
					if ($this->Admin_model->set_course_review_status($course_id,1))
					{
						$this->load->view('admin/template/header',$page_data);
						$this->load->view('admin/pages/review_course_success');
						$this->load->view('admin/template/footer');
					}
					
				}
				else
				{
					show_404();
				}
			}
		}
		else
		{
			redirect(base_url('admin'));
		}
	}
	public function course_review_approve($course_id)
	{
		$course = $this->Admin_model->get_unreviewed_courses($course_id);
		$page_data = array(
			'page_title' => 'Course Approve',
			'course' => $course,
			'review_active' => 'active',
		);
		if ($this->Admin_model->publish_course($course_id)) {
			$this->load->view('admin/template/header',$page_data);
			$this->load->view('admin/pages/review_course_approve');
			$this->load->view('admin/template/footer');
		}
		else
		{
			echo "may mali";
		}
	}

	public function categories()
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if ($admin_logged_in==true)
		{
			$this->load->model('Lookup_model');
			$categories = $this->Lookup_model->get_category();
			$page_data = array(
				'page_title' => 'Categories',
				'categories_active' => 'active',
				'categories' => $categories,
			);
			// set ruels
			$this->form_validation->set_rules('categoryName','Category Name','trim|required|alpha_dash|is_unique[category_tbl.category_name]');
			$this->form_validation->set_rules('categoryCode','Category Code','trim|required|alpha_dash|is_unique[category_tbl.category_code]');
			// /set rules
			if (!$this->form_validation->run()) {
				$this->load->view('admin/template/header',$page_data);
				$this->load->view('admin/pages/categories');
				$this->load->view('admin/template/footer');
			}
			else
			{
				$name = $this->input->post('categoryName');
				$code = $this->input->post('categoryCode');
				if ($this->Admin_model->add_new_category($name,$code))
				{
					redirect(base_url('admin/categories'));
				}
				else
					show_404();
				
			}
			
		}
		else
		{
			redirect(base_url('admin'));
		}
	}

	public function add_admin()
	{
		if ($this->Admin_model->add_new_admin($_POST['admin_email'],$_POST['admin_password'],$_POST['admin_type'])) {
			echo "succes";
		}
		else
			echo "fail";
	}

	public function email()
	{
		if ($this->session->userdata('admin_logged_in'))
		{
			$page_data = array(
				'page_title' => 'Mail',
				'email_active' => 'active',
				'page_alert' => null,
			);

			// form rules
			$this->form_validation->set_rules('reciever','Reciever','trim|required|valid_email');
			$this->form_validation->set_rules('subject','Subject','trim|alpha_numeric_spaces');
			$this->form_validation->set_rules('message','Message','trim');
			// /form rules

			if (!$this->form_validation->run()) {
				// fail
				$this->load->view('admin/template/header',$page_data);
				$this->load->view('admin/pages/email');
				$this->load->view('admin/template/footer');
			}
			else {
				// success

				// send mail
				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'dev.ekademya@gmail.com',
					'smtp_pass' => 'plusultra',
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE,
				);
				$this->email->initialize($config);
				$this->email->from('dev.ekademya@gmail.com');
				$this->email->to($this->input->post('reciever'));
				$this->email->subject($this->input->post('subject'));
				$this->email->message($this->input->post('message'));
				$this->email->set_newline("\r\n");
				if (!$this->email->send()) {
					// mail not sent
					$page_data['page_alert'] = 'fail';
					$this->load->view('admin/template/header',$page_data);
					$this->load->view('admin/pages/email');
					$this->load->view('admin/template/footer');
				}
				else {
					// mail send
					$page_data['page_alert'] = 'success';
					$this->load->view('admin/template/header',$page_data);
					$this->load->view('admin/pages/email');
					$this->load->view('admin/template/footer');
				}
				
			}

		}
		else
			redirect(base_url('admin'));
	}

		
}
