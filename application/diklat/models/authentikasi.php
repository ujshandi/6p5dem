<?php
/*
 * author :abah
 * cdate : 17 mei 2013
 * 
 * */
//class Authentikasi extends Model{

class Authentikasi extends CI_Model{
	
	//tabel-tabel untuk cek group user dan create menu aplikasi
	//edit sesuai nama tabel di masing-masing aplikasi yaaa
	
	var $table_users = "DIKLAT_USERS";
	var $table_user_group = "DIKLAT_USER_GROUP";
	var $table_user_group_menu = "DIKLAT_USER_GROUP_MENU";
	var $table_menu = "DIKLAT_MENU";
	
		
	function __construct(){
		//parent::CI_Model();
		parent::__construct();
		//$this->obj =& get_instance();
           			 		
	}
	
	function userExist($data){
		$data_array = array_merge($data,array("USERS.STAT"=>"A"));	
		$this->db->select(array('USERNAME','USER_ID','NAME','KD_LOKASI','USER_GROUP_ID','SCOPE', 'USER_FOTO','KDKPKNL'));						
		$query = $this->db->get_where('USERS',$data_array);				
												
		if($query->num_rows() > 0){
			foreach($query->result_array() as $item){
				$dataUser = array(
								 "USER_NAME"=>$item["USERNAME"],
								 "USER_ID"=>$item["USER_ID"],
								 "NAMA_LENGKAP"=>$item["NAME"],
								 "KD_LOKASI"=>$item["KD_LOKASI"],
								 "USER_GROUP_ID"=>$item["USER_GROUP_ID"],
								 "SCOPE"=>$item["SCOPE"], // keterangan dinotes
								 "USER_FOTO"=>$item["USER_FOTO"], //foto											 								
								 "LOGIN"=>TRUE,
								 "KDKPKNL"=>$item["KDKPKNL"]
								 );
			}
			
			### call masa akhir rekonsiliasi per level pengelola
			/*
			if($dataUser["SCOPE"] == "5" || $dataUser["SCOPE"] == "6" || $dataUser["SCOPE"] == "7"){
				$dataperiode = switch_periode_rekon(date("Y"),switch_periode(date("m")));	
				$tglmaxrekon = $this->RefBatasRekon->callTglRekon($dataperiode["thnang"], $dataperiode["periode"], $dataUser["SCOPE"]);
				$arrmaxtgl = array("TGLMAXREKON"=>$tglmaxrekon);				
				if($tglmaxrekon != 0) $dataUser = array_merge($dataUser,$arrmaxtgl);
			}	
			*/			
			return $dataUser;
		}else{
			$query = $this->db->get_where('USERS',$data);					
			if($query->num_rows() > 0){
				foreach($query->result_array() as $item){
					$this->stat = $item["STAT"];				
				}
				if($this->stat == "P") return 1;
				elseif($this->stat == "D") return 2;
			}else{												
				return 0;
			}
		}		
	}
	
	
	function listMenuUser($userid){
	    $sql = "SELECT d.menu_id, d.menu_name, d.menu_url, d.menu_grouping_id FROM $this->table_users a,            
				  $this->table_user_group b, $this->table_user_group_menu c, $this->table_menu d
	               WHERE a.user_group_id = b.user_group_id        
					AND b.user_group_id = c.user_group_id
                    AND c.menu_id = d.menu_id					
					AND a.user_id = '".$userid."' ORDER BY d.menu_grouping_id,d.menu_id";
		//echo "$sql"; exit;
	    return $this->db->query($sql);		
	}
	
	
	function getGroup($data){	
		$query = $this->db->get_where('USER_GROUP',$data);			
        //echo $this->db->last_query(); 
		//ECHO"XXXXXXXXXXXXXXX";
		//echo $query->num_rows(); 
		//ECHO  $query->result_array[0]["USER_GROUP_NAME"];
		//var_dump( $query->result_array);exit;		
		return $query->result_array[0]["USER_GROUP_NAME"];		
	}
	
	function update($values, $where){
   		$sql = $this->db->_update($this->table, $values, $where, $orderby = array(), $limit = FALSE);   		   	
   		//echo $sql; exit;
   		$this->db->query($sql);
   }
   

   
   function getDataUser($userid){
   	$query = $this->db->query("select * from users where user_id='".$userid."'");
		  
		  foreach ($query->result() as $row)
		{
		   $data['email']= $row->EMAIL;
		   $data['name']= $row->NAME;
		   $data['username']= $row->USERNAME;
		}
   	
   	return $data;
   }
   
   function getGroupPengguna($kdLokasi, $scope){
	if ($scope == "4"){//SATKER/UPKPB
		$strSQL = "SELECT KD_LOKASI AS CODE FROM USERS WHERE KD_LOKASI ='".$kdLokasi."'";
	}elseif($scope == "3"){//WIL K/L (UPPB-W)
		$strSQL = "SELECT SUBSTR(KD_LOKASI, 6, 4) AS CODE FROM USERS WHERE KD_LOKASI ='".$kdLokasi."'";
	}elseif($scope == "2"){//E1 K/L (UPPB-E1)
		$strSQL = "SELECT SUBSTR(KD_LOKASI, 4, 2) AS CODE FROM USERS WHERE KD_LOKASI ='".$kdLokasi."'";
	}elseif($scope == "1"){//KL /UPPB
		$strSQL = "SELECT SUBSTR(KD_LOKASI, 0, 3) AS CODE FROM USERS WHERE\ KD_LOKASI ='".$kdLokasi."'";
	}else{
		$strSQL = "SELECT SUBSTR(KD_LOKASI, 0, 3) AS CODE FROM USERS WHERE KD_LOKASI ='".$kdLokasi."'";
	}
	//echo $strSQL;exit;
   //echo $this->db->last_query();exit;
	$query = $this->db->query($strSQL);
    
   $row = $query->row();
    	
	return $row->CODE;
   
   
   }
   
   function getUserPrivelege($usergroup){
      		$sql = " SELECT a.MENU_ID, a.MENU_URL, b.PRIVILEGE FROM MENU a,USER_GROUP_MENU b WHERE a.MENU_ID = b.MENU_ID AND b.USER_GROUP_ID = '".$usergroup."' ORDER BY a.MENU_ID";												
		     //$sql ="SELECT * FROM USER_GROUP_MENU";
		return $this->db->query($sql);		
   
   }
   
    // Cek data user sesuai data di active directory
   	function userExistAD($data){
		$data_array = array_merge($data,array("USERS.STAT"=>"A"));	
		$this->db->select(array('USERNAME','USER_ID','NAME','KD_LOKASI','USER_GROUP_ID','SCOPE', 'USER_FOTO','KDKPKNL'));						
		$query = $this->db->get_where('USERS',$data_array);				
												
		if($query->num_rows() > 0){
			foreach($query->result_array() as $item){
				$dataUser = array(
								 "USER_NAME"=>$item["USERNAME"],
								 "USER_ID"=>$item["USER_ID"],
								 "NAMA_LENGKAP"=>$item["NAME"],
								 "KD_LOKASI"=>$item["KD_LOKASI"],
								 "USER_GROUP_ID"=>$item["USER_GROUP_ID"],
								 "SCOPE"=>$item["SCOPE"], // keterangan dinotes
								 "USER_FOTO"=>$item["USER_FOTO"], //foto											 								
								 "LOGIN"=>TRUE,
								 "KDKPKNL"=>$item["KDKPKNL"]
								 );
			}
			
			### call masa akhir rekonsiliasi per level pengelola
			/*
			if($dataUser["SCOPE"] == "5" || $dataUser["SCOPE"] == "6" || $dataUser["SCOPE"] == "7"){
				$dataperiode = switch_periode_rekon(date("Y"),switch_periode(date("m")));	
				$tglmaxrekon = $this->RefBatasRekon->callTglRekon($dataperiode["thnang"], $dataperiode["periode"], $dataUser["SCOPE"]);
				$arrmaxtgl = array("TGLMAXREKON"=>$tglmaxrekon);				
				if($tglmaxrekon != 0) $dataUser = array_merge($dataUser,$arrmaxtgl);
			}	
			*/			
			return $dataUser;
		}else{
			$query = $this->db->get_where('USERS',$data);					
			if($query->num_rows() > 0){
				foreach($query->result_array() as $item){
					$this->stat = $item["STAT"];				
				}
				if($this->stat == "P") return 1;
				elseif($this->stat == "D") return 2;
			}else{												
				return 0;
			}
		}		
	}
   
	public function get_level(){
		$user = $this->session->userdata("dataUser");
		
		$this->db->select("LEVEL, KODE_UPT");
		$this->db->from("DIKLAT_USERS");
		$this->db->where("USERNAME", $user['USER_NAME']);
		
		$res = $this->db->get();
		
		$ret['LEVEL'] = $res->row()->LEVEL;
		$ret['KODE_UPT'] = $res->row()->KODE_UPT;
		
		return $ret;
	}
   
}
?>
