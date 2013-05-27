<?
class mdl_program extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PROGRAM');
		//$this->db->join('DIKLAT_MST_INDUKprogram b', 'b.KODE_INDUK = a.KODE_INDUK');
		$this->db->limit($num, $offset);
		$this->db->order_by('KODE_PROGRAM');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->where('KODE_PROGRAM', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('KODE_PROGRAM', $data['KODE_PROGRAM']);
        $this->db->set('NAMA_PROGRAM', $data['NAMA_PROGRAM']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);

        $result = $this->db->insert('DIKLAT_MST_PROGRAM');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_PROGRAM', $data['KODE_PROGRAM']);
        $this->db->set('NAMA_PROGRAM', $data['NAMA_PROGRAM']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);

		$this->db->where('KODE_PROGRAM', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_PROGRAM');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('KODE_PROGRAM', $id);
		$result = $this->db->delete('DIKLAT_MST_PROGRAM');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>