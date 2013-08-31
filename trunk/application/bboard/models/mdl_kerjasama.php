<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_kerjasama extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();		return $this->db->get('BB_INFORMASI_KERJASAMA');
	}	
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('ID_KERJASAMA', $id);
		return $this->db->get('BB_INFORMASI_KERJASAMA');
	}

	function insert($data)
	{
		$this->db->flush_cache();
		$this->db->insert('BB_INFORMASI_KERJASAMA', $data);
	}
	
	function update($id, $data)
	{
		$this->db->flush_cache();
		$this->db->where('ID_KERJASAMA', $id);
		$this->db->update('BB_INFORMASI_KERJASAMA', $data);
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('BB_INFORMASI_KERJASAMA', array('ID_KERJASAMA' => $id));
	}
}