<?
class mdl_peg_dinas extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getDataByProv($num=0, $offset=0, $prov=''){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_DINAS');
		//$this->db->limit($num, $offset);
		$this->db->order_by('ID_PEG_DINAS');
		$this->db->where('KODEPROVIN', $prov);
		
		return $this->db->get();
	}
	
	function getDataByKab($num=0, $offset=0, $kab=''){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_DINAS');
		//$this->db->limit($num, $offset);
		$this->db->order_by('ID_PEG_DINAS');
		$this->db->where('KODEKABUP', $kab);
		
		return $this->db->get();
		
	}
	
}
?>