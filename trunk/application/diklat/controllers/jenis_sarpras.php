<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jenis_sarpras extends My_Controller {
	
	function __construct(){
		parent::__construct();
		//$this->load->model('mdl_satker');
		$this->load->model('mdl_jenis_sarpras');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/jenis_sarpras/index/';
		$config['total_rows'] = $this->db->count_all('DIKLAT_MST_SARPRAS');
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
		
		$data['result'] = $this->mdl_jenis_sarpras->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('jenis_sarpras/jenis_sarpras_list', $data);
		
		$this->close();
	}
	
	public function add(){
		$this->open();
		$this->load->view('jenis_sarpras/jenis_sarpras_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		# get post data
		//$data['ID_SARPRAS'] = $this->input->post('ID_SARPRAS');
        $data['NAMA_SARPRAS'] = $this->input->post('NAMA_SARPRAS');
        $data['JENIS'] = $this->input->post('JENIS');
		
		# set rules validation
		//$this->form_validation->set_rules('ID_SARPRAS', 'ID SARPRAS', 'required');
        $this->form_validation->set_rules('NAMA_SARPRAS', 'NAMA SARPRAS', 'required');
        $this->form_validation->set_rules('JENIS', 'JENIS', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('jenis_sarpras/jenis_sarpras_add',$data);
		}else{
			$this->mdl_jenis_sarpras->insert($data);
			redirect('jenis_sarpras');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_jenis_sarpras->getDataEdit($id);
		$this->load->view('jenis_sarpras/jenis_sarpras_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		//$data['ID_SARPRAS'] = $this->input->post('ID_SARPRAS');
        $data['NAMA_SARPRAS'] = $this->input->post('NAMA_SARPRAS');
        $data['JENIS'] = $this->input->post('JENIS');
		
		# set rules validation
		//$this->form_validation->set_rules('ID_SARPRAS', 'ID SARPRAS', 'required');
        $this->form_validation->set_rules('NAMA_SARPRAS', 'NAMA SARPRAS', 'required');
        $this->form_validation->set_rules('JENIS', 'JENIS', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('jenis_sarpras/jenis_sarpras_edit',$data);
		}else{
			$this->mdl_jenis_sarpras->update($data);
			redirect('jenis_sarpras');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_jenis_sarpras->delete($id)){
			redirect('jenis_sarpras');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
