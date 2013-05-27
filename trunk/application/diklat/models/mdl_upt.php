<?
class mdl_upt extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_UPT');
		//$this->db->join('DIKLAT_MST_INDUKUPT b', 'b.KODE_INDUK = a.KODE_INDUK');
		$this->db->limit($num, $offset);
		$this->db->order_by('KODE_UPT');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_UPT');
		//$this->db->where('TRIM(KODE_UPT)', $id);
		$this->db->where('KODE_UPT', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        //$this->db->set('KODE_ASAL', $data['KODE_ASAL']);
        $this->db->set('NAMA_UPT', $data['NAMA_UPT']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);
        $this->db->set('URUTAN', $data['URUTAN']);

		$result = $this->db->insert('DIKLAT_MST_UPT');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        //$this->db->set('KODE_ASAL', $data['KODE_ASAL']);
        $this->db->set('NAMA_UPT', $data['NAMA_UPT']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);
        $this->db->set('URUTAN', $data['URUTAN']);

		$this->db->where('KODE_UPT', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_UPT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('KODE_UPT', $id);
		$result = $this->db->delete('DIKLAT_MST_UPT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>