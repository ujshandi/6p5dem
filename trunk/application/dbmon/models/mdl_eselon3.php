<?
class mdl_eselon3 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($id=0){
		$this->db->flush_cache();
		$this->db->select('SDM_ESELON3.*, (SELECT count(*) FROM SDM_PEG_KEMENTRIAN WHERE ID_ESELON_3 = SDM_ESELON2.ID_ESELON_3) as JUMLAH_SDM');
		$this->db->from('SDM_ESELON3');
		//$this->db->limit($num, $offset);
		$this->db->order_by('SDM_ESELON3.ID_ESELON_3');
		if($id!=0){
			$this->db->where('SDM_ESELON3.ID_ESELON_2',$id, false);
		}
		return $this->db->get();
		
	}

	function getEselon3ByID($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_ESELON3');
		//$this->db->limit($num, $offset);
		$this->db->where('ID_ESELON_3', $id);
		return $this->db->get()->row();
	}
	
}
?>