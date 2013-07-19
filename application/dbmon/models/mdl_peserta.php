<?
class mdl_peserta extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	public function getIndukUpt(){
		$result = array();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_INDUKUPT');
		$this->db->order_by('KODE_INDUK','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Induk UPT-';
            $result[$row->KODE_INDUK]= $row->NAMA_INDUK;
        }
 
        return $result;
	}
	
	public function getProgram(){
		if($KODE_INDUK = $this->input->post('KODE_INDUK')){
    	$result = array();
    	$this->db->select('*');
    	$this->db->from('DIKLAT_MST_PROGRAM');
    	$this->db->where('KODE_INDUK',$KODE_INDUK);
    	$this->db->order_by('KODE_PROGRAM','ASC');
    	$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        	{
            	$result[0]= '-Pilih Program-';
            	$result[$row->KODE_PROGRAM]= $row->NAMA_PROGRAM;
        	}
 		}else
		{
			{
			 $result[0]= '-Pilih Induk UPT Dahulu-';	
			}
		}
        return $result;
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
	
	public function getData2($e1,$e2,$tahun=array('2012','2013')){

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
		
		if($e1 != '0'){
			$this->db->where('DIKLAT_MST_INDUKUPT.KODE_INDUK', $e1);	
		}
		if($e2 != '0'){
			$this->db->where('DIKLAT_MST_PROGRAM.KODE_PROGRAM', $e2);	
			$this->db->where('DIKLAT_MST_PESERTA.STATUS_PESERTA', 'Registrasi');

		$this->db->group_by('DIKLAT_MST_UPT.NAMA_UPT');

		}
		
		return $this->db->get();
	}
	
}
?>