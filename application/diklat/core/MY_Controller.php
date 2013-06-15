<?php

class MY_Controller extends CI_Controller{
	var $privilage_x;
	public function __construct(){
		parent::__construct();		$this->output->enable_profiler(false);		//$this->output->enable_profiler(true);
		# cek login
		// if (is_login() == FALSE){
			// redirect('auth');
		// }		
		# set privilage
		//$this->set_privilage();
		
		// jika tidak diperbolehkan mengakses controller		/*		$ctr = $this->uri->segment(1);
		if ($this->can_access($ctr) == FALSE){
			redirect('auth/failed');
		}         */
	}
	function open(){		//$data = $this->session->userdata('dataUser');			//@echo"mycontroler";		//@var_dump($data);exit;				//get menu sesuai otoritas user		//$data = $_SESSION['dataUser'];		$data = $this->session->userdata('dataUser');		$query = $this->Authentikasi->listMenuUser($data["USER_ID"]);									$arrGroupingMenu = $this->_listMenuUser($query);																					//print_r($arrGroupingMenu);exit;		$menuUser = $this->build_menu($arrGroupingMenu);		$data['menuUser'] = $menuUser;				
		$this->load->view('layout/header',$data);
		$this->load->view('layout/menu', $data);		//$this->load->view('layout/menu');
	}	function openfront(){		$this->load->view('layoutfront/header');		$this->load->view('layoutfront/menu');	}
	
	function close(){
		$this->load->view('layout/footer');
	}		function closefront(){		$this->load->view('layoutfront/footer');	}			////////fungsi fungsi untuk create menu////////	function _listMenuUser($query){		   // var_dump($query);exit;				$arrGroupingMenu = array();		$groupingMenu = "";								$x = 1;					$parent = 0;        $classcss="";						foreach($query->result() as $row){						if($groupingMenu != $row->MENU_GROUPING_ID){						//$classcss = $this->switchIconGroup($row->MENU_NAME);				 																											$arrGroupingMenu[$x]	= array("text"=>$row->MENU_NAME,												"class"=>$classcss,												"link"=>base_url().$this->config->item('index_page').'/'.$row->MENU_URL,												"show_condition"=>TRUE,												"parent"=>0);									$parent = $x;								}else{				$arrGroupingMenu[$x]	= array("text"=>$row->MENU_NAME,												"class"=>"",												"link"=>base_url().$this->config->item('index_page').'/'.$row->MENU_URL,												"show_condition"=>TRUE,												"parent"=>$parent);						}						$groupingMenu = $row->MENU_GROUPING_ID;			$x++;						}			//var_dump($arrGroupingMenu);exit;		return $arrGroupingMenu;	}				function build_menu ( $menu )	{		$out='';			for ( $i = 1; $i <= count ( $menu ); $i++ )		{			if ( is_array ( $menu [ $i ] ) ) {//must be by construction but let's keep the errors home				if ( $menu [ $i ] [ 'show_condition' ] && $menu [ $i ] [ 'parent' ] == 0 ) {//are we allowed to see this menu?					 					$out .= '<li><a href= "' . $menu [ $i ] [ 'link' ] . '">';					$out .= $menu [ $i ] [ 'text' ] ;					$out .= '</a>';					$out .= $this->get_childs ( $menu, $i );					$out .= '</li>';									}			}			else {				die ( sprintf ( 'menu nr %s must be an array', $i ) );			}		}		return $out;	}		function get_childs ( $menu, $el_id )	{				$has_subcats = FALSE;		$out = '';		$out .= '<ul>' ;				for ( $i = 1; $i <= count ( $menu ); $i++ )		{			if ( $menu [ $i ] [ 'show_condition' ] && $menu [ $i ] [ 'parent' ] == $el_id ) {//are we allowed to see this menu?				$has_subcats = TRUE;				$add_class = ( $this->get_childs ( $menu, $i ) != FALSE ) ? ' subsubl' : '';				$out .= '<li><a href="' . $menu [ $i ] [ 'link' ] . '">';				$out .= '&nbsp;&nbsp;&nbsp';				$out .= $menu [ $i ] [ 'text' ];				$out .= '</a>';				//$out .= $this->get_childs ( $menu, $i );				$out .= '</li>' . "\n";			}		}		$out .= ' </ul> ';		return ( $has_subcats ) ? $out : FALSE;	}
}