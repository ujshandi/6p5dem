<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peserta_backend extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_upt');
		$this->load->model('mdl_diklat');
		$this->load->model('mdl_peserta');
		$this->load->model('mdl_satker');
	}
	
	public function index()
	{
		$this->open_backend();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/peserta/index/';
		$config['total_rows'] = $this->db->count_all('DIKLAT_MST_PESERTA');
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
		
		$data['result'] = $this->mdl_peserta->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('peserta_backend/peserta_list', $data);
		
		$this->close_backend();
	}
	
	public function view($id, $idpeserta=""){
		$this->open_backend();	
		$data['id'] = $id;
		$data['result'] = $this->mdl_peserta->getDataDetail($id);
		
		if($idpeserta != ""){
			$data['IDPESERTA'] = $idpeserta;
			$this->load->view('peserta_backend/peserta_view', $data);
		}else{
			$this->load->view('peserta_backend/peserta_view', $data);
		}
		$this->close_backend();
	}
	
	public function add(){
		$this->open_backend();
		
		$data['DIKLAT_MST_UPT'] = $this->mdl_peserta->getUPT();
		$this->load->view('peserta_backend/peserta_add', $data);
		
		$this->close_backend();
	}
	
	public function proses_add(){
		$this->open_backend();
		
		# get post data
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        $data['NAMA_PENDAFTAR'] = $this->input->post('NAMA_PENDAFTAR');
        $data['TEMPAT_LAHIR'] = $this->input->post('TEMPAT_LAHIR');
        $data['TGL_LAHIR'] = "to_date('".$this->input->post('TGL_LAHIR')."', 'mm/dd/yyyy')";
        $data['JK'] = $this->input->post('JK');
        $data['STATUS_PESERTA'] = $this->input->post('STATUS_PESERTA');
        $data['KETERANGAN'] = $this->input->post('KETERANGAN');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'DIKLAT', 'required');
        $this->form_validation->set_rules('NAMA_PENDAFTAR', 'NAMA PENDAFTAR', 'required');
        $this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
        $this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
        $this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
        $this->form_validation->set_rules('STATUS_PESERTA', 'STATUS PESERTA', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('peserta_backend/peserta_add',$data);
		}else{
			$this->mdl_peserta->insert($data);
			redirect('peserta_backend');
		}
		
		$this->close_backend();
	}
	
	
	public function edit($id){
		$this->open_backend();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_peserta->getDataEdit($id);
		$this->load->view('peserta_backend/peserta_edit', $data);
		
		$this->close_backend();
	}
	
	public function proses_edit(){
		$this->open_backend();
		
		$data['id'] = $this->input->post('id');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        $data['NAMA_PENDAFTAR'] = $this->input->post('NAMA_PENDAFTAR');
        $data['TEMPAT_LAHIR'] = $this->input->post('TEMPAT_LAHIR');
        $data['TGL_LAHIR'] = "to_date('".$this->input->post('TGL_LAHIR')."', 'dd/mm/yyyy')";
        $data['JK'] = $this->input->post('JK');
        $data['STATUS_PESERTA'] = $this->input->post('STATUS_PESERTA');
        $data['KETERANGAN'] = $this->input->post('KETERANGAN');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'DIKLAT', 'required');
        $this->form_validation->set_rules('NAMA_PENDAFTAR', 'NAMA PENDAFTAR', 'required');
        $this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
        $this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
        $this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
        $this->form_validation->set_rules('STATUS_PESERTA', 'STATUS PESERTA', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('peserta_backend/peserta_edit',$data);
		}else{
			$this->mdl_peserta->update($data);
			redirect('peserta_backend');
		}
		
		$this->close_backend();
	}
	
	public function proses_delete($id){
		if($this->mdl_peserta->delete($id)){
			redirect('peserta_backend');
		}else{
			// code u/ gagal simpan
		}
	}
	
	function getDiklat(){
		$opt['name'] = 'KODE_DIKLAT';
		$opt['KODE_UPT'] = $this->input->post('KODE_UPT');
		echo $this->mdl_peserta->getOptionDiklatByUPT($opt);
	}
	
}
