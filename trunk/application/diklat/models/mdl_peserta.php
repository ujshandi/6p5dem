<?
class mdl_peserta extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_PESERTA.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DIKLAT.NAMA_DIKLAT', false);
		$this->db->from('DIKLAT_MST_PESERTA');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_PESERTA.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_PESERTA.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		$this->db->limit($num, $offset);
		$this->db->order_by('IDPESERTA');
		
		return $this->db->get();
		
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
        $this->db->set('NO_PESERTA', $data['NO_PESERTA']);
        $this->db->set('NAMA_PESERTA', $data['NAMA_PESERTA']);
        $this->db->set('TEMPAT_LAHIR', $data['TEMPAT_LAHIR']);
        $this->db->set('TGL_LAHIR', $data['TGL_LAHIR']);
        $this->db->set('JK', $data['JK']);
        $this->db->set('TGL_MASUK', $data['TGL_MASUK']);
        $this->db->set('THN_ANGKATAN', $data['THN_ANGKATAN']);
        $this->db->set('STATUS_PESERTA', $data['STATUS_PESERTA']);
        $this->db->set('KETERANGAN', $data['KETERANGAN']);

        $result = $this->db->insert('DIKLAT_MST_PESERTA');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PESERTA');
		$this->db->where('IDPESERTA', $id);
		
		return $this->db->get();
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
        $this->db->set('NO_PESERTA', $data['NO_PESERTA']);
        $this->db->set('NAMA_PESERTA', $data['NAMA_PESERTA']);
        $this->db->set('TEMPAT_LAHIR', $data['TEMPAT_LAHIR']);
        $this->db->set('TGL_LAHIR', $data['TGL_LAHIR']);
        $this->db->set('JK', $data['JK']);
        $this->db->set('TGL_MASUK', $data['TGL_MASUK']);
        $this->db->set('THN_ANGKATAN', $data['THN_ANGKATAN']);
        $this->db->set('STATUS_PESERTA', $data['STATUS_PESERTA']);
        $this->db->set('KETERANGAN', $data['KETERANGAN']);
		$this->db->where('KODE_PROGRAM', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_PESERTA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('IDPESERTA', $id);
		$result = $this->db->delete('DIKLAT_MST_PESERTA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>