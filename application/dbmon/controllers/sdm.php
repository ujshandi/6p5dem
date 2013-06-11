<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sdm extends My_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		redirect("sdm/dinas/");
	}

	function dinas($prov=0, $kab=0){
		$this->load->model('mdl_kbupaten');
		$this->load->model('mdl_provinsi');
		$this->load->model('mdl_peg_dinas');
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
		// else{
		// 	$data['title'] .= 'Kabupaten/Kota '.$this->mdl_kbupaten->getKabByID($kab)->NAMAKABUP;
		// 	$data['stat'] = $this->mdl_kbupaten->getData($prov);
		// 	$this->load->view('sdm/dinas/sdm_kab', $data);
		// }
		
		$this->close();
	}

	function kementerian($e1='', $e2='', $e3='', $e4=''){
		$this->load->model('mdl_eselon1');
		$this->load->model('mdl_eselon2');
		$this->load->model('mdl_eselon3');
		$this->load->model('mdl_eselon4');
		$this->open();

		$data['title'] = 'Kementerian ';
		
		if($e1==''){
			$data['title'] .= 'Eselon 1 ';
			$data['stat'] = $this->mdl_eselon1->getData();
			$this->load->view('sdm/kementerian/sdm_e1', $data);
		}
		elseif($e2==''){
			$data['title'] .= 'Eselon 1 | '.$this->mdl_eselon1->getEselon1ByID($e1)->NAMA_ESELON_1;
			$data['stat'] = $this->mdl_eselon2->getData($e1);
			$this->load->view('sdm/kementerian/sdm_e2', $data);
		}
		elseif($e3==''){
			$data['title'] .= 'Eselon 2 | '.$this->mdl_eselon2->getEselon2ByID($e1)->NAMA_ESELON_2;
			$data['stat'] = $this->mdl_eselon3->getData($e2);
			$this->load->view('sdm/kementerian/sdm_e3', $data);
		}
		// else{
		// 	$data['title'] .= 'Kabupaten/Kota '.$this->mdl_kbupaten->getKabByID($kab)->NAMAKABUP;
		// 	$data['stat'] = $this->mdl_kbupaten->getData($prov);
		// 	$this->load->view('sdm/dinas/sdm_kab', $data);
		// }
		
		$this->close();

	}
	
}
