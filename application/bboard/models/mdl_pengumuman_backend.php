<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_pengumuman_backend extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->order_by("TANGGAL_PEMBUATAN", "asc");
		return $this->db->get('BB_PENGUMUMAN', $num, $offset);
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('PENGUMUMAN_ID', $id);
		return $this->db->get('BB_PENGUMUMAN');
	}

	function insert($data)
	{
		 $this->db->flush_cache();
	}
	
	function update($id,$data)
	{
		$this->db->flush_cache();
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('BB_PENGUMUMAN', array('ID_PENGUMUMAN' => $id));
	}
	
}