<?php
class Referensi_model extends CI_Model
{
 	private $prov 		= 'provinsi';
	private $kbup		= 'kbupaten';
	private $eselon		= 'eselon1';
	private $eselon2	= 'eselon2';
	private $eselon3	= 'eselon3';
	private $golongan	= 'golongan';
	private $jabatan	= 'jabatan';
	
	public function __construct(){
		parent::__construct();
	}
	
	//get Jabatan
	public function get_jabatan(){
		$this->db->order_by('id_jabatan', 'ASC');
  		$query = $this->db->get($this->jabatan);
 		return $query->result();
 	}
	
	//get Golongan
	public function get_golongan(){
		$this->db->order_by('id_golongan', 'ASC');
  		$query = $this->db->get($this->golongan);
 		return $query->result();
 	}
	
	//get provinsi
	public function get_provinsi(){
		$this->db->order_by('kodeprovin', 'ASC');
  		$query = $this->db->get($this->prov);
 		return $query->result();
 	}
	
	//get kabupaten/kota
	public function get_kabkota(){
		$this->db->order_by('kodekabup', 'ASC');
  		$query = $this->db->get($this->kbup);
 		return $query->result();
 	}
	
	//get Eselon I
	public function get_eselonI(){
		$this->db->order_by('id_eselon_1', 'ASC');
  		$query = $this->db->get($this->eselon);
 		return $query->result();
 	}
	
	//get Eselon II
	public function get_eselonII(){
		$this->db->order_by('id_eselon_2', 'ASC');
  		$query = $this->db->get($this->eselon2);
 		return $query->result();
 	}
	
	//get Eselon III
	public function get_eselonIII(){
		$this->db->order_by('id_eselon_3', 'ASC');
  		$query = $this->db->get($this->eselon3);
 		return $query->result();
 	}
	
	public function getID($tablename, $field){
		$this->db->select_max($field);
		$query 	= $this->db->get($tablename);
		$id 	= $query->result_array();
		$id 	= $id[0];
	
		return $next_id = $id[$field] + 1;
	}
	
	public function insert_master($tabel, $data){
		return $this->db->insert($tabel,$data);
	}
	
	//insert provinsi
	public function insert_provinsi($dataprov){
 
		$this->db->insert($this->prov,$dataprov);
	}
}
?>