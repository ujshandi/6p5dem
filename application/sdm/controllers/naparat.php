<?php 
class Naparat extends CI_Controller{
function __construct()
{
	parent:: __construct();
	$this->load->model('Mnaparat');
	//$this->load->model('Lowongan_model');
	$this->load->library('pagination');
	//$this->output->enable_profiler(TRUE);
}
  function select_matra(){
		$data['title']	='DATA PEGAWAI NON APARATUR';
		$data['home']	='selected';
		$data['main']	='form/naparat';
		
		if('IS_AJAX'){
		$data['option_matra'] = $this->Mnaparat->getmatra();
		}
		
		$this->load->view('container/template',$data);
 	}

 	function search()
	{	
		$data['title']	='DATA PEGAWAI NON APARATUR ';
		$data['home']	='selected';
		$data['main']	='form/naparat_search';
		
		$e1 = $this->input->post('kodematra');
				
		$data['option_matra'] = $this->Mnaparat->getmatra();
		$data['result'] = $this->Mnaparat->get_data($e1);
		
		$this->load->view('container/template',$data);
	}
	
	function detail($id){
		$data['title']	='DETAIL DATA PEGAWAI NON APARATUR ';
		$data['home']	='selected';
		$data['main']	='form/naparat_detail';
		
		$data['result'] = $this->Mnaparat->get_data_detail($id);
		
		$this->load->view('container/template',$data);
	}
}
?>