<?php 
class Dinas extends CI_Controller{
function __construct()
{
	parent:: __construct();
	$this->load->model('Mdinas');
	//$this->load->model('Lowongan_model');
	$this->load->library('pagination');
	//$this->output->enable_profiler(TRUE);
}
 
    /*function index(){
        $data['option_country'] = $this->MChain->getcountry();
        $this->load->view('chain/index',$data);
    }*/
 
    function select_provinsi(){
		$data['title']	='DATA PEGAWAI DINAS';
		$data['home']	='selected';
		$data['main']	='form/dinas1';
		
		if('IS_AJAX'){
		$data['option_prov'] = $this->Mdinas->getprov();
		}
		
		$this->load->view('container/template',$data);
 	}
    
	
    function select_kabkota(){
            			
			if('IS_AJAX') {
            $data['option_kabkota'] = $this->Mdinas->getkabkota();
       		$this->load->view('form/selectkabkota',$data);
            }
    }
	 
    function search()
	{	
		$data['title']	='DATA PEGAWAI DINAS ';
		$data['home']	='selected';
		$data['main']	='form/dinas1_search';
		
		$e1 = $this->input->post('kodeprovin');
		$e2 = $this->input->post('kodekabup');
				
		$data['option_prov'] = $this->Mdinas->getprov();
		$data['result'] = $this->Mdinas->get_data($e1, $e2);
		
		$this->load->view('container/template',$data);
	}
	
	function detail($id){
		$data['title']	='DETAIL DATA PEGAWAI DINAS ';
		$data['home']	='selected';
		$data['main']	='form/dinas1_detail';
		
		$data['result'] = $this->Mdinas->get_data_detail($id);
		
		$this->load->view('container/template',$data);
	}
}
?>