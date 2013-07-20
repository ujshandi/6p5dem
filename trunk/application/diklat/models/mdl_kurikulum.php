<?
class mdl_kurikulum extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0, $filter){
		# get data
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_KURIKULUM.*, DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_MST_KURIKULUM');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_KURIKULUM.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		
		//filter
		if(!empty($filter['kode_upt']))
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_KURIKULUM.NAMA_KURIKULUM', $filter['search']);
		
		$tmp['row_data'] = $this->db->get();
		
		#get count
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_KURIKULUM.*, DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_MST_KURIKULUM');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_KURIKULUM.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		//$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		
		//filter
		if(!empty($filter['kode_upt']))
			$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $filter['kode_upt']);
		if(!empty($filter['search']))
			$this->db->like('DIKLAT_MST_KURIKULUM.NAMA_KURIKULUM', $filter['search']);
		
		$tmp['row_count'] = $this->db->get()->num_rows();
		
		return $tmp;
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_KURIKULUM');
		$this->db->where('KODE_KURIKULUM', $id);
		
		return $this->db->get();
	}

	function insert($kd_diklat, $kd_upt, $data){
		$this->db->trans_start();
		
		foreach($data as $r){
			$this->db->flush_cache();
			$this->db->set('KODE_KURIKULUM', $r['KODE_KURIKULUM']);
			$this->db->set('NAMA_KURIKULUM', $r['NAMA_KURIKULUM']);
			$this->db->set('SKS_TEORI', $r['SKS_TEORI']);
			$this->db->set('SKS_PRAKTEK', $r['SKS_PRAKTEK']);
			$this->db->set('JAM', $r['JAM']);
			$this->db->set('SEMESTER', $r['SEMESTER']);
			$this->db->set('KODE_DIKLAT', $kd_diklat);
			$this->db->set('KODE_UPT', $kd_upt);

			$result = $this->db->insert('DIKLAT_MST_KURIKULUM');
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
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_KURIKULUM', $data['KODE_KURIKULUM']);
        $this->db->set('NAMA_KURIKULUM', $data['NAMA_KURIKULUM']);
        $this->db->set('SKS_TEORI', $data['SKS_TEORI']);
		$this->db->set('SKS_PRAKTEK', $data['SKS_PRAKTEK']);
		$this->db->set('JAM', $data['JAM']);
		$this->db->set('SEMESTER', $data['SEMESTER']);
		$this->db->set('KODE_DIKLAT', $data['KODE_DIKLAT']);
		$this->db->set('KODE_UPT', $data['KODE_UPT']);
		
		$this->db->where('KODE_KURIKULUM', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_KURIKULUM');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('KODE_KURIKULUM', $id);
		$result = $this->db->delete('DIKLAT_MST_KURIKULUM');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getProgram($kode_upt){
		// get kode induk upt
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_UPT');
		$this->db->where('KODE_UPT', $kode_upt);
		$row = $this->db->get()->row_array();
		$kode_induk = $row['KODE_INDUK'];
		
		// query ke program
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->where('KODE_INDUK', $kode_induk);
		$this->db->order_by('KODE_PROGRAM');
		
		return $this->db->get();
		
	}
	
	function getDiklat($kode_program, $kode_upt){
		// query ke program
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_DIKLAT');
		$this->db->where('KODE_PROGRAM', $kode_program);
		$this->db->where('KODE_UPT', $kode_upt);
		$this->db->order_by('KODE_DIKLAT');
		
		return $this->db->get();
	}
	
	function getKurikulumByDiklat($id){
		$this->db->flush_cache();
		$this->db->select('"a"."KODE_KURIKULUM", "a"."NAMA_KURIKULUM", "a".SKS_TEORI, "a".SKS_PRAKTEK, "a".JAM, "a".SEMESTER, ("a"."SKS_TEORI"+"a"."SKS_PRAKTEK") AS JUMLAH');
		$this->db->from('DIKLAT_MST_KURIKULUM "a"');
		//$this->db->join('DIKLAT_MST_DIKLAT "b"', 'b.KODE_DIKLAT = a.KODE_DIKLAT');
		//$this->db->join('DIKLAT_MST_UPT "c"', 'c.KODE_UPT = b.KODE_UPT');
		$this->db->where('a.KODE_DIKLAT', $id);
		
		return $this->db->get();
		
	}
	
}
?>