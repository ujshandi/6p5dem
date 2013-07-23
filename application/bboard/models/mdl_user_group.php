<?php if(!defined('BASEPATH')) exit('No direct script allowed');



class mdl_user_group extends CI_Model{

	

	function __construct()

	{

		parent::__construct();

	}

	

	function getItem($num=0, $offset=0)

	{

		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('USER_GROUP');		
		$this->db->limit($num, $offset);
		return $this->db->get();

	}

	

	function getItemById($id)

	{

		$this->db->flush_cache();

		$this->db->where('USER_GROUP.USER_GROUP_ID', $id);

		return $this->db->get('USER_GROUP');

	}


	function insert($data){
		$this->db->flush_cache();
		
		$this->db->set('USER_GROUP_NAME', $data['USER_GROUP_NAME']);
		$this->db->set('URUTAN', $data['URUTAN']);
			
		$result = $this->db->insert('USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function get_data_edit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('USER_GROUP');
		$this->db->where('USER_GROUP_ID', $id);
		
		return $this->db->get();
	}
	

	function update($data){
		$this->db->set('USER_GROUP_ID', $data['USER_GROUP_ID']);
		$this->db->set('USER_GROUP_ID', $data['USER_GROUP_ID']);
		$this->db->set('PRIVILEGE', $data['PRIVILEGE']);
		$this->db->where('USER_GROUP_ID', $data['ID']);
		$result = $this->db->update('USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('USER_GROUP_ID', $data['id']);
		$result = $this->db->delete('USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	

	

}