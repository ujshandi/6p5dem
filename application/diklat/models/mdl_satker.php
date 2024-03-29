<?
class mdl_satker extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter){
		// get data
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_INDUKUPT');
		$this->db->limit($num, $offset);
		$this->db->order_by('KODE_INDUK');
		
		if(!empty($filter['search'])){
			$this->db->like('NAMA_INDUK', $filter['search']);
		}
		
		$tmp['row_data'] = $this->db->get();
		
		//get count
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_INDUKUPT');
		//$this->db->limit($num, $offset);
		$this->db->order_by('KODE_INDUK');
		
		if(!empty($filter['search'])){
			$this->db->like('NAMA_INDUK', $filter['search']);
		}
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_INDUKUPT');
		$this->db->where('KODE_INDUK', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		//$this->db->set('KODE_INDUK', $data['kode_induk']);
		$this->db->set('NAMA_INDUK', $data['nama_induk']);
		$result = $this->db->insert('DIKLAT_MST_INDUKUPT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		//$this->db->set('KODE_INDUK', $data['kode_induk']);
		$this->db->set('NAMA_INDUK', $data['nama_induk']);
		$this->db->where('KODE_INDUK', $data['id']);
		$result = $this->db->update('DIKLAT_MST_INDUKUPT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('KODE_INDUK', $data['id']);
		$result = $this->db->delete('DIKLAT_MST_INDUKUPT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getOptionSatker($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_INDUKUPT');
		$this->db->order_by('KODE_INDUK');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="">--- Semua ---</option>';
		foreach($res->result() as $r){
			if($r->KODE_INDUK == trim($value)){
				$out .= '<option value="'.$r->KODE_INDUK.'" selected="selected">'.$r->NAMA_INDUK.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_INDUK.'">'.$r->NAMA_INDUK.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionUPTChild($d=""){
		
		// yanto
		$level = get_level();
		
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		
		//yanto
		$out = '';
		if($level['LEVEL'] == 2){ // induk upt
			$this->db->where('KODE_INDUK', $level['KODE_UPT']);
		}else if($level['LEVEL'] == 3){ // upt
			$this->db->where('KODE_UPT', $level['KODE_UPT']);
		}
		
		$res = $this->db->get();
		
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
				if(trim($r->KODE_UPT) == trim($value)){
						$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
				}else{
						$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
				}
		}
		
		return $out;
	}

	
	function getUPTById($id){
		// query ke program
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->where('KODE_UPT', $id);
		
		return $this->db->get();
	}
	
	function getSatker(){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_INDUKUPT.*', false);
		$this->db->from('DIKLAT_MST_INDUKUPT');
		//$this->db->where('KODE_INDUK');
		$this->db->order_by('NAMA_INDUK');
		
		return $this->db->get();
		
	}
	
}
?>