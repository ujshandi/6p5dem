<?php
class Home_model extends CI_Model
{
 	private $menu 		= 'menu';
	 
	
	 
 //get inbox list
	public function get_parent_menu(){
		$this->db->where('LENGTH(menu_code)', 4);
		$this->db->order_by('id','ASC');
  		$query = $this->db->get($this->menu);
   		return $query->result();
 	}
 	
//get sent list
	public function get_sub_menu($parent){
	//SELECT * FROM menu WHERE menu_parent = 'M020'
   		$this->db->order_by('menu_code','ASC');
		$query = $this->db->get_where($this->menu, array('menu_parent' => $parent));
		
 		return $query;
 	}
	
//get Balance
 	public function get_child_submenu($sub){
		$query = $this->db->get_where($this->menu, array('menu_parent' => $sub));
		return $query;
 	}
 
}
?>