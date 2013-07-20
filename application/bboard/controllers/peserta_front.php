<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peserta_front extends MY_Frontpage {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_upt');
		$this->load->model('mdl_diklat');
		$this->load->model('mdl_peserta');
		$this->load->model('mdl_satker');
	}
	
	public function add(){
		$this->open();
		
		$data['DIKLAT_MST_UPT'] = $this->mdl_peserta->getUPT();
		$this->load->view('peserta/peserta_add', $data);
		
		$this->close();
	}
	
	public function proses_add($kode=""){
		$this->open();
		
		# get post data
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        $data['NAMA_PENDAFTAR'] = $this->input->post('NAMA_PENDAFTAR');
        $data['TEMPAT_LAHIR'] = $this->input->post('TEMPAT_LAHIR');
        $data['TGL_LAHIR'] = "to_date('".$this->input->post('TGL_LAHIR')."', 'mm/dd/yyyy')";
        $data['JK'] = $this->input->post('JK');
		$data['STATUS_PENDAFTAR'] = $this->input->post('STATUS_PENDAFTAR');
        $data['NO_TELP'] = $this->input->post('NO_TELP');        
        $data['KETERANGAN'] = $this->input->post('KETERANGAN');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'DIKLAT', 'required');
        //$this->form_validation->set_rules('NO_PESERTA', 'NO PESERTA', 'required');
        $this->form_validation->set_rules('NAMA_PENDAFTAR', 'NAMA PENDAFTAR', 'required');
        $this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
        $this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
        $this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
        $this->form_validation->set_rules('NO_TELP', 'NO TELP', 'required');
        //$this->form_validation->set_rules('THN_ANGKATAN', 'TAHUN ANGKATAN', 'required');
        //$this->form_validation->set_rules('STATUS_PESERTA', 'STATUS PESERTA', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('peserta/peserta_add',$data);
		}else{
			$this->mdl_peserta->insert($data);
			redirect('auth/index');
		}
		$this->close();
	}
	
	function getDiklat(){
		echo $this->mdl_peserta->getOptionDiklatByUPT(array('KODE_UPT'=>$this->input->post('KODE_UPT')));
	}
	
}
