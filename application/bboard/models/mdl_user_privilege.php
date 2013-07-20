<?php if(!defined('BASEPATH')) exit('No direct script allowed');



class mdl_user_privilege extends CI_Model{

	

	function __construct()

	{

		parent::__construct();

	}

	

	function getItem($num=0, $offset=0)

	{

		$this->db->flush_cache();
		
		$this->db->select('USER_GROUP_MENU.USER_GROUP_ID,USER_GROUP.USER_GROUP_NAME');
		$this->db->from('USER_GROUP_MENU');
		$this->db->join('USER_GROUP','USER_GROUP.USER_GROUP_ID=USER_GROUP_MENU.USER_GROUP_ID');
		$this->db->group_by('USER_GROUP_MENU.USER_GROUP_ID');
		$this->db->group_by('USER_GROUP.USER_GROUP_NAME');
		
		$this->db->limit($num, $offset);
		
		return $this->db->get();
		

	}

	function countItem(){
		$this->db->select('USER_GROUP_MENU.USER_GROUP_ID,USER_GROUP.USER_GROUP_NAME');
		$this->db->from('USER_GROUP_MENU');
		$this->db->join('USER_GROUP','USER_GROUP.USER_GROUP_ID=USER_GROUP_MENU.USER_GROUP_ID');
		$this->db->group_by('USER_GROUP_MENU.USER_GROUP_ID');
		$this->db->group_by('USER_GROUP.USER_GROUP_NAME');
		return $this->db->count_all_results();
	}

	function getItemById($id)

	{

		$this->db->flush_cache();

		$this->db->where('USER_GROUP_ID', $id);

		return $this->db->get('USER_GROUP_MENU');

	}


	function insert($data){
		$this->db->flush_cache();
		
		$this->db->set('USER_GROUP_ID', $data['USER_GROUP_ID']);
		$this->db->set('MENU_ID', $data['MENU_ID']);
		$this->db->set('PRIVILEGE', $data['PRIVILEGE']);
			
		$result = $this->db->insert('USER_GROUP_MENU');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function get_data_edit($id){
		$this->db->flush_cache();
		$this->db->select('USER_GROUP_MENU.USER_GROUP_MENU_ID,USER_GROUP_MENU.USER_GROUP_ID,USER_GROUP_MENU.PRIVILEGE,USER_GROUP_MENU.MENU_ID,MENU.MENU_NAME, USER_GROUP.USER_GROUP_NAME');
		$this->db->from('USER_GROUP_MENU');
		$this->db->join('MENU','MENU.MENU_ID=USER_GROUP_MENU.MENU_ID');
		$this->db->join('USER_GROUP','USER_GROUP.USER_GROUP_ID=USER_GROUP_MENU.USER_GROUP_ID');
		$this->db->where('USER_GROUP_MENU.USER_GROUP_ID', $id);
		
		return $this->db->get();
	}
	

	function update($data){
		
		$this->db->set('PRIVILEGE', $data['PRIVILEGE']);
		$this->db->where('USER_GROUP_MENU_ID', $data['USER_GROUP_MENU_ID']);
		$result = $this->db->update('USER_GROUP_MENU');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('USER_GROUP_MENU_ID', $data['id']);
		$result = $this->db->delete('USER_GROUP_MENU');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function get_group_user($d="",$user_group_id=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('USER_GROUP');
		if ($user_group_id!='') {
			$this->db->where('USER_GROUP_ID', $user_group_id);
		}
		$this->db->order_by('USER_GROUP_ID');
		
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
	
	function get_menu($d="",$arr_added_menu){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('MENU');
		if (count($arr_added_menu)>0){
			$this->db->where_not_in('MENU_ID' ,  $arr_added_menu);
		}
		$this->db->order_by('MENU_ID');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if($r->MENU_ID == trim($value)){
				$out .= '<option value="'.$r->MENU_ID.'" selected="selected">'.$r->MENU_NAME.'</option>';
			}else{
				$out .= '<option value="'.$r->MENU_ID.'">'.$r->MENU_NAME.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function get_menu_not_in($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('MENU');
		
		$this->db->order_by('MENU_ID');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if($r->MENU_ID == trim($value)){
				$out .= '<option value="'.$r->MENU_ID.'" selected="selected">'.$r->MENU_NAME.'</option>';
			}else{
				$out .= '<option value="'.$r->MENU_ID.'">'.$r->MENU_NAME.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}

	

}