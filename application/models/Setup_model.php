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
		$fields = array(
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
				'constraint' => 65
			),
			'user_status' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => 1
			)
		);

		if (!empty($fields))
		{
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key('user_id', true);
			$this->dbforge->create_table('user_tbl', true);
		}
	}

	public function getTableStructure($tableName)
	{
		$fields = $this->db->field_data($tableName);
		return $fields;
	}

}
 ?>