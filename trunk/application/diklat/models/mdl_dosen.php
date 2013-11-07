<?
class mdl_dosen extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter){
		// yanto
		$level = get_level();
		
		#get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_DOSEN.*,DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_MST_DOSEN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_DOSEN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
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
			$this->db->like('DIKLAT_MST_DOSEN.NAMADOSEN', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();
		
		#get count
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_DOSEN.*,DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_MST_DOSEN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_DOSEN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
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
			$this->db->like('DIKLAT_MST_DOSEN.NAMADOSEN', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
		
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
		$this->db->set('FOTO_DOSEN', $data['FOTO_DOSEN']);
		$this->db->set('TEMPAT_LAHIR', $data['TEMPAT_LAHIR']);
		$this->db->set('TGL_LAHIR', $data['TGL_LAHIR'], false);
		$this->db->set('JK', $data['JK']);
		$this->db->set('STATUS', $data['STATUS']);
		$this->db->set('TAHUN', $data['TAHUN']);
		$this->db->set('PENDIDIKAN', $data['PENDIDIKAN']);
		//$this->db->set('JURUSAN', $data['JURUSAN']);
		//$this->db->set('KELOMPOK_MATKUL', $data['KELOMPOK_MATKUL']);
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
		$this->db->set('FOTO_DOSEN', $data['FOTO_DOSEN']);
		$this->db->set('TEMPAT_LAHIR', $data['TEMPAT_LAHIR']);
		$this->db->set('TGL_LAHIR', $data['TGL_LAHIR'], false);
		$this->db->set('JK', $data['JK']);
		$this->db->set('STATUS', $data['STATUS']);
		$this->db->set('TAHUN', $data['TAHUN']);
		$this->db->set('PENDIDIKAN', $data['PENDIDIKAN']);		
		//$this->db->set('JURUSAN', $data['JURUSAN']);
		//$this->db->set('KELOMPOK_MATKUL', $data['KELOMPOK_MATKUL']);
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
	
	public function importData($data){
		$this->db->trans_start();
		
		for($i=0, $c=count($data); $i<$c; $i++){
			$this->db->flush_cache();
			
			$this->db->set('NIP', 				$data[$i]['NIP']);
			$this->db->set('NAMADOSEN', 		$data[$i]['NAMADOSEN']);
			$this->db->set('TEMPAT_LAHIR', 		$data[$i]['TEMPAT_LAHIR']);
			//$this->db->set('TGL_LAHIR', 		"TO_TIMESTAMP('".$data[$i]['TGL_LAHIR']."', 'YYYY-MM-DD')", FALSE);
			$this->db->set('TGL_LAHIR', 		$data[$i]['TGL_LAHIR']);
			$this->db->set('JK', 				$data[$i]['JK']);
			$this->db->set('STATUS', 			$data[$i]['STATUS']);
			$this->db->set('TAHUN', 			$data[$i]['TAHUN']);
			$this->db->set('PENDIDIKAN', 		$data[$i]['PENDIDIKAN']);
			//$this->db->set('JURUSAN', 			$data[$i]['JURUSAN']);
			//$this->db->set('KELOMPOK_MATKUL', 	$data[$i]['KELOMPOK_MATKUL']);
			$this->db->set('JENIS_DOSEN', 		$data[$i]['JENIS_DOSEN']);
			$this->db->set('KODE_UPT', 			$data[$i]['KODE_UPT']);
			
			//$this->db->set('TGL_LAHIR', 		'TO_TIMESTAMP(\''.$data[$i]['TGL_LAHIR'].'\', \'YYYY-MM-DD HH24:MI:SS\')', FALSE);
			
			$this->db->insert('DIKLAT_MST_DOSEN');
		}
		
		$this->db->trans_complete();
	    return $this->db->trans_status();
	}
	
	function get_pdf($filter){
		#get data
		$this->db->flush_cache();
		$this->db->select('*', false);
		$this->db->from('DIKLAT_MST_DOSEN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_DOSEN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		
		// yanto
		if(!empty($filter['kode_upt'])){
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		}
		
		// proses
		$result = $this->db->get();
		
		$i=0;
		foreach($result->result() as $row){
			$pdfdata[$i][0] = $i +1;
			$pdfdata[$i][1] = $row->NIP;
			$pdfdata[$i][2] = $row->NAMADOSEN;
			$pdfdata[$i][3] = $row->TEMPAT_LAHIR;
			$pdfdata[$i][4] = $row->TGL_LAHIR;
			$pdfdata[$i][5] = $row->JK;
			$pdfdata[$i][6] = $row->STATUS;
			$pdfdata[$i][7] = ReadCLOB($row->PENDIDIKAN);
			$pdfdata[$i][8] = $row->JENIS_DOSEN;
			$pdfdata[$i][9] = $row->NAMA_UPT;
			$i++;
		}
		
		return $pdfdata;
		
	}
	
}
?>