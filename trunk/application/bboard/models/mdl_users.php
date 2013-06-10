<?php if(!defined('BASEPATH')) exit('No direct script allowed');



class mdl_users extends CI_Model{

	

	function __construct()

	{

		parent::__construct();

	}

	

	function getItem($num=0, $offset=0)

	{

		$this->db->flush_cache();

		return $this->db->get('USERS', $num, $offset);

	}

	

	function getItemById($id)

	{

		$this->db->flush_cache();

		$this->db->where('USERS_ID', $id);

		return $this->db->get('USERS');

	}



	function insert($username,$password,$name,$user_group_id,$department,$position,$description,$nip)

	{

		$this->db->flush_cache();

		//$this->db->insert('USERS', $data);
		$query = $this->db->query('INSERT INTO "USERS" ("USER_ID", "USERNAME", "PASSWORD", "NAME", "USER_GROUP_ID", "DEPARTMENT", "POSITION", "DESCRIPTION", "NIP") 
		VALUES (USER_AI_ID_SEQnextval, "' + $username + '", "' + $password + '", "' + $name + '","' + $user_group_id + '", "' + $department + '", "' + $position + '", "' + $description + '", ' + $nip + '")');
		
	}

	

	function update($id, $data)

	{

		$this->db->flush_cache();

		$this->db->where('USERS_ID', $id);

		$this->db->update('USERS', $data);

	}

	

	function delete($id)

	{

		$this->db->flush_cache();

		$this->db->delete('USERS', array('USERS_ID' => $id));

	}

	

}