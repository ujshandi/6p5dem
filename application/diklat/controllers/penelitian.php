<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penelitian extends My_Controller {
	
	var $id = 'penelitian';
	
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
		
		# get filter
		$data['kode_upt'] = $this->session->userdata($this->id.'kode_upt');
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:10;
		$offset = ($this->uri->segment(3))?$this->uri->segment(3):0;
		
		# get data
		$result = $this->mdl_penelitian->getData($data['numrow'], $offset, $data);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/penelitian/index/';
		$config['per_page'] = $data['numrow'];
		$config['num_links'] = '10';
		$config['uri_segment'] = '3';
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0)" class="current">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['total_rows'] = $result['row_count'];

		$this->pagination->initialize($config);	
		
		$data['curcount'] = $offset+1;
		$data['result'] = $result['row_data'];
		
		$this->load->view('penelitian/penelitian_list', $data);
		
		$this->close();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kode_upt', $this->input->post('kode_upt'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('penelitian');
	}
	
		public function view($id, $idpenelitian=""){
		$this->open();	
		$data['id'] = $id;
		$data['result'] = $this->mdl_penelitian->getDataDetail($id);
		
		if($idpenelitian != ""){
			$data['ID_PENELITIAN'] = $idpenelitian;
			$this->load->view('penelitian/penelitian_view', $data);
		}else{
			$this->load->view('penelitian/penelitian_view', $data);
		}
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
        $data['TGL_PUBLIKASI'] = "to_date('".$this->input->post('TGL_PUBLIKASI')."', 'dd/mm/yyyy')";
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        //$this->form_validation->set_rules('IDDOSEN_1', 'DOSEN', 'required');
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
        $data['TGL_PUBLIKASI'] = "to_date('".$this->input->post('TGL_PUBLIKASI')."', 'dd/mm/yyyy')";
		
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
