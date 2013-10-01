<?
class mdl_diklat_kopetensi extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter){
		// yanto
		//$level = get_level();
		
		# get data
		$this->db->flush_cache();
		$this->db->select('KOPETEN_DIKLAT.*, DIKLAT_MST_DIKLAT.NAMA_DIKLAT, KOPETEN_STDR_UDARA.NAMA_STANDAR', false);
		$this->db->from('KOPETEN_DIKLAT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_DIKLAT.KODE_DIKLAT = KOPETEN_DIKLAT.KODE_DIKLAT');
		$this->db->join('KOPETEN_STDR_UDARA', 'KOPETEN_STDR_UDARA.KODE_STANDAR_UDARA = KOPETEN_DIKLAT.KODE_STANDAR_UDARA');
		//$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_DIKLAT.KODE_INDUK = DIKLAT_MST_INDUKUPT.KODE_INDUK');
		$this->db->limit($num, $offset);
		$this->db->order_by('KOPETEN_DIKLAT.KODE_STANDAR_UDARA');
		
		//$this->db->where('DIKLAT_MST_DIKLAT.KODE_INDUK', '3');
		
		#FILTER
		if(!empty($filter['kodekopetensi'])){
			$this->db->where('KODE_STANDAR_UDARA', $filter['kodekopetensi']);
		}
		
		/*if($level['LEVEL'] == 2){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_INDUK', $level['KODE_UPT']);
		}else if($level['LEVEL'] == 3){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_UPT', $level['KODE_UPT']);
		}
		
		#filter
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_DIKLAT.NAMA_DIKLAT', $filter['search']);
		*/
		$tmp['row_data'] = $this->db->get();
		
		# get count
		$this->db->flush_cache();
		$this->db->select('KOPETEN_DIKLAT.*, DIKLAT_MST_DIKLAT.NAMA_DIKLAT, KOPETEN_STDR_UDARA.NAMA_STANDAR', false);
		$this->db->from('KOPETEN_DIKLAT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_DIKLAT.KODE_DIKLAT = KOPETEN_DIKLAT.KODE_DIKLAT');
		$this->db->join('KOPETEN_STDR_UDARA', 'KOPETEN_STDR_UDARA.KODE_STANDAR_UDARA = KOPETEN_DIKLAT.KODE_STANDAR_UDARA');
		//$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_DIKLAT.KODE_INDUK = DIKLAT_MST_INDUKUPT.KODE_INDUK');
		$this->db->limit($num, $offset);
		$this->db->order_by('KOPETEN_DIKLAT.KODE_STANDAR_UDARA');
		
		//$this->db->where('DIKLAT_MST_DIKLAT.KODE_INDUK', '3');
		
		if(!empty($filter['kodekopetensi'])){
			$this->db->where('KODE_STANDAR_UDARA', $filter['kodekopetensi']);
		}
		
		/*if($level['LEVEL'] == 2){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_INDUK', $level['KODE_UPT']);
		}else if($level['LEVEL'] == 3){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_UPT', $level['KODE_UPT']);
		}
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_DIKLAT.NAMA_DIKLAT', $filter['search']);
		*/	
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
        //$this->db->set('NAMA_DIKLAT', $data['NAMA_DIKLAT']);
        $this->db->set('KODE_STANDAR_UDARA', $data['KODE_STANDAR_UDARA']);
        //$this->db->set('KODE_UPT', $data['KODE_UPT']);
        //$this->db->set('KODE_INDUK', $data['KODE_INDUK']);

        $result = $this->db->insert('KOPETEN_DIKLAT');

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
	
	function getOptionKopetensiChild($d=""){
		
		// yanto
		//$level = get_level();
		
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('KOPETEN_STDR_UDARA');
		$this->db->order_by('KODE_STANDAR_UDARA');
		
		//yanto
		/*$out = '';
		if($level['LEVEL'] == 2){ // induk upt
			$this->db->where('KODE_INDUK', $level['KODE_UPT']);
		}else if($level['LEVEL'] == 3){ // upt
			$this->db->where('KODE_UPT', $level['KODE_UPT']);
		}*/
		
		$res = $this->db->get();
		
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
				if(trim($r->KODE_STANDAR_UDARA) == trim($value)){
						$out .= '<option value="'.$r->KODE_STANDAR_UDARA.'" selected="selected">'.$r->NAMA_STANDAR.'</option>';
				}else{
						$out .= '<option value="'.$r->KODE_STANDAR_UDARA.'">'.$r->NAMA_STANDAR.'</option>';
				}
		}
		
		return $out;
	}
	
	function getOptionDiklatChild($d=""){
		
		// yanto
		//$level = get_level();
		
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_DIKLAT');
		$this->db->order_by('KODE_DIKLAT');
		
		//yanto
		/*$out = '';
		if($level['LEVEL'] == 2){ // induk upt
			$this->db->where('KODE_INDUK', $level['KODE_UPT']);
		}else if($level['LEVEL'] == 3){ // upt
			$this->db->where('KODE_UPT', $level['KODE_UPT']);
		}*/
		
		$res = $this->db->get();
		
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
				if(trim($r->KODE_DIKLAT) == trim($value)){
						$out .= '<option value="'.$r->KODE_DIKLAT.'" selected="selected">'.$r->NAMA_DIKLAT.'</option>';
				}else{
						$out .= '<option value="'.$r->KODE_DIKLAT.'">'.$r->NAMA_DIKLAT.'</option>';
				}
		}
		
		return $out;
	}
}
?>