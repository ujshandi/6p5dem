<?php

class MY_Controller extends CI_Controller{
	var $privilage_x;
	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(true);
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
	function open(){		//$data = $this->session->userdata('dataUser');			//@echo"mycontroler";		//@var_dump($data);exit;				//$query = $this->Authentikasi->listMenuUser($data["USER_ID"]);									//$arrGroupingMenu = $this->_listMenuUser($query);																					#print_r($arrGroupingMenu);exit;		//$menuUser = $this->build_menu($arrGroupingMenu);		//$data['menuUser'] = $menuUser;					//get menu sesuai otoritas user
		$this->load->view('layout/header');
		//$this->load->view('layout/menu', $data);		$this->load->view('layout/menu');
	}
	
	function close(){
		$this->load->view('layout/footer');
	}
}