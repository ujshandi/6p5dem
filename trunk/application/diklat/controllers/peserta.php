<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peserta extends My_Controller {
	
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
		$this->open();
		
		# get filter
		$data['kode_upt'] = $this->session->userdata($this->id.'kode_upt');
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:30;
		$offset = ($this->uri->segment(3))?$this->uri->segment(3):0;
		
		# get data
		$result = $this->mdl_peserta->getData($data['numrow'], $offset, $data);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/peserta/index/';
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
		
		$this->load->view('peserta/peserta_list', $data);
		
		$this->close();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kode_upt', $this->input->post('kode_upt'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('peserta');
	}
	
	public function view($id, $idpeserta=""){
		$this->open();	
		$data['id'] = $id;
		$data['result'] = $this->mdl_peserta->getDataDetail($id);
		
		if($idpeserta != ""){
			$data['IDPESERTA'] = $idpeserta;
			$this->load->view('peserta/peserta_view', $data);
		}else{
			$this->load->view('peserta/peserta_view', $data);
		}
		$this->close();
	}
	
	public function add(){
		$this->open();
		$data['DIKLAT_MST_UPT'] = $this->mdl_peserta->getUPT();
		$this->load->view('peserta/peserta_add', $data);
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		# get post data
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        $data['NO_PESERTA'] = $this->input->post('NO_PESERTA');
        $data['NAMA_PESERTA'] = $this->input->post('NAMA_PESERTA');
        $data['TEMPAT_LAHIR'] = $this->input->post('TEMPAT_LAHIR');
        $data['TGL_LAHIR'] = "to_date('".$this->input->post('TGL_LAHIR')."', 'mm/dd/yyyy')";
        $data['JK'] = $this->input->post('JK');
        $data['TGL_MASUK'] = "to_date('".$this->input->post('TGL_MASUK')."', 'mm/dd/yyyy')";
        $data['THN_ANGKATAN'] = $this->input->post('THN_ANGKATAN');
        $data['STATUS_PESERTA'] = $this->input->post('STATUS_PESERTA');
        $data['KETERANGAN'] = $this->input->post('KETERANGAN');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'DIKLAT', 'required');
        $this->form_validation->set_rules('NO_PESERTA', 'NO PESERTA', 'required');
        $this->form_validation->set_rules('NAMA_PESERTA', 'NAMA PESERTA', 'required');
        $this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
        $this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
        $this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
        $this->form_validation->set_rules('TGL_MASUK', 'TANGGAL MASUK', 'required');
        $this->form_validation->set_rules('THN_ANGKATAN', 'TAHUN ANGKATAN', 'required');
        $this->form_validation->set_rules('STATUS_PESERTA', 'STATUS PESERTA', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('peserta/peserta_add',$data);
		}else{
			$this->mdl_peserta->insert($data);
			redirect('peserta');
		}
		
		$this->close();
	}
	
	public function add_lulus1(){
		$this->open();
		$this->load->view('peserta/peserta_lulus_add1');
		$this->close();
	}
	
	public function add_lulus2(){
		$this->open();
		
		$data['KODE_UPT'] 		= $this->input->post('KODE_UPT');
		$data['KODE_DIKLAT'] 	= $this->input->post('KODE_DIKLAT');
		$data['THN_ANGKATAN'] 	= $this->input->post('THN_ANGKATAN');
	
		if($data['KODE_DIKLAT'] == '' || $data['THN_ANGKATAN'] == '0'){
			redirect('peserta/add_lulus1');
		}
		
		
		$data['UPT'] = $this->mdl_upt->getDataEdit($data['KODE_UPT']);
		$data['DIKLAT'] = $this->mdl_diklat->getDataEdit($data['KODE_DIKLAT']);
		$data['data'] = $this->mdl_peserta->getPesertaRegister($data['KODE_UPT'], $data['KODE_DIKLAT'], $data['THN_ANGKATAN']);
		
		$this->load->view('peserta/peserta_lulus_add2', $data);
		$this->close();
	}
	
	public function proses_add_lulus(){
		$data['DATA'] = $this->input->post('DATA');
		
		if($this->mdl_peserta->UpdatePesertaRegister($data['DATA'])){
			redirect('peserta');
		}else{
			echo 'Error insert to db!';
		}
		
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_peserta->getDataEdit($id);
		$this->load->view('peserta/peserta_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        $data['NO_PESERTA'] = $this->input->post('NO_PESERTA');
        $data['NAMA_PESERTA'] = $this->input->post('NAMA_PESERTA');
        $data['TEMPAT_LAHIR'] = $this->input->post('TEMPAT_LAHIR');
        $data['TGL_LAHIR'] = "to_date('".$this->input->post('TGL_LAHIR')."', 'dd/mm/yyyy')";
        $data['JK'] = $this->input->post('JK');
        $data['TGL_MASUK'] = "to_date('".$this->input->post('TGL_MASUK')."', 'dd/mm/yyyy')";
        $data['THN_ANGKATAN'] = $this->input->post('THN_ANGKATAN');
        $data['STATUS_PESERTA'] = $this->input->post('STATUS_PESERTA');
        $data['KETERANGAN'] = $this->input->post('KETERANGAN');	
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'DIKLAT', 'required');
        $this->form_validation->set_rules('NO_PESERTA', 'NO PESERTA', 'required');
        $this->form_validation->set_rules('NAMA_PESERTA', 'NAMA PESERTA', 'required');
        $this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
        $this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
        $this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
        $this->form_validation->set_rules('TGL_MASUK', 'TANGGAL MASUK', 'required');
        $this->form_validation->set_rules('THN_ANGKATAN', 'TAHUN ANGKATAN', 'required');
        $this->form_validation->set_rules('STATUS_PESERTA', 'STATUS PESERTA', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('peserta/peserta_edit',$data);
		}else{
			$this->mdl_peserta->update($data);
			redirect('peserta');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_peserta->delete($id)){
			redirect('peserta');
		}else{
			// code u/ gagal simpan
		}
	}
	
	function getDiklat(){
		echo $this->mdl_peserta->getOptionDiklatByUPT(array('KODE_UPT'=>$this->input->post('KODE_UPT')));
	}
	
}
