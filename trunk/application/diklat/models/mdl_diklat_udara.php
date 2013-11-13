<?
class mdl_diklat_udara extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter,$sort_by, $sort_order){
		// yanto
		$level = get_level();
		
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_DIKLAT.*, DIKLAT_MST_PROGRAM.NAMA_PROGRAM, DIKLAT_MST_INDUKUPT.NAMA_INDUK', false);
		$this->db->from('DIKLAT_MST_DIKLAT');
		$this->db->join('DIKLAT_MST_PROGRAM', 'DIKLAT_MST_DIKLAT.KODE_PROGRAM = DIKLAT_MST_PROGRAM.KODE_PROGRAM');
		$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_DIKLAT.KODE_INDUK = DIKLAT_MST_INDUKUPT.KODE_INDUK');
		$this->db->limit($num, $offset);
		##sorting
		$this->db->order_by($sort_by, $sort_order);
		##
		
		$this->db->where('DIKLAT_MST_DIKLAT.KODE_INDUK', '5');
		
		if($level['LEVEL'] == 2){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_INDUK', $level['KODE_UPT']);
		}else if($level['LEVEL'] == 3){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_UPT', $level['KODE_UPT']);
		}
		
		#filter		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_DIKLAT.NAMA_DIKLAT', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();	

		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_DIKLAT.*, DIKLAT_MST_PROGRAM.NAMA_PROGRAM, DIKLAT_MST_INDUKUPT.NAMA_INDUK', false);
		$this->db->from('DIKLAT_MST_DIKLAT');
		$this->db->join('DIKLAT_MST_PROGRAM', 'DIKLAT_MST_DIKLAT.KODE_PROGRAM = DIKLAT_MST_PROGRAM.KODE_PROGRAM');
		$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_DIKLAT.KODE_INDUK = DIKLAT_MST_INDUKUPT.KODE_INDUK');
		//$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		
		$this->db->where('DIKLAT_MST_DIKLAT.KODE_INDUK', '5');
		
		if($level['LEVEL'] == 2){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_INDUK', $level['KODE_UPT']);
		}else if($level['LEVEL'] == 3){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_UPT', $level['KODE_UPT']);
		}
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_DIKLAT.NAMA_DIKLAT', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_DIKLAT');
		$this->db->where('KODE_DIKLAT', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
        $this->db->set('NAMA_DIKLAT', $data['NAMA_DIKLAT']);
        $this->db->set('KODE_PROGRAM', $data['KODE_PROGRAM']);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);

        $result = $this->db->insert('DIKLAT_MST_DIKLAT');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
        $this->db->set('NAMA_DIKLAT', $data['NAMA_DIKLAT']);
        $this->db->set('KODE_PROGRAM', $data['KODE_PROGRAM']);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);

		$this->db->where('KODE_DIKLAT', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_DIKLAT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('KODE_DIKLAT', $id);
		$result = $this->db->delete('DIKLAT_MST_DIKLAT');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	// function getOptionDiklat($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		// $value = isset($d['value'])?$d['value']:'';
		
		// $this->db->flush_cache();
		// $this->db->from('DIKLAT_MST_DIKLAT');
		// $this->db->order_by('KODE_DIKLAT');
		
		// $res = $this->db->get();
		
		// $out = '<select name="'.$name.'" id="'.$id.'">';
		// foreach($res->result() as $r){
			// if($r->KODE_DIKLAT == trim($value)){
				// $out .= '<option value="'.$r->KODE_DIKLAT.'" selected="selected">'.$r->NAMA_DIKLAT.'</option>';
			// }else{
				// $out .= '<option value="'.$r->KODE_DIKLAT.'">'.$r->NAMA_DIKLAT.'</option>';
			// }
		// }
		// $out .= '</select>';
		
		// return $out;
	// }
	
	//yan
	function detail_diklat_exist($kode_diklat){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_DETAIL_DIKLAT');
		$this->db->where('KODE_DIKLAT', $kode_diklat);
		
		$res = $this->db->get();
		
		if($res->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function get_detail_diklat($kode_diklat){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_DETAIL_DIKLAT');
		$this->db->where('KODE_DIKLAT', $kode_diklat);
		
		return $this->db->get();
		
	}
	
	function insert_detail($data){
		$this->db->flush_cache();
		
        $this->db->set('DESKRIPSI', $data['DESKRIPSI']);
        $this->db->set('TUJUAN', $data['TUJUAN']);
        $this->db->set('PELUANG', $data['PELUANG']);
        $this->db->set('LAMA', $data['LAMA']);
        $this->db->set('SYARAT', $data['SYARAT']);

		if($data['action'] == 'insert'){
			$this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
			$result = $this->db->insert('DIKLAT_DETAIL_DIKLAT');
		}else{
			$this->db->where('KODE_DIKLAT', $data['KODE_DIKLAT']);
			$result = $this->db->update('DIKLAT_DETAIL_DIKLAT');
		}
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
}
?>