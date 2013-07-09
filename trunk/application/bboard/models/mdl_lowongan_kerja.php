<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_lowongan_kerja extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->order_by("TANGGAL_PEMBUATAN", "asc");
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('ID_LOWONGAN_KERJA', $id);
		return $this->db->get('BB_LOWONGAN_KERJA');
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('BB_LOWONGAN_KERJA', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('LOWONGAN_KERJA_ID', $id);
		$this->db->update('LOWONGAN_KERJA', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('LOWONGAN_KERJA', array('LOWONGAN_KERJA_ID' => $id));
	}
}