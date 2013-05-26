<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends My_Controller {
	
	function __construct(){
		parent::__construct();
		//$this->load->model('mdl_golongan');
	}
	
	public function test(){
		echo 'test';
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/home/index/';
		$this->load->view('home');
		
		
		$this->close();
	}
}
?>