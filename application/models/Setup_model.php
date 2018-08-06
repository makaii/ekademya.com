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
					admin_email VARCHAR(30) NOT NULL,
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
					user_email VARCHAR(30) NOT NULL,
					user_password VARCHAR(60) NOT NULL,
					user_type CHAR(10) NOT NULL,
					user_fname VARCHAR(30) NOT NULL,
					user_lname VARCHAR(30) NOT NULL,
					user_educ VARCHAR(60) NOT NULL,
					user_pubemail VARCHAR(30),
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
					user_status TINYINT(1) NOT NULL DEFAULT 1
				);
			");
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
					course_title VARCHAR(50) NOT NULL,
					course_description VARCHAR(1000) NOT NULL,
					course_author INT(7) NOT NULL,
					FOREIGN KEY (course_author) REFERENCES user_tbl(user_id),
					course_category VARCHAR(25) NOT NULL,
					course_img_url VARCHAR(50) NOT NULL DEFAULT 'default_thumbnail.png',
					course_tools VARCHAR(255) NOT NULL,
					course_audience VARCHAR(255) NOT NULL,
					course_achievement VARCHAR(255) NOT NULL,
					course_date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
					course_status TINYINT(1) NOT NULL DEFAULT 1,
					course_published TINYINT(1) NOT NULL DEFAULT 0
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
					video_outline_id INT(7),
					FOREIGN KEY (video_outline_id) REFERENCES outline_tbl(outline_id),
					video_title VARCHAR(50) NOT NULL,
					video_description VARCHAR(1000) NOT NULL,
					video_url VARCHAR(50) NOT NULL,
					video_thumbnail VARCHAR(50) NOT NULL
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
					lecture_outline_id INT(7),
					FOREIGN KEY (lecture_outline_id) REFERENCES outline_tbl(outline_id),
					lecture_title VARCHAR(50) NOT NULL,
					lecture_body VARCHAR(1000) NOT NULL
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
					FOREIGN KEY (enroll_email) REFERENCES user_tbl(user_id),
					enroll_course INT(7) NOT NULL,
					FOREIGN KEY (enroll_course) REFERENCES course_tbl(course_id),
					enroll_status TINYINT(1) NOT NULL DEFAULT 1
				);
			");
			// $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id) REFERENCES table(id)');
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
					display_feedback TINYINT(1) NOT NULL DEFAULT 1,
					course_category VARCHAR(50) NOT NULL,
					course_code INT(2)
				);
			");
		}
		$settings_check = $this->db->select()->get('settings_tbl');
		if ($settings_check->num_rows()==0)
		{
			$settings = array(
				'display_userdata' => 1,
				'display_feedback' => 1,
				'course_category' => 'Art & Design, Business, Culinary, Film & Photography, Technology'
			);
			$this->db->insert('settings_tbl',$settings);
		}
	}

	public function getTableStructure($tableName)
	{
		$fields = $this->db->field_data($tableName);
		return $fields;
	}

}
 ?>