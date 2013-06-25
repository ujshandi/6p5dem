<?
class mdl_golongan extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_GOLONGAN');
		$this->db->limit($num, $offset);
		$this->db->order_by('ID_GOLONGAN');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_GOLONGAN');
		$this->db->where('ID_GOLONGAN', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		//$this->db->set('ID_GOLONGAN', $data['ID_GOLONGAN']);
		$this->db->set('NAMA_GOLONGAN', $data['NAMA_GOLONGAN']);
		$this->db->set('KETERANGAN', $data['KETERANGAN']);
		
		$result = $this->db->insert('SDM_GOLONGAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		//$this->db->set('ID_GOLONGAN', $data['ID_GOLONGAN']);
		$this->db->set('NAMA_GOLONGAN', $data['NAMA_GOLONGAN']);
		$this->db->set('KETERANGAN', $data['KETERANGAN']);
		
		$this->db->where('ID_GOLONGAN', $data['ID_GOLONGAN']);
		
		$result = $this->db->update('SDM_GOLONGAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('ID_GOLONGAN', $data['id']);
		$result = $this->db->delete('SDM_GOLONGAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>