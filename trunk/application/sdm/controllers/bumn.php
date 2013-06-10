<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bumn extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_bumn');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/bumn/index/';
		$config['total_rows'] = $this->db->count_all('SDM_BUMN');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_bumn->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('bumn/bumn_list', $data);
		
		
		$this->close();
	}

	public function add(){
		$this->open();
		$this->load->view('bumn/bumn_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$data['KODEBUMN'] = $this->input->post('KODEBUMN');
		$data['NAMA_BUMN'] = $this->input->post('NAMA_BUMN');
		
		# set rules validation
		$this->form_validation->set_rules('KODEBUMN', 'Kode Bumn', 'required');
		$this->form_validation->set_rules('NAMA_BUMN', 'Nama Bumn', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('bumn/bumn_add',$data);
		}else{
			$this->mdl_bumn->insert($data);
			redirect('bumn');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['KODEBUMN'] = $id;
		$data['result'] = $this->mdl_bumn->getDataEdit($id);
		$this->load->view('bumn/bumn_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['KODEBUMN'] = $this->input->post('KODEBUMN');
		$data['NAMA_BUMN'] = $this->input->post('NAMA_BUMN');
		
		# set rules validation
		//$this->form_validation->set_rules('kode_induk', 'Kode Satker', 'required');
		$this->form_validation->set_rules('NAMA_BUMN', 'Nama BUMN', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('bumn/bumn_edit',$data);
		}else{
			$this->mdl_bumn->update($data);
			redirect('bumn');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_bumn->delete($id)){
			redirect('bumn');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
