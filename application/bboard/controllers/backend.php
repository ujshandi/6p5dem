<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		
	}

	function index()
	{
		$this->open_backend();
		$this->load->view('layouts_backend/content');
		$this->close_backend();
	}
}

/* End of file Backend.php */
/* Location: ./application/controllers/Backend.php */