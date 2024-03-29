<?
class mdl_penelitian extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter,$sort_by, $sort_order){
		// yanto
		$level = get_level();
		
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_PENELITIAN.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DOSEN.NAMADOSEN', false);
		$this->db->from('DIKLAT_PENELITIAN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_PENELITIAN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DOSEN', 'DIKLAT_PENELITIAN.IDDOSEN_1 = DIKLAT_MST_DOSEN.IDDOSEN');
		$this->db->limit($num, $offset);
		//$this->db->order_by('DIKLAT_PENELITIAN.ID_PENELITIAN');
		
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
			$this->db->like('DIKLAT_PENELITIAN.JUDUL_PENELITIAN', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();

		# get count
		$this->db->flush_cache();
		$this->db->select('DIKLAT_PENELITIAN.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DOSEN.NAMADOSEN', false);
		$this->db->from('DIKLAT_PENELITIAN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_PENELITIAN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DOSEN', 'DIKLAT_PENELITIAN.IDDOSEN_1 = DIKLAT_MST_DOSEN.IDDOSEN');
		//$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_PENELITIAN.ID_PENELITIAN');
		
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
			$this->db->like('DIKLAT_PENELITIAN.JUDUL_PENELITIAN', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
	}
	
	function getDataDetail($id){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_PENELITIAN.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DOSEN.NAMADOSEN', false);
		$this->db->from('DIKLAT_PENELITIAN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_PENELITIAN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DOSEN', 'DIKLAT_PENELITIAN.IDDOSEN_1 = DIKLAT_MST_DOSEN.IDDOSEN');
		
		$this->db->where('DIKLAT_PENELITIAN.ID_PENELITIAN', $id);
		
		return $this->db->get();
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_PENELITIAN');
		$this->db->where('ID_PENELITIAN', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('JUDUL_PENELITIAN', $data['JUDUL_PENELITIAN']);
        $this->db->set('ABSTRAK', $data['ABSTRAK']);
        $this->db->set('TGL_PUBLIKASI', $data['TGL_PUBLIKASI'], false);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('IDDOSEN_1', $data['IDDOSEN_1']);
        $this->db->set('IDDOSEN_2', $data['IDDOSEN_2']);
        $this->db->set('IDDOSEN_3', $data['IDDOSEN_3']);
        $this->db->set('IDDOSEN_4', $data['IDDOSEN_4']);

        $result = $this->db->insert('DIKLAT_PENELITIAN');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('JUDUL_PENELITIAN', $data['JUDUL_PENELITIAN']);
        $this->db->set('ABSTRAK', $data['ABSTRAK']);
        $this->db->set('TGL_PUBLIKASI', $data['TGL_PUBLIKASI'], false);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('IDDOSEN_1', $data['IDDOSEN_1']);
        $this->db->set('IDDOSEN_2', $data['IDDOSEN_2']);
        $this->db->set('IDDOSEN_3', $data['IDDOSEN_3']);
        $this->db->set('IDDOSEN_4', $data['IDDOSEN_4']);

		$this->db->where('ID_PENELITIAN', $data['ID_PENELITIAN']);
		
		$result = $this->db->update('DIKLAT_PENELITIAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('ID_PENELITIAN', $id);
		$result = $this->db->delete('DIKLAT_PENELITIAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getUPT(){
		$result = $this->db->get('DIKLAT_MST_UPT');
		if ($result->num_rows() > 0){
			return $result->result_array();
		}
		else{
			return array();
		}
	}
	
	function getOptionDosentByUPT($d){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		$KODE_UPT = isset($d['KODE_UPT'])?$d['KODE_UPT']:'';
		
		$this->db->flush_cache();
		$this->db->where('KODE_UPT', $KODE_UPT);
		$result = $this->db->get('DIKLAT_MST_DOSEN');
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($result->result() as $r){
				if(trim($r->IDDOSEN) == trim($value)){
						$out .= '<option value="'.$r->IDDOSEN.'" selected="selected">'.$r->NAMADOSEN.'</option>';
				}else{
						$out .= '<option value="'.$r->IDDOSEN.'">'.$r->NAMADOSEN.'</option>';
				}
		}
		//$out .= '</select>';
		
		return $out;	
	}
	
	Function getPenelitianByUPT($upt){
		$this->db->flush_cache();		
		$this->db->select('DIKLAT_PENELITIAN.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DOSEN.NAMADOSEN', false);
		$this->db->from('DIKLAT_PENELITIAN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_PENELITIAN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DOSEN', 'DIKLAT_PENELITIAN.IDDOSEN_1 = DIKLAT_MST_DOSEN.IDDOSEN');
		$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $upt);
		$this->db->order_by('DIKLAT_MST_UPT.NAMA_UPT');
		
		return $this->db->get();
		
	}
	
}
?>