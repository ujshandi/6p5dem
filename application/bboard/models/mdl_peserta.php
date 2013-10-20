<?
class mdl_peserta extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter){
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_PENDAFTARAN.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DIKLAT.NAMA_DIKLAT', false);
		$this->db->from('DIKLAT_MST_PENDAFTARAN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_PENDAFTARAN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_PENDAFTARAN.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		$this->db->limit($num, $offset);
		$this->db->order_by('IDPENDAFTAR');
		
		//filter
		if(!empty($filter['kode_upt']))
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_PENDAFTARAN.NAMA_PENDAFTAR', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();
		
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_PENDAFTARAN.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DIKLAT.NAMA_DIKLAT', false);
		$this->db->from('DIKLAT_MST_PENDAFTARAN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_PENDAFTARAN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_PENDAFTARAN.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		//$this->db->limit($num, $offset);
		$this->db->order_by('IDPENDAFTAR');
		
		//filter
		if(!empty($filter['kode_upt']))
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_PENDAFTARAN.NAMA_PENDAFTAR', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
		
	}
	
	function getDataDetail($id){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_PENDAFTARAN.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DIKLAT.NAMA_DIKLAT', false);
		$this->db->from('DIKLAT_MST_PENDAFTARAN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_PENDAFTARAN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_PENDAFTARAN.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		//$this->db->join('DIKLAT_PESERTA_PENDIDIKAN', 'DIKLAT_MST_PESERTA.IDPESERTA = DIKLAT_PESERTA_PENDIDIKAN.IDPESERTA');
		
		$this->db->where('DIKLAT_MST_PENDAFTARAN.IDPENDAFTAR', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
        $this->db->set('NAMA_PENDAFTAR', $data['NAMA_PENDAFTAR']);
        $this->db->set('TEMPAT_LAHIR', $data['TEMPAT_LAHIR']);
        $this->db->set('TGL_LAHIR', $data['TGL_LAHIR'], false);
        $this->db->set('JK', $data['JK']);
        $this->db->set('STATUS_PENDAFTAR', $data['STATUS_PENDAFTAR']);
		$this->db->set('NO_TELP', $data['NO_TELP']);
        $this->db->set('KETERANGAN', $data['KETERANGAN']);

        $result = $this->db->insert('DIKLAT_MST_PENDAFTARAN');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PENDAFTARAN');
		$this->db->where('IDPENDAFTAR', $id);
		
		return $this->db->get();
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
        $this->db->set('NAMA_PENDAFTAR', $data['NAMA_PENDAFTAR']);
        $this->db->set('TEMPAT_LAHIR', $data['TEMPAT_LAHIR']);
        $this->db->set('TGL_LAHIR', $data['TGL_LAHIR'], false);
        $this->db->set('JK', $data['JK']);
        $this->db->set('NO_TELP', $data['NO_TELP']);
        $this->db->set('STATUS_PENDAFTAR', $data['STATUS_PENDAFTAR']);
        $this->db->set('KETERANGAN', $data['KETERANGAN']);
		$this->db->where('IDPENDAFTAR', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_PENDAFTARAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('IDPENDAFTAR', $id);
		$result = $this->db->delete('DIKLAT_MST_PENDAFTARAN');
		
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
		
		$res = array('Registrasi','Drop Out', 'Lulus');
		
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
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$res = array(2000, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020);
		
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
		//$this->db->where('JENIS_DOSEN', $jenis);
		$this->db->order_by('NAMA_PESERTA');
		
		return $this->db->get();
		
	}
	
	function getPesertaRegister($upt, $diklat){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PENDAFTARAN');
		//$this->db->where('THN_ANGKATAN', $tahun);
		$this->db->where('KODE_UPT', $upt);
		$this->db->where('KODE_DIKLAT', $diklat);
		$this->db->where('STATUS_PENDAFTAR', 'Daftar');
		
		$this->db->order_by('NAMA_PENDAFTAR');
		
		return $this->db->get();
		
	}

	function UpdatePesertaRegister($data){
		$this->db->trans_start();
		
		foreach($data as $r){
			$this->db->flush_cache();
			$this->db->set('STATUS_PENDAFTAR', 'Diterima');
			
			$this->db->where('IDPENDAFTAR', $r['IDPENDAFTAR']);

			$result = $this->db->update('DIKLAT_MST_PENDAFTARAN');
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
	
	function insert_setting_pendaftaran($data){
		$this->db->flush_cache();
		$this->db->set('KODE_UPT', $data['value_upt']);
		$this->db->set('PERIODE_AWAL', $data['periode_awal'], false);
		$this->db->set('PERIODE_AKHIR', $data['periode_akhir'], false);
		$result = $this->db->insert('BB_SETTING_PENDAFTARAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	function get_setting_pendaftaran($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('BB_SETTING_PENDAFTARAN.*, DIKLAT_MST_UPT.NAMA_UPT');
		$this->db->from('BB_SETTING_PENDAFTARAN');
		$this->db->join('DIKLAT_MST_UPT', 'BB_SETTING_PENDAFTARAN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->limit($num, $offset);
		$this->db->order_by('PERIODE_AWAL');
		
		/*
		if(!empty($filter['search']))
			$this->db->like('BB_SETTING_PENDAFTARAN.NAMA_UPT', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();
		$tmp['row_count'] = $this->db->get()->num_rows(); */
		
		return $this->db->get();
	}
	
}
?>