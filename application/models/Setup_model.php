<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
	}

	public function create_admin_table()
	{
		$check_admin_tbl = $this->db->query("SHOW TABLES LIKE 'admin_tbl';");
		if ($check_admin_tbl->num_rows()==0)
		{
			// create table if not exist
			$this->db->query("
				CREATE TABLE IF NOT EXISTS admin_tbl (
					admin_id INT(7) AUTO_INCREMENT PRIMARY KEY,
					admin_email VARCHAR(50) NOT NULL,
					admin_password VARCHAR(30) NOT NULL,
					admin_type CHAR(11) NOT NULL,
					admin_date_joined DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
					admin_status TINYINT(1) NOT NULL DEFAULT 1
				);
			");
		}
		$admin_check = $this->db->select()->where('admin_id',1)->get('admin_tbl');
		if ($admin_check->num_rows()!=1)
		{
			$admin_data = array(
				'admin_email' => 'admin@ekademya.com',
				'admin_password' => 'adminadmin',
				'admin_type' => 'super admin',
			);
			$this->db->insert('admin_tbl',$admin_data);
		}
	}
	public function create_user_table()
	{
		$check_user_tbl = $this->db->query("SHOW TABLES LIKE 'user_tbl';");
		if ($check_user_tbl->num_rows()==0)
		{
			// create table if not exist
			$this->db->query("
				CREATE TABLE IF NOT EXISTS user_tbl (
					user_id  INT(7) AUTO_INCREMENT PRIMARY KEY,
					user_email VARCHAR(50) NOT NULL,
					user_password VARCHAR(60) NOT NULL,
					user_type CHAR(10) NOT NULL,
					user_fname VARCHAR(30) NOT NULL,
					user_lname VARCHAR(30) NOT NULL,
					user_educ VARCHAR(60),
					user_pubemail VARCHAR(50),
					user_headline VARCHAR(50),
					user_bio VARCHAR(1000),
					user_img_url VARCHAR(50) NOT NULL DEFAULT 'default_thumbnail.png',
					user_website VARCHAR(50),
					user_facebook VARCHAR(50),
					user_googleplus VARCHAR(50),
					user_linkedin VARCHAR(50),
					user_twitter VARCHAR(50),
					user_youtube VARCHAR(50),
					user_date_joined DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
					user_verify TINYINT(1) NOT NULL DEFAULT 0,
					user_status TINYINT(1) NOT NULL DEFAULT 1
				);
			");
			$test_user = array(
				array(
					'user_email' => 'johnsmith@email.com',
					'user_password' => password_hash('johnjohn',PASSWORD_BCRYPT),
					'user_type' => 'instructor',
					'user_fname' => 'John',
					'user_lname' => 'Smith',
					'user_educ' => 'BS Information Technology',
					'user_pubemail' => 'johndoe@email.com',
					'user_headline' => 'Test Subject',
					'user_bio' => 'An important Asset in the development of Ekademya',
					'user_website' => 'about.me/johndoe',
					'user_facebook' => 'facebook.com/johndoe',
					'user_twitter' => 'twitter.com/johndoe',
					'user_youtube' => 'youtube.com/johndoe'
				),
				array(
					'user_email' => 'janedoe@email.com',
					'user_password' => password_hash('janejane',PASSWORD_BCRYPT),
					'user_type' => 'student',
					'user_fname' => 'Jane',
					'user_lname' => 'Doe',
					'user_educ' => '',
					'user_pubemail' => '',
					'user_headline' => '',
					'user_bio' => '',
					'user_website' => '',
					'user_facebook' => '',
					'user_twitter' => '',
					'user_youtube' => ''
				),
				// FROM ERIKA
				//Student
				array(
					'user_email' => 'tim_awa@email.com',
					'user_password' => password_hash('timtimawa', PASSWORD_BCRYPT),
					'user_type' => 'student',
					'user_fname' => 'Tim',
					'user_lname' => 'Awa',
					'user_educ' => 'BS in Marketing',
					'user_pubemail' => 'tim_awa@email.com',
					'user_headline' => 'Dean Lister',
					'user_bio' => 'Ready to learn new knowledge other than the things I already know',
					'user_website' => 'about.me/tim_awa',
					'user_facebook' => 'facebook.com/tim_awa',
					'user_twitter' => 'twitter.com/tim_awa',
					'user_youtube' => 'youtube.com/tim_awa'
					),  
				array(
					'user_email' => 'angelayu@email.com',
					'user_password' => password_hash('angelayu', PASSWORD_BCRYPT),
					'user_type' => 'student',
					'user_fname' => 'Angela',
					'user_lname' => 'Yu',
					'user_educ' => 'BS in Psychology',
					'user_pubemail' => 'angelayu@email.com',
					'user_headline' => ' ',
					'user_bio' => ' ',
					'user_website' => 'about.me/angelayu',
					'user_facebook' => 'facebook.com/angelayu',
					'user_twitter' => 'twitter.com/angelayu',
					'user_youtube' => 'youtube.com/angelayu'
					),
				array(	
					'user_email' => 'ailalee@email.com',
					'user_password' => password_hash('ailaaila', PASSWORD_BCRYPT),
					'user_type' => 'student',
					'user_fname' => 'Aila',
					'user_lname' => 'Lee',
					'user_educ' => 'BS in Information Technology',
					'user_pubemail' => 'ailalee@email.com',
					'user_headline' => '',
					'user_bio' => '',
					'user_website' => 'about.me/ailalee',
					'user_facebook' => 'facebook.com/ailalee',
					'user_twitter' => 'twitter.com/ailalee',
					'user_youtube' => 'youtube.com/ailalee'
					),
				array(
					'user_email' => 'jackychan@email.com',
					'user_password' => password_hash('chanchan', PASSWORD_BCRYPT),
					'user_type' => 'student',
					'user_fname' => 'Jacky',
					'user_lname' => 'Chan',
					'user_educ' => 'BS in Digital Arts',
					'user_pubemail' => 'jackychan@email.com',
					'user_headline' => ' Best Actor and Director',
					'user_bio' => 'Cinema reflects culture and there is no harm in adapting technology, but not at the cost of losing your originality.',
					'user_website' => 'about.me/jackychan',
					'user_facebook' => 'facebook.com/jackychan',
					'user_twitter' => 'twitter.com/jackychan',
					'user_youtube' => 'youtube.com/jackychan'
					),
				array(
					'user_email' => 'mickielee@email.com',
					'user_password' => password_hash('mickmick', PASSWORD_BCRYPT),
					'user_type' => 'student',
					'user_fname' => 'Mickie',
					'user_lname' => 'Lee',
					'user_educ' => 'BS in Computer Science',
					'user_pubemail' => 'mickielee@email.com',
					'user_headline' => 'Dean Lister',
					'user_bio' => 'It all started with a "mouse". If you can dream it, you can do it',
					'user_website' => 'about.me/mickielee',
					'user_facebook' => 'facebook.com/mickielee',
					'user_twitter' => 'twitter.com/mickielee',
					'user_youtube' => 'youtube.com/mickielee'
					),
				array(
					'user_email' => 'sammycruz@email.com',
					'user_password' => password_hash('sammysammy', PASSWORD_BCRYPT),
					'user_type' => 'student',
					'user_fname' => 'Sammy',
					'user_lname' => 'Cruz',
					'user_educ' => 'Political Science',
					'user_pubemail' => 'sammycruz@email.com',
					'user_headline' => ' ',
					'user_bio' => ' ',
					'user_website' => 'about.me/sammycruz',
					'user_facebook' => 'facebook.com/sammycruz',
					'user_twitter' => 'twitter.com/sammycruz',
					'user_youtube' => 'youtube.com/sammycruz'
					),
				array(
					'user_email' => 'jeonjeongkook@email.com',
					'user_password' => password_hash('jungkook', PASSWORD_BCRYPT),
					'user_type' => 'student',
					'user_fname' => 'Jeong Kook',
					'user_lname' => 'Jeon',
					'user_educ' => 'College of Human Kinesthetics',
					'user_pubemail' => 'jeonjeongkook@email.com',
					'user_headline' => ' Golden Maknae',
					'user_bio' => 'Living without a passion is like being dead',
					'user_website' => 'about.me/jeonjeongkook',
					'user_facebook' => 'facebook.com/jeonjeongkook',
					'user_twitter' => 'twitter.com/jeonjeongkook',
					'user_youtube' => 'youtube.com/jeonjeongkook'
					),
				array(
					'user_email' => 'kimmingyu@email.com',
					'user_password' => password_hash('mingming', PASSWORD_BCRYPT),
					'user_type' => 'student',
					'user_fname' => 'Min Gyu',
					'user_lname' => 'Kim',
					'user_educ' => 'Certificate of Acting',
					'user_pubemail' => 'tim_awa@email.com',
					'user_headline' => 'Tall Dark and Handsome',
					'user_bio' => 'Even after time passes I wont become weak, we will keep it up I will give you thi shining promise.',
					'user_website' => 'about.me/tim_awa',
					'user_facebook' => 'facebook.com/tim_awa',
					'user_twitter' => 'twitter.com/tim_awa',
					'user_youtube' => 'youtube.com/tim_awa'
					),
				//Instructor
				array(
					'user_email' => 'jeonwonu@email.com',
					'user_password' => password_hash('wonuwonu',PASSWORD_BCRYPT),
					'user_type' => 'instructor',
					'user_fname' => 'Wonu',
					'user_lname' => 'Jeon',
					'user_educ' => 'BS Computer Science',
					'user_pubemail' => 'jeonwonu@email.com',
					'user_headline' => 'Manager of ABX Inc.',
					'user_bio' => 'A leader is one who shows the way, goes the way, and shows the way',
					'user_website' => 'about.me/jeonwonu',
					'user_facebook' => 'facebook.com/jeonwonu',
					'user_twitter' => 'twitter.com/jeonwonu',
					'user_youtube' => 'youtube.com/jeonwonu'
				),
				array(
					'user_email' => 'vernonhansol@email.com',
					'user_password' => password_hash('vernonvernon',PASSWORD_BCRYPT),
					'user_type' => 'instructor',
					'user_fname' => 'Hansol',
					'user_lname' => 'Vernon',
					'user_educ' => 'BS Broadcasting',
					'user_pubemail' => 'vernonhansol@email.com',
					'user_headline' => 'Producer of SVTHH',
					'user_bio' => 'My motto "All of this problems are not anyones fault, its me, myself who acted how I felt"',
					'user_website' => 'about.me/vernonhansol',
					'user_facebook' => 'facebook.com/vernonhansol',
					'user_twitter' => 'twitter.com/vernonhansol',
					'user_youtube' => 'youtube.com/vernonhansol'
				),
				array(
					'user_email' => 'shinohara@email.com',
					'user_password' => password_hash('shinoshino',PASSWORD_BCRYPT),
					'user_type' => 'instructor',
					'user_fname' => 'Shino',
					'user_lname' => 'Hara',
					'user_educ' => 'BS Marketing',
					'user_pubemail' => 'shinohara@email.com',
					'user_headline' => 'Teacher of LCS',
					'user_bio' => 'Teaching is a work of HEART',
					'user_website' => 'about.me/shinohara',
					'user_facebook' => 'facebook.com/shinohara',
					'user_twitter' => 'twitter.com/shinohara',
					'user_youtube' => 'youtube.com/shinohara'
				),
				array(
					'user_email' => 'maylee@email.com',
					'user_password' => password_hash('mayleemay',PASSWORD_BCRYPT),
					'user_type' => 'instructor',
					'user_fname' => 'May',
					'user_lname' => 'Lee',
					'user_educ' => 'Diploma of Sales Management',
					'user_pubemail' => 'maylee@email.com',
					'user_headline' => 'Sales Lady of Mally',
					'user_bio' => 'Do what you do and outsource the rest',
					'user_website' => 'about.me/maylee',
					'user_facebook' => 'facebook.com/maylee',
					'user_twitter' => 'twitter.com/maylee',
					'user_youtube' => 'youtube.com/maylee'
				),
				array(
					'user_email' => 'chaminseok@email.com',
					'user_password' => password_hash('chamcham',PASSWORD_BCRYPT),
					'user_type' => 'instructor',
					'user_fname' => 'Min Seok',
					'user_lname' => 'Cha',
					'user_educ' => 'Masteral of Computer Science',
					'user_pubemail' => 'chaminseok@email.com',
					'user_headline' => 'CEO of Freelance Company',
					'user_bio' => 'If you are good at something, do not do it for FREE',
					'user_website' => 'about.me/chaminseok',
					'user_facebook' => 'facebook.com/chaminseok',
					'user_twitter' => 'twitter.com/chaminseok',
					'user_youtube' => 'youtube.com/chaminseok'
				),
				array(
					'user_email' => 'jamescurry@email.com',
					'user_password' => password_hash('jamesjames',PASSWORD_BCRYPT),
					'user_type' => 'instructor',
					'user_fname' => 'James',
					'user_lname' => 'Curry',
					'user_educ' => 'Certified Animator',
					'user_pubemail' => 'jamescurry@email.com',
					'user_headline' => '3D Animator of DigTech',
					'user_bio' => 'Do not animate the drawings, Animate the feelings',
					'user_website' => 'about.me/jamescurry',
					'user_facebook' => 'facebook.com/jamescurry',
					'user_twitter' => 'twitter.com/jamescurry',
					'user_youtube' => 'youtube.com/jamescurry'
				),
				array(
					'user_email' => 'bogartbakal@email.com',
					'user_password' => password_hash('bogartbogart',PASSWORD_BCRYPT),
					'user_type' => 'instructor',
					'user_fname' => 'Bogart',
					'user_lname' => 'Batong Bakal',
					'user_educ' => 'Bachelor of Education in English',
					'user_pubemail' => 'bogartbakal@email.com',
					'user_headline' => 'Associate Professor of YMCA',
					'user_bio' => 'Just because someone stumble and loses their way, it does not mean they are lost forever',
					'user_website' => 'about.me/bogartbakal',
					'user_facebook' => 'facebook.com/bogartbakal',
					'user_twitter' => 'twitter.com/bogartbakal',
					'user_youtube' => 'youtube.com/bogartbakal'
				),
				// /FROM ERIKA
			);
			$this->db->insert_batch('user_tbl',$test_user);
		}
	}
	public function create_verify_table()
	{
		$check_tbl = $this->db->query("SHOW TABLES LIKE 'verify_table';");
		if ($check_tbl->num_rows()==0) {
			$this->db->query("
				CREATE TABLE IF NOT EXISTS verify_table (
					verify_id INT(7) AUTO_INCREMENT PRIMARY KEY,
					verify_email VARCHAR(30) NOT NULL,
					verify_code VARCHAR(16) NOT NULL,
					verify_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
					verify_status TINYINT(1) NOT NULL DEFAULT 1
				);
			");
		}
	}
	public function create_category_table()
	{
		$check_category_tbl = $this->db->query("SHOW TABLES LIKE 'category_tbl';");
		if ($check_category_tbl->num_rows()==0)
		{
			// create table if not exists
			$this->db->query("
				CREATE TABLE IF NOT EXISTS category_tbl (
					category_id TINYINT(2) AUTO_INCREMENT PRIMARY KEY,
					category_name VARCHAR(30) NOT NULL,
					category_code VARCHAR(30) NOT NULL
				);
			");
			$data = [
				[
					'category_name' => 'technology',
					'category_code' => 'technology'
				],
				[
					'category_name' => 'business',
					'category_code' => 'business'
				]
			];
			$this->db->insert_batch('category_tbl',$data);
		}
	}
	public function create_course_table()
	{
		$check_couse_tbl = $this->db->query("SHOW TABLES LIKE 'course_tbl';");
		if ($check_couse_tbl->num_rows()==0)
		{
			// create table if not exist
			$this->db->query("
				CREATE TABLE IF NOT EXISTS course_tbl (
					course_id INT(7) AUTO_INCREMENT PRIMARY KEY,
					course_code INT(7) NOT NULL,
					course_title VARCHAR(50) NOT NULL,
					course_description VARCHAR(3000) NOT NULL,
					course_author INT(7) NOT NULL,
					FOREIGN KEY (course_author) REFERENCES user_tbl(user_id),
					course_category TINYINT(2) NOT NULL,
					FOREIGN KEY (course_category) REFERENCES category_tbl(category_id),
					course_img_url VARCHAR(50) NOT NULL DEFAULT 'default_thumbnail.png',
					course_tools VARCHAR(1000) NOT NULL,
					course_audience VARCHAR(1000) NOT NULL,
					course_achievement VARCHAR(1000) NOT NULL,
					course_project VARCHAR(1000) NOT NULL,
					course_date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
					course_type CHAR(7) NOT NULL,
					course_status TINYINT(1) NOT NULL DEFAULT 1,
					course_review TINYINT(1) NOT NULL DEFAULT 0,
					course_published TINYINT(1) NOT NULL DEFAULT 0,
					course_archive TINYINT(1) NOT NULL DEFAULT 0
				);
			");
		}
	}
	public function create_week_table()
	{
		$check_tbl = $this->db->query("SHOW TABLES LIKE 'week_tbl';");
		if ($check_tbl->num_rows()==0) {
			$this->db->query("
				CREATE TABLE IF NOT EXISTS week_tbl (
					week_id INT(7) AUTO_INCREMENT PRIMARY KEY,
					week_code VARCHAR(16) NOT NULL,
					week_course_id INT(7) NOT NULL,
					FOREIGN KEY (week_course_id) REFERENCES course_tbl(course_id),
					week_date_added DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
					week_status TINYINT(1) NOT NULL DEFAULT 1
				);
			");
		}
	}
	public function create_outline_table()
	{
		$check_outline_tbl = $this->db->query("SHOW TABLES LIKE 'outline_tbl';");
		if ($check_outline_tbl->num_rows()==0)
		{
			// create table if not exist
			$this->db->query("
				CREATE TABLE IF NOT EXISTS outline_tbl (
					outline_id INT(7) AUTO_INCREMENT PRIMARY KEY,
					outline_course_id INT(7) NOT NULL,
					FOREIGN KEY (outline_course_id) REFERENCES course_tbl(course_id),
					outline_week_id INT(7) NOT NULL,
					FOREIGN KEY (outline_week_id) REFERENCES week_tbl(week_id),
					outline_type CHAR(15) NOT NULL,
					outline_date_added DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
					outline_status TINYINT(1) NOT NULL DEFAULT 1
				);
			");
		}
	}
	public function create_video_table()
	{
		$check_video_tbl = $this->db->query("SHOW TABLES LIKE 'video_tbl';");
		if ($check_video_tbl->num_rows()==0)
		{
			// create table if not exist
			$this->db->query("
				CREATE TABLE IF NOT EXISTS video_tbl (
					video_id INT(7) AUTO_INCREMENT PRIMARY KEY,
					video_outline_id INT(7) NOT NULL,
					FOREIGN KEY (video_outline_id) REFERENCES outline_tbl(outline_id),
					video_title VARCHAR(50) NOT NULL,
					video_description VARCHAR(1000) NOT NULL,
					video_url VARCHAR(50) NULL,
					video_embed_url VARCHAR(200) NULL,
					video_thumbnail VARCHAR(50) NULL
				);
			");
		}
	}
	public function create_lecture_table()
	{
		$check_lecture_tbl = $this->db->query("SHOW TABLES LIKE 'lecture_tbl';");
		if ($check_lecture_tbl->num_rows()==0)
		{
			// create table if not exist
			$this->db->query("
				CREATE TABLE IF NOT EXISTS lecture_tbl (
					lecture_id INT(7) AUTO_INCREMENT PRIMARY KEY,
					lecture_outline_id INT(7) NOT NULL,
					FOREIGN KEY (lecture_outline_id) REFERENCES outline_tbl(outline_id),
					lecture_title VARCHAR(50) NOT NULL,
					lecture_body VARCHAR(1000) NOT NULL,
					lecture_orig VARCHAR(50) NULL,
					lecture_url VARCHAR(50) NULL
				);
			");
		}
	}
	public function create_quiz_table()
	{
		$check_tbl = $this->db->query("SHOW TABLES LIKE 'quiz_tbl';");
		if ($check_tbl->num_rows()==0)
		{
			// create table if not exist
			$this->db->query("
				CREATE TABLE IF NOT EXISTS quiz_tbl (
					quiz_id int(7) AUTO_INCREMENT PRIMARY KEY,
					quiz_outline_id INT(7) NOT NULL,
					FOREIGN KEY (quiz_outline_id) REFERENCES outline_tbl(outline_id),
					quiz_title VARCHAR(250) NULL,
					quiz_instructions VARCHAR(1000) NULL,
					quiz_questions VARCHAR(20000) NULL
				);
			");
		}
	}
	public function create_enroll_table()
	{
		$check_enroll_tbl = $this->db->query("SHOW TABLES LIKE 'enroll';");
		if ($check_enroll_tbl->num_rows()==0)
		{
			// create table if not exist
			$this->db->query("
				CREATE TABLE IF NOT EXISTS enroll_tbl (
					enroll_id INT(7) AUTO_INCREMENT PRIMARY KEY,
					enroll_student INT(7) NOT NULL,
					FOREIGN KEY (enroll_student) REFERENCES user_tbl(user_id),
					enroll_course INT(7) NOT NULL,
					FOREIGN KEY (enroll_course) REFERENCES course_tbl(course_id),
					enroll_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
					enroll_status TINYINT(1) NOT NULL DEFAULT 1
				);
			");
		}
	}
	public function create_settings_table()
	{
		$check_settings_tbl = $this->db->query("SHOW TABLES LIKE 'settings_tbl';");
		if ($check_settings_tbl->num_rows()==0)
		{
			// create table if not exists
			$this->db->query("
				CREATE TABLE IF NOT EXISTS settings_tbl (
					display_userdata TINYINT(1) NOT NULL DEFAULT 1,
					display_feedback TINYINT(1) NOT NULL DEFAULT 1
				);
			");
		}
		$settings_check = $this->db->select()->get('settings_tbl');
		if ($settings_check->num_rows()==0)
		{
			$settings = array(
				'display_userdata' => 0,
				'display_feedback' => 0
			);
			$this->db->insert('settings_tbl',$settings);
		}
	}
	public function create_review_table()
	{
		$check_review_tbl = $this->db->query("SHOW TABLES LIKE 'review_tbl';");
		if ($check_review_tbl->num_rows()==0)
		{
			// create table if not exists
			$this->db->query("
				CREATE TABLE IF NOT EXISTS review_tbl (
					review_id INT(7) AUTO_INCREMENT PRIMARY KEY,
					review_course_id INT(7) NOT NULL,
					FOREIGN KEY (review_course_id) REFERENCES course_tbl(course_id),
					review_course_info VARCHAR(20000),
					review_course_outline VARCHAR(20000)
				);
			");
		}
	}
	public function create_pay_table()
	{
		$check_pay_tbl = $this->db->query("SHOW TABLES LIKE 'pay_tbl';");
		if ($check_pay_tbl->num_rows()==0)
		{
			// create table if not exists
			$this->db->query("
				CREATE TABLE IF NOT EXISTS pay_tbl (
					pay_id INT(7) AUTO_INCREMENT PRIMARY KEY,
					pay_user_id INT(7) NOT NULL,
					FOREIGN KEY (pay_user_id) REFERENCES user_tbl(user_id),
					-- 16 digit number
					pay_card_number VARCHAR(30) NOT NULL,
					pay_card_type CHAR(10) NOT NULL,
					pay_exp_year TINYINT(4) NOT NULL,
					pay_exp_month TINYINT(2) NOT NULL,
					-- 3 digit number
					pay_csc_cvv VARCHAR(30) NOT NULL,
				);
			");
		}
	}
	public function create_progress_table()
	{
		$check_tbl = $this->db->query("SHOW TABLES LIKE 'progress_tbl';");
		if ($check_tbl->num_rows()==0)
		{
			// create table if not exists
			$this->db->query("
				CREATE TABLE IF NOT EXISTS progress_tbl (
					progress_id INT(7) AUTO_INCREMENT PRIMARY KEY,
					progress_student INT(7) NOT NULL,
					FOREIGN KEY (progress_student) REFERENCES enroll_tbl(enroll_student),
					progress_course INT(7) NOT NULL,
					FOREIGN KEY (progress_course) REFERENCES enroll_tbl(enroll_course),
					progress_outline INT(7) NOT NULL,
					FOREIGN KEY (progress_outline) REFERENCES outline_tbl(outline_id),
					progress_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
				);
			");
		}
	}
	public function create_final_project_table()
	{
		$check_tbl = $this->db->query("SHOW TABLES LIKE 'project_tbl';");
		if ($check_tbl->num_rows()==0)
		{
			// create table if not exists
			$this->db->query("
				CREATE TABLE IF NOT EXISTS project_tbl (
					project_id INT(7) AUTO_INCREMENT PRIMARY KEY,
					project_student INT(7) NOT NULL,
					FOREIGN KEY (project_student) REFERENCES enroll_tbl(enroll_student),
					project_course INT(7) NOT NULL,
					FOREIGN KEY (project_course) REFERENCES enroll_tbl(enroll_course),
					project_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
					project_url VARCHAR(50) NOT NULL,
					project_remark VARCHAR(15) NULL,
					project_status TINYINT(1) NOT NULL DEFAULT 1
				);
			");
		}
	}

	public function create_quiz_tables()
	{
		// quiz_tbl
		$check_tbl = $this->db->query("SHOW TABLES LIKE 'quiz_tbl';");
		if ($check_tbl->num_rows()==0) {
			// create table if not exists
			$this->db->query("
				CREATE TABLE IF NOT EXISTS quiz_tbl (
					quiz_id INT(7) AUTO_INCREMENT PRIMARY KEY
				);
			");
		}

		// question_tbl
		$check_tbl = $this->db->query("SHOW TABLES LIKE 'question_tbl';");
		if ($check_tbl->num_rows()==0) {
			// create table if not exists
			$this->db->query("
				CREATE TABLE IF NOT EXISTS question_tbl (
					question_id INT(7) AUTO_INCREMENT PRIMARY KEY,
				);
			");
		}

		// choice_tbl
		$check_tbl = $this->db->query("SHOW TABLES LIKE 'choice_tbl';");
		if ($check_tbl->num_rows()==0) {
			// create table if not exists
			$this->db->query("
				CREATE TABLE IF NOT EXISTS choice_tbl (
					choice_id INT(7) AUTO_INCREMENT PRIMARY KEY,
				);
			");
		}

		// answer_tbl
		$check_tbl = $this->db->query("SHOW TABLES LIKE 'answer_tbl';");
		if ($check_tbl->num_rows()==0) {
			// create table if not exists
			$this->db->query("
				CREATE TABLE IF NOT EXISTS answer_tbl (
					answer_id INT(7) AUTO_INCREMENT PRIMARY KEY,
				);
			");
		}
	}

	public function getTableStructure($tableName)
	{
		$fields = $this->db->field_data($tableName);
		return $fields;
	}

	public function delete_all_content()
	{
		$videos = get_filenames(base_url('z/'));
		echo "<pre>";
		print_r($videos);
		echo "<pre>";
	}

}
 ?>