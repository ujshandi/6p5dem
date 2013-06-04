<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eselon4 extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_eselon4');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/eselon4/index/';
		$config['total_rows'] = $this->db->count_all('SDM_ESELON4');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_eselon4->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('eselon4/eselon4_list', $data);
		
		
		$this->close();
	}

	public function add(){
		$this->open();
		$data['option_eselon3'] = $this->mdl_eselon4->geteselon3();
		$this->load->view('eselon4/eselon4_add',$data);
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		$data['ID_ESELON_3'] = $this->input->post('ID_ESELON_3');
		$data['ID_ESELON_4'] = $this->input->post('ID_ESELON_4');
		$data['NAMA_ESELON_4'] = $this->input->post('NAMA_ESELON_4');
		
		# set rules validation
		$this->form_validation->set_rules('ID_ESELON_4', 'Id Eselon IV', 'required');
		$this->form_validation->set_rules('NAMA_ESELON_4', 'Nama Eselon IV', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('eselon4/eselon4_add',$data);
		}else{
			$this->mdl_eselon4->insert($data);
			redirect('eselon4');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['ID_ESELON_4'] = $id;
		$data['option_eselon3'] = $this->mdl_eselon4->geteselon3();
		$data['result'] = $this->mdl_eselon4->getDataEdit($id);
		$this->load->view('eselon4/eselon4_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		$data['ID_ESELON_3'] = $this->input->post('ID_ESELON_3');
		$data['ID_ESELON_4'] = $this->input->post('ID_ESELON_4');
		$data['NAMA_ESELON_4'] = $this->input->post('NAMA_ESELON_4');
		
		# set rules validation
		$this->form_validation->set_rules('ID_ESELON_4', 'Kode Eselon IV', 'required');
		$this->form_validation->set_rules('NAMA_ESELON_4', 'Nama Eselon IV', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('eselon4/eselon4_edit',$data);
		}else{
			$this->mdl_eselon4->update($data);
			redirect('eselon4');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_eselon4->delete($id)){
			redirect('eselon4');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
