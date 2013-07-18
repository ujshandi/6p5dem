<?
class mdl_peserta extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($kode_induk='', $kode_prog='',$tahun=array('2012','2013')){
		$sql = "DIKLAT_MST_UPT.NAMA_UPT AS \"NAMA_UPT\"";
		foreach ($tahun as $y) {
			$sql .= ", Count(CASE WHEN DIKLAT_MST_PESERTA.THN_ANGKATAN = '{$y}' THEN 1 END) AS \"{$y}\"";
		}
		$this->db->select($sql,false);
		$this->db->from('DIKLAT_MST_DIKLAT',false);
		$this->db->join('DIKLAT_MST_PESERTA', 'DIKLAT_MST_DIKLAT.KODE_DIKLAT = DIKLAT_MST_PESERTA.KODE_DIKLAT', 'inner'); 
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_UPT.KODE_UPT = DIKLAT_MST_DIKLAT.KODE_UPT', 'inner'); 
		$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_INDUKUPT.KODE_INDUK = DIKLAT_MST_DIKLAT.KODE_INDUK', 'inner'); 
		$this->db->join('DIKLAT_MST_PROGRAM', 'DIKLAT_MST_PROGRAM.KODE_PROGRAM = DIKLAT_MST_DIKLAT.KODE_PROGRAM', 'inner');

		if($kode_induk!='') $this->db->where('DIKLAT_MST_INDUKUPT.KODE_INDUK', $kode_induk,false);
		if($kode_prog!='') $this->db->where('DIKLAT_MST_PROGRAM.KODE_PROGRAM', $kode_prog);
		$this->db->where('DIKLAT_MST_PESERTA.STATUS_PESERTA', 'Registrasi');

		$this->db->group_by('DIKLAT_MST_UPT.NAMA_UPT');

		$this->db->flush_cache();
		//$this->db->limit($num, $offset);
		
		return $this->db->get();
	}
	
}
?>