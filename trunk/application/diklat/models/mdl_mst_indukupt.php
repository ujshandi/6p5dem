<?
class mdl_mst_indukupt extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('mst_indukupt');
		$this->db->limit($num, $offset);
		//$this->db->order_by('');
		
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
		$result = $this->db->insert('mst_indukupt', $data);
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->where('kode_induk', $data['kode_induk']);
		$result = $this->db->update('mst_indukupt', $data);
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$result = $this->db->delete('mst_indukupt', array('kode_induk' => $data));
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}

	}
	
}
?>
