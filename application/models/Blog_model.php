<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_article($article_id)
	{
		if(empty($article_Num))
		{
			return false;
		}
		else
		{
			$this->db->select('*')->where('article_id', $article_id)->get('article_tbl');
		}
	}

}
 ?>