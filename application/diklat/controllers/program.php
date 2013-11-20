<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class program extends My_Controller {

	var $id = 'program';
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_satker');
		$this->load->model('mdl_program');
	}
	
	public function index($sort_by ='KODE_PROGRAM', $sort_order ='ASC') ##sorting
	{
	
		$data['can_view'] 	= $this->can_view();

		$data['can_insert'] = $this->can_insert();

		$data['can_update'] = $this->can_update();

		$data['can_delete'] = $this->can_delete();
		
		$this->open();
		
		# get filter
		$data['kode_induk'] = $this->session->userdata($this->id.'kode_induk');
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:10;
		$offset = ($this->uri->segment(5))?$this->uri->segment(5):0; ##sorting
		
		##sorting
		$data['fields'] = array (
			'KODE_PROGRAM' => 'Kode program',
			'NAMA_PROGRAM' => 'Nama program',
			'NAMA_INDUK' => 'Satker',
		);
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
		##
		
		# get data
		$result = $this->mdl_program->getData($data['numrow'], $offset, $data, $sort_by, $sort_order);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/program/index/'."$sort_by/$sort_order"; ##sorting
		$config['per_page'] = $data['numrow'];
		$config['num_links'] = '10';
		$config['uri_segment'] = '5'; ##sorting
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0)" class="current">';
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

		$config['total_rows'] = $result['row_count'];

		$this->pagination->initialize($config);	
		
		$data['curcount'] = $offset+1;
		
		$data['result'] = $result['row_data'];
		
		$this->load->view('program/program_list', $data);
		
		$this->close();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kode_induk', $this->input->post('kode_induk'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('program');
	}
	
	public function add(){
		$this->open();
		$this->load->view('program/program_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		# get post data
		$data['KODE_PROGRAM'] = $this->input->post('KODE_PROGRAM');
        $data['NAMA_PROGRAM'] = $this->input->post('NAMA_PROGRAM');
        $data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_PROGRAM', 'KODE PROGRAM', 'required');
        $this->form_validation->set_rules('NAMA_PROGRAM', 'NAMA PROGRAM', 'required');
        $this->form_validation->set_rules('KODE_INDUK', 'KODE INDUK', 'required');
        //$this->form_validation->set_rules('URUTAN', 'URUTAN', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('program/program_add',$data);
		}else{
			$this->mdl_program->insert($data);
			redirect('program');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_program->getDataEdit($id);
		$this->load->view('program/program_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		$data['KODE_PROGRAM'] = $this->input->post('KODE_PROGRAM');
        $data['NAMA_PROGRAM'] = $this->input->post('NAMA_PROGRAM');
        $data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_PROGRAM', 'KODE PROGRAM', 'required');
        $this->form_validation->set_rules('NAMA_PROGRAM', 'NAMA PROGRAM', 'required');
        $this->form_validation->set_rules('KODE_INDUK', 'KODE INDUK', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('program/program_edit',$data);
		}else{
			$this->mdl_program->update($data);
			redirect('program');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_program->delete($id)){
			redirect('program');
		}else{
		
		}
	}
	
}
