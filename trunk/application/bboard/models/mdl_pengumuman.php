<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_pengumuman extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->order_by("TANGGAL_PEMBUATAN", "asc");
		//return $this->db->get('BB_PENGUMUMAN', $num, $offset);		return $this->db->get('BB_PENGUMUMAN');
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('ID_PENGUMUMAN', $id);
		return $this->db->get('BB_PENGUMUMAN');
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('BB_PENGUMUMAN', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('PENGUMUMAN_ID', $id);
		$this->db->update('PENGUMUMAN', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('PENGUMUMAN', array('PENGUMUMAN_ID' => $id));
	}
	
}