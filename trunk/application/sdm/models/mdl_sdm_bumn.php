<?php
class Mdl_Sdm_bumn extends CI_Model{
		
	public function __construct(){
		parent::__construct();
	}
	
	public function getmatra(){
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
		$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_BUMN.ID_JABATAN');
		
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
		$this->db->join('MATRA', 'SDM_BUMN.KODEMATRA = SDM_PEG_BUMN.KODEMATRA');
		$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_BUMN.ID_JABATAN');
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
		$this->db->set('NIK',  $data['NIK']);
		$this->db->set('NAMA', $data['NAMA']);
		$this->db->set('KODEMATRA', $data['KODEMATRA']);
		$this->db->set('KODEBUMN', $data['KODEBUMN']);
		$this->db->set('ALAMAT', $data['ALAMAT']);
		$this->db->set('TMPT_LAHIR', $data['TMPT_LAHIR']);
		$this->db->set('TGL_LAHIR', 'TO_TIMESTAMP(\''.$data['TGL_LAHIR'].'\', \'YYYY-MM-DD HH24:MI:SS\')', FALSE);
		$this->db->set('AGAMA', $data['AGAMA']);
		$this->db->set('JENIS_KELAMIN', $data['JENIS_KELAMIN']);
		$this->db->set('STATUS', $data['STATUS']);
		$this->db->set('JML_ANAK', $data['JML_ANAK']);
		//$this->db->set('STATUS_PEG', $data['STATUS_PEG']);
		//$this->db->set('TMT', $data['TMT']);
		//$this->db->set('ID_GOLONGAN', $data['ID_GOLONGAN']);
		//$this->db->set('TMT_GOLONGAN', $data['TMT_GOLONGAN']);
		$this->db->set('ID_JABATAN', $data['ID_JABATAN']);
		//$this->db->set('TMT_JABATAN', $data['TMT_JABATAN']);
		$this->db->set('KETERANGAN', $data['KETERANGAN']);
		
		$result = $this->db->insert('SDM_PEG_BUMN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
}
?>