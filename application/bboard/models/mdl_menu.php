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

	

	function getItemById($id)

	{

		$this->db->flush_cache();

		$this->db->where('MENU_ID', $id);

		return $this->db->get('MENU');

	}


	function insert($data){
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
	
	function get_data_edit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('MENU');
		$this->db->where('MENU_ID', $id);
		
		return $this->db->get();
	}
	

	function update($data){
		$this->db->flush_cache();
        $this->db->set('MENU_ID', $data['id']);
        $this->db->set('MENU_NAME', $data['MENU_NAME']);
        $this->db->set('MENU_URL', $data['MENU_URL']);
        $this->db->set('MENU_GROUPING_ID', $data['MENU_GROUPING_ID']);
        $this->db->set('STAT', 'A');
		$result = $this->db->update('MENU');
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
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

	

}