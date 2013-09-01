<?php if(!defined('BASEPATH')) exit('No direct script allowed');



class mdl_lowongan_kerja_backend extends CI_Model{

	

	function __construct()
	{
		parent::__construct();
	}
	
	function getData($count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('BB_MLOWONGAN.*,BB_MAKRA.MAKRA_NAME,BB_MAHLI.AHLI_NAME');
		$this->db->from('BB_MLOWONGAN');
		$this->db->join('BB_MAKRA', 'MAKRA_CODE=LOWONGAN_MAKRA');
		$this->db->join('BB_MAHLI', 'AHLI_CODE=LOWONGAN_AHLI');
		$this->db->limit($num, $offset);
		$this->db->order_by('LOWONGAN_CODE');
		if ($count_data) {
			return $this->db->count_all_results();
		}
		return $this->db->get();
		
	}
	
	function getSearchData($count_data=false, $mahli='', $search='', $num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('BB_MLOWONGAN.*,BB_MAKRA.MAKRA_NAME,BB_MAHLI.AHLI_NAME');
		$this->db->from('BB_MLOWONGAN');
		$this->db->join('BB_MAKRA', 'MAKRA_CODE=LOWONGAN_MAKRA');
		$this->db->join('BB_MAHLI', 'AHLI_CODE=LOWONGAN_AHLI');
		if ($mahli!=''){
			$this->db->where('BB_MLOWONGAN.LOWONGAN_AHLI', $mahli);
		}
		
		if ($search!=''){
			$this->db->where('BB_MLOWONGAN.LOWONGAN_TITLE', $search);
		}
		
		
		if ($count_data) {
			return $this->db->count_all_results();
		}
		
		
		$this->db->limit($num, $offset);
		$this->db->order_by('LOWONGAN_CODE');
		
		return $this->db->get();
		
	}
	
	function get_lowongan_like($ahli_code,$makra,$key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('BB_MLOWONGAN.*,BB_MAKRA.MAKRA_NAME,BB_MAHLI.AHLI_NAME');
		$this->db->from('BB_MLOWONGAN');
		$this->db->join('BB_MAKRA', 'MAKRA_CODE=LOWONGAN_MAKRA');
		$this->db->join('BB_MAHLI', 'AHLI_CODE=LOWONGAN_AHLI');
		if ($makra!=''){
				$this->db->where('BB_MLOWONGAN.LOWONGAN_MAKRA', $makra);
		}
		if ($ahli_code!='' && $ahli_code!=0){
				$this->db->where('BB_MLOWONGAN.LOWONGAN_CODE', $ahli_code);
		}
		if ($key!=''){
				$this->db->like('BB_MLOWONGAN.LOWONGAN_TITLE',$key);
		}
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('BB_MLOWONGAN');
		$this->db->where('LOWONGAN_CODE', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        
        $this->db->set('LOWONGAN_MAKRA', $data['LOWONGAN_MAKRA']);
        $this->db->set('LOWONGAN_TITLE', $data['LOWONGAN_TITLE']);
        $this->db->set('LOWONGAN_AHLI', $data['LOWONGAN_AHLI']);
		/*
		$this->db->set('LOWONGAN_DATE', 'TO_DATE(\''.$this->fungsi->setDateToDB($data['LOWONGAN_DATE']).'\', \'YYYY-MM-DD\')', FALSE);
		$this->db->set('LOWONGAN_DATE_EXPIRED', 'TO_DATE(\''.$this->fungsi->setDateToDB($data['LOWONGAN_DATE_EXPIRED']).'\', \'YYYY-MM-DD\')', FALSE);*/
		$this->db->set('LOWONGAN_DATE', $data['LOWONGAN_DATE'], false);
		$this->db->set('LOWONGAN_DATE_EXPIRED', $data['LOWONGAN_DATE_EXPIRED'], false);
		
        $this->db->set('LOWONGAN_SUMMARY', $data['LOWONGAN_SUMMARY']);
        $this->db->set('LOWONGAN_DETAIL', $data['LOWONGAN_DETAIL']);

        $result = $this->db->insert('BB_MLOWONGAN');
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('LOWONGAN_MAKRA', $data['LOWONGAN_MAKRA']);
        $this->db->set('LOWONGAN_TITLE', $data['LOWONGAN_TITLE']);
        $this->db->set('LOWONGAN_AHLI', $data['LOWONGAN_AHLI']);
		/*$this->db->set('LOWONGAN_DATE', 'TO_DATE(\''.$this->fungsi->setDateToDB($data['LOWONGAN_DATE']).'\', \'YYYY-MM-DD\')', FALSE); */
		/*$this->db->set('LOWONGAN_DATE_EXPIRED', 'TO_DATE(\''.$this->fungsi->setDateToDB($data['LOWONGAN_DATE_EXPIRED']).'\', \'YYYY-MM-DD\')', FALSE);*/
		
		$this->db->set('LOWONGAN_DATE_EXPIRED', $data['LOWONGAN_DATE_EXPIRED'], false);
        $this->db->set('LOWONGAN_SUMMARY', $data['LOWONGAN_SUMMARY']);
        $this->db->set('LOWONGAN_DETAIL', $data['LOWONGAN_DETAIL']);

		$this->db->where('LOWONGAN_CODE', $data['id']);
		
		$result = $this->db->update('BB_MLOWONGAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}

	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('LOWONGAN_CODE', $id);
		$result = $this->db->delete('BB_MLOWONGAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function get_lowongan_makra(){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('BB_MAKRA');
		$this->db->order_by('MAKRA_CODE');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if($r->MAKRA_CODE == trim($value)){
				$out .= '<option value="'.$r->MAKRA_CODE.'" selected="selected">'.$r->MAKRA_NAME.'</option>';
			}else{
				$out .= '<option value="'.$r->MAKRA_CODE.'">'.$r->MAKRA_NAME.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
}
