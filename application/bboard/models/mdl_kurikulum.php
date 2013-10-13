<?
class mdl_kurikulum extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter){
		// yanto
		//$level = get_level();
		
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_KURIKULUM.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DIKLAT.NAMA_DIKLAT', false);
		$this->db->from('DIKLAT_MST_KURIKULUM');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_KURIKULUM.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_KURIKULUM.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		
		// yanto
		if(!empty($filter['kode_upt'])){
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		}/*else{
			if($level['LEVEL'] == 2){
				$this->db->where('DIKLAT_MST_UPT.KODE_INDUK', $level['KODE_UPT']);
			}else if($level['LEVEL'] == 3){
				$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $level['KODE_UPT']);
			}
		}*/
		
		if(!empty($filter['kode_diklat'])){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_DIKLAT', $filter['kode_diklat']);
		}
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_KURIKULUM.NAMA_KURIKULUM', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();
		
		#get count
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_KURIKULUM.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DIKLAT.NAMA_DIKLAT', false);
		$this->db->from('DIKLAT_MST_KURIKULUM');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_KURIKULUM.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_KURIKULUM.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		
		// yanto
		if(!empty($filter['kode_upt'])){
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		}/*else{
			if($level['LEVEL'] == 2){
				$this->db->where('DIKLAT_MST_UPT.KODE_INDUK', $level['KODE_UPT']);
			}else if($level['LEVEL'] == 3){
				$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $level['KODE_UPT']);
			}
		}*/
		
		if(!empty($filter['kode_diklat'])){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_DIKLAT', $filter['kode_diklat']);
		}
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_KURIKULUM.NAMA_KURIKULUM', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
	}
	
	function getOptionDiklatByUPT($d){
	
		$value = isset($d['value'])?$d['value']:'';
		$KODE_UPT = isset($d['KODE_UPT'])?$d['KODE_UPT']:'';
		
		$this->db->flush_cache();
		$this->db->where('KODE_UPT', $KODE_UPT==0?'':$KODE_UPT);
		$result = $this->db->get('DIKLAT_MST_DIKLAT');
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($result->result() as $r){
				if(trim($r->KODE_DIKLAT) == trim($value)){
						$out .= '<option value="'.$r->KODE_DIKLAT.'" selected="selected">'.$r->NAMA_DIKLAT.'</option>';
				}else{
						$out .= '<option value="'.$r->KODE_DIKLAT.'">'.$r->NAMA_DIKLAT.'</option>';
				}
		}
		//$out .= '</select>';
		
		return $out;
	
	}
	
	function getOptionUPTChild($d=""){
		
		// yanto
		//$level = get_level();
		
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->order_by('URUTAN');
		
		//yanto
		$out = '';
		// if($level['LEVEL'] == 2){ // induk upt
			// $this->db->where('KODE_INDUK', $level['KODE_UPT']);
		// }else if($level['LEVEL'] == 3){ // upt
			// $this->db->where('KODE_UPT', $level['KODE_UPT']);
		// }
		
		$res = $this->db->get();
		
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($res->result() as $r){
				if(trim($r->KODE_UPT) == trim($value)){
						$out .= '<option value="'.$r->KODE_UPT.'" selected="selected">'.$r->NAMA_UPT.'</option>';
				}else{
						$out .= '<option value="'.$r->KODE_UPT.'">'.$r->NAMA_UPT.'</option>';
				}
		}
		
		return $out;
	}
	
	
}
?>