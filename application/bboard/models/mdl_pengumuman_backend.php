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
		 $this->db->flush_cache();        				$this->db->set('JUDUL', $data['JUDUL']);        $this->db->set('ISI', $data['ISI']);        $this->db->set('URL', $data['URL']);        $this->db->set('GAMBAR', $data['GAMBAR']);		$this->db->set('EXPIRE', $data['EXPIRE'], false);		/*$this->db->set('TANGGAL_PEMBUATAN', 'TO_DATE(\''.$this->fungsi->setDateToDB($data['TANGGAL_PEMBUATAN']).'\', \'YYYY-MM-DD\')', FALSE);*/		$this->db->set('TANGGAL_PEMBUATAN', $data['TANGGAL_PEMBUATAN'], false);        $this->db->set('DESKRIPSI', $data['DESKRIPSI']);        $this->db->set('TANGGAL_MODIFIKASI', $data['TANGGAL_MODIFIKASI'], false);		        $result = $this->db->insert('BB_PENGUMUMAN');
	}
	
	function update($id,$data)
	{
		$this->db->flush_cache();        $this->db->set('JUDUL', $data['JUDUL']);        $this->db->set('ISI', $data['ISI']);        $this->db->set('URL', $data['URL']);        $this->db->set('GAMBAR', $data['GAMBAR']);		/*$this->db->set('EXPIRE', 'TO_DATE(\''.$this->fungsi->setDateToDB($data['EXPIRE']).'\', \'YYYY-MM-DD\')', FALSE);*/		$this->db->set('EXPIRE', $data['EXPIRE'], false);        $this->db->set('DESKRIPSI', $data['DESKRIPSI']);        /*$this->db->set('TANGGAL_MODIFIKASI', 'TO_DATE(\''.$this->fungsi->setDateToDB($data['TANGGAL_MODIFIKASI']).'\', \'YYYY-MM-DD\')', FALSE);*/		$this->db->set('TANGGAL_MODIFIKASI', $data['TANGGAL_MODIFIKASI'], false);				$this->db->where('ID_PENGUMUMAN', $id);				$result = $this->db->update('BB_PENGUMUMAN');				if($result) {			return TRUE;		}else {			return FALSE;		}		
	}		function get_data_edit($id){		$this->db->select('*');		$this->db->from('BB_PENGUMUMAN');		$this->db->where('ID_PENGUMUMAN', $id);		return $this->db->get();	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('BB_PENGUMUMAN', array('ID_PENGUMUMAN' => $id));
	}
	
}