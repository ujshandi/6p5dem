<?php

class MY_Controller extends CI_Controller{
	
	var $privilage_x;	
	
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(false);
		
		// jika belum login
		if (is_login() == FALSE){
			redirect('auth');
		}
		
		// set privilage
		$this->set_privilage();
		
		// jika tidak diperbolehkan mengakses controller
		//$ctr = $this->uri->segment(1);		/*		$ctr = $this->uri->segment(1);
		if ($this->can_access($ctr) == FALSE){
			redirect('auth/failed');
		}         */
		
	}
	
	function open()
	{			//$data = $this->_extract_data_session($_SESSION);				//$data['privilage'] = $this->privilage_x;				
		//$data = $this->_extract_data_session($_SESSION);						        //$data = $_SESSION['dataUser'];					$data = $this->session->userdata('dataUser');					//echo"mycontroler";		        //var_dump($data);exit;							    $query = $this->Authentikasi->listMenuUser($data["USER_ID"]);													$arrGroupingMenu = $this->_listMenuUser($query);																							#print_r($arrGroupingMenu);exit;				$menuUser = $this->build_menu($arrGroupingMenu);				$data['menuUser'] = $menuUser;					//get menu sesuai otoritas user
		$this->load->view('layouts/header');
		$this->load->view('layouts/menu', $data);
	}
	
	function close()
	{
		$this->load->view('layouts/footer');
	}
	
	function set_privilage_asli(){
		// cek user
		$row = $this->session->userdata('userlevel');
		# set privilage
		# init privilage
		//$privilage[''][0] = '';
		
		# ambil privilage dari users_level
		$this->db->flush_cache();
		$this->db->where('level_id', $row);
		$row_pri = $this->db->get('users_level')->row_array();
		
		$fields = $this->db->field_data('users_level');
		foreach($fields as $field){
			if (($field->name != 'level_id') and ($field->name != 'nama'))
			{
				$tmp_pri = str_split($row_pri[$field->name]);
				$privilage[$field->name][0] = $tmp_pri[0];
				$privilage[$field->name][1] = $tmp_pri[1];
				$privilage[$field->name][2] = $tmp_pri[2];
				$privilage[$field->name][3] = $tmp_pri[3];
				$privilage[$field->name][4] = $tmp_pri[4];
				 // echo 'Field : '.$field->name.'&nbsp;&nbsp;&nbsp;0.'.$tmp_pri[0].
												// '&nbsp;&nbsp;&nbsp;1.'.$tmp_pri[1].
												// '&nbsp;&nbsp;&nbsp;2.'.$tmp_pri[2].
												// '&nbsp;&nbsp;&nbsp;3.'.$tmp_pri[3].
												// '&nbsp;&nbsp;&nbsp;4.'.$tmp_pri[4].'<br/>';
			}
		}
		
		$this->privilage_x = $privilage;
	}	  //abah: set user privelege	function set_privilage(){	    //$data = $_SESSION['dataUser'];			$data = $this->session->userdata('dataUser');		$fields = $this->Authentikasi->getUserPrivelege($data["USER_GROUP_ID"]);		    //var_dump($fields);exit;		//foreach($query->result() as		$privilage=null;		foreach($fields->result() as $field){				     		       // var_dump($field);								//echo $field->MENU_URL;				   			    //$tmp_pri = str_split($field->PRIVILEGE);                 $privilage[$field->MENU_URL][0] = SUBSTR($field->PRIVILEGE,0,1);				 $privilage[$field->MENU_URL][1] = SUBSTR($field->PRIVILEGE,1,1);				 $privilage[$field->MENU_URL][2] = SUBSTR($field->PRIVILEGE,2,1);				 $privilage[$field->MENU_URL][3] = SUBSTR($field->PRIVILEGE,3,1);				 $privilage[$field->MENU_URL][4] = SUBSTR($field->PRIVILEGE,4,1);				//$privilage[$field->MENU_URL][0] = $tmp_pri[0];				//$privilage[$field->MENU_URL][1] = $tmp_pri[1];				//$privilage[$field->MENU_URL][2] = $tmp_pri[2];				//$privilage[$field->MENU_URL][3] = $tmp_pri[3];				//$privilage[$field->MENU_URL][4] = $tmp_pri[4];				}				//var_dump($privilage);exit;       $this->privilage_x = $privilage;	}
	
	function can_access($ctr='')
	{	
		$priv = $this->privilage_x;
		$form = $ctr;
		if($form){
			if($priv[$form][0] == 1){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return TRUE;
		}
	}
	
	function can_view()
	{
		$priv = $this->privilage_x;
		$form = $this->uri->segment(1);
		
		if($form){
			if($priv[$form][1] == 1){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return TRUE;
		}
	}
	
	function can_insert()
	{
		$priv = $this->privilage_x;
		$form = $this->uri->segment(1);
		
		if($form){
			if($priv[$form][2] == 1){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return TRUE;
		}
	}
	
	function can_update()
	{
		$priv = $this->privilage_x;
		$form = $this->uri->segment(1);
		
		if($form){
			if($priv[$form][3] == 1){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return TRUE;
		}
	}
	
	function can_delete()
	{
		$priv = $this->privilage_x;
		$form = $this->uri->segment(1);
		
		if($form){
			if($priv[$form][4] == 1){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return TRUE;
		}
	}	
	//abah tambahan function	function _listMenuUser($query){		   // var_dump($query);exit;				$arrGroupingMenu = array();		$groupingMenu = "";								$x = 1;					$parent = 0;        $classcss="";						foreach($query->result() as $row){						if($groupingMenu != $row->MENU_GROUPING_NAME){						$classcss = $this->switchIconGroup($row->MENU_GROUPING_NAME);				 																											$arrGroupingMenu[$x]	= array("text"=>$row->MENU_GROUPING_NAME,												"class"=>$classcss,												"link"=>"#",												"show_condition"=>TRUE,												"parent"=>0);									$parent = $x;				$x++;				$classcss = "";				$arrGroupingMenu[$x]	= array("text"=>$row->MENU_NAME,												"class"=>"",												"link"=>base_url()."index.php/".$row->MENU_URL,												"show_condition"=>TRUE,												"parent"=>$parent);			}else{				$arrGroupingMenu[$x]	= array("text"=>$row->MENU_NAME,												"class"=>"",												"link"=>base_url()."index.php/".$row->MENU_URL,												"show_condition"=>TRUE,												"parent"=>$parent);						}						$groupingMenu = $row->MENU_GROUPING_NAME;			$x++;						}				return $arrGroupingMenu;	}		function switchIconGroup($groupName){	/*		switch($groupName){			case "REFERENSI" : $classcss = "referensi";break;			case "DATA ASET" : $classcss = "dataaset";break;			case "TRANSAKSI RUTIN" : $classcss = "transaksirutin";break;			case "TRANSAKSI PERIODIK" : $classcss = "transaksiperiodik";break;			case "PENETAPAN STATUS" : $classcss = "penetapanstatus";break;			case "PENGHAPUSAN" : $classcss = "penghapusan";break;			case "BARANG IDLE" : $classcss = "barangidle";break;			case "TRANSFER DATA" : $classcss = "transferdata";break;			case "UTILITY" : $classcss = "utility";break;			case "MONITORING" : $classcss = "monitoring";break;			case "MANAJEMEN" : $classcss = "manajemen";break;					}		*/		  $classcss="";		return $classcss;	}					function build_menu ( $menu )	{		$out='';		//echo $out; exit;		//$out = '<div class="container4">' . "\n";		//$out .= '	<div class="menu4">' . "\n";		//$out .= "\n".'<ul>' . "\n";				for ( $i = 1; $i <= count ( $menu ); $i++ )		{			if ( is_array ( $menu [ $i ] ) ) {//must be by construction but let's keep the errors home				if ( $menu [ $i ] [ 'show_condition' ] && $menu [ $i ] [ 'parent' ] == 0 ) {//are we allowed to see this menu?					//$out .= '<li class="' . $menu [ $i ] [ 'class' ] . '"><a href="' . $menu [ $i ] [ 'link' ] . '">';					//<ul class="select"><li><a href="#nogo"><b>Dashboard</b>					$out .= '<ul class="select"><li><a href="' . $menu [ $i ] [ 'link' ] . '"><b>';					$out .= $menu [ $i ] [ 'text' ] ;					$out .= '</b></a>';					$out .= $this->get_childs ( $menu, $i );					$out .= '</li></ul>' ;					$out .= '<div class="nav-divider">&nbsp;</div>';									}			}			else {				die ( sprintf ( 'menu nr %s must be an array', $i ) );			}		}				//$out .= '</ul>'."\n";		//$out .= "\n\t" . '</div>';		//return $out . "\n\t" . '</div>';		//echo $out; exit;		return $out;	}		function get_childs ( $menu, $el_id )	{				$has_subcats = FALSE;		$out = '';		$out .= ' <div class ="select_sub"><ul class="sub">' ;		//$out . = "\n".'     <ul class=\"sub\"> ';				for ( $i = 1; $i <= count ( $menu ); $i++ )		{			if ( $menu [ $i ] [ 'show_condition' ] && $menu [ $i ] [ 'parent' ] == $el_id ) {//are we allowed to see this menu?				$has_subcats = TRUE;				$add_class = ( $this->get_childs ( $menu, $i ) != FALSE ) ? ' subsubl' : '';				//$out .= '		<li class="' . $menu [ $i ] [ 'class' ] . $add_class . '"><a href="' . $menu [ $i ] [ 'link' ] . '">';				$out .= '<li><a href="' . $menu [ $i ] [ 'link' ] . '">';				$out .= $menu [ $i ] [ 'text' ];				$out .= '</a>';				//$out .= $this->get_childs ( $menu, $i );				$out .= '</li>' . "\n";			}		}		$out .= '	</ul></div> ';		return ( $has_subcats ) ? $out : FALSE;	}
}