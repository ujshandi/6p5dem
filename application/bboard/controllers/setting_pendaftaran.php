<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setting_pendaftaran extends My_Controller {
	
	var $id = 'peserta';
	
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
		
		# get filter
		/*
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');*/
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:30; 
		$offset = ($this->uri->segment(3))?$this->uri->segment(3):0;
		
		# get data
		
		
		/*$result = $this->mdl_peserta->get_setting_pendaftaran($data['numrow'], $offset, $data); */
		$data['result'] = $this->mdl_peserta->get_setting_pendaftaran($data['numrow'], $offset);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/setting_pendaftaran/index/';
		$config['total_rows'] = $this->db->count_all('BB_SETTING_PENDAFTARAN');
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$config['uri_segment'] = '3';
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="javascript:void(0)" class="current">';
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

		$this->pagination->initialize($config);	
		
		$this->load->view('setting_pendaftaran/setting_pendaftaran_list', $data);
		
		$this->close_backend();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kode_upt', $this->input->post('kode_upt'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('setting_pendaftaran');
	}
	
	public function view($id, $idsetting_pendaftaran=""){
		$this->open_backend();	
		$data['id'] = $id;
		$data['result'] = $this->mdl_peserta->getDataDetail($id);
		
		if($idpeserta != ""){
			$data['IDPESERTA'] = $idpeserta;
			$this->load->view('setting_pendaftaran/peserta_view', $data);
		}else{
			$this->load->view('setting_pendaftaran/peserta_view', $data);
		}
		$this->close_backend();
	}
	
	public function add(){
		$this->open_backend();
		
		$data['DIKLAT_MST_UPT'] = $this->mdl_peserta->getUPT();
		$this->load->view('setting_pendaftaran/setting_pendaftaran_add', $data);
		
		$this->close_backend();
	}
	
	public function proses_add(){
		$this->open_backend();
		
		# get post data
		
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
		$periode_akhir = $this->input->post('periode_akhir');
		$periode_awal = $this->input->post('periode_awal');
		$value_upt = $this->input->post('value_upt');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'KODE_UPT', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('setting_pendaftaran/setting_pendaftaran_add',$data);
		}else{
			
			for ($i=0;$i<count($value_upt);$i++){
				$data['value_upt'] = $value_upt[$i];
				$data['periode_akhir'] = "to_date('".$periode_akhir[$i]."', 'dd/mm/yyyy')";
				$data['periode_awal'] = "to_date('".$periode_awal[$i]."', 'dd/mm/yyyy')";
				$this->mdl_peserta->insert_setting_pendaftaran($data);
			}
			
			
			redirect('setting_pendaftaran'); 
		}
		
		$this->close_backend();
	}
	
	public function add_lulus1(){
		$this->open_backend();
		$this->load->view('setting_pendaftaran/peserta_lulus_add1');
		$this->close_backend();
	}
	
	public function add_lulus2(){
		$this->open_backend();
		
		$data['KODE_UPT'] 		= $this->input->post('KODE_UPT');
		$data['KODE_DIKLAT'] 	= $this->input->post('KODE_DIKLAT');
		//$data['THN_ANGKATAN'] 	= $this->input->post('THN_ANGKATAN');
	
		if($data['KODE_DIKLAT'] == '' ){
			redirect('setting_pendaftaran/add_lulus1');
		}
		
		
		$data['UPT'] = $this->mdl_upt->getDataEdit($data['KODE_UPT']);
		$data['DIKLAT'] = $this->mdl_diklat->getDataEdit($data['KODE_DIKLAT']);
		$data['data'] = $this->mdl_peserta->getPesertaRegister($data['KODE_UPT'], $data['KODE_DIKLAT']);
		
		$this->load->view('setting_pendaftaran/peserta_lulus_add2', $data);
		$this->close_backend();
	}
	
	public function proses_add_lulus(){
		$data['DATA'] = $this->input->post('DATA');
		
		if($this->mdl_peserta->UpdatePesertaRegister($data['DATA'])){
			redirect('setting_pendaftaran');
		}else{
			echo 'Error insert to db!';
		}
		
	}
	
	public function edit($id){
		$this->open_backend();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_peserta->getDataEdit($id);
		$this->load->view('setting_pendaftaran/peserta_edit', $data);
		
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
        $data['NO_TELP'] = $this->input->post('NO_TELP');
        $data['STATUS_PENDAFTAR'] = $this->input->post('STATUS_PENDAFTAR');
        $data['KETERANGAN'] = $this->input->post('KETERANGAN');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'DIKLAT', 'required');
        $this->form_validation->set_rules('NAMA_PENDAFTAR', 'NAMA PENDAFTAR', 'required');
        $this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
        $this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
        $this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
        $this->form_validation->set_rules('STATUS_PENDAFTAR', 'STATUS PENDAFTAR', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('setting_pendaftaran/peserta_edit',$data);
		}else{
			$this->mdl_peserta->update($data);
			redirect('setting_pendaftaran');
		}
		
		$this->close_backend();
	}
	
	public function proses_delete($id){
		if($this->mdl_peserta->delete($id)){
			redirect('setting_pendaftaran');
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
