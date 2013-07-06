<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penelitian extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_satker');
		$this->load->model('mdl_upt');
		$this->load->model('mdl_dosen');
		$this->load->model('mdl_penelitian');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/penelitian/index/';
		$config['total_rows'] = $this->db->count_all('DIKLAT_PENELITIAN');
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
		
		$data['result'] = $this->mdl_penelitian->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('penelitian/penelitian_list', $data);
		
		$this->close();
	}
	
	public function add(){
		$this->open();
		$data['DIKLAT_MST_UPT'] = $this->mdl_penelitian->getUPT();
		$this->load->view('penelitian/penelitian_add', $data);
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		# get post data
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['IDDOSEN_1'] = $this->input->post('IDDOSEN_1');
        $data['IDDOSEN_2'] = $this->input->post('IDDOSEN_2');
        $data['IDDOSEN_3'] = $this->input->post('IDDOSEN_3');
        $data['IDDOSEN_4'] = $this->input->post('IDDOSEN_4');        
        $data['JUDUL_PENELITIAN'] = $this->input->post('JUDUL_PENELITIAN');
        $data['ABSTRAK'] = $this->input->post('ABSTRAK');
        $data['TGL_PUBLIKASI'] = "to_date('".$this->input->post('TGL_PUBLIKASI')."', 'mm/dd/yyyy')";
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('IDDOSEN_1', 'DOSEN', 'required');
        $this->form_validation->set_rules('JUDUL_PENELITIAN', 'KODE INDUK', 'required');
        $this->form_validation->set_rules('ABSTRAK', 'ABSTRAK', 'required');
        $this->form_validation->set_rules('TGL_PUBLIKASI', 'TANGGAL PUBLIKASI', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('penelitian/penelitian_add',$data);
		}else{
			$this->mdl_penelitian->insert($data);
			redirect('penelitian');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_penelitian->getDataEdit($id);
		$this->load->view('penelitian/penelitian_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		# get post data
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['IDDOSEN_1'] = $this->input->post('IDDOSEN_1');
        $data['IDDOSEN_2'] = $this->input->post('IDDOSEN_2');
        $data['IDDOSEN_3'] = $this->input->post('IDDOSEN_3');
        $data['IDDOSEN_4'] = $this->input->post('IDDOSEN_4');        
        $data['JUDUL_PENELITIAN'] = $this->input->post('JUDUL_PENELITIAN');
        $data['ABSTRAK'] = $this->input->post('ABSTRAK');
        $data['TGL_PUBLIKASI'] = "to_date('".$this->input->post('TGL_PUBLIKASI')."', 'mm/dd/yyyy')";
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('IDDOSEN_1', 'DOSEN', 'required');
        $this->form_validation->set_rules('JUDUL_PENELITIAN', 'KODE INDUK', 'required');
        $this->form_validation->set_rules('ABSTRAK', 'ABSTRAK', 'required');
        $this->form_validation->set_rules('TGL_PUBLIKASI', 'TANGGAL PUBLIKASI', 'required');
		
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('penelitian/penelitian_edit',$data);
		}else{
			$this->mdl_penelitian->update($data);
			redirect('penelitian');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_penelitian->delete($id)){
			redirect('penelitian');
		}else{
			// code u/ gagal simpan
		}
	}
	
	function getDosen(){
		$opt['name'] = 'IDDOSEN';
		$opt['KODE_UPT'] = $this->input->post('KODE_UPT');
		echo $this->mdl_penelitian->getOptionDosentByUPT($opt);
	}
	
}
