<?Php class msdm extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	public function get_data($p1="",$p2="",$p3=""){
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
				
				return $this->db->query($sql)->result_array(); 
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
					return $this->db->query($sql)->result_array(); 
			break;
			
		}
	}
	
}