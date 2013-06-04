<?
class mdl_provinsi extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('SDM_PROVINSI.*, (SELECT count(*) FROM SDM_PEG_DINAS WHERE KODEPROVIN = SDM_PROVINSI.KODEPROVIN) as JUMLAH_SDM');
		$this->db->from('SDM_PROVINSI');
		//$this->db->limit($num, $offset);
		$this->db->order_by('KODEPROVIN');
		
		return $this->db->get();
		
	}

	function getProvByID($kodeprovin){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PROVINSI');
		//$this->db->limit($num, $offset);
		$this->db->where('KODEPROVIN', $kodeprovin);
		return $this->db->get()->row();
		
	}
	
}
?>