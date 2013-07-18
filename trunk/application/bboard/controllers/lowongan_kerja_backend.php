<?php

class lowongan_kerja_backend extends MY_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->model('mdl_lowongan_kerja_backend','lowongan_kerja_backend');
		$this->load->helper('url');
		$this->load->model('mdl_lowongan_kerja', 'lowongan_kerja');
		$this->load->library('fungsi');
	}
	
	public function index()
	{
		$this->open_backend();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/lowongan_kerja_backend/index/';
		$config['total_rows'] = $this->db->count_all('BB_MLOWONGAN');
		$config['per_page'] = '10';
		$config['num_links'] = '5';
		

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->lowongan_kerja_backend->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('lowongan_kerja_backend/lowongan_kerja_backend_filter', $data);
		
		$this->close_backend();
	}
	
	function search(){
		$this->open_backend();
			
			$search=$this->input->post('search');
			
			# config pagination
			$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/lowongan_kerja_backend/search/';
			$config['total_rows'] = $this->lowongan_kerja_backend->getSearchData(true, $search);
			$config['per_page'] = '10';
			$config['num_links'] = '5';
			

			$this->pagination->initialize($config);	
			
			$data['result'] = $this->lowongan_kerja_backend->getSearchData(false, $search, $config['per_page'], $this->uri->segment(3));
			$this->load->view('lowongan_kerja_backend/lowongan_kerja_backend_list', $data);
			
		$this->close_backend();
	}
	
	function filter_mahli(){
		$mahlicode = $this->input->post('MAHLI_CODE');
		$search="";
			
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/lowongan_kerja_backend/search/';
		$config['total_rows'] = $this->lowongan_kerja_backend->getSearchData(true, $mahlicode, $search);
		$config['per_page'] = '10';
		$config['num_links'] = '5';
		

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->lowongan_kerja_backend->getSearchData(false, $mahlicode, $search, $config['per_page'], $this->uri->segment(3));
		$this->load->view('lowongan_kerja_backend/lowongan_kerja_backend_list', $data);
		
	}
	
	function filter_all(){
		$mahlicode = $this->input->post('MAHLI_CODE');
		$search = $this->input->post('search');
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/lowongan_kerja_backend/search/';
		$config['total_rows'] = $this->lowongan_kerja_backend->getSearchData(true, $mahlicode, $search);
		$config['per_page'] = '10';
		$config['num_links'] = '5';
		

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->lowongan_kerja_backend->getSearchData(false, $mahlicode, $search, $config['per_page'], $this->uri->segment(3));
		$this->load->view('lowongan_kerja_backend/lowongan_kerja_backend_list', $data);
		
	}


	function add(){
		$this->open_backend();
		$this->load->view('lowongan_kerja_backend/lowongan_kerja_backend_add');
		$this->close_backend();
	}
	
	function proses_add(){
		$this->open_backend();
		
		# get post data

        $data['LOWONGAN_MAKRA'] = $this->input->post('MAKRA');
        $data['LOWONGAN_TITLE'] = $this->input->post('LOWONGAN_TITLE');
        $data['LOWONGAN_AHLI'] = $this->input->post('AHLI_CODE');
        $data['LOWONGAN_DATE'] = $this->input->post('LOWONGAN_DATE');
        $data['LOWONGAN_DATE_EXPIRED'] = $this->input->post('LOWONGAN_DATE_EXPIRED');
        $data['LOWONGAN_SUMMARY'] = $this->input->post('LOWONGAN_SUMMARY');
        $data['LOWONGAN_DETAIL'] = $this->input->post('LOWONGAN_DETAIL');
		
		# set rules validation
        $this->form_validation->set_rules('LOWONGAN_TITLE', 'LOWONGAN TITLE', 'required');
        $this->form_validation->set_rules('LOWONGAN_DATE', 'LOWONGAN DATE', 'required');
        $this->form_validation->set_rules('LOWONGAN_DATE_EXPIRED', 'LOWONGAN DATE EXPIRED', 'required');
        $this->form_validation->set_rules('LOWONGAN_DETAIL', 'LOWONGAN DETAIL', 'required'); 
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('lowongan_kerja_backend/lowongan_kerja_backend_add',$data);
		}else{
			$this->lowongan_kerja_backend->insert($data);
			redirect('lowongan_kerja_backend');
		}
		
		$this->close_backend();
		
	}
	
	function edit($id){
		$this->open_backend();
		
		$data['id'] = $id;
		$data['result'] = $this->lowongan_kerja_backend->getDataEdit($id);
		$this->load->view('lowongan_kerja_backend/lowongan_kerja_backend_edit', $data);
		
		$this->close_backend();
	}
	
	function proses_edit(){
		$this->open_backend();
		$data['id'] = $this->input->post('id');
		$data['LOWONGAN_MAKRA'] = $this->input->post('MAKRA');
        $data['LOWONGAN_TITLE'] = $this->input->post('LOWONGAN_TITLE');
        $data['LOWONGAN_AHLI'] = $this->input->post('AHLI_CODE');
        $data['LOWONGAN_DATE'] = $this->input->post('LOWONGAN_DATE');
        $data['LOWONGAN_DATE_EXPIRED'] = $this->input->post('LOWONGAN_DATE_EXPIRED');
        $data['LOWONGAN_SUMMARY'] = $this->input->post('LOWONGAN_SUMMARY');
        $data['LOWONGAN_DETAIL'] = $this->input->post('LOWONGAN_DETAIL');
		
		# set rules validation
        $this->form_validation->set_rules('LOWONGAN_TITLE', 'LOWONGAN TITLE', 'required');
        $this->form_validation->set_rules('LOWONGAN_DATE', 'LOWONGAN DATE', 'required');
        $this->form_validation->set_rules('LOWONGAN_DATE_EXPIRED', 'LOWONGAN DATE EXPIRED', 'required');
        $this->form_validation->set_rules('LOWONGAN_DETAIL', 'LOWONGAN DETAIL', 'required'); 
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('lowongan_kerja_backend/lowongan_kerja_backend_edit',$data);
		}else{
			$this->lowongan_kerja_backend->update($data);
			redirect('lowongan_kerja_backend');
		}
		
		$this->close_backend();
	}
	
	function proses_delete($id){
		if($this->lowongan_kerja_backend->delete($id)){
			redirect('lowongan_kerja_backend');
		}else{
		
		}
	}
	
}