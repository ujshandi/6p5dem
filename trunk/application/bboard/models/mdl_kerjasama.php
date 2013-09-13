<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_kerjasama extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();		$this->db->order_by('ID_KERJASAMA','asc');		return $this->db->get('BB_INFORMASI_KERJASAMA');
	}	
	
	function getItemById($id)
	{
		$this->db->flush_cache();
			$this->db->where('ID_KERJASAMA', $data['id']);
		return $this->db->get('BB_INFORMASI_KERJASAMA');
	}

	function insert($data)
	{
		$this->db->flush_cache();		        $this->db->set('NAMA_PENYEDIA_JASA', $data['NAMA_PENYEDIA_JASA']);        $this->db->set('JENIS_KERJASAMA', $data['JENIS_KERJASAMA']);        $this->db->set('BIDANG', $data['MAKRA_CODE']);        $this->db->set('PERIODE_AWAL', $data['PERIODE_AWAL'], false);        $this->db->set('PERIODE_AKHIR', $data['PERIODE_AKHIR'], false);         $this->db->insert('BB_INFORMASI_KERJASAMA');				if($result) {			return TRUE;		}else {			return FALSE;		}
		
	}			function get_data_edit($id){		$this->db->flush_cache();		$this->db->select('*');		$this->db->from('BB_INFORMASI_KERJASAMA');		$this->db->where('ID_KERJASAMA', $data['id']);				return $this->db->get();	}
		function getDataEdit($id){		$this->db->flush_cache();		$this->db->select('*');		$this->db->from('BB_INFORMASI_KERJASAMA');		$this->db->where('ID_KERJASAMA', $id);				return $this->db->get();	}	
	function update($id, $data)
	{
		$this->db->flush_cache();		         $this->db->set('NAMA_PENYEDIA_JASA', $data['NAMA_PENYEDIA_JASA']);        $this->db->set('JENIS_KERJASAMA', $data['JENIS_KERJASAMA']);        $this->db->set('BIDANG', $data['MAKRA_CODE']);        $this->db->set('PERIODE_AWAL', $data['PERIODE_AWAL'], false);        $this->db->set('PERIODE_AKHIR', $data['PERIODE_AKHIR'], false);		$this->db->where('ID_KERJASAMA', $id);		$result = $this->db->update('BB_INFORMASI_KERJASAMA');						if($result) {			return TRUE;		}else {			return FALSE;		}
	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('BB_INFORMASI_KERJASAMA', array('ID_KERJASAMA' => $id));
	}
}