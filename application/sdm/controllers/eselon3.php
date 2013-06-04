<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eselon3 extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_eselon3');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/eselon3/index/';
		$config['total_rows'] = $this->db->count_all('SDM_ESELON3');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_eselon3->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('eselon3/eselon3_list', $data);
		
		
		$this->close();
	}

	public function add(){
		$this->open();
		$data['option_eselon2'] = $this->mdl_eselon3->geteselon2();
		$this->load->view('eselon3/eselon3_add',$data);
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		$data['ID_ESELON_2'] = $this->input->post('ID_ESELON_2');
		$data['ID_ESELON_3'] = $this->input->post('ID_ESELON_3');
		$data['NAMA_ESELON_3'] = $this->input->post('NAMA_ESELON_3');
		
		# set rules validation
		$this->form_validation->set_rules('ID_ESELON_3', 'Id Eselon III', 'required');
		$this->form_validation->set_rules('NAMA_ESELON_3', 'Nama Eselon III', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('eselon3/eselon3_add',$data);
		}else{
			$this->mdl_eselon3->insert($data);
			redirect('eselon3');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['ID_ESELON_3'] = $id;
		$data['option_eselon2'] = $this->mdl_eselon3->geteselon2();
		$data['result'] = $this->mdl_eselon3->getDataEdit($id);
		$this->load->view('eselon3/eselon3_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		$data['ID_ESELON_2'] = $this->input->post('ID_ESELON_2');
		$data['ID_ESELON_3'] = $this->input->post('ID_ESELON_3');
		$data['NAMA_ESELON_3'] = $this->input->post('NAMA_ESELON_3');
		
		# set rules validation
		$this->form_validation->set_rules('ID_ESELON_3', 'Kode Eselon III', 'required');
		$this->form_validation->set_rules('NAMA_ESELON_3', 'Nama Eselon III', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('eselon3/eselon3_edit',$data);
		}else{
			$this->mdl_eselon3->update($data);
			redirect('eselon3');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_eselon3->delete($id)){
			redirect('eselon3');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
