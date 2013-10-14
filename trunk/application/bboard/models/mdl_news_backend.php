<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_news_backend extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->order_by("NEWS_DATETIME", "asc");
		//return $this->db->get('BB_NEWS', $num, $offset);
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('NEWS_ID', $id);
		return $this->db->get('BB_NEWS');
	}

	function insert($data)
	{
		 $this->db->flush_cache();
	}
	
	function update($id,$data)
	{
		/*$this->db->flush_cache();
		$this->db->where('NEWS_ID', $id);
		$this->db->update('BB_NEWS', $data);*/
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('BB_NEWS', array('NEWS_ID' => $id));
	}
	
}