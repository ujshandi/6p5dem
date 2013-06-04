<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_agenda extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->order_by("TANGGAL_PEMBUATAN", "asc");
		//return $this->db->get('BB_agenda', $num, $offset);		return $this->db->get('BB_AGENDA');
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('ID_AGENDA', $id);
		return $this->db->get('BB_AGENDA');
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('BB_AGENDA', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('AGENDA_ID', $id);
		$this->db->update('AGENDA', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('AGENDA', array('AGENDA_ID' => $id));
	}
	
}