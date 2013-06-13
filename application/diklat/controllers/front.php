<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class front extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_satker');
	}
	
	public function index()
	{
		redirect('front/kurikulum');
	}
	
	public function kurikulum($upt=""){
		$this->load->model('mdl_kurikulum');
		$this->load->model('mdl_program');
		
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('front/kurikulum_list', $data);
		}else{
			$this->load->view('front/kurikulum_list');
		}
		$this->closefront();
	}
	
	public function kurikulum_detail($diklat, $upt){
		$this->load->model('mdl_kurikulum');
		$this->load->model('mdl_program');
		
		$this->openfront();
		$data['diklat'] = $this->mdl_program->getDiklatbyId($diklat, $upt);
		$data['upt'] = $this->mdl_satker->getUPTById($upt);
		$data['kurikulum'] = $this->mdl_kurikulum->getKurikulumByDiklat($diklat);
		//$this->load->view('front/kurikulum_list_detail', $data);
		$this->closefront();
	}
	
	public function dosen($upt=""){
		$this->load->model('mdl_dosen');
		
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('front/dosen_list', $data);
		}else{
			$this->load->view('front/dosen_list');
		}
		$this->closefront();
	}
	
	
}
