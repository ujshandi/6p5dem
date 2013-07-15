<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class diklat extends My_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		redirect("diklat/alumni/");
	}

	function alumni($upt=0, $diklat=0){
		$this->load->model('mdl_diklat');
		$this->load->model('mdl_upt');
		$this->load->model('mdl_alumni');
		$this->open();

		$data['title'] = 'Alumni Berdasarkan ';
		if($upt==0){
			$data['title'] .= 'UPT ';
			$data['stat'] = $this->mdl_upt->getData('');
			//$data['statF'] = $this->mdl_upt->getData('Wanita');
			//$data['statM'] = $this->mdl_provinsi->getData('Pria');
			$this->load->view('diklat/alumni/alumni_upt', $data);
		}
		elseif($diklat==0){
			$data['title'] .= 'UPT '.$this->mdl_upt->getUptByID($upt)->NAMA_UPT;
			$data['stat'] = $this->mdl_diklat->getData($upt, '');
			//$data['statF'] = $this->mdl_kbupaten->getData($prov, 'Wanita');
			//$data['statM'] = $this->mdl_kbupaten->getData($prov, 'Pria');
			$this->load->view('diklat/alumni/alumni_diklat', $data);
		}
		// else{
		// 	$data['title'] .= 'Kabupaten/Kota '.$this->mdl_kbupaten->getKabByID($kab)->NAMAKABUP;
		// 	$data['stat'] = $this->mdl_kbupaten->getData($prov);
		// 	$this->load->view('sdm/dinas/sdm_kab', $data);
		// }
		
		$this->close();
	}
/*
	function kementerian($e1='', $e2='', $e3='', $e4=''){
		$this->load->model('mdl_eselon1');
		$this->load->model('mdl_eselon2');
		$this->load->model('mdl_eselon3');
		$this->load->model('mdl_eselon4');
		$this->open();

		$data['title'] = 'Kementerian ';
		
		if($e1==''){
			$data['title'] .= 'Eselon 1 ';
			$data['stat'] = $this->mdl_eselon1->getData('');
			$data['statF'] = $this->mdl_eselon1->getData('Wanita');
			$data['statM'] = $this->mdl_eselon1->getData('Pria');
			$this->load->view('sdm/kementerian/sdm_e1', $data);
		}
		elseif($e2==''){
			$data['title'] .= 'Eselon 1 | '.$this->mdl_eselon1->getEselon1ByID($e1)->NAMA_ESELON_1;
			$data['stat'] = $this->mdl_eselon2->getData($e1,$this->input->post('JENIS_KELAMIN'));
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
*/	
}
