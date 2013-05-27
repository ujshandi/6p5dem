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
	}		function elfinder_init()	{	  $this->load->helper('path','url');	   $opts = array(		 //'debug' => true, 		 'roots' => array(		  array( 			'driver' => 'LocalFileSystem', 			'path'   => './filesharing/', 			//'path'   => 'C:/xampp174/htdocs/bpsdm/filesharing/',			//'URL'    => 'http://localhost:90/bpsdm/filesharing/',			'URL'           => base_url('filesharing').'/',			'accessControl' => 'access' 			 		// more elFinder options here		  ) 		)	  );	  $this->load->library('elfinder_lib', $opts);	}
	
}