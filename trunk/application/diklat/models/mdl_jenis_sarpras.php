<?
class mdl_jenis_sarpars extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData(){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('mst_sarpras');
		$this->db->order_by('id_sarpras');
		
		return $this->db->get();
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('mst_sarpras');
		$this->db->where('id_sarpras', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('id_sarpras', $data['kode']);
		$this->db->set('nama_sarpras', $data['nama']);
		$this->db->set('jenis', $data['jenis']);
		$result = $this->db->insert('mst_sarpras');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('id_sarpras', $data['kode']);
		$this->db->set('nama_sarpras', $data['nama']);
		$this->db->set('jenis', $data['jenis']);
		$this->db->where('id_sarpras', $data['id']);
		$result = $this->db->update('mst_sarpras');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('id_sarpras', $data['id']);
		$result = $this->db->delete('mst_sarpras');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>