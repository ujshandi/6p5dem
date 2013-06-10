<?php
class Mdl_Sdm_Dinas extends CI_Model{
		
	public function __construct(){
		parent::__construct();
	}

	public function getprovin(){
		$result = array();
		$this->db->select('*');
		$this->db->from('SDM_PROVINSI');
		$this->db->order_by('KODEPROVIN','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Provinsi-';
            $result[$row->KODEPROVIN]= $row->NAMAPROVIN;
        }
 
        return $result;
	}
	
	function getData1($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_DINAS');
		$this->db->where('ID_PEG_DINAS', $id);
		
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
	
	public function getgolongan(){
		$result = array();
		$this->db->select('*');
		$this->db->from('SDM_GOLONGAN');
		$this->db->order_by('ID_GOLONGAN','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Golongan-';
            $result[$row->ID_GOLONGAN]= $row->NAMA_GOLONGAN;
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
	
	public function getkabupkota(){
		if($KODEPROVIN = $this->input->post('KODEPROVIN')){
    	$result = array();
    	$this->db->select('*');
    	$this->db->from('SDM_KABUPATEN');
    	$this->db->where('KODEPROVIN',$KODEPROVIN);
    	$this->db->order_by('KODEKABUP','ASC');
    	$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        	{
            	$result[0]= '-Pilih Kabupaten/Kota-';
            	$result[$row->KODEKABUP]= $row->NAMAKABUP;
        	}
 		}else
		{
			{
			 $result[0]= '-Pilih Provinsi Dahulu-';	
			}
		}
        return $result;
	}
 	
	public function get_data($e1,$e2){

		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_DINAS');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEG_DINAS.ID_GOLONGAN');
		$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_DINAS.ID_JABATAN');
		
		if($e1 != '0'){
			$this->db->where('KODEPROVIN', $e1);	
		}
		if($e2 != '0'){
			$this->db->where('KODEKABUP', $e2);	
		}
		
		return $this->db->get();
	}	  
	
	public function get_data_duk($e1, $e2){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_DINAS');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEG_DINAS.ID_GOLONGAN');
		$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_DINAS.ID_JABATAN');
		
		if($e1 != '0'){
			$this->db->where('KODEPROVIN', $e1);	
		}
		if($e2 != '0'){
			$this->db->where('KODEKABUP', $e2);	
		}
		
		$this->db->order_by('SDM_PEG_DINAS.ID_GOLONGAN', 'ASC');
		
		return $this->db->get();
		
	}
	
	public function get_data_duk_detail($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_DINAS');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEG_DINAS.ID_GOLONGAN');
		$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_DINAS.ID_JABATAN');
		$this->db->where('ID_PEG_DINAS', $id);
		return $this->db->get();
		
	}
	
	public function get_data_duk_detail_diklat($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_DIKLAT_PEG_DINAS');
		//$this->db->join('SDM_PELATIHAN', 'SDM_PELATIHAN.ID_PELATIHAN = SDM_DIKLAT_PEG_DINAS.ID_PELATIHAN');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_DIKLAT.KODE_DIKLAT = SDM_DIKLAT_PEG_DINAS.KODE_DIKLAT');
		$this->db->where('ID_PEG_DINAS', $id);
		return $this->db->get();
		
	}
	
	public function get_data_duk_detail_pendidikan($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEND_FORMAL_DINAS');
		$this->db->join('SDM_JENJANG_PENDIDIKAN', 'SDM_JENJANG_PENDIDIKAN.ID_JENJANG = SDM_PEND_FORMAL_DINAS.ID_JENJANG');
		$this->db->where('ID_PEG_DINAS', $id);
		return $this->db->get();
		
	}
	
	function insert_diklat($data){
		$this->db->flush_cache();
		$this->db->set('ID_PEG_DINAS', $data['ID_PEG_DINAS']);
		$this->db->set('KODE_DIKLAT',  trim($data['KODE_DIKLAT']));
		$this->db->set('TAHUN_DIKLAT', $data['TAHUN_DIKLAT']);
		//$this->db->set('KETERANGAN', $data['']);
		$result = $this->db->insert('SDM_DIKLAT_PEG_DINAS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function insert_pendidikan($data){
		$this->db->flush_cache();
		$this->db->set('ID_PEG_DINAS', $data['ID_PEG_DINAS']);
		$this->db->set('ID_JENJANG',  trim($data['ID_JENJANG']));
		$this->db->set('TAHUN_PENDIDIKAN', $data['TAHUN_PENDIDIKAN']);
		$this->db->set('NAMA_SEKOLAH', $data['NAMA_SEKOLAH']);
		//$this->db->set('KETERANGAN', $data['']);
		$result = $this->db->insert('SDM_PEND_FORMAL_DINAS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_DINAS');
		$this->db->where('ID_PEG_DINAS', $id);
		
		return $this->db->get();
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('ALAMAT', $data['ALAMAT']);
		$this->db->set('STATUS', $data['STATUS']);
		$this->db->set('JML_ANAK', $data['JML_ANAK']);
		$this->db->set('ID_GOLONGAN', $data['ID_GOLONGAN']);
		$this->db->set('TMT_GOLONGAN', $data['TMT_GOLONGAN']);
		$this->db->set('ID_JABATAN', $data['ID_JABATAN']);
		$this->db->set('TMT_JABATAN', $data['TMT_JABATAN']);
		$this->db->where('ID_PEG_DINAS', $data['ID_PEG_DINAS']);
		$result = $this->db->update('SDM_PEG_DINAS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function insert($data){
		$this->db->flush_cache();
		//$this->db->set('ID_PEG_DINAS', $data['ID_PEG_DINAS']);
		$this->db->set('NIP',  $data['NIP']);
		$this->db->set('NAMA', $data['NAMA']);
		$this->db->set('KODEPROVIN', $data['KODEPROVIN']);
		$this->db->set('KODEKABUP', $data['KODEKABUP']);
		$this->db->set('ALAMAT', $data['ALAMAT']);
		$this->db->set('TMPT_LAHIR', $data['TMPT_LAHIR']);
		$this->db->set('TGL_LAHIR', 'TO_TIMESTAMP(\''.$data['TGL_LAHIR'].'\', \'YYYY-MM-DD HH24:MI:SS\')', FALSE);
		$this->db->set('AGAMA', $data['AGAMA']);
		$this->db->set('JENIS_KELAMIN', $data['JENIS_KELAMIN']);
		$this->db->set('STATUS', $data['STATUS']);
		$this->db->set('JML_ANAK', $data['JML_ANAK']);
		$this->db->set('STATUS_PEG', $data['STATUS_PEG']);
		$this->db->set('TMT', $data['TMT']);
		$this->db->set('ID_GOLONGAN', $data['ID_GOLONGAN']);
		$this->db->set('TMT_GOLONGAN', $data['TMT_GOLONGAN']);
		$this->db->set('ID_JABATAN', $data['ID_JABATAN']);
		$this->db->set('TMT_JABATAN', $data['TMT_JABATAN']);
		$this->db->set('KETERANGAN', $data['KETERANGAN']);
		
		$result = $this->db->insert('SDM_PEG_DINAS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}

}
?>