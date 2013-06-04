<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_news extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->order_by("NEWS_DATETIME", "asc");
		//return $this->db->get('BB_NEWS', $num, $offset);		return $this->db->get('BB_NEWS');
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
		$this->db->insert('BB_NEWS', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('NEWS_ID', $id);
		$this->db->update('news', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('news', array('NEWS_ID' => $id));
	}
	
}