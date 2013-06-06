<?
class mdl_kurikulum extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_KURIKULUM');
		//$this->db->join('DIKLAT_MST_INDUKprogram b', 'b.KODE_INDUK = a.KODE_INDUK');
		$this->db->limit($num, $offset);
		$this->db->order_by('KODE_KURIKULUM');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_KURIKULUM');
		$this->db->where('KODE_KURIKULUM', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('KODE_KURIKULUM', $data['KODE_KURIKULUM']);
        $this->db->set('NAMA_KURIKULUM', $data['NAMA_KURIKULUM']);
        $this->db->set('SKS_TEORI', $data['SKS_TEORI']);
		$this->db->set('SKS_PRAKTEK', $data['SKS_PRAKTEK']);
		$this->db->set('JAM', $data['JAM']);
		$this->db->set('SEMESTER', $data['SEMESTER']);
		$this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);

        $result = $this->db->insert('DIKLAT_MST_KURIKULUM');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_KURIKULUM', $data['KODE_KURIKULUM']);
        $this->db->set('NAMA_KURIKULUM', $data['NAMA_KURIKULUM']);
        $this->db->set('SKS_TEORI', $data['SKS_TEORI']);
		$this->db->set('SKS_PRAKTEK', $data['SKS_PRAKTEK']);
		$this->db->set('JAM', $data['JAM']);
		$this->db->set('SEMESTER', $data['SEMESTER']);
		$this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);
		
		$this->db->where('KODE_KURIKULUM', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_KURIKULUM');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('KODE_KURIKULUM', $id);
		$result = $this->db->delete('DIKLAT_MST_KURIKULUM');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>