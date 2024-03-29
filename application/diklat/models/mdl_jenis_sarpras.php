<?
class mdl_jenis_sarpras extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter,$sort_by, $sort_order){
		//	get data
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_SARPRAS');
		$this->db->limit($num, $offset);
		//$this->db->order_by('ID_SARPRAS');
		
		##sorting
		$this->db->order_by($sort_by, $sort_order);
		##
		
		//if(!empty($filter['kode_induk']))
			//$this->db->where('DIKLAT_MST_INDUKUPT.KODE_INDUK', $filter['kode_induk']);
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_SARPRAS.NAMA_SARPRAS', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();		
		
		// get count
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_SARPRAS');
		//$this->db->limit($num, $offset);
		$this->db->order_by('ID_SARPRAS');
		
		//if(!empty($filter['kode_induk']))
			//$this->db->where('DIKLAT_MST_INDUKUPT.KODE_INDUK', $filter['kode_induk']);
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_SARPRAS.NAMA_SARPRAS', $filter['search']);
			
			$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_SARPRAS');
		$this->db->where('ID_SARPRAS', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        //$this->db->set('ID_SARPRAS', $data['ID_SARPRAS']);
        $this->db->set('NAMA_SARPRAS', $data['NAMA_SARPRAS']);
        $this->db->set('JENIS', $data['JENIS']);

        $result = $this->db->insert('DIKLAT_MST_SARPRAS');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		//$this->db->set('ID_SARPRAS', $data['ID_SARPRAS']);
        $this->db->set('NAMA_SARPRAS', $data['NAMA_SARPRAS']);
        $this->db->set('JENIS', $data['JENIS']);

		$this->db->where('ID_SARPRAS', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_SARPRAS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('ID_SARPRAS', $id);
		$result = $this->db->delete('DIKLAT_MST_SARPRAS');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getOptionJenis($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$res = array('Sarana', 'Prasarana');
		//$res = array(2000, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014);
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res as $r){
			if($r == trim($value)){
				$out .= '<option value="'.$r.'" selected="selected">'.$r.'</option>';
			}else{
				$out .= '<option value="'.$r.'">'.$r.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
		function getJenisSarpras(){
		//	get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_SARPRAS.*', false);
		$this->db->from('DIKLAT_MST_SARPRAS');
		$this->db->order_by('ID_SARPRAS');	
		
		return $this->db->get();
	}
	
	
}
?>