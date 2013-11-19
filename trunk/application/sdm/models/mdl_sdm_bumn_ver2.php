<?php
class Mdl_Sdm_Bumn_ver2 extends CI_Model{
		
	public function __construct(){
		parent::__construct();
	}
	
	// tes tes
	
	function getDataTes($num=0, $offset=0, $filter){
		// yanto
		//$level = get_level();
		
		# get data
		$this->db->flush_cache();
		//$this->db->select('*');
		$this->db->select('SDM_PEG_BUMN_VER2.ID_PEG_BUMN,SDM_PEG_BUMN_VER2.TAHUN,SDM_PEG_BUMN_VER2.JUMLAHSDM,SDM_PEG_BUMN_VER2.PEND_TRANSPORTASI,MATRA.NAMAMATRA,SDM_BUMN.NAMA_BUMN');
		$this->db->from('SDM_PEG_BUMN_VER2');
		$this->db->join('MATRA', 'MATRA.KODEMATRA = SDM_PEG_BUMN_VER2.KODEMATRA');
		$this->db->join('SDM_BUMN', 'SDM_BUMN.KODEBUMN = SDM_PEG_BUMN_VER2.KODEBUMN');
		//$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_DINAS.ID_JABATAN');
		$this->db->limit($num, $offset);
		//$this->db->order_by('KODEPROVIN');
		// yanto
		if(!empty($filter['kodematra'])){
			$this->db->where('KODEMATRA', $filter['kodematra']);
		}
		
		if(!empty($filter['kodebumn'])){
			$this->db->where('KODEBUMN', $filter['kodebumn']);
		}
		
		/*if(!empty($filter['search']))
			$this->db->like('NAMA', $filter['search']);*/
		
		$tmp['row_data'] = $this->db->get();
		
		#get count
		$this->db->flush_cache();
		$this->db->select('SDM_PEG_BUMN_VER2.ID_PEG_BUMN,SDM_PEG_BUMN_VER2.TAHUN,SDM_PEG_BUMN_VER2.JUMLAHSDM,SDM_PEG_BUMN_VER2.PEND_TRANSPORTASI,MATRA.NAMAMATRA,SDM_BUMN.NAMA_BUMN');
		$this->db->from('SDM_PEG_BUMN_VER2');
		$this->db->join('MATRA', 'MATRA.KODEMATRA = SDM_PEG_BUMN_VER2.KODEMATRA');
		$this->db->join('SDM_BUMN', 'SDM_BUMN.KODEBUMN = SDM_PEG_BUMN_VER2.KODEBUMN');
		//$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEG_DINAS.ID_GOLONGAN');
		//$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_DINAS.ID_JABATAN');
		//$this->db->limit($num, $offset);
		//$this->db->order_by('KODEPROVIN');
		
		// yanto
		if(!empty($filter['kodematra'])){
			$this->db->where('KODEMATRA', $filter['kodematra']);
		}
		
		if(!empty($filter['kodebumn'])){
			$this->db->where('KODEBUMN', $filter['kodebumn']);
		}
		
		/*if(!empty($filter['search']))
			$this->db->like('NAMA', $filter['search']);*/
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
	}
	
	function getOptionBumnByMatra($d){
	
		$value = isset($d['value'])?$d['value']:'';
		$KODEMATRA = isset($d['KODEMATRA'])?$d['KODEMATRA']:'';
		
		$this->db->flush_cache();
		if($KODEMATRA != ''){
			$this->db->where('KODEMATRA', $KODEMATRA);
		}
		
		$result = $this->db->get('SDM_BUMN');
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($result->result() as $r){
				if(trim($r->KODEBUMN) == trim($value)){
						$out .= '<option value="'.$r->KODEBUMN.'" selected="selected">'.$r->NAMA_BUMN.'</option>';
				}else{
						$out .= '<option value="'.$r->KODEBUMN.'">'.$r->NAMA_BUMN.'</option>';
				}
		}
		//$out .= '</select>';
		
		return $out;
	
	}
	
	function getOptionMatraChild($d=""){
		
		// yanto
		//$level = get_level();
		
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('MATRA');
		$this->db->order_by('KODEMATRA');
		
		//yanto
		/*$out = '';
		if($level['LEVEL'] == 2){ // induk upt
			$this->db->where('KODE_INDUK', $level['KODE_UPT']);
		}else if($level['LEVEL'] == 3){ // upt
			$this->db->where('KODE_UPT', $level['KODE_UPT']);
		}*/
		
		$res = $this->db->get();
		
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
				if(trim($r->KODEMATRA) == trim($value)){
						$out .= '<option value="'.$r->KODEMATRA.'" selected="selected">'.$r->NAMAMATRA.'</option>';
				}else{
						$out .= '<option value="'.$r->KODEMATRA.'">'.$r->NAMAMATRA.'</option>';
				}
		}
		
		return $out;
	}
	
	// end tes tes
	
	//end filter dan paginasi baru
	
	
	public function getmatra2(){
		$result = array();
		$this->db->select('*');
		$this->db->from('MATRA');
		$this->db->order_by('KODEMATRA','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Matra-';
            $result[$row->KODEMATRA]= $row->NAMAMATRA;
        }
 
        return $result;
	}
	
	public function getbumn(){
		if($KODEMATRA = $this->input->post('KODEMATRA')){
    	$result = array();
    	$this->db->select('*');
    	$this->db->from('SDM_BUMN');
    	$this->db->where('KODEMATRA',$KODEMATRA);
    	$this->db->order_by('KODEBUMN','ASC');
    	$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        	{
            	$result[0]= '-Pilih BUMN-';
            	$result[$row->KODEBUMN]= $row->NAMA_BUMN;
        	}
 		}else
		{
			{
			 $result[0]= '-Pilih Matra Dulu-';	
			}
		}
        return $result;
	}
	
	public function get_data($e1,$e2){

		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_BUMN');
		//$this->db->join('SDM_BUMN', 'SDM_BUMN.KODEBUMN = SDM_PEG_BUMN.KODEBUMN');
		//$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_BUMN.ID_JABATAN');
		
		if($e1 != '0'){
			$this->db->where('KODEMATRA', $e1);	
		}
		if($e2 != '0'){
			$this->db->where('KODEBUMN', $e2);	
		}
		
		return $this->db->get();
	}
	
	public function get_data_duk_detail($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_BUMN');
		$this->db->join('SDM_BUMN', 'SDM_BUMN.KODEBUMN = SDM_PEG_BUMN.KODEBUMN');
		//$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_DINAS.ID_JABATAN');
		$this->db->where('ID_PEG_BUMN', $id);
		return $this->db->get();
	}
	
	public function get_data_duk_detail_diklat($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_DIKLAT_PEG_BUMN');
		//$this->db->join('SDM_PELATIHAN', 'SDM_PELATIHAN.ID_PELATIHAN = SDM_DIKLAT_PEG_DINAS.ID_PELATIHAN');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_DIKLAT.KODE_DIKLAT = SDM_DIKLAT_PEG_BUMN.KODE_DIKLAT');
		$this->db->where('ID_PEG_BUMN', $id);
		return $this->db->get();
		
	}
	
	public function get_data_duk_detail_pendidikan($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEND_FORMAL_BUMN');
		$this->db->join('SDM_JENJANG_PENDIDIKAN', 'SDM_JENJANG_PENDIDIKAN.ID_JENJANG = SDM_PEND_FORMAL_BUMN.ID_JENJANG');
		$this->db->where('ID_PEG_BUMN', $id);
		return $this->db->get();		
	}
	
	function getData1($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_BUMN');
		$this->db->where('ID_PEG_BUMN', $id);
		
		return $this->db->get();
	}
	
	public function getdiklat(){
		$result = array();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_DIKLAT');
		$this->db->order_by('KODE_DIKLAT','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Diklat-';
            $result[$row->KODE_DIKLAT]= $row->NAMA_DIKLAT;
        }
 
        return $result;
	}
	
	public function getjenjang(){
		$result = array();
		$this->db->select('*');
		$this->db->from('SDM_JENJANG_PENDIDIKAN');
		$this->db->order_by('ID_JENJANG','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Jenjang-';
            $result[$row->ID_JENJANG]= $row->NAMA_JENJANG;
        }
 
        return $result;
	}
	
	function insert_diklat($data){
		$this->db->flush_cache();
		$this->db->set('ID_PEG_BUMN', $data['ID_PEG_BUMN']);
		$this->db->set('KODE_DIKLAT',  trim($data['KODE_DIKLAT']));
		$this->db->set('TAHUN_DIKLAT', $data['TAHUN_DIKLAT']);
		//$this->db->set('KETERANGAN', $data['']);
		$result = $this->db->insert('SDM_DIKLAT_PEG_BUMN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function insert_pendidikan($data){
		$this->db->flush_cache();
		$this->db->set('ID_PEG_BUMN', $data['ID_PEG_BUMN']);
		$this->db->set('ID_JENJANG',  trim($data['ID_JENJANG']));
		$this->db->set('TAHUN_PENDIDIKAN', $data['TAHUN_PENDIDIKAN']);
		$this->db->set('NAMA_SEKOLAH', $data['NAMA_SEKOLAH']);
		//$this->db->set('KETERANGAN', $data['']);
		$result = $this->db->insert('SDM_PEND_FORMAL_BUMN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}	
	}
	
	public function getjabatan(){
		$result = array();
		$this->db->select('*');
		$this->db->from('SDM_JABATAN');
		$this->db->order_by('ID_JABATAN','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Jabatan-';
            $result[$row->ID_JABATAN]= $row->NAMA_JABATAN;
        }
 
        return $result;
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_BUMN');
		$this->db->where('ID_PEG_BUMN', $id);
		
		return $this->db->get();
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('ALAMAT', $data['ALAMAT']);
		$this->db->set('STATUS', $data['STATUS']);
		$this->db->set('JML_ANAK', $data['JML_ANAK']);
		//$this->db->set('ID_GOLONGAN', $data['ID_GOLONGAN']);
		//$this->db->set('TMT_GOLONGAN', $data['TMT_GOLONGAN']);
		$this->db->set('ID_JABATAN', $data['ID_JABATAN']);
		//$this->db->set('TMT_JABATAN', $data['TMT_JABATAN']);
		$this->db->where('ID_PEG_BUMN', $data['ID_PEG_BUMN']);
		$result = $this->db->update('SDM_PEG_BUMN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}		
	}
	
	function insert($data){
		$this->db->flush_cache();
		//$this->db->set('ID_PEG_DINAS', $data['ID_PEG_DINAS']);
		//$this->db->set('NIK',  $data['NIK']);
		//$this->db->set('NAMA', $data['NAMA']);
		$this->db->set('KODEMATRA', $data['KODEMATRA']);
		$this->db->set('KODEBUMN', $data['KODEBUMN']);
		$this->db->set('TAHUN', $data['TAHUN']);
		$this->db->set('JUMLAHSDM', $data['JUMLAHSDM']);
		//$this->db->set('TMPT_LAHIR', $data['TMPT_LAHIR']);
		//$this->db->set('TGL_LAHIR', $data['TGL_LAHIR'], false);
		//$this->db->set('TGL_LAHIR', 'TO_TIMESTAMP(\''.$data['TGL_LAHIR'].'\', \'YYYY-MM-DD HH24:MI:SS\')', FALSE);
		$this->db->set('PEND_TRANSPORTASI', $data['PEND_TRANSPORTASI']);
		/*$this->db->set('JENIS_KELAMIN', $data['JENIS_KELAMIN']);
		$this->db->set('STATUS', $data['STATUS']);
		$this->db->set('JML_ANAK', $data['JML_ANAK']);
		//$this->db->set('STATUS_PEG', $data['STATUS_PEG']);
		//$this->db->set('TMT', $data['TMT']);
		//$this->db->set('ID_GOLONGAN', $data['ID_GOLONGAN']);
		//$this->db->set('TMT_GOLONGAN', $data['TMT_GOLONGAN']);
		$this->db->set('ID_JABATAN', $data['ID_JABATAN']);
		//$this->db->set('TMT_JABATAN', $data['TMT_JABATAN']);
		$this->db->set('KETERANGAN', $data['KETERANGAN']);
		*/
		$result = $this->db->insert('SDM_PEG_BUMN_VER2');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	#tahun
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
}
?>