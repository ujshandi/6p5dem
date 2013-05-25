<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mst_indukupt extends My_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_mst_indukupt', 'mst_indukupt');
	}
	
	function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/mst_indukupt/index/';
		$config['total_rows'] = $this->db->count_all('mst_indukupt');
		$config['per_page'] = '5';
		$config['num_links'] = '5';
		// $config['uri_segment'] = '3';
		
		// $config['full_tag_open'] = '';
		// $config['full_tag_close'] = '';
		
		// $config['num_tag_open'] = '<li>';
		// $config['num_tag_close'] = '</li>';
		
		// $config['cur_tag_open'] = '<li><span class="page-active radius">';
		// $config['cur_tag_close'] = '</span></li>';
		
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
		# end config pagination
		
		# get data
		$data['result'] = $this->mst_indukupt->getData($config['per_page'], $this->uri->segment(3));
		
		# load view
		$this->load->view('mst_indukupt/mst_indukupt_list', $data);
		
		$this->close();
	}
	
	public function add(){
		$this->open();
		$this->load->view('mst_indukupt/mst_indukupt_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		# Data
		$data['kode_induk'] = $this->input->post('kode_induk', TRUE);
		$data['nama_induk'] = $this->input->post('nama_induk', TRUE);
		
		
		# set rules validation
		$this->form_validation->set_rules('kode_induk', 'kode_induk', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nama_induk', 'nama_induk', 'trim|required|xss_clean');
		
		//$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('mst_indukupt/mst_indukupt_add',$data);
		}else{
			$this->mst_indukupt->insert($data);
			redirect('mst_indukupt');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mst_indukupt->getDataEdit($id);
		$this->load->view('satker/satker_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		# Data
		$data['kode_induk'] = $this->input->post('kode_induk', TRUE);
		$data['nama_induk'] = $this->input->post('nama_induk', TRUE);
		
		
		# set rules validation
		$this->form_validation->set_rules('kode_induk', 'kode_induk', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nama_induk', 'nama_induk', 'trim|required|xss_clean');
		
		//$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('mst_indukupt/mst_indukupt_edit',$data);
		}else{
			$this->mst_indukupt->update($data);
			redirect('mst_indukupt');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mst_indukupt->delete($id)){
			redirect('mst_indukupt');
		}else{
			// code u/ gagal simpan
		}
	}
	
	
}