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
		
		$data['option_eselon1'] = $this->mdl_sdm_kementerian->geteselon1();
		$this->load->view('sdm_kementerian/sdm_kementerian', $data);
		
		
		$this->close();
	}
    
	
    function select_eselon2(){
    			
			if('IS_AJAX') {
            $data['option_eselon2'] = $this->mdl_sdm_kementerian->geteselon2();
       		$this->load->view('sdm_kementerian/selecteselon2',$data);
            }
    }
	
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
		$this->open();
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_kementerian/index/';		
		
		$data['result1'] = $this->mdl_sdm_kementerian->get_data_duk_detail($id);
		$data['result2'] = $this->mdl_sdm_kementerian->get_data_duk_detail_diklat($id);
		$data['result3'] = $this->mdl_sdm_kementerian->get_data_duk_detail_pendidikan($id);
		$data['result4'] = $this->mdl_sdm_kementerian->get_data_duk_detail_pangkat($id);
		$this->load->view('sdm_kementerian/sdm_kementerian_detail',$data);
		$this->close();
	}
	
	function edit($id){
		$data['title']	='EDIT DATA PEGAWAI KEMENTERIAN ';
		$data['home']	='selected';
		$data['main']	='form/edit/kementrian1_edit';
		
		//$data['option_golongan'] =$this->MChain->get_golongan();
		//$data['option_jabatan'] =$this->MChain->get_jabatan();
		if($this->input->post('submit')){
			$id = $this->input->post('id_peg_kementrian');
			$this->MChain->update($id);
		}
		$data['result'] = $this->MChain->get_data_duk_detail($id);
		$this->load->view('container/template',$data);
	}
	
	function tes($id){
		$data['title']	='Detail Pegawai';
		$data['home']	='selected';
		$data['main']	='form/detail';
		
		$data['result1'] = $this->MChain->get_data_duk_detail($id);
		$data['result2'] = $this->MChain->get_data_duk_detail_diklat($id);
		$this->load->view('container/template', $data);
	}
	
	
}
?>