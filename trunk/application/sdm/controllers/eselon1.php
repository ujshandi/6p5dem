<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eselon1 extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_eselon1');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/eselon1/index/';
		$config['total_rows'] = $this->db->count_all('SDM_ESELON1');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_eselon1->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('eselon1/eselon1_list', $data);
		
		
		$this->close();
	}

	public function add(){
		$this->open();
		$this->load->view('eselon1/eselon1_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$data['ID_ESELON_1'] = $this->input->post('ID_ESELON_1');
		$data['NAMA_ESELON_1'] = $this->input->post('NAMA_ESELON_1');
		
		# set rules validation
		$this->form_validation->set_rules('ID_ESELON_1', 'Id Eselon 1', 'required');
		$this->form_validation->set_rules('NAMA_ESELON_1', 'Nama Eselon 1', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('eselon1/eselon1_add',$data);
		}else{
			$this->mdl_eselon1->insert($data);
			redirect('eselon1');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['ID_ESELON_1'] = $id;
		$data['result'] = $this->mdl_eselon1->getDataEdit($id);
		$this->load->view('eselon1/eselon1_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['ID_ESELON_1'] = $this->input->post('ID_ESELON_1');
		$data['NAMA_ESELON_1'] = $this->input->post('NAMA_ESELON_1');
		
		# set rules validation
		//$this->form_validation->set_rules('kode_induk', 'Kode Satker', 'required');
		$this->form_validation->set_rules('NAMA_ESELON_1', 'Nama ESELON 1', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('eselon1/eselon1_edit',$data);
		}else{
			$this->mdl_eselon1->update($data);
			redirect('eselon1');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_eselon1->delete($id)){
			redirect('eselon1');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
