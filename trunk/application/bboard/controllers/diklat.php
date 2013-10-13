<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class diklat extends My_Frontpage {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_diklat_front');
	}
	
	public function index()
	{
		$this->open();
		
		$this->load->view('diklat/diklat_list');
		
		$this->close();
	}
	
}
