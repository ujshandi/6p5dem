<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class diklat extends My_Controller {
	
	function __construct(){
		parent::__construct();
		//$this->load->model('mdl_satker');
		//$this->load->model('mdl_program');
	}
	
	public function index()
	{
		//$this->open();
		
		# config pagination
		// $config['base_url'] = base_url().'/'.$this->config->item('index_page').'/underconstruction';
		// $config['total_rows'] = $this->db->count_all('DIKLAT_MST_PROGRAM');
		// $config['per_page'] = '30';
		// $config['num_links'] = '3';
		// $config['uri_segment'] = '3';
		// $config['full_tag_open'] = '';
		// $config['full_tag_close'] = '';
		// $config['num_tag_open'] = '<li>';
		// $config['num_tag_close'] = '</li>';
		// $config['cur_tag_open'] = '<li><a href="javascript:void(0)" class="current">';
		// $config['cur_tag_close'] = '</a></li>';
		// $config['prev_link'] = 'Prev';
		// $config['prev_tag_open'] = '<li>';
		// $config['prev_tag_close'] = '</li>';
		// $config['next_link'] = 'Next';
		// $config['next_tag_open'] = '<li>';
		// $config['next_tag_close'] = '</li>';
		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<li>';
		// $config['last_tag_close'] = '</li>';
		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<li>';
		// $config['first_tag_close'] = '</li>';

		//$this->pagination->initialize($config);	
		
		//$data['result'] = $this->mdl_program->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('\underconstruction_vw');
		
		//$this->close();
	}
	
	// public function add(){
		// $this->open();
		// $this->load->view('program/program_add');
		// $this->close();
	// }
	
	// public function proses_add(){
		// $this->open();
		
		// # get post data
		// $data['KODE_PROGRAM'] = $this->input->post('KODE_PROGRAM');
        // $data['NAMA_PROGRAM'] = $this->input->post('NAMA_PROGRAM');
        // $data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
		
		// # set rules validation
		// $this->form_validation->set_rules('KODE_PROGRAM', 'KODE PROGRAM', 'required');
        // $this->form_validation->set_rules('NAMA_PROGRAM', 'NAMA PROGRAM', 'required');
        // $this->form_validation->set_rules('KODE_INDUK', 'KODE INDUK', 'required');
		
		// # set message validation
		// $this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		// if ($this->form_validation->run() == FALSE){
			// $this->load->view('program/program_add',$data);
		// }else{
			// $this->mdl_program->insert($data);
			// redirect('program');
		// }
		
		// $this->close();
	// }
	
	// public function edit($id){
		// $this->open();
		
		// $data['id'] = $id;
		// $data['result'] = $this->mdl_program->getDataEdit($id);
		// $this->load->view('program/program_edit', $data);
		
		// $this->close();
	// }
	
	// public function proses_edit(){
		// $this->open();
		
		// $data['id'] = $this->input->post('id');
		// $data['KODE_PROGRAM'] = $this->input->post('KODE_PROGRAM');
        // $data['NAMA_PROGRAM'] = $this->input->post('NAMA_PROGRAM');
        // $data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
		
		// # set rules validation
		// $this->form_validation->set_rules('KODE_PROGRAM', 'KODE PROGRAM', 'required');
        // $this->form_validation->set_rules('NAMA_PROGRAM', 'NAMA PROGRAM', 'required');
        // $this->form_validation->set_rules('KODE_INDUK', 'KODE INDUK', 'required');
		// # set message validation
		// $this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		// if ($this->form_validation->run() == FALSE){
			// $this->load->view('program/program_edit',$data);
		// }else{
			// $this->mdl_program->update($data);
			// redirect('program');
		// }
		
		// $this->close();
	// }
	
	// public function proses_delete($id){
		// if($this->mdl_program->delete($id)){
			// redirect('program');
		// }else{
		
		// }
	// }
	
}