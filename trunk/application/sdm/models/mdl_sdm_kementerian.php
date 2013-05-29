<?php
class Mdl_Sdm_Kementerian extends CI_Model{
		
	public function __construct(){
		parent::__construct();
	}

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
	
	public function get_data_duk($e1, $e2, $e3, $e4){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('pegawai_kementrian a');
		$this->db->join('golongan b', 'b.id_golongan = a.id_golongan');
		$this->db->join('jabatan c', 'c.id_jabatan = a.id_jabatan');
		
		if($e1 != '0'){
			$this->db->where('id_eselon_1', $e1);	
		}
		if($e2 != '0'){
			$this->db->where('id_eselon_2', $e2);	
		}
		if($e3 != '0'){
			$this->db->where('id_eselon_3', $e3);	
		}
		if($e4 != '0'){
			$this->db->where('id_eselon_4', $e4);	
		}
		
		$this->db->order_by('a.id_golongan', 'ASC');
		
		return $this->db->get();
		
	}
	
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
		$this->db->from('SDM_PEG_KEMENTRIAN');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEG_KEMENTRIAN.ID_GOLONGAN');
		$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_KEMENTRIAN.ID_JABATAN');
		$this->db->where('ID_PEG_KEMENTRIAN', $id);
		return $this->db->get();
		
	}
	
	public function get_data_duk_detail_diklat($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_DIKLAT_PEG_KEMENTRIAN');
		$this->db->join('SDM_PELATIHAN', 'SDM_PELATIHAN.ID_PELATIHAN = SDM_DIKLAT_PEG_KEMENTRIAN.ID_PELATIHAN');
		$this->db->join('SDM_DIKLAT', 'SDM_DIKLAT.ID_DIKLAT = SDM_DIKLAT_PEG_KEMENTRIAN.ID_DIKLAT');
		$this->db->where('ID_PEG_KEMENTRIAN', $id);
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
	
	public function update($id){
		$id_peg_kem = $this->input->post('id_peg_kementrian');
		$nip	 	= $this->input->post('nip');
		$nama	 	= $this->input->post('nama');
		$alamat	 	= $this->input->post('alamat');
		$data=array(
			'nip'	 => $nip,
			'nama'	 => $nama,
			'alamat' => $alamat	
		);
		
		$this->db->where('id_peg_kementrian', $id);
		$this->db->update('pegawai_kementrian', $data);
	}
	
	public function getgolongan(){
		$result = array();
		$this->db->select('*');
		$this->db->from('golongan');
		$this->db->order_by('id_golongan','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Golongan-';
            $result[$row->id_golongan]= $row->nama_golongan;
        }
 
        return $result;
	}
	
	public function getjabatan(){
		$result = array();
		$this->db->select('*');
		$this->db->from('jabatan');
		$this->db->order_by('id_jabatan','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Jabatan-';
            $result[$row->id_jabatan]= $row->nama_jabatan;
        }
 
        return $result;
	}
	
	public function add_peg($nip,$nama,$alamat,$tmptLahir,$tglLahir,$agama,$jenisKelamin,$status,$jmlAnak,$id_eselon_1,$id_eselon_2,$id_eselon_3,$id_eselon_4,$id_golongan,$id_jabatan,$TMT,$statusPeg,$keterangan)
	{
		$add =  array(
                    'id_peg_kementrian' => '',
                    'nip' => $nip,
					'nama' => $nama,
					'alamat' => $alamat,
					'tempat_lahir' => $tmptLahir,
					'tgl_lahir' => $tglLahir,
					'agama' => $agama,
					'jenis_kelamin' => $jenisKelamin,
					'status' => $status,
                    'jml_anak' => $jmlAnak,
                    'id_eselon_1' => $id_eselon_1,
					'id_eselon_2' => $id_eselon_2,
					'id_eselon_3' => $id_eselon_3,
					'id_eselon_4' => $id_eselon_4,
					'id_golongan' => $id_golongan,
					'id_jabatan'  => $id_jabatan,
					'tahun_pengangkatan' => $TMT,
					'status_peg' => $statusPeg,
					'keterangan' => $keterangan
                );
 
        $input = $this->db->insert('pegawai_kementerian', $add);
 
        if($input)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
	   //return $this->db->insert($this->peg_kementrian,$data);
 	}
}
?>