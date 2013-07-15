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
	
	function peserta($upt=0, $diklat=0){
		$this->load->model('mdl_diklat');
		$this->load->model('mdl_upt');
		$this->load->model('mdl_peserta');
		$this->open();

		$data['title'] = 'Peserta Berdasarkan ';
		if($upt==0){
			$data['title'] .= 'UPT ';
			$data['stat'] = $this->mdl_upt->getData('');
			//$data['statF'] = $this->mdl_upt->getData('Wanita');
			//$data['statM'] = $this->mdl_provinsi->getData('Pria');
			$this->load->view('diklat/peserta/peserta_upt', $data);
		}
		elseif($diklat==0){
			$data['title'] .= 'UPT '.$this->mdl_upt->getUptByID($upt)->NAMA_UPT;
			$data['stat'] = $this->mdl_diklat->getData($upt, '');
			//$data['statF'] = $this->mdl_kbupaten->getData($prov, 'Wanita');
			//$data['statM'] = $this->mdl_kbupaten->getData($prov, 'Pria');
			$this->load->view('diklat/peserta/peserta_diklat', $data);
		}
		// else{
		// 	$data['title'] .= 'Kabupaten/Kota '.$this->mdl_kbupaten->getKabByID($kab)->NAMAKABUP;
		// 	$data['stat'] = $this->mdl_kbupaten->getData($prov);
		// 	$this->load->view('sdm/dinas/sdm_kab', $data);
		// }
		
		$this->close();
	}
	
}
