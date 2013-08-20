<?Php class mdashboard extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	public function get_data($p1="",$p2="",$p3="",$p4=""){
		switch($p1){
			case "data_sdm":
				if($p2=='all'){
					$sql="SELECT SDM_PROVINSI.*, 
						(SELECT count(*) FROM SDM_PEG_DINAS WHERE KODEPROVIN = SDM_PROVINSI.KODEPROVIN) as JUMLAH_SDM 
						FROM SDM_PROVINSI ORDER BY KODEPROVIN";
				}
				else{
					$sql="SELECT SDM_PROVINSI.*, 
						(SELECT count(*) FROM SDM_PEG_DINAS WHERE KODEPROVIN = SDM_PROVINSI.KODEPROVIN AND JENIS_KELAMIN = 'Pria') 
						as JUMLAH_SDM_PRIA,
						(SELECT count(*) FROM SDM_PEG_DINAS WHERE KODEPROVIN = SDM_PROVINSI.KODEPROVIN AND JENIS_KELAMIN = 'Wanita') 
						as JUMLAH_SDM_WANITA  
						
						FROM SDM_PROVINSI ORDER BY KODEPROVIN";
				}
				
				//return $this->db->query($sql)->result_array(); 
			break;
			
			case "data_sdm_kab":
					$where='';
					if($p3!=''){
						$where .=" AND JENIS_KELAMIN='".($p3=='W' ? 'Wanita' : 'Pria')."'";
					}
					$sql="SELECT A.*,
					(SELECT count(*) FROM SDM_PEG_DINAS WHERE KODEKABUP = A.KODEKABUP ".$where.") as JUMLAH_SDM 
					FROM SDM_KABUPATEN A
					WHERE A.KODEPROVIN='".$p2."'";
					
			break;
			
			case "get_DIKLAT":
				$where ="";
				$flag=$this->input->post('flag');
				
				if($flag){
					if($flag=='peserta'){$where .=" AND STATUS_PESERTA='Registrasi'";}
					if($flag=='alumni'){$where .=" AND STATUS_PESERTA='Lulus'";}
				}
				$sql="SELECT A.KODE_UPT,A.NAMA_UPT,";
				for($i=$p3;$i<=$p4;$i++){
					$sql .="(SELECT COUNT(KODE_UPT) AS NILAI 
							FROM DIKLAT_MST_PESERTA WHERE KODE_UPT=A.KODE_UPT AND THN_ANGKATAN='".$i."' ".$where.")AS JUMLAH_".$i." ";
					if($i!=$p4){$sql .=',';}
				}
				$sql .="FROM DIKLAT_MST_UPT A
						WHERE A.KODE_INDUK=".$p2;
				
				//echo $sql;exit;
					
			break;
			case "get_DIKLAT_GRAP":
				$where ="";
				$flag=$this->input->post('flag');
				
				if($flag){
					if($flag=='peserta'){$where .=" AND STATUS_PESERTA='Registrasi'";}
					if($flag=='alumni'){$where .=" AND STATUS_PESERTA='Lulus'";}
				}
				$sql="SELECT A.KODE_UPT,A.NAMA_UPT,";
				for($i=$p3;$i<=$p4;$i++){
					$sql .="(SELECT COUNT(KODE_UPT) AS NILAI 
							FROM DIKLAT_MST_PESERTA WHERE KODE_UPT=A.KODE_UPT AND THN_ANGKATAN='".$i."' ".$where.")AS JUMLAH_".$i." ";
					if($i!=$p4){$sql .=',';}
				}
				$sql .="FROM DIKLAT_MST_UPT A
						WHERE A.KODE_INDUK=".$p2;
						
				$sql2="SELECT ";
					for($i=$p3;$i<=$p4;$i++){
						$sql2.=($i!=$p4 ? $i.',SUM(JUMLAH_'.$i.')AS JML_'.$i.',':$i.',SUM(JUMLAH_'.$i.')AS JML_'.$i);
					}	
				$sql2 .=" FROM (".$sql.")";	
				
				return $this->db->query($sql2)->result_array(); 
					
			break;
			case "get_upt":
				$sql="SELECT A.KODE_UPT,A.NAMA_UPT FROM DIKLAT_MST_UPT A WHERE A.KODE_INDUK=".$p2;
					
			break;
			
			
		}
		
		return $this->db->query($sql)->result_array(); 
	}
	
		
	function get_data_grid($p1="",$p2="",$p3="",$p4=""){
		switch ($p1){
			case "data_diklat":
				$induk_upt	 =$this->input->post('induk_upt');
				$program_upt =$this->input->post('program_upt');
				$tahun_akhir =$this->input->post('tahun_akhir');
				$tahun_mulai =$this->input->post('tahun_mulai');
			
				$sql="SELECT A.KODE_UPT,A.NAMA_UPT,";
				for($i=$p3;$i<=$p4;$i++){
					$sql .="(SELECT COUNT(KODE_UPT) AS NILAI 
							FROM DIKLAT_MST_PESERTA WHERE KODE_UPT=A.KODE_UPT AND THN_ANGKATAN='".$i."')AS JUMLAH_".$i." ";
					if($i!=$p4){$sql .=',';}
				}
				$sql .="FROM DIKLAT_MST_UPT A
						WHERE A.KODE_INDUK=".$p2;
			break;
		}
		return $this->get_json($sql);
	}
	
	function get_json($sql){
	
		 $page = (integer) (($this->input->post('page')) ? $this->input->post('page') : "1");
		 $limit = (integer) (($this->input->post('rows')) ? $this->input->post('rows') : "50");
		 
		$count = $this->db->query($sql)->num_rows();
		
		if( $count >0 ) { $total_pages = ceil($count/$limit); } else { $total_pages = 0; } 
		if ($page > $total_pages) $page=$total_pages; 
		$start = $limit*$page - $limit; // do not put $limit*($page - 1)
		if($start<0) $start=0;
		  
		//$sql = $sql . " LIMIT $start,$limit";

		 $data=$this->db->query($sql)->result();  
		  
			if($data){
			   $responce->rows= $data;
			   $responce->total =$count;
			   return json_encode($responce);
			}else{ 
			   return "";
			}   
	
	}
	
	function isi_combo($table,$field_id,$field_display){
		$where=" WHERE 1=1 ";
		$v=$this->input->post('v');
		if($v){if($table=='DIKLAT_MST_PROGRAM')$where .=" AND KODE_INDUK='".$v."'";}
		$sql="select ".$field_id." as id_na ,".$field_display." as text from ".$table.$where;
		//echo $sql;
		return $this->db->query($sql)->result_array();
	}
	//tambahan
	function isi_combo_upt($table,$field_id,$field_display){
		$where=" WHERE 1=1 ";
		$v=$this->input->post('v');
		if($v){if($table=='DIKLAT_MST_UPT')$where .=" AND KODE_INDUK='".$v."'";}
		$sql="select ".$field_id." as id_na ,".$field_display." as text from ".$table.$where;
		//echo $sql;
		return $this->db->query($sql)->result_array();
	}
	
}