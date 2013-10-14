<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kurikulum extends My_Frontpage {
	
	var $id = 'front_kurikulum';
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_kurikulum');
		$this->load->model('mdl_satker');
	}
	
	public function index($upt="")
	{
		//redirect('kurikulum');
		$this->load->model('mdl_kurikulum');
		$this->load->model('mdl_program');
		$this->load->model('mdl_satker');
		
		$this->open();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('kurikulum/kurikulum_list', $data);
		}else{
			$this->load->view('kurikulum/kurikulum_list');
		}
		$this->close();
	}
	
	/* public function kurikulum($upt=""){
		$this->load->model('mdl_kurikulum');
		$this->load->model('mdl_program');
		
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('kurikulum_list', $data);
		}else{
			$this->load->view('kurikulum_list');
		}
		$this->closefron t();
	}  */
	
	public function kurikulum_detail($diklat, $upt){
		$this->load->model('mdl_kurikulum');
		$this->load->model('mdl_program');
		
		$this->open();
		$data['diklat'] = $this->mdl_program->getDiklatbyId($diklat, $upt);
		$data['upt'] = $this->mdl_satker->getUPTById($upt);
		$data['kurikulum'] = $this->mdl_kurikulum->getKurikulumByDiklat($diklat);
		$this->load->view('kurikulum/kurikulum_list_detail', $data);
		$this->close();
	}
	
}

