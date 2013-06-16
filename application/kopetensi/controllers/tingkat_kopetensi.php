<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tingkat_kopetensi extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_tingkat_kopetensi');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/tingkat_kopetensi/index/';
		$config['total_rows'] = $this->db->count_all('KOPETEN_TINGKAT');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_tingkat_kopetensi->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('tingkat_kopetensi/tingkat_kopetensi_list', $data);
		
		
		$this->close();
	}

	public function add(){
		$this->open();
		$this->load->view('tingkat_kopetensi/tingkat_kopetensi_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$data['KODE_TINGKAT'] = $this->input->post('KODE_TINGKAT');
		$data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_TINGKAT', 'Kode Tingkat', 'required');
		$this->form_validation->set_rules('DESKRIPSI', 'Nama Tingkat', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('tingkat_kopetensi/tingkat_kopetensi_add',$data);
		}else{
			$this->mdl_tingkat_kopetensi->insert($data);
			redirect('tingkat_kopetensi');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['KODE_TINGKAT'] = $id;
		$data['result'] = $this->mdl_tingkat_kopetensi->getDataEdit($id);
		$this->load->view('tingkat_kopetensi/tingkat_kopetensi_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['KODE_TINGKAT'] = $this->input->post('KODE_TINGKAT');
		$data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
		
		# set rules validation
		//$this->form_validation->set_rules('kode_induk', 'Kode Satker', 'required');
		$this->form_validation->set_rules('DESKRIPSI', 'Nama Matra', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('tingkat_kopetensi/tingkat_kopetensi_edit',$data);
		}else{
			$this->mdl_tingkat_kopetensi->update($data);
			redirect('tingkat_kopetensi');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_tingkat_kopetensi->delete($id)){
			redirect('tingkat_kopetensi');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
