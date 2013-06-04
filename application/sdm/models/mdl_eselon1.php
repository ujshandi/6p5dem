<?
class mdl_eselon1 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_ESELON1');
		$this->db->limit($num, $offset);
		$this->db->order_by('ID_ESELON_1');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_ESELON1');
		$this->db->where('ID_ESELON_1', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('ID_ESELON_1', $data['ID_ESELON_1']);
		$this->db->set('NAMA_ESELON_1', $data['NAMA_ESELON_1']);
		//$this->db->set('KETERANGAN', $data['']);
		$result = $this->db->insert('SDM_ESELON1');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('ID_ESELON_1', $data['ID_ESELON_1']);
		$this->db->set('NAMA_ESELON_1', $data['NAMA_ESELON_1']);
		$this->db->where('ID_ESELON_1', $data['ID_ESELON_1']);
		$result = $this->db->update('SDM_ESELON1');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('ID_ESELON_1', $data['id']);
		$result = $this->db->delete('SDM_ESELON1');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>