<?
class mdl_alumni extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter,$sort_by, $sort_order){
		// yanto
		$level = get_level();
		
		##sorting
		//$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
		//$sort_columns = array('NAMA_SARPRAS', 'JUMLAH', 'TAHUN');
		//$sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'NAMA_SARPRAS';
		##
		
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_ALUMNI.ID_ALUMNI,DIKLAT_MST_ALUMNI.KERJA,DIKLAT_MST_ALUMNI.INSTANSI,DIKLAT_MST_ALUMNI.TGL_LULUS,DIKLAT_MST_ALUMNI.NO_PESERTA, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_PESERTA.NAMA_PESERTA, DIKLAT_MST_PESERTA.STATUS_PESERTA, DIKLAT_MST_DIKLAT.NAMA_DIKLAT,DIKLAT_MST_PESERTA.THN_ANGKATAN', false);
		$this->db->from('DIKLAT_MST_ALUMNI');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_ALUMNI.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_PESERTA', 'DIKLAT_MST_ALUMNI.NO_PESERTA = DIKLAT_MST_PESERTA.NO_PESERTA');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_PESERTA.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		$this->db->limit($num, $offset);
		##sorting
		$this->db->order_by($sort_by, $sort_order);
		##
		
		// yanto
		if(!empty($filter['kode_upt'])){
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		}else{
			if($level['LEVEL'] == 2){
				$this->db->where('DIKLAT_MST_UPT.KODE_INDUK', $level['KODE_UPT']);
			}else if($level['LEVEL'] == 3){
				$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $level['KODE_UPT']);
			}
		}
		
		if(!empty($filter['kode_diklat'])){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_DIKLAT', $filter['kode_diklat']);
		}
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_PESERTA.NAMA_PESERTA', $filter['search']);
		//echo $filter['search'];
		
		$tmp['row_data'] = $this->db->get();
		
		# get count
		//$this->db->flush_cache();
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_ALUMNI.ID_ALUMNI, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_PESERTA.NAMA_PESERTA, DIKLAT_MST_PESERTA.STATUS_PESERTA, DIKLAT_MST_DIKLAT.NAMA_DIKLAT', false);
		$this->db->from('DIKLAT_MST_ALUMNI');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_ALUMNI.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_PESERTA', 'DIKLAT_MST_ALUMNI.NO_PESERTA = DIKLAT_MST_PESERTA.NO_PESERTA');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_PESERTA.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		//$this->db->limit($num, $offset);
		//$this->db->order_by('DIKLAT_MST_ALUMNI.ID_ALUMNI');
		
		// yanto
		if(!empty($filter['kode_upt'])){
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		}else{
			if($level['LEVEL'] == 2){
				$this->db->where('DIKLAT_MST_UPT.KODE_INDUK', $level['KODE_UPT']);
			}else if($level['LEVEL'] == 3){
				$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $level['KODE_UPT']);
			}
		}
		
		if(!empty($filter['kode_diklat'])){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_DIKLAT', $filter['kode_diklat']);
		}
		
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_PESERTA.NAMA_PESERTA', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
		
	}
	
	function insert($data){
		$this->db->flush_cache();
		$this->db->set('KODE_UPT', $data['KODE_UPT']);
        $this->db->set('NO_PESERTA', $data['NO_PESERTA']);
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
        $this->db->set('NO_PESERTA', $data['NO_PESERTA']);
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
	
		$value = isset($d['value'])?$d['value']:'';
		$KODE_UPT = isset($d['KODE_UPT'])?$d['KODE_UPT']:'';
		
		$this->db->flush_cache();
		$this->db->where('KODE_UPT', $KODE_UPT);
		$this->db->where('STATUS_PESERTA', 'Lulus');
		$result = $this->db->get('DIKLAT_MST_PESERTA');
	
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out .= '<option value="" selected="selected">-- Pilih --</option>';
		foreach($result->result() as $r){
				if(trim($r->NO_PESERTA) == trim($value)){
						$out .= '<option value="'.$r->NO_PESERTA.'" selected="selected">'.$r->NAMA_PESERTA.'</option>';
				}else{
						$out .= '<option value="'.$r->NO_PESERTA.'">'.$r->NAMA_PESERTA.'</option>';
				}
		}
		//$out .= '</select>';
		
		return $out;
	
	}
	
	function getAlumniByUPT($upt){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_ALUMNI.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_PESERTA.NO_PESERTA, DIKLAT_MST_PESERTA.NAMA_PESERTA, DIKLAT_MST_PESERTA.STATUS_PESERTA', false);
		$this->db->from('DIKLAT_MST_ALUMNI');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_ALUMNI.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		//$this->db->join('DIKLAT_PESERTA_DIKLAT', 'DIKLAT_MST_ALUMNI.IDPESERTA = DIKLAT_PESERTA_DIKLAT.IDPESERTA');
		$this->db->join('DIKLAT_MST_PESERTA', 'DIKLAT_MST_ALUMNI.NO_PESERTA = DIKLAT_MST_PESERTA.NO_PESERTA');
		$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $upt);
		$this->db->order_by('NAMA_PESERTA');		
		return $this->db->get();
		
	}
	
	function InsertAlumni($data){
		$this->db->trans_start();
		
		foreach($data as $r){
			if(isset($r['NO_PESERTA'])){
				$this->db->flush_cache();
				$this->db->set('NO_PESERTA', $r['NO_PESERTA']);
				//$this->db->set('TGL_LULUS', "to_date('".$r['TGL_LULUS']."', 'dd/mm/yyyy')", FALSE);
				$this->db->set('TGL_LULUS', $r['TGL_LULUS']);
				$this->db->set('KERJA', $r['KERJA']);
				$this->db->set('INSTANSI', $r['INSTANSI']);
				$this->db->set('KODE_UPT', $r['KODE_UPT']);
				
				$result = $this->db->insert('DIKLAT_MST_ALUMNI');
			}
		}
		
		// $errNo   = $this->db->_error_number();
	    // $errMess = $this->db->_error_message();
		// $error = $errMess;
		
		//var_dump($errMess);die;
	    //log_message("error", "Problem Inserting to : ".$errMess." (".$errNo.")"); 
		
		//return
		$this->db->trans_complete();
	    return $this->db->trans_status();
	}
	
	function getOptionStatus($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$res = array('Kerja','Belum Kerja');
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		//$out = '<option value="" selected="selected">-- Pilih --</option>';
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
	
	function get_pdf($filter){
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_ALUMNI.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_PESERTA.NAMA_PESERTA, DIKLAT_MST_PESERTA.STATUS_PESERTA, DIKLAT_MST_DIKLAT.NAMA_DIKLAT', false);
		$this->db->from('DIKLAT_MST_ALUMNI');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_ALUMNI.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_PESERTA', 'DIKLAT_MST_ALUMNI.NO_PESERTA = DIKLAT_MST_PESERTA.NO_PESERTA');
		$this->db->join('DIKLAT_MST_DIKLAT', 'DIKLAT_MST_PESERTA.KODE_DIKLAT = DIKLAT_MST_DIKLAT.KODE_DIKLAT');
		$this->db->order_by('DIKLAT_MST_ALUMNI.ID_ALUMNI');
		
		// yanto
		if(!empty($filter['kode_upt'])){
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		}
		if(!empty($filter['kode_diklat'])){
			$this->db->where('DIKLAT_MST_DIKLAT.KODE_DIKLAT', $filter['kode_diklat']);
		}
		
		// proses
		$result = $this->db->get();
		
		$i=0;
		foreach($result->result() as $row){
			$pdfdata[$i][0] = $i +1;
			$pdfdata[$i][1] = $row->NO_PESERTA;
			$pdfdata[$i][2] = $row->NAMA_PESERTA;
			$pdfdata[$i][3] = $row->KERJA;
			$pdfdata[$i][4] = $row->INSTANSI;
			$pdfdata[$i][5] = $row->TGL_LULUS;
			$pdfdata[$i][6] = $row->NAMA_UPT;
			$pdfdata[$i][7] = $row->NAMA_DIKLAT;
			$i++;
		}
		
		return $pdfdata;
		
	}
	
}
?>