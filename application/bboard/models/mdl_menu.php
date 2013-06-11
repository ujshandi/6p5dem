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

		$this->db->where('USER_GROUP_ID', $id);

		return $this->db->get('USER_GROUP_MENU');

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
		$this->db->from('USER_GROUP_MENU');
		$this->db->where('USER_GROUP_MENU_ID', $id);
		
		return $this->db->get();
	}
	

	function update($data){
		$this->db->set('NAME', $data['NAME']);
		$this->db->set('USERNAME', $data['USERNAME']);
		$this->db->set('PASSWORD', $data['PASSWORD']);
		$this->db->set('USER_GROUP_MENU_ID', $data['USER_GROUP_MENU_ID']);
		$this->db->set('DEPARTMENT', $data['DEPARTMENT']);
		$this->db->set('DESCRIPTION', $data['DESCRIPTION']);
		$this->db->set('NIP', $data['NIP']);
		$this->db->set('EMAIL', $data['EMAIL']);
		$this->db->where('USER_GROUP_MENU_ID', $data['id']);
		$result = $this->db->update('USER_GROUP_MENU');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('USER_GROUP_MENU_MENU_ID', $data['id']);
		$result = $this->db->delete('USER_GROUP_MENU');
		
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
		$this->db->from('USER_GROUP_MENU');
		$this->db->order_by('USER_GROUP_MENU_ID');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if($r->USER_GROUP_MENU_ID == trim($value)){
				$out .= '<option value="'.$r->USER_GROUP_MENU_ID.'" selected="selected">'.$r->USER_GROUP_MENU_NAME.'</option>';
			}else{
				$out .= '<option value="'.$r->USER_GROUP_MENU_ID.'">'.$r->USER_GROUP_MENU_NAME.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}

	

}