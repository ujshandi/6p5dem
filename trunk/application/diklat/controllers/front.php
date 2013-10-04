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
		$this->load->view('front/kurikulum_list_detail', $data);
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
	
	public function widyaiswara($upt=""){
		$this->load->model('mdl_dosen');
		
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('front/widyaiswara_list', $data);
		}else{
			$this->load->view('front/widyaiswara_list');
		}
		$this->closefront();
	}
	
	public function instruktur($upt=""){
		$this->load->model('mdl_dosen');
		
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('front/instruktur_list', $data);
		}else{
			$this->load->view('front/instruktur_list');
		}
		$this->closefront();
	}
	
	public function peserta($upt=""){
		$this->load->model('mdl_peserta');
		
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('front/peserta_list', $data);
		}else{
			$this->load->view('front/peserta_list');
		}
		$this->closefront();
	}
	
	public function alumni($upt=""){
		$this->load->model('mdl_alumni');
		
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('front/alumni_list', $data);
		}else{
			$this->load->view('front/alumni_list');
		}
		$this->closefront();
	}
	
	public function sarana($upt=""){
		$this->load->model('mdl_sarana');
		
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('front/sarana_list', $data);
		}else{
			$this->load->view('front/sarana_list');
		}
		$this->closefront();
	}
	
	public function prasarana($upt=""){
		$this->load->model('mdl_prasarana');
		
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('front/prasarana_list', $data);
		}else{
			$this->load->view('front/prasarana_list');
		}
		$this->closefront();
	}
	
	public function agenda($upt=""){
		$this->load->model('mdl_kalender');
		
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('front/kalender_list', $data);
		}else{
			$this->load->view('front/kalender_list');
		}
		$this->closefront();
	}
	
	public function penyuluhan($upt=""){
		$this->load->model('mdl_penyuluhan');
		
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('front/penyuluhan_list', $data);
		}else{
			$this->load->view('front/penyuluhan_list');
		}
		$this->closefront();
	}
	
	
	public function penelitian($upt=""){
		$this->load->model('mdl_penelitian');
		
		$this->openfront();
		if($upt != ""){
			$data['KODE_UPT'] = $upt;
			$this->load->view('front/penelitian_list', $data);
		}else{
			$this->load->view('front/penelitian_list');
		}
		$this->closefront();
	}	
	
	public function satker(){
		$this->load->model('mdl_satker');
		
		$this->openfront();
		//if($upt != ""){
			//$data['KODE_UPT'] = $upt;
			//$this->load->view('front/satker_list', $data);
		//}else{
			$this->load->view('front/satker_list');
		//}
		$this->closefront();
	}	
	
	public function upt(){
		$this->load->model('mdl_upt');
		
		$satker = $this->input->post('KODE_INDUK');
		
		$this->openfront();
		if($satker != ""){
			$data['KODE_INDUK'] = $satker;
			$this->load->view('front/upt_list', $data);
		}else{
			$this->load->view('front/upt_list');
		}
		$this->closefront();
	}	
	
	public function jenis_sarpras(){
		$this->load->model('mdl_jenis_sarpras');
		
		$this->openfront();
		//if($upt != ""){
			//$data['KODE_UPT'] = $upt;
			//$this->load->view('front/jenis_sarpras_list', $data);
		//}else{
			$this->load->view('front/jenis_sarpras_list');
		//}
		$this->closefront();
	}
	
	public function program(){
		$this->load->model('mdl_program');
		
		$satker = $this->input->post('KODE_INDUK');
		
		$this->openfront();
		if($satker != ""){
			$data['KODE_INDUK'] = $satker;
			$this->load->view('front/program_list', $data);
		}else{
			$this->load->view('front/program_list');
		}
		$this->closefront();
	}	
	
}
