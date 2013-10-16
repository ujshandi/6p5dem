<?php

class home extends My_Controller {

	function __construct()
	{
		parent::__construct();	
		//$this->CI = & get_instance();
	//	$this->load->helper(array('share','form','flexigrid','url')); 
		$this->load->model('mjdih');
		//$this->load->library(array('pagination','flexigrid'));
	//	
		if(!$this->session->userdata('login') == TRUE){
			redirect(base_url().'index.php/auth/login');
		}
	}
	
	function index()
	{
            $data['judul']='HOME';	 
			$data['kat']=$this->db->get('JDIH_M_PRODUK_HUKUM')->result_array();	 	 
			$data['tematik']= $this->db->get('JDIH_M_TEMATIK')->result_array();
			
			
			show('home', $data);

	}
	
	
	}