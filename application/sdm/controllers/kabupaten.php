<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kabupaten extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_kabupaten');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/kabupaten/index/';
		$config['total_rows'] = $this->db->count_all('SDM_KABUPATEN');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_kabupaten->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('kabupaten/kabupaten_list', $data);
		
		
		$this->close();
	}

	public function add(){
		$this->open();
		$data['option_provin'] = $this->mdl_kabupaten->getprovin();
		$this->load->view('kabupaten/kabupaten_add',$data);
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$data['KODEPROVIN'] = $this->input->post('KODEPROVIN');
		$data['KODEKABUP'] = $this->input->post('KODEKABUP');
		$data['NAMAKABUP'] = $this->input->post('NAMAKABUP');
		
		# set rules validation
		$this->form_validation->set_rules('KODEKABUP', 'Kode Kabupaten', 'required');
		$this->form_validation->set_rules('NAMAKABUP', 'Nama Kabupaten', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('kabupaten/kabupaten_add',$data);
		}else{
			$this->mdl_kabupaten->insert($data);
			redirect('kabupaten');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		$data['KODEKABUP'] = $id;
		$data['option_provin'] = $this->mdl_kabupaten->getprovin();
		$data['result'] = $this->mdl_kabupaten->getDataEdit($id);
		$this->load->view('kabupaten/kabupaten_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		$data['KODEPROVIN'] = $this->input->post('KODEPROVIN');
		$data['KODEKABUP'] = $this->input->post('KODEKABUP');
		$data['NAMAKABUP'] = $this->input->post('NAMAKABUP');
		
		# set rules validation
		//$this->form_validation->set_rules('kode_induk', 'Kode Satker', 'required');
		$this->form_validation->set_rules('KODEPROVIN', 'Provinsi', 'required');
		$this->form_validation->set_rules('KODEKABUP', 'Kode Kabupaten', 'required');
		$this->form_validation->set_rules('NAMAKABUP', 'Nama Kabupaten', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('kabupaten/kabupaten_edit',$data);
		}else{
			$this->mdl_kabupaten->update($data);
			redirect('kabupaten');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_kabupaten->delete($id)){
			redirect('kabupaten');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
