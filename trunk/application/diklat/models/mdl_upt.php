<?
class mdl_upt extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_UPT.*, DIKLAT_MST_INDUKUPT..NAMA_INDUK', false);
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_UPT.KODE_INDUK = DIKLAT_MST_INDUKUPT.KODE_INDUK');
		$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_UPT');
		//$this->db->where('TRIM(KODE_UPT)', $id);
		$this->db->where('KODE_UPT', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        //$this->db->set('KODE_ASAL', $data['KODE_ASAL']);
        $this->db->set('NAMA_UPT', $data['NAMA_UPT']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);
        $this->db->set('URUTAN', $data['URUTAN']);

		$result = $this->db->insert('DIKLAT_MST_UPT');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        //$this->db->set('KODE_ASAL', $data['KODE_ASAL']);
        $this->db->set('NAMA_UPT', $data['NAMA_UPT']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);
        $this->db->set('URUTAN', $data['URUTAN']);

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
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if(trim($r->KODE_UPT) == trim($value)){
				$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getOptionUPTDarat($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		$this->db->where('KODE_INDUK', '3');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if(trim($r->KODE_UPT) == trim($value)){
				$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getOptionUPTLaut($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		$this->db->where('KODE_INDUK', '4');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if(trim($r->KODE_UPT) == trim($value)){
				$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getOptionUPTUdara($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		$this->db->where('KODE_INDUK', '5');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if(trim($r->KODE_UPT) == trim($value)){
				$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getOptionUPTAparatur($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		$this->db->where('KODE_INDUK', '2');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if(trim($r->KODE_UPT) == trim($value)){
				$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getOptionUPTSekretariat($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		$this->db->where('KODE_INDUK', '1');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if(trim($r->KODE_UPT) == trim($value)){
				$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
}
?>