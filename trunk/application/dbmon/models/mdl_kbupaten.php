<?
class mdl_kbupaten extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($kodeprovin=0){
		$this->db->flush_cache();
		$this->db->select('SDM_KABUPATEN.*, (SELECT count(*) FROM SDM_PEG_DINAS WHERE KODEKABUP = SDM_KABUPATEN.KODEKABUP) as JUMLAH_SDM');
		$this->db->from('SDM_KABUPATEN');
		//$this->db->limit($num, $offset);
		$this->db->order_by('SDM_KABUPATEN.KODEKABUP');
		if($kodeprovin!=0){
			$this->db->where('SDM_KABUPATEN.KODEPROVIN',$kodeprovin, false);
		}
		return $this->db->get();
		
	}

	function getKabByID($kodekabup){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_KABUPATEN');
		//$this->db->limit($num, $offset);
		$this->db->where('KODEKABUP', $kodekabup);
		return $this->db->get()->row();
	}
	
}
?>