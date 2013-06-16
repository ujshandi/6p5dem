<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matra extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_matra');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/matra/index/';
		$config['total_rows'] = $this->db->count_all('KOPETEN_MATRA');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_matra->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('matra/matra_list', $data);
		
		
		$this->close();
	}

	public function add(){
		$this->open();
		$this->load->view('matra/matra_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$data['KODEMATRA'] = $this->input->post('KODEMATRA');
		$data['NAMAMATRA'] = $this->input->post('NAMAMATRA');
		
		# set rules validation
		$this->form_validation->set_rules('KODEMATRA', 'Kode Bumn', 'required');
		$this->form_validation->set_rules('NAMAMATRA', 'Nama Bumn', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('matra/matra_add',$data);
		}else{
			$this->mdl_matra->insert($data);
			redirect('matra');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['KODEMATRA'] = $id;
		$data['result'] = $this->mdl_matra->getDataEdit($id);
		$this->load->view('matra/matra_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['KODEMATRA'] = $this->input->post('KODEMATRA');
		$data['NAMAMATRA'] = $this->input->post('NAMAMATRA');
		
		# set rules validation
		//$this->form_validation->set_rules('kode_induk', 'Kode Satker', 'required');
		$this->form_validation->set_rules('NAMAMATRA', 'Nama Matra', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('matra/matra_edit',$data);
		}else{
			$this->mdl_matra->update($data);
			redirect('matra');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_matra->delete($id)){
			redirect('matra');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
