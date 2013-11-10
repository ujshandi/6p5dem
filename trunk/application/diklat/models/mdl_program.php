<?
class mdl_program extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter,$sort_by, $sort_order){
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_PROGRAM.*, DIKLAT_MST_INDUKUPT.NAMA_INDUK', false);
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_PROGRAM.KODE_INDUK = DIKLAT_MST_INDUKUPT.KODE_INDUK');
		$this->db->limit($num, $offset);
		##sorting
		$this->db->order_by($sort_by, $sort_order);
		##
		
		//filter
		if(!empty($filter['kode_induk']))
			$this->db->where('DIKLAT_MST_INDUKUPT.KODE_INDUK', $filter['kode_induk']);
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_PROGRAM.NAMA_PROGRAM', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();
		
		# get count
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_PROGRAM.*, DIKLAT_MST_INDUKUPT.NAMA_INDUK', false);
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_PROGRAM.KODE_INDUK = DIKLAT_MST_INDUKUPT.KODE_INDUK');
		//$this->db->limit($num, $offset);
		$this->db->order_by('KODE_PROGRAM');
		
		//filter
		if(!empty($filter['kode_induk']))
			$this->db->where('DIKLAT_MST_INDUKUPT.KODE_INDUK', $filter['kode_induk']);
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_PROGRAM.NAMA_PROGRAM', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
	}
	
	function getDiklatbyId($id){
		$this->db->flush_cache();
		$this->db->select('a.*, b.*, a.KODE_DIKLAT as KODE_DIKLAT2');
		$this->db->from('DIKLAT_MST_DIKLAT "a"');
		$this->db->join('DIKLAT_DETAIL_DIKLAT "b"', 'b.KODE_DIKLAT = a.KODE_DIKLAT', 'LEFT');
		$this->db->where('a.KODE_DIKLAT', $id);
		
		return $this->db->get();
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->where('KODE_PROGRAM', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('KODE_PROGRAM', $data['KODE_PROGRAM']);
        $this->db->set('NAMA_PROGRAM', $data['NAMA_PROGRAM']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);

        $result = $this->db->insert('DIKLAT_MST_PROGRAM');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_PROGRAM', $data['KODE_PROGRAM']);
        $this->db->set('NAMA_PROGRAM', $data['NAMA_PROGRAM']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);

		$this->db->where('KODE_PROGRAM', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_PROGRAM');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('KODE_PROGRAM', $id);
		$result = $this->db->delete('DIKLAT_MST_PROGRAM');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getOptionProgram($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->order_by('KODE_PROGRAM');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if(trim($r->KODE_PROGRAM) == trim($value)){
				$out .= '<option value="'.$r->KODE_PROGRAM.'" selected="selected">'.$r->NAMA_PROGRAM.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_PROGRAM.'">'.$r->NAMA_PROGRAM.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionProgramDarat($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->order_by('KODE_PROGRAM');
		$this->db->where('KODE_INDUK', '3');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
			if(trim($r->KODE_PROGRAM) == trim($value)){
				$out .= '<option value="'.$r->KODE_PROGRAM.'" selected="selected">'.$r->NAMA_PROGRAM.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_PROGRAM.'">'.$r->NAMA_PROGRAM.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionProgramLaut($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->order_by('KODE_PROGRAM');
		$this->db->where('KODE_INDUK', '4');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
			if(trim($r->KODE_PROGRAM) == trim($value)){
				$out .= '<option value="'.$r->KODE_PROGRAM.'" selected="selected">'.$r->NAMA_PROGRAM.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_PROGRAM.'">'.$r->NAMA_PROGRAM.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionProgramUdara($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->order_by('KODE_PROGRAM');
		$this->db->where('KODE_INDUK', '5');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
			if(trim($r->KODE_PROGRAM) == trim($value)){
				$out .= '<option value="'.$r->KODE_PROGRAM.'" selected="selected">'.$r->NAMA_PROGRAM.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_PROGRAM.'">'.$r->NAMA_PROGRAM.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionProgramAparatur($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->order_by('KODE_PROGRAM');
		$this->db->where('KODE_INDUK', '2');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
			if(trim($r->KODE_PROGRAM) == trim($value)){
				$out .= '<option value="'.$r->KODE_PROGRAM.'" selected="selected">'.$r->NAMA_PROGRAM.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_PROGRAM.'">'.$r->NAMA_PROGRAM.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionProgramSekretariat($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->order_by('KODE_PROGRAM');
		$this->db->where('KODE_INDUK', '1');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
			if(trim($r->KODE_PROGRAM) == trim($value)){
				$out .= '<option value="'.$r->KODE_PROGRAM.'" selected="selected">'.$r->NAMA_PROGRAM.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_PROGRAM.'">'.$r->NAMA_PROGRAM.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getProgramBySATKER($satker){
		$this->db->flush_cache();
		$this->db->select('a.*, b.NAMA_INDUK');
		$this->db->from('DIKLAT_MST_PROGRAM "a"');
		$this->db->join('DIKLAT_MST_INDUKUPT "b"', 'b.KODE_INDUK = a.KODE_INDUK');
		$this->db->where('"a".KODE_INDUK', $satker);
		//$this->db->order_by('DIKLAT_MST_INDUKUPT.NAMA_INDUK');
		
		return $this->db->get();
		
	}
	
}
?>