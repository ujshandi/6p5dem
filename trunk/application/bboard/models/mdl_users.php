<?php if(!defined('BASEPATH')) exit('No direct script allowed');



class mdl_users extends CI_Model{
	
	public $limit;
    public $offset;
	

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
	
	function get_users_like($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('USERS');
		if ($key!=''){
				$this->db->like('USERNAME',$key);
		}
		
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}
	
	function get_item_sdm($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_USERS');
		if ($key!=''){
				$this->db->like('USERNAME',$key);
		}
		
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}
	function get_allitem_sdm(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_USERS');
		return $this->db->get();
	}

	function getItemById($id)

	{

		$this->db->flush_cache();

		$this->db->where('USER_ID', $id);
	
		return $this->db->get('USERS');

	}
	
	function get_item_by_username($USER_ID){
		$this->db->flush_cache();

		$this->db->where('USER_ID', $USER_ID);
	
		return $this->db->get('USERS');
	}

	function insert($data){
		$this->db->flush_cache();
		
		$this->db->set('NAME', $data['NAME']);
		$this->db->set('USERNAME', $data['USERNAME']);
		$this->db->set('PASSWORD', $data['PASSWORD']);
		$this->db->set('USER_GROUP_ID', $data['USER_GROUP_ID']);
		$this->db->set('DEPARTMENT', $data['DEPARTMENT']);
		$this->db->set('POSITION', $data['POSITION']);
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
	function insert_sdm($data){
		$this->db->flush_cache();
		$this->db->set('USER_ID', $data['USER_ID']);
		$this->db->set('USERNAME', $data['USERNAME']);
		$this->db->set('USER_GROUP_ID', $data['USER_GROUP_ID']);
		$this->db->set('NAME', $data['NAME']);
		$this->db->set('PASSWORD', $data['PASSWORD']);
		$this->db->set('DEPARTMENT', $data['DEPARTMENT']);
		$this->db->set('POSITION', $data['POSITION']);
		$this->db->set('DESCRIPTION', $data['DESCRIPTION']);
		$this->db->set('NIP', $data['NIP']);
		$this->db->set('EMAIL', $data['EMAIL']);
			
		$result = $this->db->insert('SDM_USERS');
		
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
	
	function get_data_edit_sdm($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_USERS');
		$this->db->where('USER_ID', $id);
		
		return $this->db->get();
	}
	

	function update_sdm($data){
		$this->db->set('USER_GROUP_ID', $data['USER_GROUP_ID']);
		
		$this->db->where('USERNAME', $data['USERNAME']);
		$result = $this->db->update('SDM_USERS');
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
	
	function delete_sdm($id){
		$this->db->flush_cache();
		$this->db->where('USER_ID', $id);
		$result = $this->db->delete('SDM_USERS');
		
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
	
	function get_user_not_in_sdm($d="",$arr_users=array()){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('USERS');
		if (count($arr_users)>0){
			$this->db->where_not_in('USER_ID' ,  $arr_users);
		}
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if($r->USER_ID == trim($value)){
				$out .= '<option value="'.$r->USER_ID.'" selected="selected">'.$r->USERNAME.'</option>';
			}else{
				$out .= '<option value="'.$r->USER_ID.'">'.$r->USERNAME.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	
	
	function get_group_user_sdm($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('SDM_USER_GROUP');
		
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
	
	 public function listBarang() {
        $query = $this->db->limit($this->limit, $this->offset)
                        ->get('USERS');
        return $query->result_array();
    }

    public function listBarang_page($descp) {
        $query = $this->db->select('*')
                        ->from('USERS')
                        ->like('USERNAME', $descp)
                        ->get('', $this->limit, $this->offset);
        return $query->result_array();
    }

     public function numRec() {
        $result = $this->db->from('USERS');
        return $result->count_all();
    }

    public function numRec_page($descp) {
        $result = $this->db->like('USERNAME', $descp)
                        ->from('USERS')
                        ->count_all_results();
        return $result;
    }
	
	

	

}