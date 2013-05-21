<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller
{
	
	function __construct()
	{		parent::__construct();	 		 		//$this->load->model('Authentikasi');		 					
	}
	
	function index()
	{
		# load view
		$this->login();
	}
	function login()	{        //if(isset($_SESSION['login'])){		if (is_login() == TRUE){             			//echo "login ok sukses"; exit; 			//var_dump($_SESSION); exit;			redirect(base_url());		}						# Data		$data['username'] = $this->input->post('username');		$data['password'] = $this->input->post('password');		$data['message'] = '';				# set rules validation		$this->form_validation->set_rules('username', 'username', 'required');		$this->form_validation->set_rules('password', 'password', 'required');				# set message validation		$this->form_validation->set_message('required', 'Field Harus Diisi!');			if ($this->form_validation->run() == FALSE){		// validasi gagal			$this->load->view('users/login_form', $data);		}else{	           //abah: autentikasi user				    $data = $this->Authentikasi->userExist(array('USERS.USERNAME'=>$this->input->post('username', TRUE),'USERS.PASSWORD'=>md5($this->input->post('password', TRUE))));		            //var_dump($data);exit;           		   if(isset($data["USER_NAME"])){				$ext = array();							// group dari user -->				$userGroupMenu = $this->Authentikasi->getGroup(array("USER_GROUP_ID"=>$data["USER_GROUP_ID"]));																	//$userGroupMenu = '';																//$menuUser ='';										/*				## native session								$_SESSION['login'] = 1;									//$_SESSION['menuUser'] = $menuUser;				$_SESSION['userGroupMenu'] = $userGroupMenu;				$_SESSION['dataUser'] = $data;				*/								$this->session->set_userdata("login", "1");				$this->session->set_userdata("userGroupMenu", $userGroupMenu);				$this->session->set_userdata("dataUser", $data);								//var_dump($_SESSION); exit;								/*				$sql=("select * from refupkpb where kdupkpb='".$data['KD_LOKASI']."'");					$query=$this->db->query($sql);				foreach($query->result_array() as $item){					$_SESSION['SATKER']=$item['NMUPKPB'];								}				*/					//echo "login sukses";				//exit;				//echo $data['KD_LOKASI'];exit;																				// asli mknii: redirect(base_url()."main/");				                 redirect(base_url());							}else{				#$captcha = $this->captcha_model->generateCaptcha();				#$_SESSION['captchaWord'] = $captcha['word'];				#$info['captcha'] = $captcha;				/*						switch( $data ){					case "0" : $info["errorLogin"] = "Kombinasi userid/password salah..!!";break;					case "1" : $info["errorLogin"] = "Userid anda belum disetujui untuk masuk aplikasi ..!!";break;					case "2" : $info["errorLogin"] = "Userid sudah kadaluwarsa ..!!";break;				}							*/								//abah mknii: $this->load->view('form_login', $info);								$data2['message'] = 'Akses ditolak!';				$this->load->view('users/login_form', $data2);							}													}	}
	
	function login_asli()
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
	{		/*        $_SESSION['login'] = '';		//$_SESSION['menuUser'] = '';		$_SESSION['userGroupMenu'] = '';		$_SESSION['dataUser'] = '';				session_unset();		session_destroy();		*/						#$this->session->unset_userdata($this->session->userdata);		$this->session->sess_destroy();		//redirect(base_url());		
		//$this->session->sess_destroy();
		redirect(base_url());
	}
	
	
	function failed(){
		echo 'Maaf, Anda tidak memiliki hak untuk mengakses menu ini!';
		echo anchor(base_url(), 'Dashboard');
		echo '<br/>';
		print_r($this->session->userdata('privilage'));
	}	
}
