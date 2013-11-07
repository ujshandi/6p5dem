<?
class mdl_dosen_front extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter){
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DOSEN.*', false);
		$this->db->from('DIKLAT_MST_DOSEN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_DOSEN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_DOSEN.IDDOSEN');
		
		// yanto
		if(!empty($filter['kode_upt'])){
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		}
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_DOSEN.NAMADOSEN', $filter['search']);
		
		if(!empty($filter['jenis_dosen']))
			$this->db->where('DIKLAT_MST_DOSEN.JENIS_DOSEN', $filter['jenis_dosen']);
		//echo $filter['search'];
		
		$tmp['row_data'] = $this->db->get();
		
		# get count
		$this->db->flush_cache();
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_DOSEN.*', false);
		$this->db->from('DIKLAT_MST_DOSEN');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_DOSEN.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		// $this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_DOSEN.IDDOSEN');
		
		// yanto
		if(!empty($filter['kode_upt'])){
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		}
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_DOSEN.NAMADOSEN', $filter['search']);
			
		if(!empty($filter['jenis_dosen']))
			$this->db->where('DIKLAT_MST_DOSEN.JENIS_DOSEN', $filter['jenis_dosen']);
		//echo $filter['search'];
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
	}
	
	/*function insert($data){
		$this->db->flush_cache();
		$this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('IDPESERTA', $data['IDPESERTA']);
        $this->db->set('TGL_LULUS', $data['TGL_LULUS'], false);
        $this->db->set('KERJA', $data['KERJA']);
        $this->db->set('INSTANSI', $data['INSTANSI']);
        

        $result = $this->db->insert('DIKLAT_MST_ALUMNI');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_ALUMNI');
		$this->db->where('ID_ALUMNI', $id);
		
		return $this->db->get();
	}

	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('IDPESERTA', $data['IDPESERTA']);
        $this->db->set('TGL_LULUS', $data['TGL_LULUS'], false);
        $this->db->set('KERJA', $data['KERJA']);
        $this->db->set('INSTANSI', $data['INSTANSI']);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);

		$this->db->where('ID_ALUMNI', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_ALUMNI');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('ID_ALUMNI', $id);
		$result = $this->db->delete('DIKLAT_MST_ALUMNI');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getUPT(){
		$result = $this->db->get('DIKLAT_MST_UPT');
		if ($result->num_rows() > 0){
			return $result->result_array();
		}
		else{
			return array();
		}
	}
	
	function getOptionPesertaByUPT($d){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		$KODE_UPT = isset($d['KODE_UPT'])?$d['KODE_UPT']:'';
		
		$this->db->flush_cache();
		$this->db->where('KODE_UPT', $KODE_UPT);
		$this->db->where('STATUS_PESERTA', 'Lulus');
		$result = $this->db->get('DIKLAT_MST_PESERTA');
	
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		$out .= '<option value="" selected="selected">-- Pilih --</option>';
		foreach($result->result() as $r){
				if(trim($r->NO_PESERTA) == trim($value)){
						$out .= '<option value="'.$r->NO_PESERTA.'" selected="selected">'.$r->NAMA_PESERTA.'</option>';
				}else{
						$out .= '<option value="'.$r->NO_PESERTA.'">'.$r->NAMA_PESERTA.'</option>';
				}
		}
		$out .= '</select>';
		
		return $out;
	
	}
	
	function getAlumniByUPT($upt){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_ALUMNI.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_PESERTA.NO_PESERTA, DIKLAT_MST_PESERTA.NAMA_PESERTA, DIKLAT_MST_PESERTA.STATUS_PESERTA', false);
		$this->db->from('DIKLAT_MST_ALUMNI');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_ALUMNI.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		//$this->db->join('DIKLAT_PESERTA_DIKLAT', 'DIKLAT_MST_ALUMNI.IDPESERTA = DIKLAT_PESERTA_DIKLAT.IDPESERTA');
		$this->db->join('DIKLAT_MST_PESERTA', 'DIKLAT_MST_ALUMNI.IDPESERTA = DIKLAT_MST_PESERTA.NO_PESERTA');
		$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $upt);
		$this->db->order_by('NAMA_PESERTA');		
		return $this->db->get();
		
	}
	
	function UpdateAlumni($data){
		$this->db->trans_start();
		
		foreach($data as $r){
			$this->db->flush_cache();
			$this->db->set('TGL_LULUS', 'Lulus');
			
			$this->db->where('IDPESERTA', $r['IDPESERTA']);

			$result = $this->db->update('DIKLAT_MST_ALUMNI');
		}
		
		// $errNo   = $this->db->_error_number();
	    // $errMess = $this->db->_error_message();
		// $error = $errMess;
		
		//var_dump($errMess);die;
	    //log_message("error", "Problem Inserting to : ".$errMess." (".$errNo.")"); 
		
		//return
		$this->db->trans_complete();
	    return $this->db->trans_status();
	}*/
	
}
?>