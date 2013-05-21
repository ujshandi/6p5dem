<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class satker extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_satker');
	}
	
	public function index()
	{
		$data['content'] = 'satker/satker_list';
		$data['result'] = $this->mdl_satker->getData();
		$this->load->view('template/template', $data);
	}
	
	public function add(){
		$data['content'] = 'satker/satker_add';
		$this->load->view('template/template', $data);
	}
	
	public function proses_add(){
		
		$dt['kode'] = $this->input->post('kode');
		$dt['nama'] = $this->input->post('nama');
		
		if($this->mdl_satker->insert($dt)){
			redirect('satker');
		}else{
			// code u/ gagal simpan
		}
		
	}
	
	public function edit($id){
		$data['content'] = 'satker/satker_edit';
		$data['id'] = $id;
		$data['result'] = $this->mdl_satker->getDataEdit($id);
		$this->load->view('template/template', $data);
	}
	
	public function proses_edit(){
		
		$dt['id'] = $this->input->post('id');
		$dt['kode'] = $this->input->post('kode');
		$dt['nama'] = $this->input->post('nama');
		
		if($this->mdl_satker->update($dt)){
			redirect('satker');
		}else{
			// code u/ gagal simpan
		}
		
	}
	
	public function proses_delete($id){
		if($this->mdl_satker->delete($id)){
			redirect('satker');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
