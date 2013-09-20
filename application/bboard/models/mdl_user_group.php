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
	
	/*start bboard*/
	
	function get_user_group_bboard_like($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('USER_GROUP');
		if ($key!=''){
				$this->db->like('USER_GROUP_NAME',$key);
		}
		
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}


	function insert_bboard($data){
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
	
	function get_data_edit_bboard($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('USER_GROUP');
		$this->db->where('USER_GROUP_ID', $id);
		
		return $this->db->get();
	}
	

	function update_bboard($data){
		$this->db->set('URUTAN', $data['URUTAN']);
		$this->db->set('USER_GROUP_NAME', $data['USER_GROUP_NAME']); 
		$this->db->where('USER_GROUP_ID', $data['ID']);
		$result = $this->db->update('USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete_bboard($data){
		$this->db->flush_cache();
		$this->db->where('USER_GROUP_ID', $data['id']);
		$result = $this->db->delete('USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	/*end bboard*/
	
	
	/*start sdm*/
	
	function get_user_group_sdm_like($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_USER_GROUP');
		if ($key!=''){
				$this->db->like('USER_GROUP_NAME',$key);
		}
		
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}


	function insert_sdm($data){
		$this->db->flush_cache();
		
		$this->db->set('USER_GROUP_NAME', $data['USER_GROUP_NAME']);
		$this->db->set('URUTAN', $data['URUTAN']);
			
		$result = $this->db->insert('SDM_USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function get_data_edit_sdm($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_USER_GROUP');
		$this->db->where('USER_GROUP_ID', $id);
		
		return $this->db->get();
	}
	

	function update_sdm($data){
		$this->db->set('URUTAN', $data['URUTAN']);
		$this->db->set('USER_GROUP_NAME', $data['USER_GROUP_NAME']); 
		$this->db->where('USER_GROUP_ID', $data['ID']);
		$result = $this->db->update('SDM_USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete_sdm($data){
		$this->db->flush_cache();
		$this->db->where('USER_GROUP_ID', $data['id']);
		$result = $this->db->delete('SDM_USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	/*end sdm*/
	
	/*start diklat*/
	
	function get_user_group_diklat_like($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_USER_GROUP');
		if ($key!=''){
				$this->db->like('USER_GROUP_NAME',$key);
		}
		
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}


	function insert_diklat($data){
		$this->db->flush_cache();
		
		$this->db->set('USER_GROUP_NAME', $data['USER_GROUP_NAME']);
		$this->db->set('URUTAN', $data['URUTAN']);
			
		$result = $this->db->insert('DIKLAT_USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function get_data_edit_diklat($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_USER_GROUP');
		$this->db->where('USER_GROUP_ID', $id);
		
		return $this->db->get();
	}
	

	function update_diklat($data){
		$this->db->set('URUTAN', $data['URUTAN']);
		$this->db->set('USER_GROUP_NAME', $data['USER_GROUP_NAME']); 
		$this->db->where('USER_GROUP_ID', $data['ID']);
		$result = $this->db->update('DIKLAT_USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete_diklat($data){
		$this->db->flush_cache();
		$this->db->where('USER_GROUP_ID', $data['id']);
		$result = $this->db->delete('DIKLAT_USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	/*end diklat*/
	
	/*start kopeten*/
	
	function get_user_group_kopeten_like($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('KOPETEN_USER_GROUP');
		if ($key!=''){
				$this->db->like('USER_GROUP_NAME',$key);
		}
		
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}


	function insert_kopeten($data){
		$this->db->flush_cache();
		
		$this->db->set('USER_GROUP_NAME', $data['USER_GROUP_NAME']);
		$this->db->set('URUTAN', $data['URUTAN']);
			
		$result = $this->db->insert('KOPETEN_USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function get_data_edit_kopeten($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('KOPETEN_USER_GROUP');
		$this->db->where('USER_GROUP_ID', $id);
		
		return $this->db->get();
	}
	

	function update_kopeten($data){
		$this->db->set('URUTAN', $data['URUTAN']);
		$this->db->set('USER_GROUP_NAME', $data['USER_GROUP_NAME']); 
		$this->db->where('USER_GROUP_ID', $data['ID']);
		$result = $this->db->update('KOPETEN_USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete_kopeten($data){
		$this->db->flush_cache();
		$this->db->where('USER_GROUP_ID', $data['id']);
		$result = $this->db->delete('KOPETEN_USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	/*end kopeten*/
	
	/*start jdih*/
	
	function get_user_group_jdih_like($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('JDIH_USER_GROUP');
		if ($key!=''){
				$this->db->like('USER_GROUP_NAME',$key);
		}
		
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}


	function insert_jdih($data){
		$this->db->flush_cache();
		
		$this->db->set('USER_GROUP_NAME', $data['USER_GROUP_NAME']);
		$this->db->set('URUTAN', $data['URUTAN']);
			
		$result = $this->db->insert('JDIH_USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function get_data_edit_jdih($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('JDIH_USER_GROUP');
		$this->db->where('USER_GROUP_ID', $id);
		
		return $this->db->get();
	}
	

	function update_jdih($data){
		$this->db->set('URUTAN', $data['URUTAN']);
		$this->db->set('USER_GROUP_NAME', $data['USER_GROUP_NAME']); 
		$this->db->where('USER_GROUP_ID', $data['ID']);
		$result = $this->db->update('JDIH_USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete_jdih($data){
		$this->db->flush_cache();
		$this->db->where('USER_GROUP_ID', $data['id']);
		$result = $this->db->delete('JDIH_USER_GROUP');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	/*end jdih*/

}