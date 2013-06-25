<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class diklat extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_satker');
		$this->load->model('mdl_diklat');
	}
	
	public function index()
	{
		$this->open();
		
		/*
		// # config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/diklat/index/';
		$config['total_rows'] = $this->db->count_all('DIKLAT_MST_PROGRAM');
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$config['uri_segment'] = '3';
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="javascript:void(0)" class="current">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_diklat->getData($config['per_page'], $this->uri->segment(3));
		*/
		
		$this->load->view('diklat/diklat_list');
		
		$this->close();
	}
	
}
