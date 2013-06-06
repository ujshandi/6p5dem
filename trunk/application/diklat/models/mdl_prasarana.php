<?
class mdl_prasarana extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PRASARANA');
		//$this->db->join('DIKLAT_MST_INDUKprogram b', 'b.KODE_INDUK = a.KODE_INDUK');
		$this->db->limit($num, $offset);
		$this->db->order_by('ID_PRASARANA');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PRASARANA');
		$this->db->where('ID_PRASARANA', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('ID_PRASARANA', $data['ID_PRASARANA']);
        $this->db->set('ID_SARPRAS', $data['ID_SARPRAS']);
        $this->db->set('TAHUN', $data['TAHUN']);
        $this->db->set('JUMLAH', $data['JUMLAH']);
        $this->db->set('KAPASITAS', $data['KAPASITAS']);
        $this->db->set('GAMBAR_PRASARANA', $data['GAMBAR_PRASARANA']);
        $this->db->set('DESKRIPSI_PRASARANA', $data['DESKRIPSI_PRASARANA']);
        $this->db->set('TANGGAL_UPLOAD', $data['TANGGAL_UPLOAD']);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);

        $result = $this->db->insert('DIKLAT_MST_PROGRAM');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('ID_PRASARANA', $data['ID_PRASARANA']);
        $this->db->set('ID_SARPRAS', $data['ID_SARPRAS']);
        $this->db->set('TAHUN', $data['TAHUN']);
        $this->db->set('JUMLAH', $data['JUMLAH']);
        $this->db->set('KAPASITAS', $data['KAPASITAS']);
        $this->db->set('GAMBAR_PRASARANA', $data['GAMBAR_PRASARANA']);
        $this->db->set('DESKRIPSI_PRASARANA', $data['DESKRIPSI_PRASARANA']);
        $this->db->set('TANGGAL_UPLOAD', $data['TANGGAL_UPLOAD']);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);

		$this->db->where('ID_PRASARANA', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_PRASARANA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('ID_PRASARANA', $id);
		$result = $this->db->delete('DIKLAT_MST_PRASARANA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>