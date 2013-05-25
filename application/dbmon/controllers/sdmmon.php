<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sdmmon extends My_Controller {
	
	function __construct(){
		parent::__construct();
		//$this->load->model('mdl_satker');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/satker/index/';
		$this->load->view('sdm/sdm_dinas');
		
		$this->close();
	}
	
}
