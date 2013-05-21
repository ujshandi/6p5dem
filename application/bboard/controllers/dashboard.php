<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends My_Controller
{
	function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'index.php/dashboard/index/';
		
		$this->pagination->initialize($config);	
		# end config pagination
		
		
		# load view
		$this->load->view('dashboard/dashboard');
		
		$this->close();
	}
	
}