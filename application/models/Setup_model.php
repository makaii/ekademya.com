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
					admin_type TEXT(11) NOT NULL,
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
					user_type TEXT(10) NOT NULL,
					user_fname VARCHAR(30) NOT NULL,
					user_lname VARCHAR(30) NOT NULL,
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
					course_author VARCHAR(30) NOT NULL,
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
	public function create_section_table()
	{
		$check_section_tbl = $this->db->query("SHOW TABLES LIKE 'section_tbl';");
		if ($check_section_tbl->num_rows()==0)
		{
			// create table if not exist

		}
	}
	public function create_lecture_table()
	{
		$check_lecture_tbl = $this->db->query("SHOW TABLES LIKE 'lecture_tbl';");
		if ($check_lecture_tbl->num_rows()==0)
		{
			// create table if not exist
			
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
					outline_type TEXT(10) NOT NULL,
					outline_section_title VARCHAR(50),
					outline_lecture_title VARCHAR(50),
					outline_lecture_type TEXT(10),
					outline_lecture_url VARCHAR(50),
					outline_quiz_title VARCHAR(50),
					outline_assignment_title VARCHAR(50)
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
					enroll_email VARCHAR(30) NOT NULL,
					enroll_course VARCHAR(45) NOT NULL,
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
				'display_userdata' => 1,
				'display_feedback' => 1,
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