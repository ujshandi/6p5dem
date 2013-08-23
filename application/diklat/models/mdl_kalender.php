<?
class mdl_kalender extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter){
		// yanto
		$level = get_level();
		
		// get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_KALENDER.*, DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_KALENDER');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_KALENDER.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		
		// yanto
		if(!empty($filter['kode_upt'])){
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		}else{
			if($level['LEVEL'] == 2){
				$this->db->where('DIKLAT_MST_UPT.KODE_INDUK', $level['KODE_UPT']);
			}else if($level['LEVEL'] == 3){
				$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $level['KODE_UPT']);
			}
		}
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_KALENDER.KEGIATAN', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();	
		
		// get count
		$this->db->flush_cache();
		$this->db->select('DIKLAT_KALENDER.*, DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_KALENDER');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_KALENDER.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		//$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		
		// yanto
		if(!empty($filter['kode_upt'])){
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		}else{
			if($level['LEVEL'] == 2){
				$this->db->where('DIKLAT_MST_UPT.KODE_INDUK', $level['KODE_UPT']);
			}else if($level['LEVEL'] == 3){
				$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $level['KODE_UPT']);
			}
		}
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_KALENDER.KEGIATAN', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_KALENDER');
		$this->db->where('IDKALENDER', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('TGL_AWAL', $data['TGL_AWAL'], false);
        $this->db->set('TGL_AKHIR', $data['TGL_AKHIR'], false);
        $this->db->set('KEGIATAN', $data['KEGIATAN']);

        $result = $this->db->insert('DIKLAT_KALENDER');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('TGL_AWAL', $data['TGL_AWAL'], false);
        $this->db->set('TGL_AKHIR', $data['TGL_AKHIR'], false);
        $this->db->set('KEGIATAN', $data['KEGIATAN']);

		$this->db->where('IDKALENDER', $data['id']);
		
		$result = $this->db->update('DIKLAT_KALENDER');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('IDKALENDER', $id);
		$result = $this->db->delete('DIKLAT_KALENDER');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getKalenderByUPT($upt){
		$this->db->flush_cache();		
		$this->db->select('DIKLAT_KALENDER.*, DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_KALENDER');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_KALENDER.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $upt);
		$this->db->order_by('DIKLAT_MST_UPT.NAMA_UPT');
		
		return $this->db->get();
		
	}
	
}
?>