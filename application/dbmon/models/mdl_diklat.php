<?
class mdl_diklat extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($kode_upt=0){
		$subSql = "(SELECT count(*) FROM DIKLAT_MST_PESERTA WHERE KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT AND STATUS_PESERTA='Lulus')";

		$this->db->flush_cache();
		$this->db->select("DIKLAT_MST_DIKLAT.*, ".$subSql." as JUMLAH_ALUMNI");
		$this->db->from('DIKLAT_MST_DIKLAT');
		//$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		if($kode_upt!=0){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_UPT',$kode_upt);
		}
		return $this->db->get();
		
	}

	function getDiklatByID($kode_diklat){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_DIKLAT');
		//$this->db->limit($num, $offset);
		$this->db->where('KODE_DIKLAT', $kode_diklat);
		return $this->db->get()->row();
	}
	
}
?>