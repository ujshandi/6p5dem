<?php if(!defined('BASEPATH')) exit('No direct script allowed');



class mdl_menu extends CI_Model{

	

	function __construct()

	{

		parent::__construct();

	}

	

	function getItem($num=0, $offset=0)

	{

		$this->db->flush_cache();
		$this->db->select('USER_GROUP_MENU.*, MENU.MENU_NAME, MENU.MENU_URL');
		$this->db->from('MENU');
		$this->db->join('USER_GROUP_MENU','MENU.MENU_ID=USER_GROUP_MENU.MENU_ID');		
		$this->db->order_by('MENU.MENU_ID','asc');
		$this->db->limit($num, $offset);
		return $this->db->get();

	}

	function get_menu_bboard_like($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('USER_GROUP_MENU.*, MENU.MENU_NAME, MENU.MENU_URL');
		$this->db->from('MENU');
		$this->db->join('USER_GROUP_MENU','MENU.MENU_ID=USER_GROUP_MENU.MENU_ID');		
		$this->db->order_by('MENU.MENU_ID','asc');
		if ($key!=''){
				$this->db->like('MENU.MENU_NAME',$key);
		}
		
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}

	function insert_bboard($data){
		$this->db->flush_cache();
		
		$this->db->set('NAME', $data['NAME']);
		$this->db->set('USERNAME', $data['USERNAME']);
		$this->db->set('PASSWORD', md5($data['PASSWORD']));
		$this->db->set('USER_GROUP_MENU_ID', $data['USER_GROUP_MENU_ID']);
		$this->db->set('DEPARTMENT', $data['DEPARTMENT']);
		$this->db->set('DESCRIPTION', $data['DESCRIPTION']);
		$this->db->set('NIP', $data['NIP']);
		$this->db->set('EMAIL', $data['EMAIL']);
			
		$result = $this->db->insert('USER_GROUP_MENU');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function get_data_edit_bboard($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('MENU');
		$this->db->where('MENU_ID', $id);
		
		return $this->db->get();
	}
	

	function update_bboard($data){
		$this->db->flush_cache();
        
        $this->db->set('MENU_NAME', $data['MENU_NAME']);
        /*$this->db->set('MENU_URL', $data['MENU_URL']); */
        $this->db->set('MENU_GROUPING_ID', $data['MENU_GROUPING_ID']);
        $this->db->set('STAT', 'A');
		$this->db->where('MENU_ID', $data['ID']);
		$result = $this->db->update('MENU');
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete_bboard($data){
		$this->db->flush_cache();
		$this->db->where('MENU_ID', $data['id']);
		$result = $this->db->delete('MENU');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function get_group_user($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('USER_GROUP');
		
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if($r->USER_GROUP_ID == trim($value)){
				$out .= '<option value="'.$r->USER_GROUP_ID.'" selected="selected">'.$r->USER_GROUP_NAME.'</option>';
			}else{
				$out .= '<option value="'.$r->USER_GROUP_ID.'">'.$r->USER_GROUP_NAME.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function get_menu_grouping($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('MENU_GROUPING');
		
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if($r->MENU_GROUPING_ID == trim($value)){
				$out .= '<option value="'.$r->MENU_GROUPING_ID.'" selected="selected">'.$r->MENU_GROUPING_NAME.'</option>';
			}else{
				$out .= '<option value="'.$r->MENU_GROUPING_ID.'">'.$r->MENU_GROUPING_NAME.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	
	
	/*start sdm*/
	function get_menu_sdm_like($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('SDM_USER_GROUP_MENU.*, SDM_MENU.MENU_NAME, SDM_MENU.MENU_URL');
		$this->db->from('SDM_MENU');
		$this->db->join('SDM_USER_GROUP_MENU','SDM_MENU.MENU_ID=SDM_USER_GROUP_MENU.MENU_ID');		
		$this->db->order_by('SDM_MENU.MENU_ID','asc');
		if ($key!=''){
				$this->db->like('SDM_MENU.MENU_NAME',$key);
		}
		
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}
	
	function get_data_edit_sdm($id){
		$this->db->flush_cache();
		$this->db->select('SDM_MENU.*,SDM_USER_GROUP_MENU.USER_GROUP_ID');
		$this->db->from('SDM_MENU');
		$this->db->join('SDM_USER_GROUP_MENU','SDM_MENU.MENU_ID=SDM_USER_GROUP_MENU.MENU_ID');	
		$this->db->where('SDM_MENU.MENU_ID', $id);
		
		return $this->db->get();
	}
	

	function update_sdm($data){
		$this->db->flush_cache();
        
        $this->db->set('MENU_NAME', $data['MENU_NAME']);
        $this->db->set('MENU_GROUPING_ID', $data['MENU_GROUPING_ID']);
        $this->db->set('STAT', 'A');
		$this->db->where('MENU_ID', $data['ID']);
		$result = $this->db->update('SDM_MENU');
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete_sdm($data){
		$this->db->flush_cache();
		$this->db->where('MENU_ID', $data['id']);
		$result = $this->db->delete('SDM_MENU');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	/*end sdm*/
	
	/*start diklat*/
	function get_menu_diklat_like($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_USER_GROUP_MENU.*, DIKLAT_MENU.MENU_NAME, DIKLAT_MENU.MENU_URL');
		$this->db->from('DIKLAT_MENU');
		$this->db->join('DIKLAT_USER_GROUP_MENU','DIKLAT_MENU.MENU_ID=DIKLAT_USER_GROUP_MENU.MENU_ID');		
		$this->db->order_by('DIKLAT_MENU.MENU_ID','asc');
		if ($key!=''){
				$this->db->like('DIKLAT_MENU.MENU_NAME',$key);
		}
		
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}
	
	function get_data_edit_diklat($id){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MENU.*,DIKLAT_USER_GROUP_MENU.USER_GROUP_ID');
		$this->db->from('DIKLAT_MENU');
		$this->db->join('DIKLAT_USER_GROUP_MENU','DIKLAT_MENU.MENU_ID=DIKLAT_USER_GROUP_MENU.MENU_ID');	
		$this->db->where('DIKLAT_MENU.MENU_ID', $id);
		
		return $this->db->get();
	}
	

	function update_diklat($data){
		$this->db->flush_cache();
        
        $this->db->set('MENU_NAME', $data['MENU_NAME']);
        $this->db->set('MENU_GROUPING_ID', $data['MENU_GROUPING_ID']);
        $this->db->set('STAT', 'A');
		$this->db->where('MENU_ID', $data['ID']);
		$result = $this->db->update('DIKLAT_MENU');
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete_diklat($data){
		$this->db->flush_cache();
		$this->db->where('MENU_ID', $data['id']);
		$result = $this->db->delete('DIKLAT_MENU');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function get_user_group_diklat($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_USER_GROUP');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if($r->USER_GROUP_ID == trim($value)){
				$out .= '<option value="'.$r->USER_GROUP_ID.'" selected="selected">'.$r->USER_GROUP_NAME.'</option>';
			}else{
				$out .= '<option value="'.$r->USER_GROUP_ID.'">'.$r->USER_GROUP_NAME.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	/*end diklat*/
	

}