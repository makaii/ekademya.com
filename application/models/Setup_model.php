<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
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