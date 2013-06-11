<?
class mdl_penyuluhan extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_PENYULUHAN.*, MST_INDUKUPT.NAMA_INDUK', false);
		$this->db->from('DIKLAT_PENYULUHAN');
		$this->db->join('MST_INDUKUPT', 'DIKLAT_PENYULUHAN.KODE_UPT = MST_INDUKUPT.KODE_INDUK');
		$this->db->limit($num, $offset);
		$this->db->order_by('IDDATA');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_PENYULUHAN');
		$this->db->where('IDDATA', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        //$this->db->set('IDDATA', $data['IDDATA']);
        $this->db->set('NAMA_PENYULUHAN', $data['NAMA_PENYULUHAN']);
        $this->db->set('JML_PESERTA', $data['JML_PESERTA']);
		$this->db->set('TEMPAT', $data['TEMPAT']);
		$this->db->set('TANGGAL', $data['TANGGAL'], false);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);

        $result = $this->db->insert('DIKLAT_PENYULUHAN');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        //$this->db->set('IDDATA', $data['IDDATA']);
        $this->db->set('NAMA_PENYULUHAN', $data['NAMA_PENYULUHAN']);
        $this->db->set('JML_PESERTA', $data['JML_PESERTA']);
		$this->db->set('TEMPAT', $data['TEMPAT']);
		$this->db->set('TANGGAL', $data['TANGGAL'], false);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);

		$this->db->where('IDDATA', $data['id']);
		
		$result = $this->db->update('DIKLAT_PENYULUHAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('IDDATA', $id);
		$result = $this->db->delete('DIKLAT_PENYULUHAN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>