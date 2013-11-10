<?
class mdl_upt extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter,$sort_by, $sort_order){
		// get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_UPT.*, DIKLAT_MST_INDUKUPT.NAMA_INDUK', false);
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_UPT.KODE_INDUK = DIKLAT_MST_INDUKUPT.KODE_INDUK');
		$this->db->limit($num, $offset);
		//$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		##sorting
		$this->db->order_by($sort_by, $sort_order);
		##
		
		if(!empty($filter['kode_induk']))
			$this->db->where('DIKLAT_MST_INDUKUPT.KODE_INDUK', $filter['kode_induk']);
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_UPT.NAMA_UPT', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();		
		
		// get count
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_UPT.*, DIKLAT_MST_INDUKUPT.NAMA_INDUK', false);
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_UPT.KODE_INDUK = DIKLAT_MST_INDUKUPT.KODE_INDUK');
		//$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		
		if(!empty($filter['kode_induk']))
			$this->db->where('DIKLAT_MST_INDUKUPT.KODE_INDUK', $filter['kode_induk']);
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_UPT.NAMA_UPT', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->where('KODE_UPT', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('KODE_INDUK', $data['KODE_INDUK']);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('NAMA_UPT', $data['NAMA_UPT']);
        //$this->db->set('URUTAN', $data['URUTAN']);

		$result = $this->db->insert('DIKLAT_MST_UPT');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('KODE_INDUK', $data['KODE_INDUK']);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);        
		$this->db->set('NAMA_UPT', $data['NAMA_UPT']);
        //$this->db->set('URUTAN', $data['URUTAN']);

		$this->db->where('KODE_UPT', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_UPT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('KODE_UPT', $id);
		$result = $this->db->delete('DIKLAT_MST_UPT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getOptionUPT($d=""){
		// yanto
		$level = get_level();
		
		$value = isset($d['value'])?$d['value']:'';
		$KODE_INDUKUPT = isset($d['KODE_INDUKUPT'])?$d['KODE_INDUKUPT']:'';
		
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
		
		if($KODE_INDUKUPT != ''){
			$this->db->where('KODE_INDUK', $KODE_INDUKUPT);
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
	
	function getOptionUPTDarat($d=""){
		//$name = isset($d['name'])?$d['name']:'';
		//$id = isset($d['id'])?$d['id']:'';
		//$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		$this->db->where('KODE_INDUK', '3');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
			if(trim($r->KODE_UPT) == trim($value)){
				$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionUPTLaut($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		$this->db->where('KODE_INDUK', '4');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
			if(trim($r->KODE_UPT) == trim($value)){
				$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionUPTUdara($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		$this->db->where('KODE_INDUK', '5');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
			if(trim($r->KODE_UPT) == trim($value)){
				$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionUPTAparatur($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		$this->db->where('KODE_INDUK', '2');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
			if(trim($r->KODE_UPT) == trim($value)){
				$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionUPTSekretariat($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		$this->db->where('KODE_INDUK', '1');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
			if(trim($r->KODE_UPT) == trim($value)){
				$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getUptBySATKER($satker){
		$this->db->flush_cache();
		$this->db->select('');
		$this->db->from('DIKLAT_MST_UPT "a"');
		$this->db->join('DIKLAT_MST_INDUKUPT "b"', 'b.KODE_INDUK = a.KODE_INDUK');
		$this->db->where('"a".KODE_INDUK', $satker);
		//$this->db->order_by('DIKLAT_MST_INDUKUPT.NAMA_INDUK');
		
		return $this->db->get();
		
	}
	
	function getUPTNameByKode($kode_upt=""){
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		$this->db->where('KODE_UPT', $kode_upt);
		
		$res = $this->db->get()->row();
		
		return $res->NAMA_UPT;
	}
}
?>