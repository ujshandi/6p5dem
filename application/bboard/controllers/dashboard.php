<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends My_Controller
{		public function __construct(){		parent::__construct();		$this->load->helper('path');	}
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
	}		function elfinder_init()	{	  $this->load->helper('path');	  $opts = array(		// 'debug' => true, 		'roots' => array(		  array( 			'driver' => 'LocalFileSystem', 			'path'   => set_realpath('upload/'), 			'URL'    => base_url() . 'upload'			// more elFinder options here		  ) 		)	  );	  $this->load->library('elfinder_lib', $opts);	}
	
}