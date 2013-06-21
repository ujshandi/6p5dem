<?
class mdl_dosen extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_DOSEN.*,DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_MST_DOSEN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_DOSEN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		
		return $this->db->get();
		
	}
	
	function getDataDetail($id){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_DOSEN.*,DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_MST_DOSEN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_DOSEN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		
		$this->db->where('DIKLAT_MST_DOSEN.IDDOSEN', $id);
		
		return $this->db->get();
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_DOSEN');
		$this->db->where('IDDOSEN', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        //$this->db->set('IDDOSEN', $data['IDDOSEN']);
        $this->db->set('NIP', $data['NIP']);
        $this->db->set('NAMADOSEN', $data['NAMADOSEN']);
		$this->db->set('TEMPAT_LAHIR', $data['TEMPAT_LAHIR']);
		$this->db->set('TGL_LAHIR', $data['TGL_LAHIR'], false);
		$this->db->set('JK', $data['JK']);
		$this->db->set('STATUS', $data['STATUS']);
		$this->db->set('TAHUN', $data['TAHUN']);
		$this->db->set('PENDIDIKAN', $data['PENDIDIKAN']);
		$this->db->set('JENIS_DOSEN', $data['JENIS_DOSEN']);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);

        $result = $this->db->insert('DIKLAT_MST_DOSEN');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        //$this->db->set('IDDOSEN', $data['IDDOSEN']);
        $this->db->set('NIP', $data['NIP']);
        $this->db->set('NAMADOSEN', $data['NAMADOSEN']);
		$this->db->set('TEMPAT_LAHIR', $data['TEMPAT_LAHIR']);
		$this->db->set('TGL_LAHIR', $data['TGL_LAHIR'], false);
		$this->db->set('JK', $data['JK']);
		$this->db->set('STATUS', $data['STATUS']);
		$this->db->set('TAHUN', $data['TAHUN']);
		$this->db->set('PENDIDIKAN', $data['PENDIDIKAN']);
		$this->db->set('JENIS_DOSEN', $data['JENIS_DOSEN']);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);

		$this->db->where('IDDOSEN', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_DOSEN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('IDDOSEN', $id);
		$result = $this->db->delete('DIKLAT_MST_DOSEN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getOptionJenkel($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$res = array('Pria','Wanita');
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res as $r){
			if($r == trim($value)){
				$out .= '<option value="'.$r.'" selected="selected">'.$r.'</option>';
			}else{
				$out .= '<option value="'.$r.'">'.$r.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getOptionStatus($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$res = array('Tetap','Tidak Tetap','Luar Biasa');
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res as $r){
			if($r == trim($value)){
				$out .= '<option value="'.$r.'" selected="selected">'.$r.'</option>';
			}else{
				$out .= '<option value="'.$r.'">'.$r.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getOptionJenis($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$res = array('Dosen','Widyaiswara','Instruktur');
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res as $r){
			if($r == trim($value)){
				$out .= '<option value="'.$r.'" selected="selected">'.$r.'</option>';
			}else{
				$out .= '<option value="'.$r.'">'.$r.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getDosenByUPT($upt, $jenis=""){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_DOSEN');
		$this->db->where('KODE_UPT', $upt);
		$this->db->where('JENIS_DOSEN', $jenis);
		$this->db->order_by('NAMADOSEN');
		
		return $this->db->get();
		
	}
	
}
?>