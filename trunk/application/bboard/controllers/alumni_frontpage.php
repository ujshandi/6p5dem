<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumni_frontpage extends My_Frontpage {
	
	function __construct(){
		parent::__construct();
		//$this->load->model('mdl_satker');
		//$this->load->model('mdl_upt');
		//$this->load->model('mdl_diklat');
		//$this->load->model('mdl_peserta');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('mdl_alumni_front');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/alumni_frontpage/index/';
		$config['total_rows'] = $this->db->count_all('DIKLAT_MST_ALUMNI');
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
		
		$data['result'] = $this->mdl_alumni_front->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('info_alumni/alumni_list', $data);
		
		$this->close();
	}
	
	/*public function add_alumni1(){
		$this->open();		
		$this->load->view('alumni/alumni_add1');
		$this->close();
	}
	
	public function add_alumni2(){
		$this->open();
		
		$data['KODE_UPT'] 		= $this->input->post('KODE_UPT');
		$data['KODE_DIKLAT'] 	= $this->input->post('KODE_DIKLAT');
		$data['THN_ANGKATAN'] 	= $this->input->post('THN_ANGKATAN');
		$data['TGL_LULUS'] 		= $this->input->post('TGL_LULUS');
		$data['KERJA'] 			= $this->input->post('KERJA');
		$data['INSTANSI'] 		= $this->input->post('INSTANSI');
	
		if($data['KODE_DIKLAT'] == '' || $data['THN_ANGKATAN'] == '0'){
			redirect('alumni/add_alumni1');
		}
		
		
		$data['UPT'] = $this->mdl_upt->getDataEdit($data['KODE_UPT']);
		$data['DIKLAT'] = $this->mdl_diklat->getDataEdit($data['KODE_DIKLAT']);
		$data['data'] = $this->mdl_peserta->getPesertaRegister($data['KODE_UPT'], $data['KODE_DIKLAT'], $data['THN_ANGKATAN'], $data['TGL_LULUS'], $data['KERJA'], $data['INSTANSI']);
		
		$this->load->view('alumni/alumni_add2', $data);
		$this->close();
	}
	
	public function proses_add_alumni1(){
		$data['DATA'] = $this->input->post('DATA');
		
		if($this->mdl_alumni->UpdateAlumni($data['DATA'])){
			redirect('alumni');
		}else{
			echo 'Error insert to db!';
		}
		
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_alumni->getDataEdit($id);
		$this->load->view('alumni/alumni_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['IDPESERTA'] = $this->input->post('IDPESERTA');
        $data['TGL_LULUS'] = "to_date('".$this->input->post('TGL_LULUS')."', 'mm/dd/yyyy')";
        $data['KERJA'] = $this->input->post('KERJA');
        $data['INSTANSI'] = $this->input->post('INSTANSI');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('IDPESERTA', 'PESERTA', 'required');
        $this->form_validation->set_rules('TGL_LULUS', 'KODE INDUK', 'required');
        $this->form_validation->set_rules('KERJA', 'TEMPAT KERJA', 'required');
        $this->form_validation->set_rules('INSTANSI', 'INSTANSI', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('alumni/alumni_edit',$data);
		}else{
			$this->mdl_alumni->update($data);
			redirect('alumni');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_alumni->delete($id)){
			redirect('alumni');
		}else{
			
		}
	}*/
	
	function getPeserta(){
		$opt['name'] = 'KODE_UPT';
		$opt['id'] = 'KODE_UPT';
		$opt['KODE_UPT'] = $this->input->post('KODE_UPT');
		echo $this->mdl_alumni->getOptionPesertaByUPT($opt);
	}
	
}