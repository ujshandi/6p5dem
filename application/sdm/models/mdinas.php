<?php
class Mdinas extends CI_Model{
		
		private $peg_dinas	= 'pegawai_dinas';
		private $prov 		= 'provinsi';
		private $kabkota 	= 'kbupaten';
		
	public function __construct(){
		parent::__construct();
	}

	public function getprov(){
		$result = array();
		$this->db->select('*');
		$this->db->from('provinsi');
		$this->db->order_by('kodeprovin','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Provinsi-';
            $result[$row->kodeprovin]= $row->namaprovin;
        }
 
        return $result;
	}
	
	public function getkabkota(){
		$kodeprovin = $this->input->post('kodeprovin');
    	$result = array();
    	$this->db->select('*');
    	$this->db->from('kbupaten');
    	$this->db->where('kodeprovin',$kodeprovin);
    	$this->db->order_by('kodekabup','ASC');
    	$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        	{
            	$result[0]= '-Pilih Kabupaten/Kota-';
            	$result[$row->kodekabup]= $row->namakabup;
        	}
 
        return $result;
	}
	
	public function get_data($e1,$e2){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('pegawai_dinas a');
		$this->db->join('golongan b', 'b.id_golongan = a.id_golongan');
		$this->db->join('jabatan c', 'c.id_jabatan = a.id_jabatan');
		//$this->db->join('provinsi d', 'd.kodeprovin = a.kodeprovin');
		//$this->db->join('kbupaten e', 'e.kodekabup = a.kodekabup');
		
		$this->db->where('kodeprovin', $e1);
		$this->db->where('kodekabup', $e2);		
		return $this->db->get();		

	}	  
		
	public function get_data_detail($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('pegawai_dinas a');
		$this->db->join('golongan b', 'b.id_golongan = a.id_golongan');
		$this->db->join('jabatan c', 'c.id_jabatan = a.id_jabatan');
		$this->db->join('provinsi d', 'd.kodeprovin = a.kodeprovin');
		$this->db->join('kbupaten e', 'e.kodekabup = a.kodekabup');

		//$this->db->join('eselon1 d', 'd.id_eselon_1 = a.id_eselon_1');
		
		$this->db->where('id_peg_dinas', $id);
		
		return $this->db->get();
		
	}
	
}
?>