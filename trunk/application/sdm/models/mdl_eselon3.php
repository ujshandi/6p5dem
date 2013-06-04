<?
class mdl_eselon3 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_ESELON3');
		$this->db->limit($num, $offset);
		$this->db->order_by('ID_ESELON_3');
		
		return $this->db->get();
		
	}
	
	function geteselon2(){
		$result = array();
		$this->db->select('*');
		$this->db->from('SDM_ESELON2');
		$this->db->order_by('ID_ESELON_2','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Eselon II-';
            $result[$row->ID_ESELON_2]= $row->NAMA_ESELON_2;
        }
 
        return $result;
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_ESELON3');
		$this->db->where('ID_ESELON_3', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('ID_ESELON_2', $data['ID_ESELON_2']);
		$this->db->set('ID_ESELON_3', $data['ID_ESELON_3']);
		$this->db->set('NAMA_ESELON_3', $data['NAMA_ESELON_3']);
		$result = $this->db->insert('SDM_ESELON3');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('ID_ESELON_2', $data['ID_ESELON_2']);
		$this->db->set('ID_ESELON_3', $data['ID_ESELON_3']);
		$this->db->set('NAMA_ESELON_3', $data['NAMA_ESELON_3']);
		$this->db->where('ID_ESELON_3', $data['ID_ESELON_3']);
		$result = $this->db->update('SDM_ESELON3');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('ID_ESELON_3', $data['id']);
		$result = $this->db->delete('SDM_ESELON3');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>