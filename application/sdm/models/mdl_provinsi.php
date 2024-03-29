<?
class Mdl_Provinsi extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PROVINSI');
		$this->db->limit($num, $offset);
		$this->db->order_by('KODEPROVIN');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PROVINSI');
		$this->db->where('KODEPROVIN', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('KODEPROVIN', $data['KODEPROVIN']);
		$this->db->set('NAMAPROVIN', $data['NAMAPROVIN']);
		//$this->db->set('KETERANGAN', $data['']);
		$result = $this->db->insert('SDM_PROVINSI');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('KODEPROVIN', $data['KODEPROVIN']);
		$this->db->set('NAMAPROVIN', $data['NAMAPROVIN']);
		$this->db->where('KODEPROVIN', $data['KODEPROVIN']);
		$result = $this->db->update('SDM_PROVINSI');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('KODEPROVIN', $data['id']);
		$result = $this->db->delete('SDM_PROVINSI');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>