<?php
class MChain extends CI_Model{
		
	private $peg_kementrian	= 'pegawai_kementrian';
	private $eselon1 = 'eselon1';
	private $eselon2 = 'eselon2';
	private $eselon3 = 'eselon3';
	private $eselon4 = 'eselon4';
	
	public function __construct(){
		parent::__construct();
	}

	public function geteselon1(){
		$result = array();
		$this->db->select('*');
		$this->db->from('eselon1');
		$this->db->order_by('id_eselon_1','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih eselon I-';
            $result[$row->id_eselon_1]= $row->nama_eselon_1;
        }
 
        return $result;
	}
	
	public function geteselon2(){
		if($id_eselon_1 = $this->input->post('id_eselon_1')){
    	$result = array();
    	$this->db->select('*');
    	$this->db->from('eselon2');
    	$this->db->where('id_eselon_1',$id_eselon_1);
    	$this->db->order_by('id_eselon_2','ASC');
    	$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        	{
            	$result[0]= '-Pilih Eselon II-';
            	$result[$row->id_eselon_2]= $row->nama_eselon_2;
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
		if($id_eselon_2 = $this->input->post('id_eselon_2')){
    	$result = array();
    	$this->db->select('*');
    	$this->db->from('eselon3');
    	$this->db->where('id_eselon_2',$id_eselon_2);
    	$this->db->order_by('id_eselon_3','ASC');
    	$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        	{
            	$result[0]= '-Pilih Eselon III-';
            	$result[$row->id_eselon_3]= $row->nama_eselon_3;
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
		if($id_eselon_3 = $this->input->post('id_eselon_3')){
    	$result = array();
    	$this->db->select('*');
    	$this->db->from('eselon4');
    	$this->db->where('id_eselon_3',$id_eselon_3);
    	$this->db->order_by('id_eselon_4','ASC');
    	$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        	{
            	$result[0]= '-Pilih Eselon IV-';
            	$result[$row->id_eselon_4]= $row->nama_eselon_4;
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
		$this->db->from('diklat_peg_kem a');
		$this->db->join('jenis_pelatihan b', 'b.id_jenis_pelatihan = a.id_jenis_pelatihan');
		$this->db->join('diklat c', 'c.id_diklat = a.id_diklat');
		$this->db->where('id_peg_kem', $id);
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
	
}
?>