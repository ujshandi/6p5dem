<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class upt extends My_Controller {
	
	var $id = 'upt';
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_satker');
		$this->load->model('mdl_upt');
	}
	
	public function index()
	{
		$this->open();
		
		# get filter
		$data['kode_induk'] = $this->session->userdata($this->id.'kode_induk');
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:30;
		$offset = ($this->uri->segment(3))?$this->uri->segment(3):0;
		
		# get data
		$result = $this->mdl_upt->getData($data['numrow'], $offset, $data);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/upt/index/';
		$config['per_page'] = $data['numrow'];
		$config['num_links'] = '10';
		$config['uri_segment'] = '3';
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
		
		$this->load->view('upt/upt_list', $data);
		
		$this->close();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kode_induk', $this->input->post('kode_induk'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('upt');
	}
	
	public function add(){
		$this->open();
		$this->load->view('upt/upt_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		# get post data
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['NAMA_UPT'] = $this->input->post('NAMA_UPT');
        $data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
        $data['URUTAN'] = $this->input->post('URUTAN');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'KODE UPT', 'required');
        $this->form_validation->set_rules('NAMA_UPT', 'NAMA UPT', 'required');
        $this->form_validation->set_rules('KODE_INDUK', 'KODE INDUK', 'required');
        //$this->form_validation->set_rules('URUTAN', 'URUTAN', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('upt/upt_add',$data);
		}else{
			$this->mdl_upt->insert($data);
			redirect('upt');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_upt->getDataEdit($id);
		$this->load->view('upt/upt_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['NAMA_UPT'] = $this->input->post('NAMA_UPT');
        $data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
        $data['URUTAN'] = $this->input->post('URUTAN');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'KODE UPT', 'required');
        $this->form_validation->set_rules('NAMA_UPT', 'NAMA UPT', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('upt/upt_edit',$data);
		}else{
			$this->mdl_upt->update($data);
			redirect('upt');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_upt->delete($id)){
			redirect('upt');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
