<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sdm_kementerian extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_sdm_kementerian');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_kementerian/index/';
		$config['total_rows'] = $this->db->count_all('SDM_PEG_KEMENTRIAN');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['option_kantor'] = $this->mdl_sdm_kementerian->getkantor();
		$this->load->view('sdm_kementerian/sdm_kementerian_new', $data);
		
		
		$this->close();
	}
	
	// --- penyesuaian dengan pusdatin
	public function select_satker(){
    			
			if('IS_AJAX') {
            $data['option_satker'] = $this->mdl_sdm_kementerian->getsatker();
       		$this->load->view('sdm_kementerian/satker',$data);
            }
    }
    
	// pemanggilan combo sater untuk proses add
	public function select_satker2(){
    			
			if('IS_AJAX') {
            $data['option_satker'] = $this->mdl_sdm_dinas->getsatker();
       		$this->load->view('sdm_dinas/satker2',$data);
            }
    }
	
	function search_new()
	{	
		$this->open();
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_kementerian/index/';
		$config['total_rows'] = $this->db->count_all('SDM_PEGAWAI');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$d1 = $this->input->post('KODEKANTOR');
		$d2 = $this->input->post('KODEUNIT');
		
		$data['option_kantor'] = $this->mdl_sdm_kementerian->getkantor();
		$data['option_satker'] = $this->mdl_sdm_kementerian->getsatker();
		$data['result'] = $this->mdl_sdm_kementerian->get_data2($d1, $d2);
		
		
		$this->load->view('sdm_kementerian/sdm_kementerian_searchNew',$data);
		$this->close();
	}
	
	function detail_new($id){
		$this->open();	
		$data['result1'] = $this->mdl_sdm_kementerian->get_data_detail_new($id);
		//$data['result2'] = $this->mdl_sdm_kementerian->get_data_detail_diklat($id);
		//$data['result2'] = $this->mdl_sdm_kementerian->get_data_detail_pendidikan($id);
		$this->load->view('sdm_kementerian/sdm_kementerian_detail',$data);
		$this->close();
	}
	
	// sebelum migrasi
    function select_eselon2(){
    			
			if('IS_AJAX') {
            $data['option_eselon2'] = $this->mdl_sdm_kementerian->geteselon2();
       		$this->load->view('sdm_kementerian/selecteselon2',$data);
            }
    }
	
	//add pegawai
	function select_eselon2_add(){
    			
			if('IS_AJAX') {
            $data['option_eselon2'] = $this->mdl_sdm_kementerian->geteselon2();
       		$this->load->view('sdm_kementerian/selecteselon2_add',$data);
            }
    }
	
	function select_eselon3_add(){
    			
			if('IS_AJAX') {
            $data['option_eselon3'] = $this->mdl_sdm_kementerian->geteselon3();
       		$this->load->view('sdm_kementerian/selecteselon3_add',$data);
            }
    }
	
	function select_eselon4_add(){
    			
			if('IS_AJAX') {
            $data['option_eselon4'] = $this->mdl_sdm_kementerian->geteselon4();
       		$this->load->view('sdm_kementerian/selecteselon4_add',$data);
            }
    }
	
	//end add pegawai
	
	 function select_eselon3(){
			
			if('IS_AJAX') {
            $data['option_eselon3'] = $this->mdl_sdm_kementerian->geteselon3();
       		$this->load->view('sdm_kementerian/selecteselon3',$data);
            }
    }
	
	function select_eselon4(){
			
			if('IS_AJAX') {
            $data['option_eselon4'] = $this->mdl_sdm_kementerian->geteselon4();
       		$this->load->view('sdm_kementerian/selecteselon4',$data);
            }
    }
 
    function search()
	{	
		$this->open();
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_kementerian/index/';
		$config['total_rows'] = $this->db->count_all('SDM_PEG_KEMENTRIAN');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$e1 = $this->input->post('ID_ESELON_1');
		$e2 = $this->input->post('ID_ESELON_2');
		$e3 = $this->input->post('ID_ESELON_3');
		$e4 = $this->input->post('ID_ESELON_4');
		
		$data['option_eselon1'] = $this->mdl_sdm_kementerian->geteselon1();
		$data['option_eselon2'] = $this->mdl_sdm_kementerian->geteselon2();
		$data['option_eselon3'] = $this->mdl_sdm_kementerian->geteselon3();
		$data['option_eselon4'] = $this->mdl_sdm_kementerian->geteselon4();
		$data['result'] = $this->mdl_sdm_kementerian->get_data($e1, $e2, $e3, $e4);
		
		
		$this->load->view('sdm_kementerian/sdm_kementerian_search',$data);
		$this->close();
	}
	
	function detail($id){
		$data['title']	='DETAIL DATA PEGAWAI KEMENTERIAN ';
		$data['home']	='selected';
		$data['main']	='form/kementerian1_detail';
		
//<<<<<<< .mine
		$data['result'] = $this->mdl_sdm_kementerian->get_data_duk_detail($id);
		$data['result1'] = $this->mdl_sdm_kementerian->get_data_duk_detail($id);
		$data['result2'] = $this->mdl_sdm_kementerian->get_data_duk_detail_diklat($id);
		$data['result3'] = $this->mdl_sdm_kementerian->get_data_duk_detail_pendidikan($id);
		$data['result4'] = $this->mdl_sdm_kementerian->get_data_duk_detail_pangkat($id);
		$this->load->view('sdm_kementerian/sdm_kementerian_detail',$data);
		$this->close();
//>>>>>>> .r63
	}
	
	
	public function add_diklat($id){
		$this->open();
		
		$data['result'] = $this->mdl_sdm_kementerian->getData1($id);
		$data['option_jenjang'] = $this->mdl_sdm_kementerian->getjenjang();
		$data['option_diklat'] = $this->mdl_sdm_kementerian->getdiklat();
		$this->load->view('sdm_kementerian/diklat_add',$data);
		$this->close();
	}
	
	public function proses_add_diklat(){
		$this->open();
		$data['ID_PEG_KEMENTRIAN'] = $this->input->post('ID_PEG_KEMENTRIAN');
		$data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
		$data['TAHUN_DIKLAT'] = $this->input->post('TAHUN_DIKLAT');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_DIKLAT', 'Kode Diklat', 'required');
		$this->form_validation->set_rules('TAHUN_DIKLAT', 'Tahun Diklat', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('sdm_kementerian/diklat_add',$data);
		}else{
			$this->mdl_sdm_kementerian->insert_diklat($data);
			redirect('sdm_kementerian/search');
		}
		
		$this->close();
	}
	
	public function proses_add_pendidikan(){
		$this->open();
		$data['ID_PEG_KEMENTRIAN'] = $this->input->post('ID_PEG_KEMENTRIAN');
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
			$this->load->view('sdm_kementerian/diklat_add',$data);
		}else{
			$this->mdl_sdm_kementerian->insert_pendidikan($data);
			redirect('sdm_kementerian');
		}
		
		$this->close();
	}
	
	public function add(){
		$this->open();
		$data['option_golongan'] = $this->mdl_sdm_kementerian->getgolongan();
		$data['option_jabatan'] = $this->mdl_sdm_kementerian->getjabatan();
		$data['option_eselon1'] = $this->mdl_sdm_kementerian->geteselon1();
		$this->load->view('sdm_kementerian/kementerian_add',$data);
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		$data['ID_ESELON_1'] = $this->input->post('ID_ESELON_1');
		$data['ID_ESELON_2'] = $this->input->post('ID_ESELON_2');
		$data['ID_ESELON_3'] = $this->input->post('ID_ESELON_3');
		$data['ID_ESELON_4'] = $this->input->post('ID_ESELON_4');
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
			$this->load->view('sdm_kementerian/kementerian_add',$data);
		}else{
			$this->mdl_sdm_kementerian->insert($data);
			redirect('sdm_kementerian');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['ID_PEG_KEMENTRIAN'] = $id;
		$data['option_golongan'] = $this->mdl_sdm_kementerian->getgolongan();
		$data['option_jabatan'] = $this->mdl_sdm_kementerian->getjabatan();
		$data['result'] = $this->mdl_sdm_kementerian->getDataEdit($id);
		$this->load->view('sdm_kementerian/sdm_kementerian_edit', $data);
		
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
		$this->form_validation->set_rules('ID_GOLONGAN', 'Id Golongan', 'required');
		$this->form_validation->set_rules('TMT_GOLONGAN', 'Tmt Golongan', 'required');
		$this->form_validation->set_rules('ID_JABATAN', 'Id Jabatan', 'required');
		$this->form_validation->set_rules('TMT_JABATAN', 'Tmt Jabatan', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('sdm_kementerian/sdm_kementerian_edit',$data);
		}else{
			$this->mdl_sdm_kementerian->update($data);
			redirect('sdm_kementerian/search');
		}
		
		$this->close();
	}
	
	//daftar urut kepangkatan (DUK)
	
	public function duk()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_kementerian/duk/';
		$config['total_rows'] = $this->db->count_all('SDM_PEG_KEMENTRIAN');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['option_eselon1'] = $this->mdl_sdm_kementerian->geteselon1();
		$this->load->view('sdm_kementerian/sdm_kementerian_duk', $data);
		
		
		$this->close();
	}
	
	public function search_duk()
	{	
		$this->open();
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_kementerian/duk/';
		$config['total_rows'] = $this->db->count_all('SDM_PEG_KEMENTRIAN');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$e1 = $this->input->post('ID_ESELON_1');
		$e2 = $this->input->post('ID_ESELON_2');
		$e3 = $this->input->post('ID_ESELON_3');
		$e4 = $this->input->post('ID_ESELON_4');
		
		$data['option_eselon1'] = $this->mdl_sdm_kementerian->geteselon1();
		$data['option_eselon2'] = $this->mdl_sdm_kementerian->geteselon2();
		$data['option_eselon3'] = $this->mdl_sdm_kementerian->geteselon3();
		$data['option_eselon4'] = $this->mdl_sdm_kementerian->geteselon4();

		$data['result'] = $this->mdl_sdm_kementerian->get_data_duk($e1, $e2, $e3, $e4);
		
		
		$this->load->view('sdm_kementerian/sdm_kementerian_duk_search',$data);
		$this->close();
	}


}
?>