<?
class mdl_eselon2 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_ESELON2');
		$this->db->limit($num, $offset);
		$this->db->order_by('ID_ESELON_2');
		
		return $this->db->get();
		
	}
	
	function geteselon1(){
		$result = array();
		$this->db->select('*');
		$this->db->from('SDM_ESELON1');
		$this->db->order_by('ID_ESELON_1','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Eselon I-';
            $result[$row->ID_ESELON_1]= $row->NAMA_ESELON_1;
        }
 
        return $result;
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_ESELON2');
		$this->db->where('ID_ESELON_2', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('ID_ESELON_1', $data['ID_ESELON_1']);
		$this->db->set('ID_ESELON_2', $data['ID_ESELON_2']);
		$this->db->set('NAMA_ESELON_2', $data['NAMA_ESELON_2']);
		$result = $this->db->insert('SDM_ESELON2');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('ID_ESELON_1', $data['ID_ESELON_1']);
		$this->db->set('ID_ESELON_2', $data['ID_ESELON_2']);
		$this->db->set('NAMA_ESELON_2', $data['NAMA_ESELON_2']);
		$this->db->where('ID_ESELON_2', $data['ID_ESELON_2']);
		$result = $this->db->update('SDM_ESELON2');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('ID_ESELON_2', $data['id']);
		$result = $this->db->delete('SDM_ESELON2');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>