<?
class Mdl_Kabupaten extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getprovin(){
		$result = array();
		$this->db->select('*');
		$this->db->from('SDM_PROVINSI');
		$this->db->order_by('KODEPROVIN','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Provinsi-';
            $result[$row->KODEPROVIN]= $row->NAMAPROVIN;
        }
 
        return $result;
	}

	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_KABUPATEN');
		$this->db->limit($num, $offset);
		$this->db->order_by('KODEKABUP');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_KABUPATEN');
		$this->db->where('KODEKABUP', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('KODEPROVIN', $data['KODEPROVIN']);
		$this->db->set('KODEKABUP', $data['KODEKABUP']);
		$this->db->set('NAMAKABUP', $data['NAMAKABUP']);
		//$this->db->set('KETERANGAN', $data['']);
		$result = $this->db->insert('SDM_KABUPATEN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('KODEPROVIN', $data['KODEPROVIN']);
		$this->db->set('KODEKABUP', $data['KODEKABUP']);
		$this->db->set('NAMAKABUP', $data['NAMAKABUP']);
		$this->db->where('KODEKABUP', $data['KODEKABUP']);
		$result = $this->db->update('SDM_KABUPATEN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('KODEKABUP', $data['id']);
		$result = $this->db->delete('SDM_KABUPATEN');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>