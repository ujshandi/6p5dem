<?
class mdl_tingkat_kopetensi extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('KOPETEN_TINGKAT');
		$this->db->join('KOPETEN_KATEGORI','KOPETEN_KATEGORI.KODE_KATEG_KOPETENSI = KOPETEN_TINGKAT.KODE_KATEG_KOPETENSI');
		$this->db->limit($num, $offset);
		$this->db->order_by('KODE_TINGKAT');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('KOPETEN_TINGKAT');
		$this->db->where('KODE_TINGKAT', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('KODE_TINGKAT', $data['KODE_TINGKAT']);
		$this->db->set('DESKRIPSI', $data['DESKRIPSI']);
		$this->db->set('KODE_KATEG_KOPETENSI', $data['KODE_KATEG_KOPETENSI']);
		//$this->db->set('KETERANGAN', $data['']);
		$result = $this->db->insert('KOPETEN_TINGKAT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('KODE_TINGKAT', $data['KODE_TINGKAT']);
		$this->db->set('DESKRIPSI', $data['DESKRIPSI']);
		$this->db->where('KODE_TINGKAT', $data['KODE_TINGKAT']);
		$result = $this->db->update('KOPETEN_TINGKAT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('KODE_TINGKAT', $data['id']);
		$result = $this->db->delete('KOPETEN_TINGKAT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>