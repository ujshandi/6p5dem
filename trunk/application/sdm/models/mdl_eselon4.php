<?
class mdl_eselon4 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_ESELON4');
		$this->db->limit($num, $offset);
		$this->db->order_by('ID_ESELON_4');
		
		return $this->db->get();
		
	}
	
	function geteselon3(){
		$result = array();
		$this->db->select('*');
		$this->db->from('SDM_ESELON3');
		$this->db->order_by('ID_ESELON_3','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Eselon III-';
            $result[$row->ID_ESELON_3]= $row->NAMA_ESELON_3;
        }
 
        return $result;
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_ESELON4');
		$this->db->where('ID_ESELON_4', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('ID_ESELON_3', $data['ID_ESELON_3']);
		$this->db->set('ID_ESELON_4', $data['ID_ESELON_4']);
		$this->db->set('NAMA_ESELON_4', $data['NAMA_ESELON_4']);
		$result = $this->db->insert('SDM_ESELON4');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('ID_ESELON_3', $data['ID_ESELON_3']);
		$this->db->set('ID_ESELON_4', $data['ID_ESELON_4']);
		$this->db->set('NAMA_ESELON_4', $data['NAMA_ESELON_4']);
		$this->db->where('ID_ESELON_4', $data['ID_ESELON_4']);
		$result = $this->db->update('SDM_ESELON4');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('ID_ESELON_4', $data['id']);
		$result = $this->db->delete('SDM_ESELON4');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>