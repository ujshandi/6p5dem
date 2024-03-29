<?
class mdl_penyuluhan extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter,$sort_by, $sort_order){
		// yanto
		$level = get_level();
		
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_PENYULUHAN.*, DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_PENYULUHAN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_PENYULUHAN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->limit($num, $offset);
		//$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		
		##sorting
		$this->db->order_by($sort_by, $sort_order);
		##
		
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
			$this->db->like('DIKLAT_PENYULUHAN.NAMA_PENYULUHAN', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();
		
		# get count
		$this->db->flush_cache();
		$this->db->select('DIKLAT_PENYULUHAN.*, DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_PENYULUHAN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_PENYULUHAN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
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
			$this->db->like('DIKLAT_PENYULUHAN.NAMA_PENYULUHAN', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_PENYULUHAN');
		$this->db->where('IDDATA', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        //$this->db->set('IDDATA', $data['IDDATA']);
        $this->db->set('NAMA_PENYULUHAN', $data['NAMA_PENYULUHAN']);
        $this->db->set('JML_PESERTA', $data['JML_PESERTA']);
		$this->db->set('TEMPAT', $data['TEMPAT']);
		$this->db->set('TANGGAL', $data['TANGGAL'], false);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);

        $result = $this->db->insert('DIKLAT_PENYULUHAN');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        //$this->db->set('IDDATA', $data['IDDATA']);
        $this->db->set('NAMA_PENYULUHAN', $data['NAMA_PENYULUHAN']);
        $this->db->set('JML_PESERTA', $data['JML_PESERTA']);
		$this->db->set('TEMPAT', $data['TEMPAT']);
		$this->db->set('TANGGAL', $data['TANGGAL'], false);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);

		$this->db->where('IDDATA', $data['id']);
		
		$result = $this->db->update('DIKLAT_PENYULUHAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('IDDATA', $id);
		$result = $this->db->delete('DIKLAT_PENYULUHAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	Function getPenyuluhanByUPT($upt){
		$this->db->flush_cache();		
		$this->db->select('DIKLAT_PENYULUHAN.*, DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_PENYULUHAN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_PENYULUHAN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $upt);
		$this->db->order_by('DIKLAT_MST_UPT.NAMA_UPT');
		
		return $this->db->get();
		
	}
	
}
?>