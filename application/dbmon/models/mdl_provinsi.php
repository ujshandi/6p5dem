<?
class mdl_provinsi extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('a.*');
		$this->db->from('provinsi a');
		//$this->db->limit($num, $offset);
		$this->db->order_by('a.kodeprovin');
		
		return $this->db->get();
		
	}
	
}
?>