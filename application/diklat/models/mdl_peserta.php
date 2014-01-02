<?

class mdl_peserta extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter,$sort_by, $sort_order){
		// yanto
		$level = get_level();
		
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_PESERTA.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DIKLAT.NAMA_DIKLAT', false);
		$this->db->from('DIKLAT_MST_PESERTA');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_PESERTA.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_PESERTA.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		$this->db->limit($num, $offset);
		
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
		
		if(!empty($filter['kode_diklat'])){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_DIKLAT', $filter['kode_diklat']);
		}
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_PESERTA.NAMA_PESERTA', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();
		
		# get count
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_PESERTA.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DIKLAT.NAMA_DIKLAT', false);
		$this->db->from('DIKLAT_MST_PESERTA');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_PESERTA.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_PESERTA.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		//$this->db->limit($num, $offset);
		$this->db->order_by('IDPESERTA');
		
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
		
		if(!empty($filter['kode_diklat'])){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_DIKLAT', $filter['kode_diklat']);
		}
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_PESERTA.NAMA_PESERTA', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
		
	}
	
	function getDataDetail($id){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_PESERTA.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DIKLAT.NAMA_DIKLAT', false);
		$this->db->from('DIKLAT_MST_PESERTA');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_PESERTA.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_PESERTA.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		//$this->db->join('DIKLAT_PESERTA_PENDIDIKAN', 'DIKLAT_MST_PESERTA.IDPESERTA = DIKLAT_PESERTA_PENDIDIKAN.IDPESERTA');
		
		$this->db->where('DIKLAT_MST_PESERTA.IDPESERTA', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
        $this->db->set('NO_PESERTA', $data['NO_PESERTA']);
        $this->db->set('NAMA_PESERTA', $data['NAMA_PESERTA']);
        $this->db->set('DAERAH', $data['DAERAH']);
        $this->db->set('TEMPAT_LAHIR', $data['TEMPAT_LAHIR']);
        $this->db->set('TGL_LAHIR', $data['TGL_LAHIR'], false);
        $this->db->set('JK', $data['JK']);
        $this->db->set('TGL_MASUK', $data['TGL_MASUK'], false);
        $this->db->set('THN_ANGKATAN', $data['THN_ANGKATAN']);
        $this->db->set('ANGKATAN', $data['ANGKATAN']);
        $this->db->set('STATUS_PESERTA', $data['STATUS_PESERTA']);
        $this->db->set('KETERANGAN', $data['KETERANGAN']);

        $result = $this->db->insert('DIKLAT_MST_PESERTA');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PESERTA');
		$this->db->where('IDPESERTA', $id);
		
		return $this->db->get();
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
        $this->db->set('NO_PESERTA', $data['NO_PESERTA']);
        $this->db->set('NAMA_PESERTA', $data['NAMA_PESERTA']);
		$this->db->set('DAERAH', $data['DAERAH']);
        $this->db->set('TEMPAT_LAHIR', $data['TEMPAT_LAHIR']);
        $this->db->set('TGL_LAHIR', $data['TGL_LAHIR'], false);
        $this->db->set('JK', $data['JK']);
        $this->db->set('TGL_MASUK', $data['TGL_MASUK'], false);
        $this->db->set('THN_ANGKATAN', $data['THN_ANGKATAN']);
        $this->db->set('ANGKATAN', $data['ANGKATAN']);
        $this->db->set('STATUS_PESERTA', $data['STATUS_PESERTA']);
        $this->db->set('KETERANGAN', $data['KETERANGAN']);
		$this->db->where('IDPESERTA', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_PESERTA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('IDPESERTA', $id);
		$result = $this->db->delete('DIKLAT_MST_PESERTA');
		
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
		
		$res = array('Registrasi','Drop Out');
		
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
	
	function getOptionTahun($d=""){
		$value = isset($d['value'])?$d['value']:'';
		
		$res = array(2000, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020);
		
		$out = '';//'<select name="'.$name.'" id="'.$id.'">';
		foreach($res as $r){
			if($r == trim($value)){
				$out .= '<option value="'.$r.'" selected="selected">'.$r.'</option>';
			}else{
				$out .= '<option value="'.$r.'">'.$r.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionPeserta($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_PESERTA');
		$this->db->order_by('NO_PESERTA');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
			if($r->NO_PESERTA == trim($value)){
				$out .= '<option value="'.$r->NO_PESERTA.'" selected="selected">'.$r->NAMA_PESERTA.'</option>';
			}else{
				$out .= '<option value="'.$r->NO_PESERTA.'">'.$r->NAMA_PESERTA.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
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
	
	function getOptionDiklatByUPT($d){
	
		$value = isset($d['value'])?$d['value']:'';
		$KODE_UPT = isset($d['KODE_UPT'])?$d['KODE_UPT']:'';
		
		$this->db->flush_cache();
		$this->db->where('KODE_UPT', $KODE_UPT==0?'':$KODE_UPT);
		$this->db->order_by('NAMA_DIKLAT');
		$result = $this->db->get('DIKLAT_MST_DIKLAT');
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($result->result() as $r){
				if(trim($r->KODE_DIKLAT) == trim($value)){
						$out .= '<option value="'.$r->KODE_DIKLAT.'" selected="selected">'.$r->NAMA_DIKLAT.'</option>';
				}else{
						$out .= '<option value="'.$r->KODE_DIKLAT.'">'.$r->NAMA_DIKLAT.'</option>';
				}
		}
		//$out .= '</select>';
		
		return $out;
	
	}
	
	function getPesertaByUPT($upt){
		$this->db->flush_cache();
		//$this->db->select('*');
		$this->db->select('DIKLAT_MST_PESERTA.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DIKLAT.NAMA_DIKLAT', false);
		$this->db->from('DIKLAT_MST_PESERTA');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_PESERTA.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_PESERTA.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $upt);
		$this->db->where('DIKLAT_MST_PESERTA.STATUS_PESERTA', 'Registrasi');
		//$this->db->where('JENIS_DOSEN', $jenis);
		$this->db->order_by('NAMA_PESERTA');
		
		return $this->db->get();
		
	}
	
	function getPesertaRegister($upt, $diklat, $tahun){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PESERTA');
		$this->db->where('THN_ANGKATAN', $tahun);
		$this->db->where('KODE_UPT', $upt);
		$this->db->where('KODE_DIKLAT', $diklat);
		$this->db->where('STATUS_PESERTA', 'Registrasi');
		
		$this->db->order_by('NAMA_PESERTA');
		
		return $this->db->get();
		
	}
	
	function getPesertaLulus($upt, $diklat, $tahun){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PESERTA');
		$this->db->where('THN_ANGKATAN', $tahun);
		$this->db->where('KODE_UPT', $upt);
		$this->db->where('KODE_DIKLAT', $diklat);
		$this->db->where('STATUS_PESERTA', 'Lulus');
		
		$this->db->order_by('NAMA_PESERTA');
		
		return $this->db->get();
		
	}

	function UpdatePesertaRegister($data){
		$this->db->trans_start();
		
		foreach($data as $r){
			$this->db->flush_cache();
			$this->db->set('STATUS_PESERTA', 'Lulus');
			
			$this->db->where('IDPESERTA', $r['IDPESERTA']);

			$result = $this->db->update('DIKLAT_MST_PESERTA');
		}
		
		// $errNo   = $this->db->_error_number();
	    // $errMess = $this->db->_error_message();
		// $error = $errMess;
		
		//var_dump($errMess);die;
	    //log_message("error", "Problem Inserting to : ".$errMess." (".$errNo.")"); 
		
		//return
		$this->db->trans_complete();
	    return $this->db->trans_status();
	}
	
	public function importData($data){
		$this->db->trans_start();
		
		for($i=0, $c=count($data); $i<$c; $i++){
			$this->db->flush_cache();
			
			$this->db->set('NO_PESERTA', 		$data[$i]['NO_PESERTA']);
			$this->db->set('NAMA_PESERTA', 		$data[$i]['NAMA_PESERTA']);
			//$this->db->set('DAERAH', 			$data[$i]['DAERAH']);
			$this->db->set('TGL_MASUK', 		"TO_TIMESTAMP('".$data[$i]['TGL_MASUK']."', 'YYYY-MM-DD')", FALSE);
			$this->db->set('TGL_LULUS', 		"TO_TIMESTAMP('".$data[$i]['TGL_LULUS']."', 'YYYY-MM-DD')", FALSE);
			$this->db->set('THN_ANGKATAN', 		$data[$i]['THN_ANGKATAN']);
			$this->db->set('TEMPAT_LAHIR', 		$data[$i]['TEMPAT_LAHIR']);
			$this->db->set('TGL_LAHIR', 		"TO_TIMESTAMP('".$data[$i]['TGL_LAHIR']."', 'YYYY-MM-DD')", FALSE);
			$this->db->set('JK', 				$data[$i]['JK']);
			$this->db->set('STATUS_PESERTA', 	$data[$i]['STATUS_PESERTA']);
			$this->db->set('KETERANGAN', 		$data[$i]['KETERANGAN']);
			
			$this->db->set('KODE_UPT', 			$data[$i]['KODE_UPT']);
			$this->db->set('KODE_DIKLAT', 		$data[$i]['KODE_DIKLAT']);
			
			//$this->db->set('TGL_LAHIR', 		'TO_TIMESTAMP(\''.$data[$i]['TGL_LAHIR'].'\', \'YYYY-MM-DD HH24:MI:SS\')', FALSE);
			
			$this->db->insert('DIKLAT_MST_PESERTA');
		}
		
		$this->db->trans_complete();
	    return $this->db->trans_status();
	}
	
	function get_pdf($filter){
		# get data
		$this->db->flush_cache();
		$this->db->select('*', false);
		$this->db->from('DIKLAT_MST_PESERTA');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_PESERTA.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_PESERTA.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		$this->db->order_by('IDPESERTA');
		
		// yanto
		if(!empty($filter['kode_upt'])){
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		}
		if(!empty($filter['kode_diklat'])){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_DIKLAT', $filter['kode_diklat']);
		}
		
		// proses
		$result = $this->db->get();
		
		$i=0;
		foreach($result->result() as $row){
			$pdfdata[$i][0] = $i +1;
			$pdfdata[$i][1] = $row->NO_PESERTA;
			$pdfdata[$i][2] = $row->NAMA_PESERTA;
			$pdfdata[$i][3] = $row->TGL_MASUK;
			$pdfdata[$i][4] = $row->THN_ANGKATAN;
			$pdfdata[$i][5] = $row->TEMPAT_LAHIR;
			$pdfdata[$i][6] = $row->TGL_LAHIR;
			$pdfdata[$i][7] = $row->JK;
			$pdfdata[$i][8] = $row->NAMA_UPT;
			$pdfdata[$i][9] = $row->NAMA_DIKLAT;
			$i++;
		}
		
		return $pdfdata;
		
	}
	
}
?>