<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sdm extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_kbupaten');
		$this->load->model('mdl_provinsi');
		$this->load->model('mdl_peg_dinas');
	}
	
	public function index()
	{
		redirect("sdm/dinas/");
	}

	function dinas($prov=0, $kab=0){
		$this->open();

		$data['title'] = 'Dinas ';
		
		if($prov==0){
			$data['title'] .= 'Provinsi ';
			$data['stat'] = $this->mdl_provinsi->getData();
			$this->load->view('sdm/dinas/sdm_prov', $data);
		}
		elseif($kab==0){
			$data['title'] .= 'Provinsi '.$this->mdl_provinsi->getProvByID($prov)->NAMAPROVIN;
			$data['stat'] = $this->mdl_kbupaten->getData($prov);
			$this->load->view('sdm/dinas/sdm_kab', $data);
		}
		else{
			$data['title'] .= 'Kabupaten/Kota '.$this->mdl_kbupaten->getKabByID($kab)->NAMAKABUP;
			$data['stat'] = $this->mdl_kbupaten->getData($prov);
			$this->load->view('sdm/dinas/sdm_kab', $data);
		}
		
		$this->close();
	}
	
}
