<?
class mdl_program extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getOptionProgram($d=""){
		
		$kode_induk 	= isset($d['kode_induk'])?$d['kode_induk']:'';
		$value 			= isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->order_by('KODE_PROGRAM');
		
		if($kode_induk != '')
			$this->db->where('KODE_INDUK', $kode_induk);
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="">--- Pilih ---</option>';
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
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->order_by('KODE_PROGRAM');
		$this->db->where('KODE_INDUK', '3');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if(trim($r->KODE_PROGRAM) == trim($value)){
				$out .= '<option value="'.$r->KODE_PROGRAM.'" selected="selected">'.$r->NAMA_PROGRAM.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_PROGRAM.'">'.$r->NAMA_PROGRAM.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getOptionProgramLaut($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->order_by('KODE_PROGRAM');
		$this->db->where('KODE_INDUK', '4');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if(trim($r->KODE_PROGRAM) == trim($value)){
				$out .= '<option value="'.$r->KODE_PROGRAM.'" selected="selected">'.$r->NAMA_PROGRAM.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_PROGRAM.'">'.$r->NAMA_PROGRAM.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getOptionProgramUdara($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->order_by('KODE_PROGRAM');
		$this->db->where('KODE_INDUK', '5');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if(trim($r->KODE_PROGRAM) == trim($value)){
				$out .= '<option value="'.$r->KODE_PROGRAM.'" selected="selected">'.$r->NAMA_PROGRAM.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_PROGRAM.'">'.$r->NAMA_PROGRAM.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getOptionProgramAparatur($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->order_by('KODE_PROGRAM');
		$this->db->where('KODE_INDUK', '2');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if(trim($r->KODE_PROGRAM) == trim($value)){
				$out .= '<option value="'.$r->KODE_PROGRAM.'" selected="selected">'.$r->NAMA_PROGRAM.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_PROGRAM.'">'.$r->NAMA_PROGRAM.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getOptionProgramSekretariat($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->order_by('KODE_PROGRAM');
		$this->db->where('KODE_INDUK', '1');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if(trim($r->KODE_PROGRAM) == trim($value)){
				$out .= '<option value="'.$r->KODE_PROGRAM.'" selected="selected">'.$r->NAMA_PROGRAM.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_PROGRAM.'">'.$r->NAMA_PROGRAM.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
}
?>