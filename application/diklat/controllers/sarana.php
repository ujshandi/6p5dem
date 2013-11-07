<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sarana extends My_Controller {

	var $id = 'sarana';
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_satker');
		$this->load->model('mdl_upt');
		$this->load->model('mdl_sarana');
	}

	public function index($sort_by ='NAMA,JUMLAH,TAHUN',$sort_order ='ASC')
	{
		$this->open();
		
		# get filter
		$data['kode_upt'] = $this->session->userdata($this->id.'kode_upt');
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:10;
		$offset = ($this->uri->segment(3))?$this->uri->segment(3):0;
		
		# get data
		//$result = $this->mdl_sarana->getData($data['numrow'], $offset, $data);
		
		##sorting
		$result = $this->mdl_sarana->getData($data['numrow'], $offset, $data, $sort_by, $sort_order);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sarana/index/';
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
		##sorting
		$data['fields'] = array (
			'NAMA_SARPRAS' => 'NAMA SARANA',
			'JUMLAH' => 'JUMLAH',
			'TAHUN' => 'TAHUN'
		);
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
		##
		
		$this->load->view('sarpras/sarana_list', $data);
		
		$this->close();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kode_upt', $this->input->post('kode_upt'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('sarana');
	}
	
	public function add(){
		$this->open();
		$this->load->view('sarpras/sarana_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		# get post data
		//$data['ID_SARANA'] = $this->input->post('ID_SARANA');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['TAHUN'] = $this->input->post('TAHUN');
		$data['ID_SARPRAS'] = $this->input->post('ID_SARPRAS');
        $data['JUMLAH'] = $this->input->post('JUMLAH');
        $data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
        
		
		# set rules validation
        $this->form_validation->set_rules('TAHUN', 'TAHUN', 'required');
        //$this->form_validation->set_rules('JUMLAH', 'JUMLAH', 'required');
        $this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('sarpras/sarana_add',$data);
		}else{
			$this->mdl_sarana->insert($data);
			redirect('sarana');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_sarana->getDataEdit($id);
		$this->load->view('sarpras/sarana_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['TAHUN'] = $this->input->post('TAHUN');
		$data['ID_SARPRAS'] = $this->input->post('ID_SARPRAS');
        $data['JUMLAH'] = $this->input->post('JUMLAH');
        $data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
		
		# set rules validation
		$this->form_validation->set_rules('TAHUN', 'TAHUN', 'required');
        //$this->form_validation->set_rules('JUMLAH', 'JUMLAH', 'required');
        $this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$data['result'] = $this->mdl_sarana->getDataEdit($data['id']);
			$this->load->view('sarpras/sarana_edit',$data);
		}else{
			$this->mdl_sarana->update($data);
			redirect('sarana');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_sarana->delete($id)){
			redirect('sarana');
		}else{
			//code u/ gagal simpan
		}
	}
	
}
