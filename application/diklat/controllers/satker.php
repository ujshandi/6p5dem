<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class satker extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_satker');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/satker/index/';
		$config['total_rows'] = $this->db->count_all('DIKLAT_MST_INDUKUPT');
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		// $config['uri_segment'] = '3';
		// $config['full_tag_open'] = '';
		// $config['full_tag_close'] = '';
		// $config['num_tag_open'] = '<li>';
		// $config['num_tag_close'] = '</li>';
		// $config['cur_tag_open'] = '<li><a href="javascript:void(0)" class="current">';
		// $config['cur_tag_close'] = '</a></li>';
		// $config['prev_link'] = 'Prev';
		// $config['prev_tag_open'] = '<li>';
		// $config['prev_tag_close'] = '</li>';
		// $config['next_link'] = 'Next';
		// $config['next_tag_open'] = '<li>';
		// $config['next_tag_close'] = '</li>';
		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<li>';
		// $config['last_tag_close'] = '</li>';
		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<li>';
		// $config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_satker->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('satker/satker_list', $data);
		
		$this->close();
	}
	
	public function add(){
		$this->open();
		$this->load->view('satker/satker_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$data['kode_induk'] = $this->input->post('kode_induk');
		$data['nama_induk'] = $this->input->post('nama_induk');
		
		# set rules validation
		$this->form_validation->set_rules('kode_induk', 'Kode Satker', 'required');
		$this->form_validation->set_rules('nama_induk', 'Nama Satker', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('satker/satker_add',$data);
		}else{
			$this->mdl_satker->insert($data);
			redirect('satker');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_satker->getDataEdit($id);
		$this->load->view('satker/satker_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		$data['kode_induk'] = $this->input->post('kode_induk');
		$data['nama_induk'] = $this->input->post('nama_induk');
		
		# set rules validation
		$this->form_validation->set_rules('kode_induk', 'Kode Satker', 'required');
		$this->form_validation->set_rules('nama_induk', 'Nama Satker', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('satker/satker_edit',$data);
		}else{
			$this->mdl_satker->update($data);
			redirect('satker');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_satker->delete($id)){
			redirect('satker');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
