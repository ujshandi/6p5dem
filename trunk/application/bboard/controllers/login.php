<?php
/*
 * author : abah  
 * cdate : 13 Mei 2013
 * 
 * */
 
class Login extends Controller {		
	function __construct(){
		parent::Controller();
		$this->load->model('Authentikasi');
		$this->load->model('captcha_model');						
	}
	
		
	function index(){				
		if(isset($_SESSION['login'])){
			$view = 'main';		
			$data = $this->_extract_data_session($_SESSION);						
			show($view, $data);
		}else{
			$info["errorLogin"] = "";
			$captcha = $this->captcha_model->generateCaptcha();
			//print_r($captcha);
			$_SESSION['captchaWord'] = $captcha['word'];
			$info['captcha'] = $captcha;
							
			#print_r($info['captcha']);			
			$this->load->view('form_login',$info);
		}	
	}


	
	function build_menu ( $menu )
	{
		$out = '<div class="container4">' . "\n";
		$out .= '	<div class="menu4">' . "\n";
		$out .= "\n".'<ul>' . "\n";
		
		for ( $i = 1; $i <= count ( $menu ); $i++ )
		{
			if ( is_array ( $menu [ $i ] ) ) {//must be by construction but let's keep the errors home
				if ( $menu [ $i ] [ 'show_condition' ] && $menu [ $i ] [ 'parent' ] == 0 ) {//are we allowed to see this menu?
					$out .= '<li class="' . $menu [ $i ] [ 'class' ] . '"><a href="' . $menu [ $i ] [ 'link' ] . '">';
					$out .= $menu [ $i ] [ 'text' ];
					$out .= '</a>';
					$out .= $this->get_childs ( $menu, $i );
					$out .= '</li>' . "\n";
				}
			}
			else {
				die ( sprintf ( 'menu nr %s must be an array', $i ) );
			}
		}
		
		$out .= '</ul>'."\n";
		$out .= "\n\t" . '</div>';
		return $out . "\n\t" . '</div>';
	}
	
	function get_childs ( $menu, $el_id )
	{
		$has_subcats = FALSE;
		$out = '';
		$out .= "\n".'	<ul>' . "\n";
		for ( $i = 1; $i <= count ( $menu ); $i++ )
		{
			if ( $menu [ $i ] [ 'show_condition' ] && $menu [ $i ] [ 'parent' ] == $el_id ) {//are we allowed to see this menu?
				$has_subcats = TRUE;
				$add_class = ( $this->get_childs ( $menu, $i ) != FALSE ) ? ' subsubl' : '';
				$out .= '		<li class="' . $menu [ $i ] [ 'class' ] . $add_class . '"><a href="' . $menu [ $i ] [ 'link' ] . '">';
				$out .= $menu [ $i ] [ 'text' ];
				$out .= '</a>';
				$out .= $this->get_childs ( $menu, $i );
				$out .= '</li>' . "\n";
			}
		}
		$out .= '	</ul>'."\n";
		return ( $has_subcats ) ? $out : FALSE;
	}
		
	function prosesLogin(){								            								
		//if($_SESSION["captchaWord"] == $this->input->post('confirmCaptcha')){
			$data = $this->Authentikasi->userExist(array('users.username'=>$this->input->post('username', TRUE),'users.password'=>md5($this->input->post('password', TRUE))));		
			if(isset($data["USER_NAME"])){
				$ext = array();			
				// group dari user -->
				$userGroupMenu = $this->Authentikasi->getGroup(array("user_group_id"=>$data["USER_GROUP_ID"]));									
				
				// query menu tergantung user login
				$query = $this->Authentikasi->listMenuUser($data["USER_ID"]);		
							
				$arrGroupingMenu = $this->_listMenuUser($query);		

				#print_r($arrGroupingMenu);exit;
				$menuUser = $this->build_menu($arrGroupingMenu);									
				
						
				## native session				
				$_SESSION['login'] = 1;					
				$_SESSION['menuUser'] = $menuUser;
				$_SESSION['userGroupMenu'] = $userGroupMenu;
				$_SESSION['dataUser'] = $data;
				
				$sql=("select * from refupkpb where kdupkpb='".$data['KD_LOKASI']."'");	
				$query=$this->db->query($sql);
				foreach($query->result_array() as $item){
					$_SESSION['SATKER']=$item['NMUPKPB'];
				}
				//echo $data['KD_LOKASI'];exit;
																
				redirect(base_url()."main/");									
			}else{
				#$captcha = $this->captcha_model->generateCaptcha();
				#$_SESSION['captchaWord'] = $captcha['word'];
				#$info['captcha'] = $captcha;
						
				switch( $data ){
					case "0" : $info["errorLogin"] = "Kombinasi userid/password salah..!!";break;
					case "1" : $info["errorLogin"] = "Userid anda belum disetujui untuk masuk aplikasi ..!!";break;
					case "2" : $info["errorLogin"] = "Userid sudah kadaluwarsa ..!!";break;
				}														
				$this->load->view('form_login', $info);
			}							
		/*}else{
			$captcha = $this->captcha_model->generateCaptcha();
			$_SESSION['captchaWord'] = $captcha['word'];
			$info['captcha'] = $captcha;				
							
			$info["errorLogin"] = "Kode security salah..";
			$this->load->view('form_login', $info);
		}*/
	}
	
	function destroySession(){
		$_SESSION['login'] = '';
		$_SESSION['menuUser'] = '';
		$_SESSION['userGroupMenu'] = '';
		$_SESSION['dataUser'] = '';
		
		session_unset();
		session_destroy();
				
		#$this->session->unset_userdata($this->session->userdata);
		#$this->session->sess_destroy();
		redirect(base_url());
	}
	
	function _listMenuUser($query){
		$arrGroupingMenu = array();
		$groupingMenu = "";						
		$x = 1;			
		$parent = 0;			
		
		foreach($query->result() as $row){			
			if($groupingMenu != $row->MENU_GROUPING_NAME){		
				$classcss = $this->switchIconGroup($row->MENU_GROUPING_NAME);				 																							
				$arrGroupingMenu[$x]	= array("text"=>$row->MENU_GROUPING_NAME,
												"class"=>$classcss,
												"link"=>"#",
												"show_condition"=>TRUE,
												"parent"=>0);					
				$parent = $x;
				$x++;
				$classcss = "";
				$arrGroupingMenu[$x]	= array("text"=>$row->MENU_NAME,
												"class"=>"",
												"link"=>base_url().$row->MENU_URL,
												"show_condition"=>TRUE,
												"parent"=>$parent);
			}else{
				$arrGroupingMenu[$x]	= array("text"=>$row->MENU_NAME,
												"class"=>"",
												"link"=>base_url().$row->MENU_URL,
												"show_condition"=>TRUE,
												"parent"=>$parent);
			
			}			
			$groupingMenu = $row->MENU_GROUPING_NAME;
			$x++;				
		}		
		return $arrGroupingMenu;
	}
	
	function switchIconGroup($groupName){
		switch($groupName){
			case "REFERENSI" : $classcss = "referensi";break;
			case "DATA ASET" : $classcss = "dataaset";break;
			case "TRANSAKSI RUTIN" : $classcss = "transaksirutin";break;
			case "TRANSAKSI PERIODIK" : $classcss = "transaksiperiodik";break;
			case "PENETAPAN STATUS" : $classcss = "penetapanstatus";break;
			case "PENGHAPUSAN" : $classcss = "penghapusan";break;
			case "BARANG IDLE" : $classcss = "barangidle";break;
			case "TRANSFER DATA" : $classcss = "transferdata";break;
			case "UTILITY" : $classcss = "utility";break;
			case "MONITORING" : $classcss = "monitoring";break;
			case "MANAJEMEN" : $classcss = "manajemen";break;
		}
		return $classcss;
	}
		
}