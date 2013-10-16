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
		$this->db->select('USERS.*,USER_GROUP.USER_GROUP_NAME');
		$this->db->from('USERS');
		$this->db->join('USER_GROUP','USER_GROUP.USER_GROUP_ID=USERS.USER_GROUP_ID');
		$this->db->limit($num, $offset);
		return $this->db->get();

	}
	
	function get_users_like($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('USERS.NIP,USERS.USERNAME,USERS.NAME,USERS.LEVEL,USERS.DEPARTMENT,USERS.POSITION,USERS.USER_ID,USER_GROUP.USER_GROUP_NAME');
		$this->db->from('USERS');
		$this->db->join('USER_GROUP','USER_GROUP.USER_GROUP_ID=USERS.USER_GROUP_ID');
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
		$this->db->select('SDM_USERS.*,SDM_USER_GROUP.USER_GROUP_NAME');
		$this->db->from('SDM_USERS');
		$this->db->join('USERS','USERS.USER_ID=SDM_USERS.USER_ID');
		$this->db->join('SDM_USER_GROUP','SDM_USER_GROUP.USER_GROUP_ID=SDM_USERS.USER_GROUP_ID');
		
		if ($key!=''){
				$this->db->like('SDM_USERS.USERNAME',$key);
		}
		
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}
	
	function get_item_jdih($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('JDIH_USERS.*,JDIH_USER_GROUP.USER_GROUP_NAME');
		$this->db->from('JDIH_USERS');
		$this->db->join('USERS','USERS.USER_ID=JDIH_USERS.USER_ID');
		$this->db->join('JDIH_USER_GROUP','JDIH_USER_GROUP.USER_GROUP_ID=JDIH_USERS.USER_GROUP_ID');
		
		if ($key!=''){
				$this->db->like('JDIH_USERS.USERNAME',$key);
		}
		
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}
	
	function get_item_kopeten($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('KOPETEN_USERS.*,KOPETEN_USER_GROUP.USER_GROUP_NAME');
		$this->db->from('KOPETEN_USERS');
		$this->db->join('USERS','USERS.USER_ID=KOPETEN_USERS.USER_ID');
		$this->db->join('KOPETEN_USER_GROUP','KOPETEN_USER_GROUP.USER_GROUP_ID=KOPETEN_USERS.USER_GROUP_ID');
		
		if ($key!=''){
				$this->db->like('KOPETEN_USERS.USERNAME',$key);
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
	
	function get_allitem_kopeten(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('KOPETEN_USERS');
		return $this->db->get();
	}
	
	function get_allitem_jdih(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('JDIH_USERS');
		return $this->db->get();
	}
	
	function get_item_diklat($key,$count_data=false,$num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_USERS.*,DIKLAT_USER_GROUP.USER_GROUP_NAME');
		$this->db->from('DIKLAT_USERS');
		if ($key!=''){
				$this->db->like('USERNAME',$key);
		}
		$this->db->join('DIKLAT_USER_GROUP','DIKLAT_USER_GROUP.USER_GROUP_ID=DIKLAT_USERS.USER_GROUP_ID');
		if ($count_data){
			return $this->db->count_all_results();
		}
		$this->db->limit($num, $offset);
		return $this->db->get();
	}
	function get_allitem_diklat(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_USERS');
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
		$this->db->set('NIP', $data['NIP']);
		$this->db->set('EMAIL', $data['EMAIL']);
		$this->db->set('LEVEL', $data['LEVEL']);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);
		$this->db->set('STAT', 'A');
									
		$result = $this->db->insert('USERS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function update($data){
		$this->db->set('NAME', $data['NAME']);
		$this->db->set('USERNAME', $data['USERNAME']);
		$this->db->set('PASSWORD', $data['PASSWORD']);
		$this->db->set('USER_GROUP_ID', $data['USER_GROUP_ID']);
		$this->db->set('NIP', $data['NIP']);
		$this->db->set('EMAIL', $data['EMAIL']);
		$this->db->set('LEVEL', $data['LEVEL']);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);
		$this->db->where('USER_ID', $data['ID']);
		$result = $this->db->update('USERS');
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
		$this->db->set('LEVEL', $data['LEVEL']);
		$this->db->set('KODEPROVIN', $data['KODEPROVIN']);
		$this->db->set('KODEKABUP', $data['KODEKABUP']);
		
		$result = $this->db->insert('SDM_USERS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function insert_diklat($data){
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
		$this->db->set('STAT', 'A');
		$this->db->set('LEVEL', $data['LEVEL']);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);
		
		$result = $this->db->insert('DIKLAT_USERS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	function insert_kopeten($data){
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
		$this->db->set('STAT', 'A');
		/*$this->db->set('LEVEL', $data['LEVEL']);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);*/
		
		$result = $this->db->insert('KOPETEN_USERS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function insert_jdih($data){
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
		$this->db->set('LEVEL', $data['LEVEL']);
		$this->db->set('STAT', 'A');
		
		$result = $this->db->insert('JDIH_USERS');
		
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
		$this->db->set('LEVEL', $data['LEVEL']);
		$this->db->set('KODEPROVIN', $data['KODEPROVIN']);
		$this->db->set('KODEKABUP', $data['KODEKABUP']);
		
		$this->db->where('USERNAME', $data['USERNAME']);
		$result = $this->db->update('SDM_USERS');
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function get_data_edit_diklat($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_USERS');
		$this->db->where('USER_ID', $id);
		
		return $this->db->get();
	}
	

	function update_diklat($data){
		$this->db->set('USER_GROUP_ID', $data['USER_GROUP_ID']);
		$this->db->set('LEVEL', $data['LEVEL']);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);
		
		$this->db->where('USERNAME', $data['USERNAME']);
		$result = $this->db->update('DIKLAT_USERS');
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
	
	function delete_diklat($id){
		$this->db->flush_cache();
		$this->db->where('USER_ID', $id);
		$result = $this->db->delete('DIKLAT_USERS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function delete_kopeten($id){
		$this->db->flush_cache();
		$this->db->where('USER_ID', $id);
		$result = $this->db->delete('KOPETEN_USERS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function delete_jdih($id){
		$this->db->flush_cache();
		$this->db->where('USER_ID', $id);
		$result = $this->db->delete('JDIH_USERS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function jdih_kopeten($id){
		$this->db->flush_cache();
		$this->db->where('USER_ID', $id);
		$result = $this->db->delete('JDIH_USERS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function get_data_edit_kopeten($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('KOPETEN_USERS');
		$this->db->where('USER_ID', $id);
		
		return $this->db->get();
	}
	

	function update_kopeten($data){
		$this->db->set('USER_GROUP_ID', $data['USER_GROUP_ID']);
		/*$this->db->set('LEVEL', $data['LEVEL']);*/
		
		$this->db->where('USERNAME', $data['USERNAME']);
		$result = $this->db->update('KOPETEN_USERS');
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	
	
	function get_data_edit_jdih($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('JDIH_USERS');
		$this->db->where('USER_ID', $id);
		
		return $this->db->get();
	}
	

	function update_jdih($data){
		$this->db->set('USERNAME', $data['USERNAME']);
		$this->db->set('USER_GROUP_ID', $data['USER_GROUP_ID']);
		$this->db->set('LEVEL', $data['LEVEL']);
		
		$this->db->where('USERNAME', $data['USERNAME']);
		$result = $this->db->update('JDIH_USERS');
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
	function get_group_level($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('LEVEL');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if($r->LEVEL_ID == trim($value)){
				$out .= '<option value="'.$r->LEVEL_ID.'" selected="selected">'.$r->NAME.'</option>';
			}else{
				$out .= '<option value="'.$r->LEVEL_ID.'">'.$r->NAME.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function get_edit_group_level($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('LEVEL');
		
		$res = $this->db->get();
		
		/*$out = '<select name="'.$name.'" id="'.$id.'">'; */
		$out = '';
		foreach($res->result() as $r){
			if($r->LEVEL_ID == trim($value)){
				$out .= '<option value="'.$r->LEVEL_ID.'" selected="selected">'.$r->NAME.'</option>';
			}else{
				$out .= '<option value="'.$r->LEVEL_ID.'">'.$r->NAME.'</option>';
			}
		}
		/*$out .= '</select>'; */
		
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
	
	function get_user_not_in_diklat($d="",$arr_users=array()){
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

	
	function get_user_not_in_kopeten($d="",$arr_users=array()){
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
	
	function get_user_not_in_jdih($d="",$arr_users=array()){
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
	
	function get_group_user_diklat($d=""){
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
	
	function get_group_user_kopeten($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('KOPETEN_USER_GROUP');
		
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
	
	function get_group_user_jdih($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('JDIH_USER_GROUP');
		
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
	
	
	function get_induk_upt($upt){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_INDUKUPT');
		$this->db->where('KODE_INDUK', $upt);
		return $this->db->get();
	}
	
	function get_upt($upt){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->where('KODE_INDUK', $upt);
		return $this->db->get();
	}
	
	function get_group_sdm_provinsi($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('SDM_PROVINSI');
		
		$res = $this->db->get();

		$out = '';
		foreach($res->result() as $r){
			if($r->KODEPROVIN == trim($value)){
				$out .= '<option value="'.$r->KODEPROVIN.'" selected="selected">'.$r->NAMAPROVIN.'</option>';
			}else{
				$out .= '<option value="'.$r->KODEPROVIN.'">'.$r->NAMAPROVIN.'</option>';
			}
		}		
		return $out;
	}
	
	
	function get_group_sdm_kabupaten($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		$kodeprovin = isset($d['kodeprovin'])?$d['kodeprovin']:'';
		
		$this->db->flush_cache();
		$this->db->from('SDM_KABUPATEN');
		$this->db->where('KODEPROVIN', $kodeprovin);
		$res = $this->db->get();

		$out = '';
		foreach($res->result() as $r){
			if($r->KODEKABUP == trim($value)){
				$out .= '<option value="'.$r->KODEKABUP.'" selected="selected">'.$r->NAMAKABUP.'</option>';
			}else{
				$out .= '<option value="'.$r->KODEKABUP.'">'.$r->NAMAKABUP.'</option>';
			}
		}		
		return $out;
	}
	
	function get_provinsi(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PROVINSI');
		return $this->db->get();
	}
	function get_kabupaten($kodeprovin){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_KABUPATEN');
		$this->db->where('KODEPROVIN', $kodeprovin);
		return $this->db->get();
	}
	
	function get_group_diklat_mst_indukupt($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_INDUKUPT');
		
		$res = $this->db->get();

		$out = '';
		foreach($res->result() as $r){
			if($r->KODE_INDUK == trim($value)){
				$out .= '<option value="'.$r->KODE_INDUK.'" selected="selected">'.$r->NAMA_INDUK.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_INDUK.'">'.$r->NAMA_INDUK.'</option>';
			}
		}		
		return $out;
	}
	function get_group_diklat_mst_upt($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		
		$res = $this->db->get();

		$out = '';
		foreach($res->result() as $r){
			if($r->KODE_UPT == trim($value)){
				$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
			}
		}		
		return $out;
	}
	
	function get_level_jdih($d=""){
		
		$value = isset($d['value'])?$d['value']:'';
		
		$out .= '<option value="1" '.($value=="1"?'selected="selected"':'').'>Administrasi</option>';
		$out .= '<option value="2" '.($value=="2"?'selected="selected"':'').'>Umum</option>';
				
		return $out;
	}
}