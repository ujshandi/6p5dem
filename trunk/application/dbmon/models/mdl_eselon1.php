<?
class mdl_eselon1 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('SDM_ESELON1.*, (SELECT count(*) FROM SDM_PEG_KEMENTRIAN WHERE ID_ESELON_1 = SDM_ESELON1.ID_ESELON_1) as JUMLAH_SDM');
		$this->db->from('SDM_ESELON1');
		//$this->db->limit($num, $offset);
		$this->db->order_by('ID_ESELON_1');
		
		return $this->db->get();
		
	}

	function getEselon1ByID($e1){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_ESELON1');
		//$this->db->limit($num, $offset);
		$this->db->where('ID_ESELON_1', $e1);
		return $this->db->get()->row();
		
	}
	
}
?>