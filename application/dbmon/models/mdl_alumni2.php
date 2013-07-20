<?
class mdl_alumni extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getDataByUpt($num=0, $offset=0, $upt=''){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PESERTA');
		//$this->db->limit($num, $offset);
		$this->db->order_by('IDPESERTA');
		$this->db->where('KODE_UPT', $upt);
		$this->db->where('STATUS_PESERTA = "Lulus"');
		
		return $this->db->get();
	}
	
	function getDataByDiklat($num=0, $offset=0, $diklat=''){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PESERTA');
		//$this->db->limit($num, $offset);
		$this->db->order_by('IDPESERTA');
		$this->db->where('KODE_DIKLAT', $diklat);
		$this->db->where('STATUS_PESERTA = "Lulus"');
		
		return $this->db->get();
		
	}
	
}
?>