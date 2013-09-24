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
		 $this->db->flush_cache();        				$this->db->set('JUDUL', $data['JUDUL']);		$this->db->set('DESKRIPSI', $data['DESKRIPSI']);		$this->db->set('GAMBAR', $data['GAMBAR']);        $this->db->set('ISI', $data['ISI']);		$this->db->set('TANGGAL_PEMBUATAN', $data['TANGGAL_PEMBUATAN'], false);		$this->db->set('TANGGAL_MODIFIKASI', $data['TANGGAL_MODIFIKASI'], false);		$this->db->set('EXPIRE', $data['EXPIRE'], false);        $this->db->set('URL', $data['URL']);                $result = $this->db->insert('BB_AGENDA');
	}
	
	function update($id,$data)
	{
		$this->db->flush_cache();        $this->db->set('JUDUL', $data['JUDUL']);        $this->db->set('ISI', $data['ISI']);        $this->db->set('URL', $data['URL']);        $this->db->set('GAMBAR', $data['GAMBAR']);		/*$this->db->set('EXPIRE', 'TO_DATE(\''.$this->fungsi->setDateToDB($data['EXPIRE']).'\', \'YYYY-MM-DD\')', FALSE);*/		$this->db->set('EXPIRE', $data['EXPIRE'], false);        $this->db->set('DESKRIPSI', $data['DESKRIPSI']);        /*$this->db->set('TANGGAL_MODIFIKASI', 'TO_DATE(\''.$this->fungsi->setDateToDB($data['TANGGAL_MODIFIKASI']).'\', \'YYYY-MM-DD\')', FALSE);*/		$this->db->set('TANGGAL_MODIFIKASI', $data['TANGGAL_MODIFIKASI'], false);				$this->db->where('ID_AGENDA', $id);				$result = $this->db->update('BB_AGENDA');				if($result) {			return TRUE;		}else {			return FALSE;		}		
	}		function get_data_edit($id){		$this->db->select('*');		$this->db->from('BB_AGENDA');		$this->db->where('ID_AGENDA', $id);		return $this->db->get();	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('BB_AGENDA', array('ID_AGENDA' => $id));
	}
	
}