<?
class mdl_eselon1 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($jenis_kelamin=''){
		$subSql = "(SELECT count(*) FROM SDM_PEG_KEMENTRIAN WHERE ID_ESELON_1 = SDM_ESELON1.ID_ESELON_1";
		if($jenis_kelamin!=''){$subSql .=" AND JENIS_KELAMIN = '{$jenis_kelamin}'";}
		$subSql .= ")";

		$this->db->flush_cache();
		$this->db->select("SDM_ESELON1.*, ".$subSql." as JUMLAH_SDM");
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