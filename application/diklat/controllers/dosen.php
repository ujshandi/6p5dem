<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dosen extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_satker');
		$this->load->model('mdl_dosen');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/dosen/index/';
		$config['total_rows'] = $this->db->count_all('DIKLAT_MST_DOSEN');
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
		
		$data['result'] = $this->mdl_dosen->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('dosen/dosen_list', $data);
		
		$this->close();
	}
	
	public function add(){
		$this->open();
		$this->load->view('dosen/dosen_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		# get post data
		$data['IDDOSEN'] = $this->input->post('IDDOSEN');
        $data['NIP'] = $this->input->post('NIP');
        $data['NAMADOSEN'] = $this->input->post('NAMADOSEN');
		$data['TEMPAT_LAHIR'] = $this->input->post('TEMPAT_LAHIR');
		$data['TGL_LAHIR'] = $this->input->post('TGL_LAHIR');
		$data['JK'] = $this->input->post('JK');
		$data['STATUS'] = $this->input->post('STATUS');
		$data['TAHUN'] = $this->input->post('TAHUN');
		$data['PENDIDIKAN'] = $this->input->post('PENDIDIKAN');
		$data['JENIS_DOSEN'] = $this->input->post('JENIS_DOSEN');
		$data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
		
		# set rules validation
		$this->form_validation->set_rules('IDDOSEN', 'ID DOSEN', 'required');
        $this->form_validation->set_rules('NIP', 'NIP', 'required');
        $this->form_validation->set_rules('NAMADOSEN', 'NAMA DOSEN', 'required');
		$this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
		$this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
		$this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
		$this->form_validation->set_rules('STATUS', 'STATUS', 'required');
		$this->form_validation->set_rules('TAHUN', 'TAHUN', 'required');
		$this->form_validation->set_rules('PENDIDIKAN', 'PENDIDIKAN', 'required');
		$this->form_validation->set_rules('JENIS_DOSEN', 'JENIS DOSEN', 'required');
		$this->form_validation->set_rules('KODE_INDUK', 'KODE UPT', 'required');
		//$this->form_validation->set_rules('KODE_UPT', 'KODE UPT', 'required');
        //$this->form_validation->set_rules('URUTAN', 'URUTAN', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('dosen/dosen_add',$data);
		}else{
			$this->mdl_dosen->insert($data);
			redirect('dosen');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_dosen->getDataEdit($id);
		$this->load->view('dosen/dosen_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		$data['IDDOSEN'] = $this->input->post('IDDOSEN');
        $data['NIP'] = $this->input->post('NIP');
        $data['NAMADOSEN'] = $this->input->post('NAMADOSEN');
		$data['TEMPAT_LAHIR'] = $this->input->post('TEMPAT_LAHIR');
		$data['TGL_LAHIR'] = $this->input->post('TGL_LAHIR');
		$data['JK'] = $this->input->post('JK');
		$data['STATUS'] = $this->input->post('STATUS');
		$data['TAHUN'] = $this->input->post('TAHUN');
		$data['PENDIDIKAN'] = $this->input->post('PENDIDIKAN');
		$data['JENIS_DOSEN'] = $this->input->post('JENIS_DOSEN');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
		
		# set rules validation
		$this->form_validation->set_rules('IDDOSEN', 'ID DOSEN', 'required');
        $this->form_validation->set_rules('NIP', 'NIP', 'required');
        $this->form_validation->set_rules('NAMADOSEN', 'NAMA DOSEN', 'required');
		$this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
		$this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
		$this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
		$this->form_validation->set_rules('STATUS', 'STATUS', 'required');
		$this->form_validation->set_rules('TAHUN', 'TAHUN', 'required');
		$this->form_validation->set_rules('PENDIDIKAN', 'PENDIDIKAN', 'required');
		$this->form_validation->set_rules('JENIS_DOSEN', 'JENIS DOSEN', 'required');
		$this->form_validation->set_rules('KODE_UPT', 'KODE UPT', 'required');
		$this->form_validation->set_rules('KODE_UPT', 'KODE UPT', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('dosen/dosen_edit',$data);
		}else{
			$this->mdl_dosen->update($data);
			redirect('dosen');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_dosen->delete($id)){
			redirect('dosen');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
