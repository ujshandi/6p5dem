<?php
class Mnaparat extends CI_Model{
		
		private $peg_naparat	= 'pegawai_nonaparatur';
		private $matra			= 'matra';
		private $asosiasi		= 'asosiasi';
		
	public function __construct(){
		parent::__construct();
	}
	
	public function getmatra(){
		$result = array();
		$this->db->select('*');
		$this->db->from('matra');
		$this->db->order_by('kodematra','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Matra-';
            $result[$row->kodematra]= $row->nama_matra;
        }
 
        return $result;
	}
	
	public function get_data($e1){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('pegawai_nonaparatur a');
		$this->db->join('golongan b', 'b.id_golongan = a.id_golongan');
		$this->db->join('jabatan c', 'c.id_jabatan = a.id_jabatan');
		$this->db->join('asosiasi d', 'd.id_asosiasi = a.id_asosiasi');
		
		$this->db->where('kodematra', $e1);		
		return $this->db->get();		

	}
	
	public function get_data_detail($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('pegawai_nonaparatur a');
		$this->db->join('matra b', 'b.kodematra = a.kodematra');
		$this->db->join('asosiasi c', 'c.id_asosiasi = a.id_asosiasi');
		$this->db->join('golongan d', 'd.id_golongan = a.id_golongan');
		$this->db->join('jabatan e', 'e.id_jabatan = a.id_jabatan');
		
		$this->db->where('id_peg_nonaparatur', $id);
		
		return $this->db->get();
		
	}	  
}
?>