<?php 
class Chain extends CI_Controller{
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
		$data['title']	='DATA PEGAWAI KEMENTERIAN ';
		$data['home']	='selected';
		$data['main']	='form/kementrian1';
		
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
			
			if('IS_AJAX') {
            $data['option_eselon4'] = $this->MChain->geteselon4();
       		$this->load->view('form/selecteselon4',$data);
            }
    }
 
    function search()
	{	
		$data['title']	='DATA PEGAWAI KEMENTERIAN ';
		$data['home']	='selected';
		$data['main']	='form/kementrian1_search';
		
		$e1 = $this->input->post('id_eselon_1');
		$e2 = $this->input->post('id_eselon_2');
		$e3 = $this->input->post('id_eselon_3');
		$e4 = $this->input->post('id_eselon_4');
		
		$data['option_eselon1'] = $this->MChain->geteselon1();
		$data['option_eselon2'] = $this->MChain->geteselon2();
		$data['option_eselon3'] = $this->MChain->geteselon3();
		$data['option_eselon4'] = $this->MChain->geteselon4();
		$data['result'] = $this->MChain->get_data($e1, $e2, $e3, $e4);
		
		$this->load->view('container/template',$data);
	}
	
	function detail($id){
		$data['title']	='DETAIL DATA PEGAWAI KEMENTERIAN ';
		$data['home']	='selected';
		$data['main']	='form/kementrian1_detail';
		
		$data['result'] = $this->MChain->get_data_duk_detail($id);
		$this->load->view('container/template',$data);
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
	
	public function add_peg(){
		//get eselon
		$data['option_eselon1'] = $this->MChain->geteselon1();
		$data['option_eselon2'] = $this->MChain->geteselon2();
		$data['option_eselon3'] = $this->MChain->geteselon3();
		$data['option_eselon4'] = $this->MChain->geteselon4();
		//get golongan
		$data['option_golongan'] = $this->MChain->getgolongan();
		//get jabatan
		$data['option_jabatan'] = $this->MChain->getjabatan();
		$data['option_jenisKelamin'] = array(
				''=>'-Pilih-',
				'pria'=>'pria',
				'wanita'=>'wanita'
		);
		$data = array(
				'id_eselon_1'=>$data['option_eselon1'],
				'id_eselon_2'=>$data['option_eselon2'],
				'id_eselon_3'=>$data['option_eselon3'],
				'id_eselon_4'=>$data['option_eselon4'],
				'id_golongan'=>$data['option_golongan'],
				'id_jabatan'=>$data['option_jabatan'],
				'jenisKelamin'=>$data['option_jenisKelamin'],
				'title'=>'TAMBAH PEGAWAI',
				'form'=>'selected',
				'main'=>'form/add/add_peg'
		); 
		$this->load->view('container/template',$data);
	}
	
}
?>