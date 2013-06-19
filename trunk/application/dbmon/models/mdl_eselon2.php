<?
class mdl_eselon2 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($id=0, $jenis_kelamin=''){
		$subSql = "(SELECT count(*) FROM SDM_PEG_KEMENTRIAN WHERE ID_ESELON_2 = SDM_ESELON2.ID_ESELON_2";
		if($jenis_kelamin!=''){$subSql .=" AND JENIS_KELAMIN = '{$jenis_kelamin}'";}
		$subSql .= ")";

		$this->db->flush_cache();
		$this->db->select("SDM_ESELON2.*, ".$subSql." as JUMLAH_SDM");
		$this->db->from('SDM_ESELON2');
		//$this->db->limit($num, $offset);
		$this->db->order_by('SDM_ESELON2.ID_ESELON_2');
		if($id!=0){
			$this->db->where('SDM_ESELON2.ID_ESELON_1',$id, false);
		}
		return $this->db->get();
		
	}

	function getEselon2ByID($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_ESELON2');
		//$this->db->limit($num, $offset);
		$this->db->where('ID_ESELON_2', $id);
		return $this->db->get()->row();
	}
	
}
?>