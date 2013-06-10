<?
class mdl_bumn extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_BUMN');
		$this->db->limit($num, $offset);
		$this->db->order_by('KODEBUMN');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_BUMN');
		$this->db->where('KODEBUMN', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('KODEBUMN', $data['KODEBUMN']);
		$this->db->set('NAMA_BUMN', $data['NAMA_BUMN']);
		//$this->db->set('KETERANGAN', $data['']);
		$result = $this->db->insert('SDM_BUMN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('KODEBUMN', $data['KODEBUMN']);
		$this->db->set('NAMA_BUMN', $data['NAMA_BUMN']);
		$this->db->where('KODEBUMN', $data['KODEBUMN']);
		$result = $this->db->update('SDM_BUMN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('KODEBUMN', $data['id']);
		$result = $this->db->delete('SDM_BUMN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>