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
		
		$e1 = ($this->input->post('KODE_INDUK'))?$this->input->post('KODE_INDUK'):'4';
		$e2 = ($this->input->post('KODE_PROGRAM'))?$this->input->post('KODE_PROGRAM'):'P43';

		$data['option_indukupt'] = $this->mdl_alumni->getIndukUpt();
		$data['option_program'] = $this->mdl_alumni->getProgram();
		
		$data['title'] = 'Alumni Berdasarkan ';
		if($upt==0){
			$data['title'] .= 'UPT ';
			$data['tahun'] = array('2005','2006','2007','2008','2009','2010','2011','2012','2013');
			// Get Data berparameter (Kode Induk, Kode Program, & Tahun dalam bentuk array)
			$data['data'] = $this->mdl_alumni->getData($e1,$e2,$data['tahun']);
			$this->load->view('diklat/alumni/alumni_diklat_new', $data);
		}
		elseif($diklat==0){
			$data['title'] .= 'UPT '.$this->mdl_upt->getUptByID($upt)->NAMA_UPT;
			$data['stat'] = $this->mdl_diklat->getData($upt, '');
			$this->load->view('diklat/alumni/alumni_diklat_new', $data);
		}
		
		$this->close();
	}
	
	function peserta($upt=0, $diklat=0){
		$this->load->model('mdl_diklat');
		$this->load->model('mdl_upt');
		$this->load->model('mdl_peserta');
		$this->open();

		$e1 = ($this->input->post('KODE_INDUK'))?$this->input->post('KODE_INDUK'):'4';
		$e2 = ($this->input->post('KODE_PROGRAM'))?$this->input->post('KODE_PROGRAM'):'P43';

		$data['option_indukupt'] = $this->mdl_peserta->getIndukUpt();
		$data['option_program'] = $this->mdl_peserta->getProgram();

		$data['title'] = 'Peserta Berdasarkan ';
		if($upt==0){
			$data['title'] .= 'UPT ';
			$data['tahun'] = array('2010','2011','2012','2013');
			// Get Data berparameter (Kode Induk, Kode Program, & Tahun dalam bentuk array)
			$data['data'] = $this->mdl_peserta->getData($e1,$e2,$data['tahun']);
			$this->load->view('diklat/peserta/peserta_diklat_new', $data);
		}
		elseif($diklat==0){
			$data['title'] .= 'UPT '.$this->mdl_upt->getUptByID($upt)->NAMA_UPT;
			$data['stat'] = $this->mdl_diklat->getData($upt, '');
			$this->load->view('diklat/peserta/peserta_diklat_new', $data);
		}
		
		$this->close();
	}
	
	// public function searchAlumni($upt=0, $diklat=0)
	// {	
	// 	$this->load->model('mdl_diklat');
	// 	$this->load->model('mdl_upt');
	// 	$this->load->model('mdl_alumni');
	// 	$this->open();
			
	// 	$e1 = $this->input->post('KODE_INDUK');
	// 	$e2 = $this->input->post('KODE_PROGRAM');
		
	// 	$data['option_indukupt'] = $this->mdl_alumni->getIndukUpt();
	// 	$data['option_program'] = $this->mdl_alumni->getProgram();

	// 	//$data['result'] = $this->mdl_peserta->get_data($e1, $e2);
	// 	$data['title'] = 'Alumni Berdasarkan ';
	// 	if($upt==0){
	// 		$data['title'] .= 'UPT ';
	// 		$data['tahun'] = array('2005','2006','2007','2008','2009','2010','2011','2012','2013');
	// 		// Get Data berparameter (Kode Induk, Kode Program, & Tahun dalam bentuk array)
	// 		//$data['data'] = $this->mdl_peserta->getData('5','P53',$data['tahun']);
	// 		$data['data'] = $this->mdl_alumni->getData2($e1,$e2,$data['tahun']);
	// 		$this->load->view('diklat/alumni/alumni_diklat_new', $data);
	// 	}
	// 	elseif($diklat==0){
	// 		$data['title'] .= 'UPT '.$this->mdl_upt->getUptByID($upt)->NAMA_UPT;
	// 		$data['stat'] = $this->mdl_diklat->getData($upt, '');
	// 		$this->load->view('diklat/alumni/alumni_diklat_new', $data);
	// 	}
		
	// 	//$this->load->view('sdm_dinas/sdm_dinas_search',$data);
	// 	$this->close();
	// }
	
	// public function search($upt=0, $diklat=0)
	// {	
	// 	$this->load->model('mdl_diklat');
	// 	$this->load->model('mdl_upt');
	// 	$this->load->model('mdl_peserta');
	// 	$this->open();
			
	// 	$e1 = $this->input->post('KODE_INDUK');
	// 	$e2 = $this->input->post('KODE_PROGRAM');
		
	// 	$data['option_indukupt'] = $this->mdl_peserta->getIndukUpt();
	// 	$data['option_program'] = $this->mdl_peserta->getProgram();

	// 	//$data['result'] = $this->mdl_peserta->get_data($e1, $e2);
	// 	$data['title'] = 'Peserta Berdasarkan ';
	// 	if($upt==0){
	// 		$data['title'] .= 'UPT ';
	// 		$data['tahun'] = array('2010','2011','2012','2013');
	// 		// Get Data berparameter (Kode Induk, Kode Program, & Tahun dalam bentuk array)
	// 		//$data['data'] = $this->mdl_peserta->getData('5','P53',$data['tahun']);
	// 		$data['data'] = $this->mdl_peserta->getData2($e1,$e2,$data['tahun']);
	// 		$this->load->view('diklat/peserta/peserta_diklat_new', $data);
	// 	}
	// 	elseif($diklat==0){
	// 		$data['title'] .= 'UPT '.$this->mdl_upt->getUptByID($upt)->NAMA_UPT;
	// 		$data['stat'] = $this->mdl_diklat->getData($upt, '');
	// 		$this->load->view('diklat/peserta/peserta_diklat_new', $data);
	// 	}
		
	// 	//$this->load->view('sdm_dinas/sdm_dinas_search',$data);
	// 	$this->close();
	// }
	
	function select_program(){
  
			if('IS_AJAX') {
			$this->load->model('mdl_peserta');	
            $data['option_program'] = $this->mdl_peserta->getProgram();
       		//$this->load->view('diklat/peserta/program',$data);
       		echo form_dropdown("KODE_PROGRAM",$data['option_program'],$this->input->post('KODE_PROGRAM'),"id='KODE_PROGRAM'");
            }
    }
	
}
