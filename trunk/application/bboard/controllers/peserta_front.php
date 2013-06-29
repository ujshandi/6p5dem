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
        $data['NO_PESERTA'] = $this->input->post('NO_PESERTA');
        $data['NAMA_PESERTA'] = $this->input->post('NAMA_PESERTA');
        $data['TEMPAT_LAHIR'] = $this->input->post('TEMPAT_LAHIR');
        $data['TGL_LAHIR'] = "to_date('".$this->input->post('TGL_LAHIR')."', 'mm/dd/yyyy')";
        $data['JK'] = $this->input->post('JK');
        $data['TGL_MASUK'] = "to_date('".$this->input->post('TGL_MASUK')."', 'mm/dd/yyyy')";
        $data['THN_ANGKATAN'] = $this->input->post('THN_ANGKATAN');
        $data['STATUS_PESERTA'] = $this->input->post('STATUS_PESERTA');
        $data['KETERANGAN'] = $this->input->post('KETERANGAN');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'DIKLAT', 'required');
        $this->form_validation->set_rules('NO_PESERTA', 'NO PESERTA', 'required');
        $this->form_validation->set_rules('NAMA_PESERTA', 'NAMA PESERTA', 'required');
        $this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
        $this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
        $this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
        $this->form_validation->set_rules('TGL_MASUK', 'TANGGAL MASUK', 'required');
        $this->form_validation->set_rules('THN_ANGKATAN', 'TAHUN ANGKATAN', 'required');
        $this->form_validation->set_rules('STATUS_PESERTA', 'STATUS PESERTA', 'required');
		
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
		$opt['name'] = 'KODE_DIKLAT';
		$opt['KODE_UPT'] = $this->input->post('KODE_UPT');
		echo $this->mdl_peserta->getOptionDiklatByUPT($opt);
	}
	
}
