<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class diklat_kopetensi extends My_Controller {

	var $id = 'diklat_kopetensi';
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_diklat_kopetensi');
		//$this->load->model('mdl_program');
		//$this->load->model('mdl_satker');
		//$this->load->model('mdl_diklat_darat');
	}
	
	public function index()
	{
		$this->open();
		
		# get filter
		$data['kodekopetensi'] = $this->session->userdata($this->id.'kodekopetensi');
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:30;
		$offset = ($this->uri->segment(3))?$this->uri->segment(3):0;
		
		# get data
		$result = $this->mdl_diklat_kopetensi->getData($data['numrow'], $offset, $data);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/diklat_kopetensi/index/';
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
		
		$this->load->view('kopetensi_diklat/kopetensi_diklat_list', $data);
		
		$this->close();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kodekopetensi', $this->input->post('kodekopetensi'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('diklat_kopetensi');
	}
	
	public function add(){
		$this->open();
		$this->load->view('kopetensi_diklat/diklat_kopetensi_add');
		$this->close();
	}
	
	
	public function proses_add(){
		$this->open();
		
		# get post data
		//$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['KODE_STANDAR_UDARA'] = $this->input->post('KODE_STANDAR_UDARA');
        $data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        //$data['NAMA_DIKLAT'] = $this->input->post('NAMA_DIKLAT');
        //$data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
		
		# set rules validation
		//$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_STANDAR_UDARA', 'KOMPETENSI', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'KODE DIKLAT', 'required');
        //$this->form_validation->set_rules('NAMA_DIKLAT', 'NAMA DIKLAT', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('diklat_kopetensi/diklat_kopetensi_add',$data);
		}else{
			$this->mdl_diklat_kopetensi->insert($data);
			redirect('diklat_kopetensi');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_diklat_kopetensi->getDataEdit($id);
		$this->load->view('diklat_kopetensi/diklat_kopetensi_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		//$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['KODE_STANDAR_UDARA'] = $this->input->post('KODE_STADAR_UDARA');
        $data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        //$data['NAMA_DIKLAT'] = $this->input->post('NAMA_DIKLAT');
        //$data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
		
		# set rules validation
		//$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_STADAR_UDARA', 'KOMPETENSI', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'KODE DIKLAT', 'required');
        //$this->form_validation->set_rules('NAMA_DIKLAT', 'NAMA DIKLAT', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('diklat_kopetensi/diklat_kopetensi_add',$data);
		}else{
			$this->mdl_diklat_kopetensi->insert($data);
			redirect('diklat_kopetensi');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_diklat_kopetensi->delete($id)){
			redirect('diklat_kopetensi');
		}else{
		
		}
	}
	
}
