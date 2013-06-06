<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class front extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_satker');
		$this->load->model('mdl_kurikulum');
	}
	
	public function index()
	{
		redirect('front/kurikulum');
	}
	
	public function kurikulum($upt=""){
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('front/kurikulum_list', $data);
		}else{
			$this->load->view('front/kurikulum_list');
		}
		$this->closefront();
	}
	
	
}
