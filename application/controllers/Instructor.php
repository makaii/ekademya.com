<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Instructor_model');
		$this->load->model('Admin_model');
		if (!$this->session->has_userdata('logged_in'))
		{
			$this->session->set_userdata('logged_in', false);
		}
		if ($this->session->userdata('logged_in') == false && $this->session->userdata('user_type')!='instructor')
		{
			redirect(base_url());
		}
	}

	public function index()
	{
		$page_data = array(
			'page_title' => 'Welcome',
		);
		$this->session->unset_userdata('course_id');
		$this->load->view('template/headerInstructor', $page_data);
		$this->load->view('instructor/index');
		$this->load->view('template/footer');
	}

	public function create_course()
	{
		if (($_SESSION['logged_in']==true) && ($_SESSION['user_type']=="instructor"))
		{
			$this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');
			$this->form_validation->set_rules('courseTitle', 'Course Title', 'trim|required');
			$this->form_validation->set_rules('courseCategory', 'Course Category', 'required|in_list[Art & Design,Business,Culinary,Film & Photography,Technology]');
			if ($this->form_validation->run()==false)
			{
				// create fail
				$page_data = array('page_title' => 'Create Course', );
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/create_course');
				$this->load->view('template/footer');
			}
			else
			{
				// create success
				$title = $this->input->post('courseTitle');
				$author = $this->session->userdata('user_id');
				$date = date('Y-m-d H:i:s');
				$category = $this->input->post('courseCategory');
				if ($this->Instructor_model->save_course($title, $author, $date, $category))
				{
					$id = $this->Instructor_model->get_course_id($title,$_SESSION['user_id']);
					$this->session->set_userdata('course_id', $id);
					redirect(base_url('course/manage/goals/'.$id));
				}
			}
		}
		else
		{
			show_404();
		}
	}

	public function delete_course($course_id=null)
	{
		if (($_SESSION['logged_in']==true)&&($_SESSION['user_type']=='instructor'))
		{
			if (!empty($course_id)&&$this->Instructor_model->check_if_their_course($_SESSION['user_id'],$course_id)==true)
			{
				$course_title = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
				$this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');
				$this->form_validation->set_rules('courseAuthorPass', 'Account Password', 'trim|required');
				$course_authorpass = $this->input->post('courseAuthorPass');
				if ($this->form_validation->run()==false)
				{
					// delete fail
					$page_data = array(
						'page_title' => 'Delete Course',
						'course_id' => $course_id,
						'course_title' => $course_title['course_title'],
					);
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/delete_course');
					$this->load->view('template/footer');
				}
				elseif($this->Instructor_model->archieve_course($course_id,$course_authorpass,$_SESSION['user_id'],$_SESSION['user_email'])==false)
				{
					// delete fail
					$this->session->set_flashdata('error','Invalid Password');
					$page_data = array(
						'page_title' => 'Delete Course',
						'course_id' => $course_id,
						'course_title' => $course_title['course_title'],
					);
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/delete_course');
					$this->load->view('template/footer');
				}
				else
				{
					// delete success
					$page_data = array('page_title' => 'Delete Course Success', );
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/delete_course_success');
					$this->load->view('template/footer');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_404();
		}
	}

	public function manage_goals($id=null)
	{
		if (($_SESSION['logged_in']==true)&&($_SESSION['user_type']=='instructor'))
		{
			if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$id))
			{
				$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$id);
				$this->Instructor_model->get_course_id($course['course_title'],$_SESSION['user_id']);
				$this->session->set_userdata('course_id',$id);
				$page_data = array(
					'page_title' => 'Manage Course Goals',
					'course_title' => $course['course_title'],
					'course_author' => $course['course_author'],
					'course_tools' => $course['course_tools'],
					'course_audience' => $course['course_audience'],
					'course_achievement' => $course['course_achievement'],
				);
				$this->form_validation->set_rules('courseTools','Course Knowledge and Requirement','trim|required');
				$this->form_validation->set_rules('courseAudience','Course Audience','trim|required');
				$this->form_validation->set_rules('courseAchievement','Course Achievements','trim|required');
				$author_id = $course['course_author'];
				$tools = $this->input->post('courseTools');
				$audience = $this->input->post('courseAudience');
				$achievement = $this->input->post('courseAchievement');
				if ($this->form_validation->run()==false)
				{
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_goals');
					$this->load->view('template/footer');
				}
				elseif ($this->Instructor_model->manage_course_goals($tools,$audience,$achievement,$id,$author_id))
				{
					$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$id);
					$update_alert = '<div class="alert alert-success" role="alert">Update Successful!</div>';
					$page_data = array(
						'page_title' => 'Manage Course Goals',
						'page_alert' => $update_alert,
						'course_title' => $course['course_title'],
						'course_author' => $course['course_author'],
						'course_tools' => $course['course_tools'],
						'course_audience' => $course['course_audience'],
						'course_achievement' => $course['course_achievement'],
					);
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_goals');
					$this->load->view('template/footer');
				}
				else
				{
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_goals');
					$this->load->view('template/footer');
				}
			}
			else
				show_404();
		}
		else
			show_404();
	}

	public function manage_landing_page($id=null)
	{
		if (($_SESSION['logged_in']==true)&&($_SESSION['user_type']=='instructor'))
		{
			if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$id))
			{
				$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$id);
				$page_data = array(
					'page_title' => 'Manage Course Goals',
					'course_title' => $course['course_title'],
					'course_author' => $course['course_author'],
					'course_description' => $course['course_description'],
				);
				$this->form_validation->set_rules('courseTitle','Course Title','trim|required');
				$this->form_validation->set_rules('courseDescription','Course Description','trim|required');
				$author = $course['course_author'];
				$title = $this->input->post('courseTitle');
				$description = $this->input->post('courseDescription');
				if ($this->form_validation->run()==false)
				{
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_landing_page');
					$this->load->view('template/footer');
				}
				elseif ($this->Instructor_model->manage_course_landing_page($title,$description,$id,$author))
				{
					$course = $this->Instructor_model->get_course_info($_SESSION['user_email'],$id);
					$update_alert = '<div class="alert alert-success" role="alert">Update Successful!</div>';
					$page_data = array(
						'page_title' => 'Manage Course Goals',
						'page_alert' => $update_alert,
						'course_title' => $course['course_title'],
						'course_author' => $course['course_author'],
						'course_description' => $course['course_description'],
					);
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_landing_page');
					$this->load->view('template/footer');
				}
				else
				{
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_landing_page');
					$this->load->view('template/footer');
				}
			}
			else
				show_404();
		}
		else
			show_404();
	}

	public function manage_outline($id=null)
	{
		if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$id))
		{
			$outlines = $this->Instructor_model->get_outline($id);

			$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$id);
			$page_data = array(
				'page_title' => 'Manage Course Outline',
				'course_title' => $course['course_title'],
				'course_author' => $course['course_author'],
				'course_description' => $course['course_description'],
				'course_outline' => $outlines,
				'course_id' => $id,
			);
			$this->load->view('template/headerInstructor',$page_data);
			$this->load->view('instructor/course_outline');
			$this->load->view('template/footer');
		}
		else
		{
			show_404();
		}

		
	}

	public function add_outline_course_lecture($course_id)
	{
		if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$course_id))
		{
			$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
			$page_data = array(
				'page_title' => 'Add Lecture Outline',
				'course_title' => $course['course_title'],
				'course_id' => $course_id,
			);
			$this->form_validation->set_rules('lecture_title', 'Lecture Title', 'required|trim');
			$this->form_validation->set_rules('lecture_body', 'Lecture Content', 'trim|required');
			$outline_array = array(
				'outline_type' => 'lecture',
				'outline_course_id' => $course_id,
				'lecture_title' => $this->input->post('lecture_title'),
				'lecture_body' => $this->input->post('lecture_body'),
			);
			
			if (!$this->form_validation->run())
			{
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_outline_lecture_check');
				$this->load->view('template/footer');
			}
			elseif ($this->Instructor_model->add_outline($outline_array)==true)
			{
				redirect(base_url('course/manage/outline/'.$course_id));
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_404();
		}
	}

	public function add_outline_course_video($course_id)
	{
		if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$course_id)) {
			$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
			$this->form_validation->set_rules('video_title', 'Video Title', 'trim|required');
			$this->form_validation->set_rules('video_description', 'Video Description', 'trim');
			$page_data = array(
				'page_title' => 'Add Video Outline',
				'course_title' => $course['course_title'],
				'course_id' => $course_id,
				'upload_error' => '',
			);
			$this->input->post('video_title');
			$this->input->post('video_description');
			if (!$this->form_validation->run()) {
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_outline_video_check');
				$this->load->view('template/footer');
			}
			elseif ($this->form_validation->run()) {
				$video_config = array(
					'upload_path' => './z/course',
					'allowed_types' => 'mp4|mkv|webm',
					'encrypt_name' => true,
					'max_size' => 0,
					'max_width' => 1920,
					'max_height' => 1080,
					'min_width' => 640,
					'min_height' => 360,
					'remove_spaces' => true,
					'file_ext_tolower' => true,
					'detect_mime' => true,
					'mod_mime_fix' => true,
					'overwrite' => false,
					'max_filename' => 255,
				);
				$this->upload->initialize($video_config);
				if (!$this->upload->do_upload('video_file'))
				{
					$page_data['upload_error'] = $this->upload->display_errors();
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_outline_video_check');
					$this->load->view('template/footer');
				}
				elseif ($this->upload->do_upload('video_file')) {
					$outline_array = array(
						'outline_type' => 'video',
						'outline_course_id' => $course_id,
						'video_title' => $this->input->post('video_title'),
						'video_description' => $this->input->post('video_description'),
						'video_url' => $this->upload->data('file_name'),
					);
					if ($this->Instructor_model->add_outline($outline_array)==true) {
						redirect(base_url('course/manage/outline/'.$course_id));
					}
					else
						show_404();
				}
				else
					show_404();
			}
			else {
				show_404();
			}
		}
	}

	public function old_add_outline_course_lecture($id=null,$lecnum=null)
	{
		$course = $this->Instructor_model->get_course_info($_SESSION['user_email'],$id);
		if ($this->Instructor_model->check_if_their_course($_SESSION['user_email'],$id))
		{
			$page_data['page_title'] = 'Add Lecture';
			$page_data['course_title'] = $course['course_title'];
			$page_data['course_author'] = $course['course_author'];
			$page_data['course_outline_lecture_num'] =$lecnum;
			$page_data['course_section'] = $this->Instructor_model->get_section_title($id,$lecnum);
			$page_data['upload_error'] = "";

			$this->form_validation->set_rules('lectureTitle','Lecture Title','required');
			$this->form_validation->set_rules('lecture_description','Lecture Description','alpha_dash');
			if (!$this->form_validation->run())
			{
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_outline_add_lecture');
				$this->load->view('template/footer');
			}
			elseif ($this->form_validation->run())
			{
				$lecture_type = $this->input->post('lectureType');
				$title=$this->input->post('lectureTitle');
				$desc=$this->input->post('lectureDescription');
				$video_config = array(
					'upload_path' => './z/course',
					'allowed_types' => 'mp4|mkv|webm',
					'encrypt_name' => true,
					'max_size' => 0,
					'max_width' => 1920,
					'max_height' => 1080,
					'min_width' => 640,
					'min_height' => 360,
					'remove_spaces' => true,
					'file_ext_tolower' => true,
					'detect_mime' => true,
					'mod_mime_fix' => true,
					'overwrite' => false,
					'max_filename' => 255,
				);
				$this->upload->initialize($video_config);
				if (!$this->upload->do_upload('lectureVideo'))
				{
					$page_data['upload_error'] = $this->upload->display_errors();
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_outline_add_lecture');
					$this->load->view('template/footer');
				}
				else
				{
					$video_file_array = array(
						'outline_lecture_video_url' => $this->upload->data('file_name'),
						'outline_course_id' => $id,
						'outline_lecture_id' => $lecnum,
						'outline_author' => $this->session->userdata('user_email'),
						'outline_type' => 'video',
						'outline_lecture_title' => $title,
						'outline_lecture_description' => $desc,
					);
					if ($this->Instructor_model->add_video_lecture($video_file_array)) {
						redirect(base_url('course/manage/outline/'.$id));
					}
					show_404();
				}
			}
		}
	}

	private function upload_video($video_input=null)
	{
		$video_config = array(
			'upload_path' => 'z/course',
			'allowed_types' => 'mp4|mkv|webm',
			'max_size' => 0,
			'max_width' => 1920,
			'max_height' => 1080,
			'min_width' => 640,
			'min_height' => 360,
			'remove_spaces' => true,
			'file_ext_tolower' => true,
			'detect_mime' => true,
		);
	}

	private function upload_thumbnail($thumbnail_input=null)
	{
		$thumb_config = array(
			'upload_path' => '',
			'allowed_types' => 'png|jpeg|jpg',
			'max_size' => 0,
			'max_width' => 1024,
			'max_height' => 576,
			'min_width' => 640,
			'min_height' => 360,
			'remove_spaces' => true,
			'file_ext_tolower' => true,
			'detect_mime' => true,
		);
	}
}