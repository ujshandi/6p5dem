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
		
		// jika tidak diperbolehkan mengakses controller
		if ($this->can_access($ctr) == FALSE){
			redirect('auth/failed');
		}
	}
	function open(){
		$this->load->view('layout/header',$data);
		$this->load->view('layout/menu', $data);
	}
	
	function close(){
		$this->load->view('layout/footer');
	}
}