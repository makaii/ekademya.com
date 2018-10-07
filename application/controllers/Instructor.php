<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Instructor_model');
		$this->load->model('Admin_model');
		$this->load->model('Lookup_model');
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
			'page_title' => 'Welcome '.$_SESSION['user_name'],
			'course_categories' => $this->Lookup_model->get_category(),
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
			$this->form_validation->set_rules('courseTitle', 'Course Title', 'trim|required');
			$this->form_validation->set_rules('courseCategory', 'Course Category', 'required');
			$this->form_validation->set_rules('courseType', 'Course Type', 'required');
			if ($this->form_validation->run()==false)
			{
				// create fail
				$page_data = array(
					'page_title' => 'Create Course',
					'course_categories' => $this->Lookup_model->get_category(),
				);
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/create_course');
				$this->load->view('template/footer');
			}
			else
			{
				// create success
				$title = $this->input->post('courseTitle');
				$author = $this->session->userdata('user_id');
				$category = $this->input->post('courseCategory');
				$type = $this->input->post('courseType');
				if ($this->Instructor_model->save_course($title,$author,$category,$type))
				{
					$id = $this->Instructor_model->get_course_id($title,$_SESSION['user_id']);
					$this->session->set_userdata('course_id', $id);
					redirect(base_url('course/edit/info/'.$id));
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
						'course_categories' => $this->Lookup_model->get_category(),
						'course_id' => $course_id,
						'course_title' => $course_title['course_title'],
					);
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/delete_course');
					$this->load->view('template/footer');
				}
				elseif($this->Instructor_model->delete_course($course_id,$course_authorpass,$_SESSION['user_id'],$_SESSION['user_email'])==false)
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
	public function archive_course($course_id=null)
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
						'page_title' => 'Archive Course',
						'course_categories' => $this->Lookup_model->get_category(),
						'course_id' => $course_id,
						'course_title' => $course_title['course_title'],
					);
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/archive_course');
					$this->load->view('template/footer');
				}
				elseif($this->Instructor_model->archive_course($course_id,$course_authorpass,$_SESSION['user_id'],$_SESSION['user_email'])==false)
				{
					// delete fail
					$this->session->set_flashdata('error','Invalid Password');
					$page_data = array(
						'page_title' => 'Archive Course',
						'course_id' => $course_id,
						'course_title' => $course_title['course_title'],
					);
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/archive_course');
					$this->load->view('template/footer');
				}
				else
				{
					// delete success
					$page_data = array('page_title' => 'Archive Course Success', );
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/archive_course_success');
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

	// cours edit
	public function course_info($course_id=null)
	{
		if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$course_id))
		{
			$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
			$category = $this->Lookup_model->get_category();
			// form rules
			$this->form_validation->set_rules('title','Course Title','required');
			$this->form_validation->set_rules('category','Course Category','required');
			$this->form_validation->set_rules('type','Course Type','required');
			$this->form_validation->set_rules('description','Course Description','trim|required');
			$this->form_validation->set_rules('audience','Course Audience','trim|required');
			$this->form_validation->set_rules('ktools','Course Knowledge and Tools','trim|required');
			$this->form_validation->set_rules('goals','Course Goals','trim|required');
			$this->form_validation->set_rules('project','Final Project','trim|required');
			// /form rules
			// inputs
			$course_info = array(
				'course_id' => $course['course_id'],
				'course_author' => $course['course_author'],
				'course_title' => $this->input->post('title'),
				'course_description' => $this->input->post('description'),
				'course_category' => $this->input->post('category'),
				'course_type' => $this->input->post('type'),
				'course_audience' => $this->input->post('audience'),
				'course_tools' => $this->input->post('ktools'),
				'course_achievement' => $this->input->post('goals'),
				'course_project' => $this->input->post('project'),
			);
			// / inputs
			$page_data = array(
				'page_title' => 'Edit '.$course['course_title'].' Information',
				'course_categories' => $this->Lookup_model->get_category(),
				'course_id' => $course_id,
				'course' => $course,
				'category' => $category,
				'page_alert' => null,
			);
			if ($this->form_validation->run()==false)
			{
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_edit/course_info');
				$this->load->view('template/footer');
			}
			elseif ($this->Instructor_model->save_course_info($course_info)==true)
			{
				$page_data['page_alert'] = '<div class="alert alert-success text-center" role="alert">Saved Successfully</div>';
				$page_data['page_title'] = 'Saved '.$course['course_title'].' Information';
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_edit/course_info');
				$this->load->view('template/footer');
			}
			else
			{
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_edit/course_info');
				$this->load->view('template/footer');
			}
		}
		else
			show_404();
	}
	public function course_review($course_id=null)
	{
		$check = $this->Instructor_model->check_if_their_course($_SESSION['user_id'],$course_id);
		if ($check)
		{
			$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
			$category = $this->Lookup_model->get_category();
			$outline = $this->Instructor_model->get_outline($course_id);
			$review = $this->Instructor_model->get_course_review($course_id);
			$page_data = array(
				'page_title' => 'Review '.$course['course_title'],
				'course_categories' => $category,
				'course_id' => $course_id,
				'course' => $course,
				'category' => $category,
				'outline' => $outline,
				'review_i' => unserialize($review['review_course_info']),
				'review_o' => unserialize($review['review_course_outline']),
				'page_alert' => null,
			);
			$this->load->view('template/headerInstructor',$page_data);
			$this->load->view('instructor/course_edit/course_review');
			$this->load->view('template/footer');
		}
		else
			show_40();
	}
	public function course_outline($course_id=null)
	{
		if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$course_id))
		{
			$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
			$category = $this->Lookup_model->get_category();
			$outline = $this->Instructor_model->get_outline($course_id);
			$page_data = array(
				'page_title' => 'Edit '.$course['course_title'].' Outline',
				'course_categories' => $this->Lookup_model->get_category(),
				'course_id' => $course_id,
				'course' => $course,
				'category' => $category,
				'outline' => $outline,
				'page_alert' => null,
			);
			$this->load->view('template/headerInstructor',$page_data);
			$this->load->view('instructor/course_edit/course_outline');
			$this->load->view('template/footer');
		}
		else
			show_404();
	}
	public function course_outline_add_video($course_id=null)
	{
		if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$course_id))
		{
			$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
			$category = $this->Lookup_model->get_category();
			// form rules
			$this->form_validation->set_rules('video_title','Video Title','trim|required');
			$this->form_validation->set_rules('video_description','Video Description','trim|required');
			$this->form_validation->set_rules('video_embed','Youtube Embed Code','trim|regex_match[/<iframe.+?src="(.+?)".+?<\/iframe>/]');
			// / form rules
			// input
			$title = $this->input->post('video_title');
			$desc = $this->input->post('video_description');
			$yt_embed = $this->input->post('video_embed');
			// / input
			$page_data = [
				'page_title' => 'Add New Video',
				'course_id' => $course_id,
				'course' => $course,
				'course_categories' => $category,
				'upload_error' => null,
			];
			if (!$this->form_validation->run())
			{
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_edit/course_outline_video');
				$this->load->view('template/footer');
			}
			elseif ($this->form_validation->run())
			{
				if (!empty($yt_embed))
				{
					$outline_data = [
						'outline_course_id' => $course_id,
						'outline_type' => 'video',
						'video_title' => $title,
						'video_description' => $desc,
						'video_embed_url' => $yt_embed,
						'video_url' => null,
					];
					if (!$this->Instructor_model->add_outline($outline_data))
					{
						// fail
					}
					else
					{
						// upload yt
					}
				}
				else
				{
					$video_config = array(
						'upload_path' => './z/course',
						'allowed_types' => 'mp4|webm|ogg',
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
						$this->load->view('instructor/course_edit/course_outline_video');
						$this->load->view('template/footer');
					}
					else
					{
						$outline_data = [
							'outline_course_id' => $course_id,
							'outline_type' => 'video',
							'video_title' => $title,
							'video_description' => $desc,
							'video_embed_url' => null,
							'video_url' => $this->upload->data('file_name'),
						];
						if (!$this->Instructor_model->add_outline($outline_data))
						{
							$this->load->view('template/headerInstructor',$page_data);
							$this->load->view('instructor/course_edit/course_outline_video');
							$this->load->view('template/footer');
						}
						else
						{
							redirect(base_url('course/edit/outline/').$course_id);
						}
					}
				}
			}
			else
				show_404();
		}
	}
	public function course_outline_add_lecture($course_id=null)
	{
		if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$course_id))
		{
			$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
			$category = $this->Lookup_model->get_category();
			$page_data = [
				'page_title' => 'Add New Lecture',
				'course' => $course,
				'course_categories' => $category,
				'course_id' => $course_id,
			];
			# form rules
			$this->form_validation->set_rules('title','Lecture Title', 'required|trim');
			$this->form_validation->set_rules('body', 'Lecture Body', 'required|trim');
			# /form rules
			if (!$this->form_validation->run())
			{
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_edit/course_outline_lecture');
				$this->load->view('template/footer');
			}
			elseif ($this->form_validation->run())
			{
				$outline_data = [
					'outline_course_id' => $course_id,
					'outline_type' => 'lecture',
					'lecture_title' => $this->input->post('title'),
					'lecture_body' => $this->input->post('body'),
				];
				if ($this->Instructor_model->add_outline($outline_data))
				{
					redirect(base_url('course/edit/outline/').$course_id);
				}
			}
			else
				show_404();
		}
		else
			show_404();
	}
	public function course_outline_add_quiz($course_id=null)
	{
		if (!$this->session->has_userdata('quiz_data'))
		{
			$quiz_data = [
				'quiz_title' => null,
				'quiz_instruction' => null,
				'quiz_questions' => [],
			];
			$this->session->set_userdata('quiz_data',$quiz_data);
		}
		//
		if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$course_id))
		{
			$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
			$quiz = $this->session->userdata('quiz_data');
			$category = $this->Lookup_model->get_category();
			$page_data = [
				'page_title' => 'Add New Quiz',
				'course' => $course,
				'course_categories' => $category,
				'course_id' => $course_id,
				'q' => $quiz,
			];
			// FORM RULES
			$this->form_validation->set_rules('title','Title','trim|required');
			$this->form_validation->set_rules('instruction','Instruction','trim|required');
			// /FORM RULES
			// STICKY KEYS
			if (empty($_SESSION['quiz_data']['quiz_title']))
			{
				$_SESSION['quiz_data']['quiz_title'] = $this->input->post('title');
			}
			if (empty($_SESSION['quiz_data']['quiz_instruction']))
			{
				$_SESSION['quiz_data']['quiz_instruction'] = $this->input->post('instruction');
			}
			// /STICKY KEYS
			if (!$this->form_validation->run())
			{
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_edit/course_outline_quiz');
				$this->load->view('template/footer');
			}
			elseif ($this->form_validation->run())
			{
				$outline_data = [
					'outline_course_id' => $course_id,
					'outline_type' => 'quiz',
				];
				if ($this->Instructor_model->add_quiz($outline_data))
				{
					redirect(base_url('course/edit/outline/').$course_id);
				}
			}
			else
				show_404();
		}
		else
			show_404();
	}
	public function course_outline_add_video_edit($course_id=null,$outline_id=null)
	{
		if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$course_id))
		{
			$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
			$category = $this->Lookup_model->get_category();
			$outline = $this->Instructor_model->get_outline_video($outline_id);
			# form rules
			$this->form_validation->set_rules('video_title','Video Title','required|trim');
			$this->form_validation->set_rules('video_description','Video Description','required|trim');
			# / form rules
			$page_data = [
				'page_title' => 'Edit Video',
				'course_id' => $course_id,
				'outline_id' => $outline_id,
				'course' => $course,
				'course_categories' => $category,
				'video' => $outline,
				'upload_error' => null,
				'page_alert' => null,
			];
			if ($this->form_validation->run())
			{
				$video_config = array(
					'upload_path' => './z/course',
					'allowed_types' => 'mp4|webm|ogg',
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
					$this->load->view('instructor/course_edit/course_outline_video_edit');
					$this->load->view('template/footer');
				}
				else
				{
					$title = $this->input->post('video_title');
					$desc = $this->input->post('video_description');
					$file = $this->upload->data('file_name');
					$iframe = null;
					if ($this->Instructor_model->update_outline_video($title,$desc,$file,$iframe,$outline_id))
					{
						$page_data['page_alert'] = '<div role="alert" class="alert alert-success">Update Success</div>';
						$this->load->view('template/headerInstructor',$page_data);
						$this->load->view('instructor/course_edit/course_outline_video_edit');
						$this->load->view('template/footer');
					}
					else
					{
						$page_data['page_alert'] = '<div role="alert" class="alert alert-danger">Update Failed</div>';
						$this->load->view('template/headerInstructor',$page_data);
						$this->load->view('instructor/course_edit/course_outline_video_edit');
						$this->load->view('template/footer');
					}
				}
			}
			else
			{
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_edit/course_outline_video_edit');
				$this->load->view('template/footer');
			}
			
		}
		else
			show_404();
	}
	public function course_outline_add_lecture_edit($course_id=null,$outline_id=null)
	{
		if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$course_id))
		{
			$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
			$outline = $this->Instructor_model->get_outline_lecture($outline_id);
			# form rules
			$this->form_validation->set_rules('title','Lecture Title', 'required|trim');
			$this->form_validation->set_rules('body', 'Lecture Body', 'required|trim');
			# /form rules
			# input
			$title = $this->input->post('title');
			$body = $this->input->post('body');
			# /input
			$page_data = [
				'page_title' => 'Edit Lecture',
				'course_id' => $course_id,
				'outline_id' => $outline_id,
				'course' => $course,
				'course_categories' => $this->Lookup_model->get_category(),
				'outline' => $outline,
			];
			if ($this->form_validation->run())
			{
				if ($this->Instructor_model->update_outline_lecture($outline_id,$title,$body))
				{
					$page_data['page_alert'] = '<div role="alert" class="alert alert-success">Update Success</div>';
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_edit/course_outline_lecture_edit');
					$this->load->view('template/footer');
				}
				else
				{
					$page_data['page_alert'] = '<div role="alert" class="alert alert-danger">Update Failed</div>';
					$this->load->view('template/headerInstructor',$page_data);
					$this->load->view('instructor/course_edit/course_outline_lecture_edit');
					$this->load->view('template/footer');
				}
			}
			else
			{
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_edit/course_outline_lecture_edit');
				$this->load->view('template/footer');
			}
		}
		else
			show_404();
	}
	public function course_promo_media($course_id=null)
	{
		if ($this->Instructor_model->check_if_their_course($_SESSION['user_id'],$course_id))
		{
			$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
			$page_data = array(
				'page_title' => 'Edit '.$course['course_title'],
				'course_categories' => $this->Lookup_model->get_category(),
				'course_id' => $course_id,
				'course' => $course,
				'page_alert' => null,
				'upload_error' => null,
			);
			$video_config = array(
				'upload_path' => './z/thumbnails',
				'allowed_types' => 'jpg|jpeg|png',
				'encrypt_name' => true,
				'max_size' => 0,
				'max_width' => 1024,
				'max_height' => 576,
				'min_width' => 384,
				'min_height' => 216,
				'remove_spaces' => true,
				'file_ext_tolower' => true,
				'detect_mime' => true,
				'mod_mime_fix' => true,
				'overwrite' => false,
				'max_filename' => 255,
			);
			$this->upload->initialize($video_config);
			if (!$this->upload->do_upload('thumbnail'))
			{
				$page_data['upload_error'] = $this->upload->display_errors();
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_edit/course_promo_media');
				$this->load->view('template/footer');
			}
			else
			{
				$file_name = $this->upload->data('file_name');
				if ($this->Instructor_model->save_course_thumbnail($file_name,$course_id))
				{
					redirect(base_url('course/edit/media/'.$course_id));
					// $page_data['page_alert'] = '<div class="alert alert-success text-center">upload success</div>';
					// $this->load->view('template/headerInstructor',$page_data);
					// $this->load->view('instructor/course_edit/course_promo_media');
					// $this->load->view('template/footer');
				}
			}
		}
	}
	public function course_preview($course_id=null)
	{
		$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
		$outline = $this->Instructor_model->get_outline($course_id);
		$this->load->model('Account_model');
		$author = $this->Account_model->get_profile_info($course['course_author']);
		$page_data = [
			'page_title' => 'Preview '.$course['course_title'],
			'course' => $course,
			'outline' => $outline,
			'author' => $author,
			'course_categories' => $this->Lookup_model->get_category(),
		];
		$this->load->view('template/headerInstructor',$page_data);
		$this->load->view('instructor/course_edit/course_preview');
		$this->load->view('template/footer');
	}
	// /course edit

	public function send_course_review($course_id)
	{
		if (!empty($course_id))
		{
			if ($this->Instructor_model->set_course_review_2($course_id)==true)
			{
				$page_data = array(
					'page_title' => 'success',
					'title' => 'Successfuly sent for Review',
					'subtitle' => 'This will take time, but the admins are on their way :)',
				);
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_review_2');
				$this->load->view('template/footer');
			}
			else
			{
				$page_data = array(
					'page_title' => 'fail',
					'title' => 'Request for Review was Unsuccessfull :(',
					'subtitle' => 'There must something wrong at the system, try again later',
				);
				$this->load->view('template/headerInstructor',$page_data);
				$this->load->view('instructor/course_review_2');
				$this->load->view('template/footer');
			}

		}
		else
			show_404();
	}



	// COURSE MANAGE
	public function manage_course($course_id)
	{
		$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
		$page_data = array(
			'page_title' => 'Manage '.ucwords($course['course_title']),
			'course_categories' => $this->Lookup_model->get_category(),
			'course_id' => $course_id,
			'c' => $course,
		);
		$this->load->view('template/headerInstructor',$page_data);
		$this->load->view('instructor/course_manage/index');
		$this->load->view('template/footer');
	}
	public function manage_students($course_id)
	{
		$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
		$students = $this->Instructor_model->get_course_students($course_id);
		$page_data = array(
			'page_title' => 'Students | '.ucwords($course['course_title']),
			'course_categories' => $this->Lookup_model->get_category(),
			'course_id' => $course_id,
			'c' => $course,
			's' => $students,
		);
		$this->load->view('template/headerInstructor',$page_data);
		$this->load->view('instructor/course_manage/students');
		$this->load->view('template/footer');
	}
	public function manage_final_projects($course_id)
	{
		$course = $this->Instructor_model->get_course_info($_SESSION['user_id'],$course_id);
		$students = $this->Instructor_model->get_course_students($course_id);
		$page_data = array(
			'page_title' => 'Final Projects | '.ucwords($course['course_title']),
			'course_categories' => $this->Lookup_model->get_category(),
			'course_id' => $course_id,
			'c' => $course,
			's' => $students,
		);
		$this->load->view('template/headerInstructor',$page_data);
		$this->load->view('instructor/course_manage/projects');
		$this->load->view('template/footer');
	}
	// / COURSE MANAGE

	
}