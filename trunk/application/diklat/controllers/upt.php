<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class upt extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_upt');
	}
	
	public function index()
	{
		$data['content'] = 'upt/upt_list';
		$data['result'] = $this->mdl_upt->getData();
		$this->load->view('template/template', $data);
	}
	
	public function add(){
		$data['content'] = 'upt/upt_add';
		$this->load->view('template/template', $data);
	}
	
	public function proses_add(){
		
		$dt['kode'] = $this->input->post('kode');
		$dt['nama'] = $this->input->post('nama');
		
		if($this->mdl_upt->insert($dt)){
			redirect('upt');
		}else{
			// code u/ gagal simpan
		}
		
	}
	
	public function edit($id){
		$data['content'] = 'upt/upt_edit';
		$data['id'] = $id;
		$data['result'] = $this->mdl_upt->getDataEdit($id);
		$this->load->view('template/template', $data);
	}
	
	public function proses_edit(){
		
		$dt['id'] = $this->input->post('id');
		$dt['kode'] = $this->input->post('kode');
		$dt['nama'] = $this->input->post('nama');
		
		if($this->mdl_upt->update($dt)){
			redirect('upt');
		}else{
			// code u/ gagal simpan
		}
		
	}
	
	public function proses_delete($id){
		if($this->mdl_upt->delete($id)){
			redirect('upt');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
