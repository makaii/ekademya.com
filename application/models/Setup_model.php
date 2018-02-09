<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
	}

	public function create_tables()
	{
		$admin_tbl = $this->db->query("
			CREATE TABLE IF NOT EXISTS admin_tbl (
				admin_id INT(7) AUTO_INCREMENT PRIMARY KEY,
				admin_email VARCHAR(30) NOT NULL,
				admin_password VARCHAR(30) NOT NULL,
				admin_type TEXT(11) NOT NULL,
				admin_date_joined DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
				admin_status TINYINT(1) NOT NULL DEFAULT 1
			);"
		);
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
		$settings_tbl = $this->db->query("SHOW TABLES LIKE 'settings_tbl';");
		if ($settings_tbl->num_rows()==0)
		{
			// create table if not exists
			$this->db->query("
				CREATE TABLE IF NOT EXISTS settings_tbl (
					display_userdata TINYINT(1) NOT NULL DEFAULT 1,
					display_feedback TINYINT(1) NOT NULL DEFAULT 1
				)
			;");
		}
		else
		{
			// update table
		}
		$user_tbl = $this->db->query("
			CREATE TABLE IF NOT EXISTS user_tbl (
				user_id  INT(7) AUTO_INCREMENT PRIMARY KEY,
				user_email VARCHAR(30) NOT NULL,
				user_password VARCHAR(60) NOT NULL,
				user_type TEXT(10) NOT NULL,
				user_date_joined DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
				user_status TINYINT(1) NOT NULL DEFAULT 1
			);"
		);
		$instructor_tbl = $this->db->query("
			CREATE TABLE IF NOT EXISTS instructor_tbl (
				instructor_id  INT(7) AUTO_INCREMENT PRIMARY KEY,
				instructor_name VARCHAR(30) NOT NULL,
				instructor_headline VARCHAR(50) NOT NULL,
				instructor_bio VARCHAR(1000) NOT NULL,
				instructor_img_url VARCHAR(50) NOT NULL DEFAULT 'default_thumbnail.png',
				instructor_website VARCHAR(50) NOT NULL,
				instructor_facebook VARCHAR(50) NOT NULL,
				instructor_googleplus VARCHAR(50) NOT NULL,
				instructor_linkedin VARCHAR(50) NOT NULL,
				instructor_twitter VARCHAR(50) NOT NULL,
				instructor_youtube VARCHAR(50) NOT NULL
			);"
		);
		$course_tbl = $this->db->query("
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
			);"
		);
		$outline_tbl = $this->db->query("
			CREATE TABLE IF NOT EXISTS outline_tbl(
				outline_id INT(7) AUTO_INCREMENT PRIMARY KEY,
				outline_course_id INT(7) NOT NULL,
				outline_type TEXT(10) NOT NULL,
				outline_content 
			);"
		);
		$enroll_tbl = $this->db->query("
			CREATE TABLE IF NOT EXISTS enroll_tbl (
				enroll_id INT(7) AUTO_INCREMENT PRIMARY KEY,
				enroll_email VARCHAR(30) NOT NULL,
				enroll_course VARCHAR(45) NOT NULL,
				enroll_status TINYINT(1) NOT NULL DEFAULT 1
			);"
		);
	}

	public function createTablesSchema()
	{
		$user_tbl_fields = array(
			'user_id' => array(
				'type' => 'INT',
				'constraint' => 7,
				'auto_increment' => true
			),
			'user_email' => array(
				'type' => 'VARCHAR',
				'constraint' => 30
			),
			'user_password' => array(
				'type' => 'VARCHAR',
				'constraint' => 60
			),
			'user_type' => array(
				'type' => 'text',
				'constraint' => 10
			),
			'user_date_joined' => array(
				'type' => 'DATETIME',
			),
			'user_status' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => 1
			)
		);

		if (!empty($user_tbl_fields))
		{
			$this->dbforge->add_field($user_tbl_fields);
			$this->dbforge->add_key('user_id', true);
			$this->dbforge->create_table('user_tbl', true);
		}

		$instructor_tbl_fields = array(
			'instructor_id' => array(
				'type' => 'INT',
				'constraint' => 7,
				'auto_increment' => true
			),
			'instructor_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 30
			),
			'instructor_headline' => array(
				'type' => 'VARCHAR',
				'constraint' => 50
			),
			'instructor_bio' => array(
				'type' => 'VARCHAR',
				'constraint' => 2000
			),
			'instructor_img_url' => array(
				'type' => 'VARCHAR',
				'constraint' => 50, 
				'default' => 'default_thumbnail.png'
			),
			'instructor_website' => array(
				'type' => 'VARCHAR',
				'constraint' => 50
			),
			'instructor_facebook' => array(
				'type' => 'VARCHAR',
				'constraint' => 50
			),
			'instructor_googleplus' => array(
				'type' => 'VARCHAR',
				'constraint' => 50
			),
			'instructor_linkedin' => array(
				'type' => 'VARCHAR',
				'constraint' => 50
			),
			'instructor_twitter' => array(
				'type' => 'VARCHAR',
				'constraint' => 50
			),
			'instructor_youtube' => array(
				'type' => 'VARCHAR',
				'constraint' => 50
			),

		);

		if (!empty($instructor_tbl_fields))
		{
			$this->dbforge->add_field($instructor_tbl_fields);
			$this->dbforge->add_key('instructor_id', true);
			$this->dbforge->create_table('instructor_tbl', true);
		}

		$admin_tbl_fields = array(
			'admin_id' => array(
				'type' => 'INT',
				'constraint' => 7,
				'auto_increment' => true
			),
			'admin_email' => array(
				'type' => 'VARCHAR',
				'constraint' => 30
			),
			'admin_password' => array(
				'type' => 'VARCHAR',
				'constraint' => 60
			),
			'admin_date_joined' => array(
				'type' => 'DATETIME',
			),
			'admin_status' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => 1
			)
		);

		if (!empty($admin_tbl_fields))
		{
			$this->dbforge->add_field($admin_tbl_fields);
			$this->dbforge->add_key('admin_id', true);
			$this->dbforge->create_table('admin_tbl', true);
		}


	}

	public function getTableStructure($tableName)
	{
		$fields = $this->db->field_data($tableName);
		return $fields;
	}

}
 ?>