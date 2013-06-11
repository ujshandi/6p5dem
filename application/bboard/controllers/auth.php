<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller
{
	
	function __construct()
	{		parent::__construct();	 		 		//$this->load->model('Authentikasi');		// this loads the Auth_AD library. You can also choose to autoload it (see config/autoload.php)		//$this->load->library('auth_ad');
	}
	
	function index()
	{
		# load view
		if (is_login() == TRUE){			redirect(base_url());		}else{			$this->load->view('frontpage/index');		}
	}
	function login()	{		/*        //if(isset($_SESSION['login'])){		if (is_login() == TRUE){             			//echo "login ok sukses"; exit; 			//var_dump($_SESSION); exit;			redirect(base_url());						# Data												}else{			$this->load->view('frontpage/index');		}						*/				$data['username'] = $this->input->post('username');		$data['password'] = $this->input->post('password');		$data['message'] = '';				# set rules validation		$this->form_validation->set_rules('username', 'username', 'required');		$this->form_validation->set_rules('password', 'password', 'required');				# set message validation		$this->form_validation->set_message('required', 'Field Harus Diisi!');			if ($this->form_validation->run() == FALSE){		// validasi gagal			$this->load->view('users/login_form', $data);		}else{	           //abah: autentikasi user				    //abah: autentikasi user	           //cek mode autentikasi, jika ORACLE maka user name di cocokan dengan password di database Oracle			   //jika AD maka user name di cocokan dengan password di Active Directory, dan level akses di set sesuai dengan group user di database Oracle            	 if ($this->config->item('mode_autentikasi') =="ORACLE") {	   		              $data = $this->Authentikasi->userExist(array('USERS.USERNAME'=>$this->input->post('username', TRUE),'USERS.PASSWORD'=>md5($this->input->post('password', TRUE))));		                 }				 else if ($this->config->item('mode_autentikasi') =="AD") {				     if($this->auth_ad->login($this->input->post('username'), $this->input->post('password'))){					     $data = $this->Authentikasi->userExistAD(array('USERS.USERNAME'=>$this->input->post('username', TRUE)));					 }	 				 }				 else{				    $data2['message'] = 'Akses ditolak!, config mode autentikasi belum di set';				    $this->load->view('users/login_form', $data2);				 }         		   if(isset($data["USER_NAME"])){				$ext = array();							// group dari user -->				//$userGroupMenu = $this->Authentikasi->getGroup(array("USER_GROUP_ID"=>$data["USER_GROUP_ID"]));																			## native session								//$_SESSION['login'] = 1;									//$_SESSION['dataUser'] = $data;				$this->session->set_userdata('login', 1);				$this->session->set_userdata('dataUser', $data);                 redirect(base_url());							}else{				#$captcha = $this->captcha_model->generateCaptcha();				#$_SESSION['captchaWord'] = $captcha['word'];				#$info['captcha'] = $captcha;				/*						switch( $data ){					case "0" : $info["errorLogin"] = "Kombinasi userid/password salah..!!";break;					case "1" : $info["errorLogin"] = "Userid anda belum disetujui untuk masuk aplikasi ..!!";break;					case "2" : $info["errorLogin"] = "Userid sudah kadaluwarsa ..!!";break;				}							*/								//abah mknii: $this->load->view('form_login', $info);								$data2['message'] = 'Akses ditolak!';				$this->load->view('users/login_form', $data2);							}													}	}				
	
	function login_asli_mysql()
	{
		if (is_login() == TRUE){
			redirect(base_url());
		}
		
		# Data
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['message'] = '';
		
		# set rules validation
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field Harus Diisi!');
		
		if ($this->form_validation->run() == FALSE){		// validasi gagal
			$this->load->view('users/login_form', $data);
		}else{												// validasi berhasil
			
			// cek user
			$row = $this->mdl_auth->get_user($data['username'], $data['password']);
			
			if ($row->num_rows() > 0){ 										// login sukses
				# set token
				$token = md5($row->row()->userid . time());
				$this->mdl_auth->set_token($row->row()->userid, $token);
				$this->session->set_userdata('token', $token);
				
				// set logged as to session
				$log_as = $this->mdl_auth->get_logged_as($row->row()->userid);
				$this->session->set_userdata('logged_as', $log_as);
				$this->session->set_userdata('userid', $row->row()->userid);
				$this->session->set_userdata('userlevel', $row->row()->level_id);
				$this->session->set_userdata('kodecabang', $row->row()->kode_cabang);
				$this->session->set_userdata('idcabang', $row->row()->id_cabang);
				
				redirect(base_url());
				//print_r($this->session->userdata('privilage'));
				
				
			}else{															// login gagal
				$data['message'] = 'Akses ditolak!';
				$this->load->view('users/login_form', $data);
			}
			
		}
	}
	
	function logout()
	{        // $_SESSION['login'] = '';		// $_SESSION['dataUser'] = '';				// session_unset();		// session_destroy();						$this->session->unset_userdata($this->session->userdata);		$this->session->sess_destroy();		//redirect(base_url());		
		//$this->session->sess_destroy();
		redirect(base_url());
	}
	
	
	function failed(){
		echo 'Maaf, Anda tidak memiliki hak untuk mengakses menu ini!';
		echo anchor(base_url(), 'Dashboard');
		echo '<br/>';
		print_r($this->session->userdata('privilage'));
	}		/////////////////////////////////////////////////////////////////////////////////////////////	////////fungsi-fungsi ke active directory////////////////	///////////////////////////////////////////////////////////////		public function login_ad()	{		// read the form fields, lowercase the username for neatness		$username = strtolower($this->input->post('username'));		$password = $this->input->post('password');				//echo "data diterima: $username --- $password  ";exit;				# Data        /*		$data['username'] = $this->input->post('username');		$data['password'] = $this->input->post('password');		$data['message'] = '';		*/				// check the login		if($this->auth_ad->login($username, $password))		{						// the login was succesful, do your thing here			// upon a succesful login the session will automagically contain some handy user data:			// $this->session->userdata('cn') contains the common name from the AD			// $this->session->userdata('username') contains the username as processed			// $this->session->userdata('dn') contains the distinguished name from the AD			// $this->session->userdata('logged_in') contains a boolean (true)						//login sukses		    //echo "login sukses <br>";exit;						$data = $this->Authentikasi->userExistAD(array('USERS.USERNAME'=>$this->input->post('username', TRUE)));					//var_dump($data);exit;			//cek jika user terdaftar memiliki akses di aplikasi			if(isset($data["USER_NAME"])){					//$_SESSION['login'] = 1;										//$_SESSION['dataUser'] = $data;							$this->session->set_userdata('login', 1);					$this->session->set_userdata('dataUser', $data);					redirect(base_url());				}else{						$data2['message'] = 'Anda tidak terdaftar di aplikasi ini!';				$this->load->view('users/login_form', $data2);							}																	}		else		{			// user could not be authenticated, whoops.			$data['message'] = 'Akses ditolak!';				$this->load->view('users/login_form', $data);					}	}			public function logout_ad()	{		// perform the logout		if($this->session->userdata('logged_in')) 		{			$data['name'] = $this->session->userdata('cn');			$data['username'] = $this->session->userdata('username');			$data['logged_in'] = true;			$this->auth_ad->logout();		} 		else 		{			$data['logged_in'] = false;		}				// now that the logout is done, you can add code for the next step(s) here	}		public function checkloginstatus()	{		// check if the user is already logged in		if(!$this->auth_ad->is_authenticated())		{			// not logged in, do what you need to do here			// you could, for example, send the user to the login form		}		else 		{			// already logged in, forward to the home page or some such		}	}		public function useringroup()	{		// check if the user is a member of a particular group (recursive search)		if ($this->auth_ad->in_group($username, $groupname))		{			// the user is a member of the group		}		else 		{			// nope, not a member		}	}	
}
