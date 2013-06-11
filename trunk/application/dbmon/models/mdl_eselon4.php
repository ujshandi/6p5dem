<?
class mdl_eselon4 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($id=0){
		$this->db->flush_cache();
		$this->db->select('SDM_ESELON4.*, (SELECT count(*) FROM SDM_PEG_KEMENTRIAN WHERE ID_ESELON_4 = SDM_ESELON2.ID_ESELON_4) as JUMLAH_SDM');
		$this->db->from('SDM_ESELON4');
		//$this->db->limit($num, $offset);
		$this->db->order_by('SDM_ESELON4.ID_ESELON_4');
		if($id!=0){
			$this->db->where('SDM_ESELON4.ID_ESELON_3',$id, false);
		}
		return $this->db->get();
		
	}

	function getEselon4ByID($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_ESELON4');
		//$this->db->limit($num, $offset);
		$this->db->where('ID_ESELON_4', $id);
		return $this->db->get()->row();
	}
	
}
?>