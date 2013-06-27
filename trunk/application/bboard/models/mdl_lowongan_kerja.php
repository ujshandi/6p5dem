<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_lowongan_kerja extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();
		$this->db->order_by("TANGGAL_PEMBUATAN", "asc");		return $this->db->get('BB_LOWONGAN_KERJA');
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
	}		function get_group_makra($d=""){		$name = isset($d['name'])?$d['name']:'';		$id = isset($d['id'])?$d['id']:'';		$class = isset($d['class'])?$d['class']:'';		$value = isset($d['value'])?$d['value']:'';				$this->db->flush_cache();		$this->db->from('BB_MAKRA');				$res = $this->db->get();				$out = '<select name="'.$name.'" id="'.$id.'">';		foreach($res->result() as $r){			if($r->MAKRA_CODE == trim($value)){				$out .= '<option value="'.$r->MAKRA_CODE.'" selected="selected">'.$r->MAKRA_NAME.'</option>';			}else{				$out .= '<option value="'.$r->MAKRA_CODE.'">'.$r->MAKRA_NAME.'</option>';			}		}		$out .= '</select>';				return $out;	}		function get_group_mahli($d=""){		$name = isset($d['name'])?$d['name']:'';		$id = isset($d['id'])?$d['id']:'';		$class = isset($d['class'])?$d['class']:'';		$value = isset($d['value'])?$d['value']:'';				$this->db->flush_cache();		$this->db->from('BB_MAHLI');				$res = $this->db->get();				$out = '<select name="'.$name.'" id="'.$id.'">';		foreach($res->result() as $r){			if($r->AHLI_CODE == trim($value)){				$out .= '<option value="'.$r->AHLI_CODE.'" selected="selected">'.$r->AHLI_NAME.'</option>';			}else{				$out .= '<option value="'.$r->AHLI_CODE.'">'.$r->AHLI_NAME.'</option>';			}		}		$out .= '</select>';				return $out;	}		function get_mahli_data($id){		$this->db->flush_cache();		$this->db->select('*');		$this->db->from('BB_MAHLI');		$this->db->where('AHLI_MAKRA', $id);		return $this->db->get();	}		function get_lowongan_data($id){		$this->db->flush_cache();		$this->db->select('*');		$this->db->from('BB_MLOWONGAN');		$this->db->where('LOWONGAN_AHLI', $id);		return $this->db->get();	}		function search_lowongan($ahlicode, $lowongancode){		$this->db->flush_cache();		$this->db->select('*');		$this->db->from('BB_MLOWONGAN');		if (isset($ahlicode)){$this->db->where('LOWONGAN_AHLI', $ahlicode);}		//if (isset($lowongancode)){$this->db->where('LOWONGAN_TITLE', $lowongancode);}		return $this->db->get();	}		function search_lowongan_md($ahlicode, $lowongancode){		$this->db->flush_cache();		$this->db->select('*');		$this->db->from('BB_MLOWONGAN');		if (isset($ahlicode)){$this->db->where('LOWONGAN_AHLI', $ahlicode);}		//if (isset($lowongancode)){$this->db->where('LOWONGAN_TITLE', $lowongancode);}		$this->db->where('LOWONGAN_MAKRA', 'MD');		return $this->db->get();	}		function search_lowongan_ml($ahlicode, $lowongancode){		$this->db->flush_cache();		$this->db->select('*');		$this->db->from('BB_MLOWONGAN');		if (isset($ahlicode)){$this->db->where('LOWONGAN_AHLI', $ahlicode);}		//if (isset($lowongancode)){$this->db->where('LOWONGAN_TITLE', $lowongancode);}		$this->db->where('LOWONGAN_MAKRA', 'ML');		return $this->db->get();	}		function search_lowongan_mu($ahlicode, $lowongancode){		$this->db->flush_cache();		$this->db->select('*');		$this->db->from('BB_MLOWONGAN');		if (isset($ahlicode)){$this->db->where('LOWONGAN_AHLI', $ahlicode);}		//if (isset($lowongancode)){$this->db->where('LOWONGAN_TITLE', $lowongancode);}		$this->db->where('LOWONGAN_MAKRA', 'MU');		return $this->db->get();	}		function search_lowongan_mka($ahlicode, $lowongancode){		$this->db->flush_cache();		$this->db->select('*');		$this->db->from('BB_MLOWONGAN');		if (isset($ahlicode)){$this->db->where('LOWONGAN_AHLI', $ahlicode);}		//if (isset($lowongancode)){$this->db->where('LOWONGAN_TITLE', $lowongancode);}		$this->db->where('LOWONGAN_MAKRA', 'MKA');		return $this->db->get();	}		function search_lowongan_detail($lowongancode){		$this->db->flush_cache();		$this->db->select('*');		$this->db->from('BB_MLOWONGAN');		$this->db->where('LOWONGAN_CODE', $lowongancode);		return $this->db->get();	}
}