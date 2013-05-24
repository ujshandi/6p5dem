<?
class mdl_satker extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('MST_INDUKUPT');
		$this->db->limit($num, $offset);
		$this->db->order_by('KODE_INDUK');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('MST_INDUKUPT');
		$this->db->where('KODE_INDUK', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('KODE_INDUK', $data['kode_induk']);
		$this->db->set('NAMA_INDUK', $data['nama_induk']);
		$result = $this->db->insert('MST_INDUKUPT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('KODE_INDUK', $data['kode_induk']);
		$this->db->set('NAMA_INDUK', $data['nama_induk']);
		$this->db->where('KODE_INDUK', $data['id']);
		$result = $this->db->update('MST_INDUKUPT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('KODE_INDUK', $data['id']);
		$result = $this->db->delete('MST_INDUKUPT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>