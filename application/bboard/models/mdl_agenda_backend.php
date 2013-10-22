<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_agenda_backend extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->order_by("TANGGAL_PEMBUATAN", "asc");
		return $this->db->get('BB_AGENDA', $num, $offset);
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('AGENDA_ID', $id);
		return $this->db->get('BB_AGENDA');
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
		$this->db->delete('BB_AGENDA', array('ID_AGENDA' => $id));
	}
	
}