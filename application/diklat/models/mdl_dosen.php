<?
class mdl_dosen extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_DOSEN');
		//$this->db->join('DIKLAT_MST_INDUKprogram b', 'b.KODE_INDUK = a.KODE_INDUK');
		$this->db->limit($num, $offset);
		$this->db->order_by('IDDOSEN');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_DOSEN');
		$this->db->where('IDDOSEN', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('IDDOSEN', $data['IDDOSEN']);
        $this->db->set('NIP', $data['NIP']);
        $this->db->set('NAMADOSEN', $data['NAMADOSEN']);
		$this->db->set('TEMPAT_LAHIR', $data['TEMPAT_LAHIR']);
		$this->db->set('TGL_LAHIR', $data['TGL_LAHIR']);
		$this->db->set('JK', $data['JK']);
		$this->db->set('STATUS', $data['STATUS']);
		$this->db->set('TAHUN', $data['TAHUN']);
		$this->db->set('PENDIDIKAN', $data['PENDIDIKAN']);
		$this->db->set('JENIS_DOSEN', $data['JENIS_DOSEN']);
		$this->db->set('KODE_UPT', $data['KODE_INDUK']);

        $result = $this->db->insert('DIKLAT_MST_DOSEN');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('IDDOSEN', $data['IDDOSEN']);
        $this->db->set('NIP', $data['NIP']);
        $this->db->set('NAMADOSEN', $data['NAMADOSEN']);
		$this->db->set('TEMPAT_LAHIR', $data['TEMPAT_LAHIR']);
		$this->db->set('TGL_LAHIR', $data['TGL_LAHIR']);
		$this->db->set('JK', $data['JK']);
		$this->db->set('STATUS', $data['STATUS']);
		$this->db->set('TAHUN', $data['TAHUN']);
		$this->db->set('PENDIDIKAN', $data['PENDIDIKAN']);
		$this->db->set('JENIS_DOSEN', $data['JENIS_DOSEN']);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);

		$this->db->where('IDDOSEN', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_DOSEN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('IDDOSEN', $id);
		$result = $this->db->delete('DIKLAT_MST_DOSEN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>