<?
class mdl_diklat_aparatur extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter){
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_DIKLAT.*, DIKLAT_MST_PROGRAM.NAMA_PROGRAM, DIKLAT_MST_INDUKUPT.NAMA_INDUK', false);
		$this->db->from('DIKLAT_MST_DIKLAT');
		$this->db->join('DIKLAT_MST_PROGRAM', 'DIKLAT_MST_DIKLAT.KODE_PROGRAM = DIKLAT_MST_PROGRAM.KODE_PROGRAM');
		$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_DIKLAT.KODE_INDUK = DIKLAT_MST_INDUKUPT.KODE_INDUK');
		$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		
		$this->db->where('DIKLAT_MST_DIKLAT.KODE_INDUK', '2');
		
		#filter
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_DIKLAT.NAMA_DIKLAT', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();
		
		# get count
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_DIKLAT.*, DIKLAT_MST_PROGRAM.NAMA_PROGRAM, DIKLAT_MST_INDUKUPT.NAMA_INDUK', false);
		$this->db->from('DIKLAT_MST_DIKLAT');
		$this->db->join('DIKLAT_MST_PROGRAM', 'DIKLAT_MST_DIKLAT.KODE_PROGRAM = DIKLAT_MST_PROGRAM.KODE_PROGRAM');
		$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_DIKLAT.KODE_INDUK = DIKLAT_MST_INDUKUPT.KODE_INDUK');
		//$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		
		$this->db->where('DIKLAT_MST_DIKLAT.KODE_INDUK', '2');
		
		if(!empty($filter['kode_induk']))
			$this->db->where('DIKLAT_MST_INDUKUPT.KODE_INDUK', $filter['kode_induk']);
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_DIKLAT.NAMA_DIKLAT', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_DIKLAT');
		$this->db->where('KODE_DIKLAT', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
        $this->db->set('NAMA_DIKLAT', $data['NAMA_DIKLAT']);
        $this->db->set('KODE_PROGRAM', $data['KODE_PROGRAM']);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);

        $result = $this->db->insert('DIKLAT_MST_DIKLAT');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
        $this->db->set('NAMA_DIKLAT', $data['NAMA_DIKLAT']);
        $this->db->set('KODE_PROGRAM', $data['KODE_PROGRAM']);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);

		$this->db->where('KODE_DIKLAT', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_DIKLAT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('KODE_DIKLAT', $id);
		$result = $this->db->delete('DIKLAT_MST_DIKLAT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	// function getOptionDiklat($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		// $value = isset($d['value'])?$d['value']:'';
		
		// $this->db->flush_cache();
		// $this->db->from('DIKLAT_MST_DIKLAT');
		// $this->db->order_by('KODE_DIKLAT');
		
		// $res = $this->db->get();
		
		// $out = '<select name="'.$name.'" id="'.$id.'">';
		// foreach($res->result() as $r){
			// if($r->KODE_DIKLAT == trim($value)){
				// $out .= '<option value="'.$r->KODE_DIKLAT.'" selected="selected">'.$r->NAMA_DIKLAT.'</option>';
			// }else{
				// $out .= '<option value="'.$r->KODE_DIKLAT.'">'.$r->NAMA_DIKLAT.'</option>';
			// }
		// }
		// $out .= '</select>';
		
		// return $out;
	// }
	
}
?>