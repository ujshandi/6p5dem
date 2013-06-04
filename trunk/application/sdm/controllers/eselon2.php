<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eselon2 extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_eselon2');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/eselon2/index/';
		$config['total_rows'] = $this->db->count_all('SDM_ESELON2');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_eselon2->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('eselon2/eselon2_list', $data);
		
		
		$this->close();
	}

	public function add(){
		$this->open();
		$data['option_eselon1'] = $this->mdl_eselon2->geteselon1();
		$this->load->view('eselon2/eselon2_add',$data);
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		$data['ID_ESELON_1'] = $this->input->post('ID_ESELON_1');
		$data['ID_ESELON_2'] = $this->input->post('ID_ESELON_2');
		$data['NAMA_ESELON_2'] = $this->input->post('NAMA_ESELON_2');
		
		# set rules validation
		$this->form_validation->set_rules('ID_ESELON_2', 'Id Eselon II', 'required');
		$this->form_validation->set_rules('NAMA_ESELON_2', 'Nama Eselon II', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('eselon2/eselon2_add',$data);
		}else{
			$this->mdl_eselon2->insert($data);
			redirect('eselon2');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['ID_ESELON_2'] = $id;
		$data['option_eselon1'] = $this->mdl_eselon2->geteselon1();
		$data['result'] = $this->mdl_eselon2->getDataEdit($id);
		$this->load->view('eselon2/eselon2_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		$data['ID_ESELON_1'] = $this->input->post('ID_ESELON_1');
		$data['ID_ESELON_2'] = $this->input->post('ID_ESELON_2');
		$data['NAMA_ESELON_2'] = $this->input->post('NAMA_ESELON_2');
		
		# set rules validation
		//$this->form_validation->set_rules('kode_induk', 'Kode Satker', 'required');
		$this->form_validation->set_rules('NAMA_ESELON_2', 'Nama Eselon II', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('eselon2/eselon2_edit',$data);
		}else{
			$this->mdl_eselon2->update($data);
			redirect('eselon2');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_eselon2->delete($id)){
			redirect('eselon2');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
