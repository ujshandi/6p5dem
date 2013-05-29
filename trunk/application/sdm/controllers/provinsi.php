<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provinsi extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_provinsi');
	}
	
	public function test(){
		echo 'test';
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/provinsi/index/';
		$config['total_rows'] = $this->db->count_all('SDM_PROVINSI');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_provinsi->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('provinsi/provinsi_list', $data);
		
		
		$this->close();
	}

	public function add(){
		$this->open();
		$this->load->view('provinsi/provinsi_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$data['KODEPROVIN'] = $this->input->post('KODEPROVIN');
		$data['NAMAPROVIN'] = $this->input->post('NAMAPROVIN');
		
		# set rules validation
		$this->form_validation->set_rules('KODEPROVIN', 'Kode Provinsi', 'required');
		$this->form_validation->set_rules('NAMAPROVIN', 'Nama Provinsi', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('provinsi/provinsi_add',$data);
		}else{
			$this->mdl_provinsi->insert($data);
			redirect('provinsi');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['KODEPROVIN'] = $id;
		$data['result'] = $this->mdl_provinsi->getDataEdit($id);
		$this->load->view('provinsi/provinsi_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['KODEPROVIN'] = $this->input->post('KODEPROVIN');
		//$data['kode_induk'] = $this->input->post('kode_induk');
		$data['NAMAPROVIN'] = $this->input->post('NAMAPROVIN');
		
		# set rules validation
		//$this->form_validation->set_rules('kode_induk', 'Kode Satker', 'required');
		$this->form_validation->set_rules('NAMAPROVIN', 'Nama Golongan', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('provinsi/provinsi_edit',$data);
		}else{
			$this->mdl_provinsi->update($data);
			redirect('provinsi');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_provinsi->delete($id)){
			redirect('provinsi');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
