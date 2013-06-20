<?php if(!defined('BASEPATH')) exit('No direct script allowed');



class mdl_users extends CI_Model{

	

	function __construct()

	{

		parent::__construct();

	}

	

	function getItem($num=0, $offset=0)

	{

		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('USERS');
		$this->db->limit($num, $offset);
		return $this->db->get();

	}

	

	function getItemById($id)

	{

		$this->db->flush_cache();

		$this->db->where('USER_ID', $id);

		return $this->db->get('USERS');

	}


	function insert($data){
		$this->db->flush_cache();
		
		$this->db->set('NAME', $data['NAME']);
		$this->db->set('USERNAME', $data['USERNAME']);
		$this->db->set('PASSWORD', $data['PASSWORD']);
		$this->db->set('USER_GROUP_ID', $data['USER_GROUP_ID']);
		$this->db->set('DEPARTMENT', $data['DEPARTMENT']);
		$this->db->set('DESCRIPTION', $data['DESCRIPTION']);
		$this->db->set('NIP', $data['NIP']);
		$this->db->set('EMAIL', $data['EMAIL']);
			
		$result = $this->db->insert('USERS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function get_data_edit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('USERS');
		$this->db->where('USER_ID', $id);
		
		return $this->db->get();
	}
	

	function update($data){
		$this->db->set('NAME', $data['NAME']);
		$this->db->set('USERNAME', $data['USERNAME']);
		$this->db->set('PASSWORD', $data['PASSWORD']);
		$this->db->set('USER_GROUP_ID', $data['USER_GROUP_ID']);
		$this->db->set('DEPARTMENT', $data['DEPARTMENT']);
		$this->db->set('DESCRIPTION', $data['DESCRIPTION']);
		$this->db->set('NIP', $data['NIP']);
		$this->db->set('EMAIL', $data['EMAIL']);
		$this->db->where('USER_ID', $data['id']);
		$result = $this->db->update('USERS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('USER_ID', $data['id']);
		$result = $this->db->delete('USERS');
		
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

	

}