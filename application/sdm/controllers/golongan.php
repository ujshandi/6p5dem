<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class golongan extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_golongan');
	}
	
	public function test(){
		echo 'test';
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/golongan/index/';
		$config['total_rows'] = $this->db->count_all('SDM_GOLONGAN');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_golongan->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('golongan/golongan_list', $data);
		
		
		$this->close();
	}

	public function add(){
		$this->open();
		$this->load->view('golongan/golongan_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$data['ID_GOLONGAN'] = $this->input->post('ID_GOLONGAN');
		$data['NAMA_GOLONGAN'] = $this->input->post('NAMA_GOLONGAN');
		
		# set rules validation
		$this->form_validation->set_rules('ID_GOLONGAN', 'Id Golongan', 'required');
		$this->form_validation->set_rules('NAMA_GOLONGAN', 'Nama Golongan', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('golongan/golongan_add',$data);
		}else{
			$this->mdl_golongan->insert($data);
			redirect('golongan');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['ID_GOLONGAN'] = $id;
		$data['result'] = $this->mdl_golongan->getDataEdit($id);
		$this->load->view('golongan/golongan_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['ID_GOLONGAN'] = $this->input->post('ID_GOLONGAN');
		//$data['kode_induk'] = $this->input->post('kode_induk');
		$data['NAMA_GOLONGAN'] = $this->input->post('NAMA_GOLONGAN');
		
		# set rules validation
		//$this->form_validation->set_rules('kode_induk', 'Kode Satker', 'required');
		$this->form_validation->set_rules('NAMA_GOLONGAN', 'Nama Golongan', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('golongan/golongan_edit',$data);
		}else{
			$this->mdl_golongan->update($data);
			redirect('golongan');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_golongan->delete($id)){
			redirect('golongan');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
