<?
class mdl_upt extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData(){
		$subSql = "(SELECT count(*) FROM DIKLAT_MST_PESERTA WHERE KODE_UPT = DIKLAT_MST_UPT.KODE_UPT AND STATUS_PESERTA = 'Lulus')";

		$this->db->flush_cache();
		$this->db->select("DIKLAT_MST_UPT.*,  ".$subSql." as JUMLAH_ALUMNI");
		$this->db->from('DIKLAT_MST_UPT');
		//$this->db->limit($num, $offset);
		$this->db->order_by('KODE_UPT');

		return $this->db->get();
	}

	function getUptByID($kode_upt){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_UPT');
		//$this->db->limit($num, $offset);
		$this->db->where('KODE_UPT', $kode_upt);
		
		return $this->db->get()->row();
	}
	
}
?>