<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sdm_dinas extends My_Controller {
	var $id = 'sdm_dinas';
	function __construct(){
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('mdl_sdm_dinas');
	}
	
	public function index()
	{
		$this->open();
		
		# get filter
		$data['kodeprovin'] = $this->session->userdata($this->id.'kodeprovin');
		$data['kodekabup'] = $this->session->userdata($this->id.'kodekabup');
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:30;
		$offset = ($this->uri->segment(3))?$this->uri->segment(3):0;
		
		# get data
		$result = $this->mdl_sdm_dinas->getDataTes($data['numrow'], $offset, $data);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_dinas/index/';
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
		
		$this->load->view('sdm_dinas/dinas_list', $data);
		
		/*
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_dinas/index/';
		$config['total_rows'] = $this->db->count_all('SDM_PEG_DINAS');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['option_provin'] = $this->mdl_sdm_dinas->getprovin();
		$this->load->view('sdm_dinas/sdm_dinas', $data);
		*/
		
		$this->close();
	}
	
	// tambahan dikit tes tes
	function getKabup(){
		echo $this->mdl_sdm_dinas->getOptionKabupByProvin(array('KODEPROVIN'=>$this->input->post('KODEPROVIN')));
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kodeprovin', $this->input->post('KODEPROVIN'));
		$this->session->set_userdata($this->id.'kodekabup', $this->input->post('KODEKABUP'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('sdm_dinas');
	}
    
	
    public function select_kabupkota(){
    			
			if('IS_AJAX') {
            $data['option_kabupkota'] = $this->mdl_sdm_dinas->getkabupkota();
       		$this->load->view('sdm_dinas/kabupkota',$data);
            }
    }
	
	public function select_kabupkota2(){
    			
			if('IS_AJAX') {
            $data['option_kabupkota'] = $this->mdl_sdm_dinas->getkabupkota();
       		$this->load->view('sdm_dinas/kabupkota2',$data);
            }
    }

    public function search2()
	{	
		$this->open();
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_dinas/index/';
		$config['total_rows'] = $this->db->count_all('SDM_PEG_DINAS');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$e1 = $this->input->post('KODEPROVIN');
		$e2 = $this->input->post('KODEKABUP');
		
		$data['option_provin'] = $this->mdl_sdm_dinas->getprovin();
		$data['option_
		
		kabupkota'] = $this->mdl_sdm_dinas->getkabupkota();

		$data['result'] = $this->mdl_sdm_dinas->get_data($e1, $e2);
		
		
		$this->load->view('sdm_dinas/sdm_dinas_search',$data);
		$this->close();
	}
	
	public function detail($id){
		$this->open();
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_dinas/index/';		
		
		$data['result1'] = $this->mdl_sdm_dinas->get_data_duk_detail($id);
		$data['result2'] = $this->mdl_sdm_dinas->get_data_duk_detail_diklat($id);
		$data['result3'] = $this->mdl_sdm_dinas->get_data_duk_detail_pendidikan($id);
		$this->load->view('sdm_dinas/sdm_dinas_detail',$data);
		$this->close();
	}
	
	public function add_diklat($id){
		$this->open();
		
		$data['result'] = $this->mdl_sdm_dinas->getData1($id);
		$data['option_jenjang'] = $this->mdl_sdm_dinas->getjenjang();
		$data['option_diklat'] = $this->mdl_sdm_dinas->getdiklat();
		$this->load->view('sdm_dinas/diklat_add',$data);
		$this->close();
	}
	
	public function proses_add_diklat(){
		$this->open();
		$data['ID_PEG_DINAS'] = $this->input->post('ID_PEG_DINAS');
		$data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
		$data['TAHUN_DIKLAT'] = $this->input->post('TAHUN_DIKLAT');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_DIKLAT', 'Kode Diklat', 'required');
		$this->form_validation->set_rules('TAHUN_DIKLAT', 'Tahun Diklat', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('sdm_dinas/diklat_add',$data);
		}else{
			$this->mdl_sdm_dinas->insert_diklat($data);
			redirect('sdm_dinas/search');
		}
		
		$this->close();
	}
	
	public function proses_add_pendidikan(){
		$this->open();
		$data['ID_PEG_DINAS'] = $this->input->post('ID_PEG_DINAS');
		$data['ID_JENJANG'] = $this->input->post('ID_JENJANG');
		$data['TAHUN_PENDIDIKAN'] = $this->input->post('TAHUN_PENDIDIKAN');
		$data['NAMA_SEKOLAH'] = $this->input->post('NAMA_SEKOLAH');
		
		# set rules validation
		$this->form_validation->set_rules('ID_JENJANG', 'Id Jenjang', 'required');
		$this->form_validation->set_rules('TAHUN_PENDIDIKAN', 'Tahun Pendidikan', 'required');
		$this->form_validation->set_rules('NAMA_SEKOLAH', 'Nama Sekolah', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('sdm_dinas/diklat_add',$data);
		}else{
			$this->mdl_sdm_dinas->insert_pendidikan($data);
			redirect('sdm_dinas');
		}
		
		$this->close();
	}
	
	public function duk()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_dinas/duk/';
		$config['total_rows'] = $this->db->count_all('SDM_PEG_DINAS');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['option_provin'] = $this->mdl_sdm_dinas->getprovin();
		$this->load->view('sdm_dinas/sdm_dinas_duk', $data);
		
		
		$this->close();
	}
	
	public function search_duk()
	{	
		$this->open();
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_dinas/duk/';
		$config['total_rows'] = $this->db->count_all('SDM_PEG_DINAS');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$e1 = $this->input->post('KODEPROVIN');
		$e2 = $this->input->post('KODEKABUP');
		
		$data['option_provin'] = $this->mdl_sdm_dinas->getprovin();
		$data['option_kabupkota'] = $this->mdl_sdm_dinas->getkabupkota();

		$data['result'] = $this->mdl_sdm_dinas->get_data_duk($e1, $e2);
		
		
		$this->load->view('sdm_dinas/sdm_dinas_duk_search',$data);
		$this->close();
	}


	public function edit($id){
		$this->open();
		
		$data['ID_PEG_DINAS'] = $id;
		$data['option_golongan'] = $this->mdl_sdm_dinas->getgolongan();
		$data['option_jabatan'] = $this->mdl_sdm_dinas->getjabatan();
		$data['result'] = $this->mdl_sdm_dinas->getDataEdit($id);
		$this->load->view('sdm_dinas/sdm_dinas_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['ID_PEG_DINAS'] = $this->input->post('ID_PEG_DINAS');
		$data['NIP'] = $this->input->post('NIP');
		$data['ALAMAT'] = $this->input->post('ALAMAT');
		$data['ID_GOLONGAN'] = $this->input->post('ID_GOLONGAN');
		$data['TMT_GOLONGAN'] = $this->input->post('TMT_GOLONGAN');
		$data['ID_JABATAN'] = $this->input->post('ID_JABATAN');
		$data['TMT_JABATAN'] = $this->input->post('TMT_JABATAN');
		
		# set rules validation
		$this->form_validation->set_rules('ALAMAT', 'ALAMAT', 'required');
		$data['STATUS'] = $this->input->post('STATUS');
		$data['JML_ANAK'] = $this->input->post('JML_ANAK');
		$this->form_validation->set_rules('ID_GOLONGAN', 'Id Golongan', 'required');
		$this->form_validation->set_rules('TMT_GOLONGAN', 'Tmt Golongan', 'required');
		$this->form_validation->set_rules('ID_JABATAN', 'Id Jabatan', 'required');
		$this->form_validation->set_rules('TMT_JABATAN', 'Tmt Jabatan', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('sdm_dinas/sdm_dinas_edit',$data);
		}else{
			$this->mdl_sdm_dinas->update($data);
			redirect('sdm_dinas');
		}
		
		$this->close();
	}
	
	public function add(){
		$this->open();
		$data['option_golongan'] = $this->mdl_sdm_dinas->getgolongan();
		$data['option_jabatan'] = $this->mdl_sdm_dinas->getjabatan();
		$data['option_provin'] = $this->mdl_sdm_dinas->getprovin();
		$this->load->view('sdm_dinas/dinas_add',$data);
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		//$data['ID_PEG_DINAS'] = $this->input->post('ID_PEG_DINAS');
		$data['KODEPROVIN'] = $this->input->post('KODEPROVIN');
		$data['KODEKABUP'] = $this->input->post('KODEKABUP');
		$data['NIP'] = $this->input->post('NIP');
		$data['NAMA'] = $this->input->post('NAMA');
		$data['ALAMAT'] = $this->input->post('ALAMAT');
		$data['JENIS_KELAMIN'] = $this->input->post('JENIS_KELAMIN');
		$data['AGAMA'] = $this->input->post('AGAMA');
		$data['STATUS'] = $this->input->post('STATUS');
		$data['TGL_LAHIR'] = "to_date('".$this->input->post('TGL_LAHIR')."', 'mm/dd/yyyy')";
		//$data['TGL_LAHIR'] = $this->input->post('TGL_LAHIR');
		$data['TMPT_LAHIR'] = $this->input->post('TMPT_LAHIR');
		$data['JML_ANAK'] = $this->input->post('JML_ANAK');
		$data['TMT'] = $this->input->post('TMT');
		$data['ID_GOLONGAN'] = $this->input->post('ID_GOLONGAN');
		$data['TMT_GOLONGAN'] = $this->input->post('TMT_GOLONGAN');
		$data['ID_JABATAN'] = $this->input->post('ID_JABATAN');
		$data['TMT_JABATAN'] = $this->input->post('TMT_JABATAN');
		$data['KETERANGAN'] = $this->input->post('KETERANGAN');
		$data['STATUS_PEG'] = $this->input->post('STATUS_PEG');
		# set rules validation
		$this->form_validation->set_rules('NIP', 'NIP', 'required');
		$this->form_validation->set_rules('NAMA', 'NAMA', 'required');
		$this->form_validation->set_rules('ALAMAT', 'ALAMAT', 'required');
		$this->form_validation->set_rules('TMT', 'Tahun Pengangkatan', 'required');
		$this->form_validation->set_rules('TMT_GOLONGAN', 'Tahun Golongan', 'required');
		$this->form_validation->set_rules('TMT_JABATAN', 'Tahun Jabatan', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){

			$data['option_golongan'] = $this->mdl_sdm_dinas->getgolongan();
			$data['option_jabatan'] = $this->mdl_sdm_dinas->getjabatan();
			$data['option_provin'] = $this->mdl_sdm_dinas->getprovin();
			
			$this->load->view('sdm_dinas/dinas_add',$data);

		}else{
			$this->mdl_sdm_dinas->insert($data);
			redirect('sdm_dinas');
		}
		
		$this->close();
	}
}
?>