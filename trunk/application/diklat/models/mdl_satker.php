<?
class mdl_satker extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('mst_indukupt');
		$this->db->order_by('kode_induk');
		
		return $this->db->get();
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('mst_indukupt');
		$this->db->where('kode_induk', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('kode_induk', $data['kode']);
		$this->db->set('nama_induk', $data['nama']);
		$result = $this->db->insert('mst_indukupt');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('kode_induk', $data['kode']);
		$this->db->set('nama_induk', $data['nama']);
		$this->db->where('kode_induk', $data['id']);
		$result = $this->db->update('mst_indukupt');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('kode_induk', $data['id']);
		$result = $this->db->delete('mst_indukupt');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>