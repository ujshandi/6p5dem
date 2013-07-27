<?Php class mjdih extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	public function get_data($p1="",$p2="",$p3="",$p4=""){
		$where ="WHERE 1=1 ";
		switch($p1){
			case "data_peraturan":
				if($p2){$where .=" AND A.ID_PRODUK_HUKUM='".$p2."'";}
				if($p3){$where .=" AND A.TAHUN='".$p3."'";}
				//if($p4){$where .=" AND A.STATUS_F='".$p4."'";}
				$sql="SELECT A.*,B.NAMA_PRODUK_HUKUM,C.TEMATIK FROM JDIH_D_PRODUK_HUKUM A 
						LEFT JOIN JDIH_M_PRODUK_HUKUM B ON B.ID=A.ID_PRODUK_HUKUM
						LEFT JOIN JDIH_M_TEMATIK C ON A.ID_TEMATIK=C.ID ".$where." AND A.APPROVAL='Y' 
						ORDER BY A.TAHUN ASC
						";
			break;
			case "get_tahun":
				if($p2){$where .=" AND A.ID_PRODUK_HUKUM='".$p2."'";}
				$sql="SELECT A.TAHUN FROM JDIH_D_PRODUK_HUKUM A ".$where." GROUP BY A.TAHUN ORDER BY A.TAHUN ASC";
			break;
			
			case "m_tentang_kami":
				
				$sql="SELECT * FROM JDIH_M_TENTANG_KAMI A ".$where;
				return $this->db->query($sql)->row(); 
			break;
			case "m_faq":
				
				$sql="SELECT * FROM JDIH_M_FAQ A ".$where." AND A.APPROVAL='Y'";
				
			break;
			
			case "data_peraturan_home":
				$kat=$this->input->post('kat');
				$tematik=$this->input->post('tematik');
				$key=$this->input->post('key');
				if($kat){$where .=" AND A.ID_PRODUK_HUKUM='".$kat."'";}
				if($tematik){$where .=" AND A.ID_TEMATIK='".$tematik."'";}
				if($key){$where .=" AND A.JUDUL like '%".$key."%' OR A.DESKRIPSI like '%".$key."%'";}
				$sql="SELECT ROWNUM AS myROW,A.*,B.NAMA_PRODUK_HUKUM,C.TEMATIK,
						CASE 
							WHEN A.ID_PRODUK_HUKUM=1 THEN 'undang_undang'
							WHEN A.ID_PRODUK_HUKUM=2 THEN 'peraturan_pemerintah'
							WHEN A.ID_PRODUK_HUKUM=3 THEN 'peraturan_presiden'
							WHEN A.ID_PRODUK_HUKUM=4 THEN 'instruksi_presiden'
							WHEN A.ID_PRODUK_HUKUM=5 THEN 'keputusan_presiden'
							WHEN A.ID_PRODUK_HUKUM=6 THEN 'peraturan_menteri'
							WHEN A.ID_PRODUK_HUKUM=7 THEN 'keputusan_menteri'
							WHEN A.ID_PRODUK_HUKUM=8 THEN 'lain_lain'
							WHEN A.ID_PRODUK_HUKUM=9 THEN 'keputusan_dirjen'
							WHEN A.ID_PRODUK_HUKUM=10 THEN 'surat_edaran_dirjen'
						ELSE 'NAN'
						END AS FOLDER_NA
						 FROM JDIH_D_PRODUK_HUKUM A 
						LEFT JOIN JDIH_M_PRODUK_HUKUM B ON B.ID=A.ID_PRODUK_HUKUM
						LEFT JOIN JDIH_M_TEMATIK C ON A.ID_TEMATIK=C.ID ".$where." AND A.APPROVAL='Y' 
						ORDER BY A.TAHUN ASC
						";
				return $this->get_json($sql);
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
	
	  $page = (integer)(($this->input->post('page')) ? $this->input->post('page') : "1");
      $limit = (integer)(($this->input->post('rows')) ? $this->input->post('rows') : "10");
      $sqlt = "SELECT count(*) as TOTAL
						FROM (".$sql.") A
						";
      $count = $this->db->query($sqlt)->row("TOTAL");
      if($count > 0){
        $total_pages = ceil($count / $limit);
      }else{
        $total_pages = 0;
      }
      if($page > $total_pages)
        $page = $total_pages;



     // $start = $this->input->post('start');
	$start = $limit*$page - $limit; 
	if($start<0) $start=0;

      $end = $start + $limit;
      $start++;

      $sql = "SELECT * FROM (".$sql.")
				WHERE myROW BETWEEN $start AND $end";


      return json_encode(array("total" => $count
                  , "rows" => $this->db->query($sql)->result_array()));
	}
	
	function isi_combo($table,$field_id,$field_display){
		$where=" WHERE 1=1 ";
		$v=$this->input->post('v');
		if($v){if($table=='DIKLAT_MST_PROGRAM')$where .=" AND KODE_INDUK='".$v."'";}
		$sql="select ".$field_id." as id_na ,".$field_display." as text from ".$table.$where;
		//echo $sql;
		return $this->db->query($sql)->result_array();
	}
	
}