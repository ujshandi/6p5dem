<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jenis_sarpras extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_jenis_sarpras');
	}
	
	public function index()
	{
		$data['content'] = 'jenis_sarpras/jenis_sarpras_list';
		$data['result'] = $this->mdl_jenis_sarpras->getData();
		$this->load->view('template/template', $data);
	}
	
	public function add(){
		$data['content'] = 'jenis_sarpras/jenis_sarpras_add';
		$this->load->view('template/template', $data);
	}
	
	public function proses_add(){
		
		$dt['kode'] = $this->input->post('kode');
		$dt['nama'] = $this->input->post('nama');
		$dt['jenis'] = $this->input->post('jenis');
		
		if($this->mdl_jenis_sarpras->insert($dt)){
			redirect('jenis_sarpras');
		}else{
			// code u/ gagal simpan
		}
		
	}
	
	public function edit($id){
		$data['content'] = 'jenis_sarpras/jenis_sarpras_edit';
		$data['id'] = $id;
		$data['result'] = $this->mdl_jenis_sarpras->getDataEdit($id);
		$this->load->view('template/template', $data);
	}
	
	public function proses_edit(){
		
		$dt['id'] = $this->input->post('id');
		$dt['kode'] = $this->input->post('kode');
		$dt['nama'] = $this->input->post('nama');
		$dt['jenis'] = $this->input->post('jenis');
		
		if($this->mdl_jenis_sarpras->update($dt)){
			redirect('jenis_sarpras');
		}else{
			// code u/ gagal simpan
		}
		
	}
	
	public function proses_delete($id){
		if($this->mdl_jenis_sarpras->delete($id)){
			redirect('jenis_sarpras');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
