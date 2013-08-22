<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class diklat extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_upt');
		$this->load->model('mdl_satker');
		$this->load->model('mdl_program');
		$this->load->model('mdl_peserta');
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
		
		$e1 = ($this->input->post('KODE_INDUK'))?$this->input->post('KODE_INDUK'):'0';
		$e2 = ($this->input->post('KODE_PROGRAM'))?$this->input->post('KODE_PROGRAM'):'0';
		$data['tahun_awal'] = ($this->input->post('tahun_awal'))?$this->input->post('tahun_awal'):2005;
		$data['tahun_akhir'] = ($this->input->post('tahun_akhir'))?$this->input->post('tahun_akhir'):2013;

		$data['option_indukupt'] = $this->mdl_alumni->getIndukUpt();
		$data['option_program'] = $this->mdl_alumni->getProgram();

		$data['title'] = 'Alumni Berdasarkan ';
		if($upt==0){
			$data['title'] .= 'UPT ';
			$data['tahun'] = $this->setDataTahun($data['tahun_awal'],$data['tahun_akhir']);
			//$data['tahun'] = array('2005','2006','2007','2008','2009','2010','2011','2012','2013');
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
	
	function peserta(){
		$this->open();
		
		# get post
		$upt = isset($_POST['KODE_UPT'])?$_POST['KODE_UPT']:'';
		
		$program = isset($_POST['KODE_PROGRAM'])?$_POST['KODE_PROGRAM']:'';
		if(isset($_POST['tahun_awal'])){
			$x=0;
			for($i=$_POST['tahun_awal'], $c=$_POST['tahun_akhir']; $i<=$c; $i++){
				$tahun[$x] = $i;
				$x++;
			}
		}else{
			$tahun = array('2010','2011','2012','2013');
		}
		
		
		$data['title'] = 'UPT '.($upt=='')?'':$this->mdl_upt->getUPTById($upt)->NAMA_UPT;
		$data['tahun'] = $tahun;
		
		// Get Data berparameter (Kode Induk, Kode Program, & Tahun dalam bentuk array)
		$data['data'] = $this->mdl_peserta->getData($upt, $program, $data['tahun']);
		
		$this->load->view('diklat/peserta/peserta_diklat_new', $data);
		
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
	

	function getProgram(){
		echo $this->mdl_program->getOptionProgram(array('kode_induk'=>$this->input->post('KODE_UPT')));
    }

    function setDataTahun($awal, $akhir){
    	$sum = $akhir - $awal;
    	$tahuns = array_fill(0,$sum,0);
    	for($i=0;$i<$sum+1;$i++){
    		$tahuns[$i] = $awal + $i;
    	}
    	return $tahuns;
    }
	
}
