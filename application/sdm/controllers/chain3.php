<?php 
class Chain3 extends CI_Controller{
function __construct()
{
	parent:: __construct();
	$this->load->model('MChain');
	//$this->load->model('Lowongan_model');
	$this->load->library('pagination');
	//$this->output->enable_profiler(TRUE);
}
 
    /*function index(){
        $data['option_country'] = $this->MChain->getcountry();
        $this->load->view('chain/index',$data);
    }*/
 
    function select_eselon1(){
		$data['title']	='PEGAWAI KEMENTERIAN BERDASARKAN DUK ';
		$data['home']	='selected';
		$data['main']	='form/duk1';
		
		if('IS_AJAX'){
		$data['option_eselon1'] = $this->MChain->geteselon1();
		}
		
		$this->load->view('container/template',$data);
 	}
    
	
    function select_eselon2(){
            //$data['title']	='PEGAWAI KEMENTRIAN ';
			//$data['home']	='selected';
			//$data['main']	='form/selecteselon2';
			
			if('IS_AJAX') {
            $data['option_eselon2'] = $this->MChain->geteselon2();
       		$this->load->view('form/selecteselon2',$data);
            }
    }
	
	 function select_eselon3(){
           // $data['title']	='PEGAWAI KEMENTRIAN ';
			//$data['home']	='selected';
			//$data['main']	='form/selecteselon3';
			
			if('IS_AJAX') {
            $data['option_eselon3'] = $this->MChain->geteselon3();
       		$this->load->view('form/selecteselon3',$data);
            }
    }
	
	function select_eselon4(){
           // $data['title']	='PEGAWAI KEMENTRIAN ';
			//$data['home']	='selected';
			//$data['main']	='form/selecteselon3';
			
			if('IS_AJAX') {
            $data['option_eselon4'] = $this->MChain->geteselon4();
       		$this->load->view('form/selecteselon4',$data);
            }
    }
 
    function search()
	{	
		$data['title']	='PEGAWAI KEMENTERIAN BERDASARKAN DUK ';
		$data['home']	='selected';
		$data['main']	='form/duk1_search';
		
		$e1 = $this->input->post('id_eselon_1');
		$e2 = $this->input->post('id_eselon_2');
		$e3 = $this->input->post('id_eselon_3');
		$e4 = $this->input->post('id_eselon_4');
		
		$data['option_eselon1'] = $this->MChain->geteselon1();
		$data['option_eselon2'] = $this->MChain->geteselon2();
		$data['option_eselon3'] = $this->MChain->geteselon3();
		$data['option_eselon4'] = $this->MChain->geteselon4();
		$data['result'] = $this->MChain->get_data_duk($e1, $e2, $e3, $e4);
		
		$this->load->view('container/template',$data);
	}
	
	function detail($id){
		$data['title']	='DETAIL PEGAWAI KEMENTERIAN BERDASARKAN DUK ';
		$data['home']	='selected';
		$data['main']	='form/duk1_detail';
		
		$data['result'] = $this->MChain->get_data_duk_detail($id);
		
		$this->load->view('container/template',$data);
	}
	
}
?>