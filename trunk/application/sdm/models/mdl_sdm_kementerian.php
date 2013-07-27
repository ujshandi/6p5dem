<?php
class Mdl_Sdm_Kementerian extends CI_Model{
		
	public function __construct(){
		parent::__construct();
	}

	// --- penyesuaian dengan pusdatin
	public function getkantor(){
		$result = array();
		$this->db->select('*');
		$this->db->from('SDM_KANTOR');
		$this->db->order_by('KODEKANTOR','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Kantor-';
            $result[$row->KODEKANTOR]= $row->NAMAPENUH;
        }
 
        return $result;
	}
	
	public function getsatker(){
		if($KODEKANTOR = $this->input->post('KODEKANTOR')){
    	$result = array();
    	$this->db->select('*');
    	$this->db->from('SDM_UNITKERJA');
    	$this->db->where('KODEKANTOR',$KODEKANTOR);
    	$this->db->order_by('KODEUNIT','ASC');
    	$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        	{
            	$result[0]= '-Pilih Satker-';
            	$result[$row->KODEUNIT]= $row->NAMAPENUH;
        	}
 		}else
		{
			{
			 $result[0]= '-Pilih Kantor Dahulu-';	
			}
		}
        return $result;
	}
	
	public function get_data2($d1,$d2){

		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEGAWAI');
		$this->db->join('SDM_KABUPATEN', 'SDM_KABUPATEN.KODEKABUP = SDM_PEGAWAI.KABALAMAT');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEGAWAI.GOLONGAN');
		//$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_KEMENTRIAN.ID_JABATAN');
		
		if($d1 != '0'){
			$this->db->where('UNITKANTOR', $d1);	
		}
		if($d2 != '0'){
			$this->db->where('KERJAUNIT', $d2);	
		}
		
		return $this->db->get();
	}
	
	public function get_data_detail_new($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEGAWAI');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEGAWAI.GOLONGAN');
		$this->db->join('SDM_AGAMA', 'SDM_AGAMA.KODEAGAMA = SDM_PEGAWAI.AGAMA');
		$this->db->join('SDM_KAWIN', 'SDM_KAWIN.KODEKAWIN = SDM_PEGAWAI.PERKAWINAN');
		$this->db->join('SDM_KELAMIN', 'SDM_KELAMIN.KODEKELAMIN = SDM_PEGAWAI.KELAMIN');
		$this->db->where('NIP', $id);
		return $this->db->get();	
	}
	
	public function get_data_dukNew($d1, $d2){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEGAWAI');
		$this->db->join('SDM_KABUPATEN', 'SDM_KABUPATEN.KODEKABUP = SDM_PEGAWAI.KABALAMAT');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEGAWAI.GOLONGAN');
		
		if($d1 != '0'){
			$this->db->where('UNITKANTOR', $d1);	
		}
		if($d2 != '0'){
			$this->db->where('KERJAUNIT', $d2);	
		}
		
		$this->db->order_by('ID_GOLONGAN', 'ASC');
		$this->db->order_by('TMTPNS', 'ASC');
		
		return $this->db->get();
		
	}
	
	// -- sebelum migrasi --
	public function geteselon1(){
		$result = array();
		$this->db->select('*');
		$this->db->from('SDM_ESELON1');
		$this->db->order_by('ID_ESELON_1','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih eselon I-';
            $result[$row->ID_ESELON_1]= $row->NAMA_ESELON_1;
        }
 
        return $result;
	}
	
	public function geteselon2(){
		if($ID_ESELON_1 = $this->input->post('ID_ESELON_1')){
    	$result = array();
    	$this->db->select('*');
    	$this->db->from('SDM_ESELON2');
    	$this->db->where('ID_ESELON_1',$ID_ESELON_1);
    	$this->db->order_by('ID_ESELON_2','ASC');
    	$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        	{
            	$result[0]= '-Pilih Eselon II-';
            	$result[$row->ID_ESELON_2]= $row->NAMA_ESELON_2;
        	}
 		}else
		{
			{
			 $result[0]= '-Pilih Eselon I Dahulu-';	
			}
		}
        return $result;
	}
 
	public function geteselon3(){
		if($ID_ESELON_2 = $this->input->post('ID_ESELON_2')){
    	$result = array();
    	$this->db->select('*');
    	$this->db->from('SDM_ESELON3');
    	$this->db->where('ID_ESELON_2',$ID_ESELON_2);
    	$this->db->order_by('ID_ESELON_3','ASC');
    	$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        	{
            	$result[0]= '-Pilih Eselon III-';
            	$result[$row->ID_ESELON_3]= $row->NAMA_ESELON_3;
        	}
 		}else
		{
			{
			 $result[0]= '-Pilih Eselon II Dahulu-';	
			}
		}
        return $result;
	}
	
	public function geteselon4(){
		if($ID_ESELON_3 = $this->input->post('ID_ESELON_3')){
    	$result = array();
    	$this->db->select('*');
    	$this->db->from('SDM_ESELON4');
    	$this->db->where('ID_ESELON_3',$ID_ESELON_3);
    	$this->db->order_by('ID_ESELON_4','ASC');
    	$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        	{
            	$result[0]= '-Pilih Eselon IV-';
            	$result[$row->ID_ESELON_4]= $row->NAMA_ESELON_4;
        	}
		}else
		{
			{
				$result[0]= '-Pilih Eselon III Dahulu-';
			}
		}
        return $result;
	}
	
	public function get_data($e1,$e2,$e3,$e4){

		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_KEMENTRIAN');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEG_KEMENTRIAN.ID_GOLONGAN');
		$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_KEMENTRIAN.ID_JABATAN');
		
		if($e1 != '0'){
			$this->db->where('ID_ESELON_1', $e1);	
		}
		if($e2 != '0'){
			$this->db->where('ID_ESELON_2', $e2);	
		}
		if($e3 != '0'){
			$this->db->where('ID_ESELON_3', $e3);	
		}
		if($e4 != '0'){
			$this->db->where('ID_ESELON_4', $e4);	
		}
		
		return $this->db->get();
	}	  
	
	/*public function get_data_duk($e1, $e2, $e3, $e4){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_KEMENTRIAN');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEG_KEMENTRIAN.ID_GOLONGAN');
		$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_KEMENTRIAN.ID_JABATAN');
		
		if($e1 != '0'){
			$this->db->where('ID_ESELON_1', $e1);	
		}
		if($e2 != '0'){
			$this->db->where('ID_ESELON_2', $e2);	
		}
		if($e3 != '0'){
			$this->db->where('ID_ESELON_3', $e3);	
		}
		if($e4 != '0'){
			$this->db->where('ID_ESELON_4', $e4);	
		}
		
		$this->db->order_by('SDM_PEG_KEMENTRIAN.ID_GOLONGAN', 'ASC');
		
		return $this->db->get();
		
	}*/
	
	public function get_data_duk_detail_pangkat($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_KEMENTRIAN');
		$this->db->where('ID_PEG_KEMENTRIAN', $id);
		return $this->db->get();
		
	}
	
	public function get_data_duk_detail($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('pegawai_kementrian a');
		$this->db->join('golongan b', 'b.id_golongan = a.id_golongan');
		$this->db->join('jabatan c', 'c.id_jabatan = a.id_jabatan');
		$this->db->where('id_peg_kementrian', $id);
		return $this->db->get();
		
	}
	
	public function get_data_duk_detail_diklat($id){
		$this->db->flush_cache();
		$this->db->select('*');
/*<<<<<<< .mine
		$this->db->from('diklat_peg_kem a');
		$this->db->join('jenis_pelatihan b', 'b.id_jenis_pelatihan = a.id_jenis_pelatihan');
		$this->db->join('diklat c', 'c.id_diklat = a.id_diklat');
		$this->db->where('id_peg_kem', $id);
=======*/
		$this->db->from('SDM_DIKLAT_PEG_KEMENTRIAN');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_DIKLAT.KODE_DIKLAT = SDM_DIKLAT_PEG_KEMENTRIAN.KODE_DIKLAT');
		$this->db->where('ID_PEG_KEMENTRIAN', $id);
//>>>>>>> .r68
		return $this->db->get();
		
	}
	

		public function get_data_duk_detail_pendidikan($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEND_FORMAL_KEM');
		$this->db->join('SDM_JENJANG_PENDIDIKAN', 'SDM_JENJANG_PENDIDIKAN.ID_JENJANG = SDM_PEND_FORMAL_KEM.ID_JENJANG');
		$this->db->where('ID_PEG_KEMENTRIAN', $id);
		return $this->db->get();
		
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
	
	function insert($data){
		$this->db->flush_cache();
		
		$this->db->set('NIP',  $data['NIP']);
		$this->db->set('NAMA', $data['NAMA']);
		$this->db->set('ID_ESELON_1', $data['ID_ESELON_1']);
		$this->db->set('ID_ESELON_2', $data['ID_ESELON_2']);
		$this->db->set('ID_ESELON_3', $data['ID_ESELON_3']);
		$this->db->set('ID_ESELON_4', $data['ID_ESELON_4']);
		$this->db->set('ALAMAT', $data['ALAMAT']);
		$this->db->set('TMPT_LAHIR', $data['TMPT_LAHIR']);
		$this->db->set('TGL_LAHIR', $data['TGL_LAHIR'], false);
		//$this->db->set('TGL_LAHIR', 'TO_TIMESTAMP(\''.$data['TGL_LAHIR'].'\', \'YYYY-MM-DD HH24:MI:SS\')', FALSE);
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
		
		$result = $this->db->insert('SDM_PEG_KEMENTRIAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	//edit data
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_KEMENTRIAN');
		$this->db->where('ID_PEG_KEMENTRIAN', $id);
		
		return $this->db->get();
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('ALAMAT', $data['ALAMAT']);
		$this->db->set('ID_GOLONGAN', $data['ID_GOLONGAN']);
		$this->db->set('TMT_GOLONGAN', $data['TMT_GOLONGAN']);
		$this->db->set('ID_JABATAN', $data['ID_JABATAN']);
		$this->db->set('TMT_JABATAN', $data['TMT_JABATAN']);
		$this->db->where('ID_PEG_KEMENTRIAN', $data['ID_PEG_KEMENTRIAN']);
		$result = $this->db->update('SDM_PEG_KEMENTRIAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	//add diklat & add pendidikan
	
	function getData1($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_KEMENTRIAN');
		$this->db->where('ID_PEG_KEMENTRIAN', $id);
		
		return $this->db->get();
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
	
	function insert_diklat($data){
		$this->db->flush_cache();
		$this->db->set('ID_PEG_KEMENTRIAN', $data['ID_PEG_KEMENTRIAN']);
		$this->db->set('KODE_DIKLAT',  trim($data['KODE_DIKLAT']));
		$this->db->set('TAHUN_DIKLAT', $data['TAHUN_DIKLAT']);
		$result = $this->db->insert('SDM_DIKLAT_PEG_KEMENTRIAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function insert_pendidikan($data){
		$this->db->flush_cache();
		$this->db->set('ID_PEG_KEMENTRIAN', $data['ID_PEG_KEMENTRIAN']);
		$this->db->set('ID_JENJANG',  trim($data['ID_JENJANG']));
		$this->db->set('TAHUN_PENDIDIKAN', $data['TAHUN_PENDIDIKAN']);
		$this->db->set('NAMA_SEKOLAH', $data['NAMA_SEKOLAH']);
		$result = $this->db->insert('SDM_PEND_FORMAL_KEM');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
}
?>