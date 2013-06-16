<?
class mdl_matra extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('KOPETEN_MATRA');
		$this->db->limit($num, $offset);
		$this->db->order_by('KODEMATRA');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('KOPETEN_MATRA');
		$this->db->where('KODEMATRA', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('KODEMATRA', $data['KODEMATRA']);
		$this->db->set('NAMAMATRA', $data['NAMAMATRA']);
		//$this->db->set('KETERANGAN', $data['']);
		$result = $this->db->insert('KOPETEN_MATRA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('KODEMATRA', $data['KODEMATRA']);
		$this->db->set('NAMAMATRA', $data['NAMAMATRA']);
		$this->db->where('KODEMATRA', $data['KODEMATRA']);
		$result = $this->db->update('KOPETEN_MATRA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('KODEMATRA', $data['id']);
		$result = $this->db->delete('KOPETEN_MATRA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>