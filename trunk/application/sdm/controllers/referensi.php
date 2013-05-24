<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Referensi extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('referensi_model');
	}
	
	function golongan()
	{
		$data = array(
				'title'=>'Referensi Data Golongan',
				'main'=>'referensi/golongan',
				'golongan' => $this->referensi_model->get_golongan('')
		); 
		$this->load->view('container/template',$data);
	}
	
	function jabatan()
	{
		$data = array(
				'title'=>'Referensi Data Jabatan',
				'main'=>'referensi/jabatan',
				'jabatan' => $this->referensi_model->get_jabatan('')
		); 
		$this->load->view('container/template',$data);
	}
	
	function provinsi()
	{
		$data = array(
				'title'=>'Referensi Data Provinsi',
				'main'=>'referensi/provinsi',
				'provinsi' => $this->referensi_model->get_provinsi('')
		); 
		$this->load->view('container/template',$data);
	}
	
	function kabkota()
	{
		$data = array(
				'title'=>'Referensi Data Kabupaten/Kota',
				'main'=>'referensi/kabkota',
				'kabkota' => $this->referensi_model->get_kabkota('')
		); 
		$this->load->view('container/template',$data);
	}
	
	function eselonI()
	{
		$data = array(
				'title'=>'Referensi Data Eselon I',
				'main'=>'referensi/eselonI',
				'eselonI' => $this->referensi_model->get_eselonI('')
		); 
		$this->load->view('container/template',$data);
	}
	
	function eselonII()
	{
		$data = array(
				'title'=>'Referensi Data Eselon II',
				'main'=>'referensi/eselonII',
				'eselonII' => $this->referensi_model->get_eselonII('')
		); 
		$this->load->view('container/template',$data);
	}
	
	function eselonIII()
	{
		$data = array(
				'title'=>'Referensi Data Eselon III',
				'main'=>'referensi/eselonIII',
				'eselonIII' => $this->referensi_model->get_eselonIII('')
		); 
		$this->load->view('container/template',$data);
	}
	
	//tambah provinsi
	function add_provinsi(){
		$last_id = $this->referensi_model->getID('provinsi','kodeprovin');
 		$data = array(
				'title'=>'Tambah Provinsi',
				'main'=>'referensi/add/provinsi',
 				'kodeprovin' => $last_id 
		); 
		$this->load->view('container/template',$data);
	}
	
	//insert data provinsi
	function insert_provinsi(){
		
		$this->form_validation->set_rules('kodeprovin','Kode Provinsi','trim|required');
		$this->form_validation->set_rules('namaprovin','Nama Provinsi ','trim|required');
		
		$kodeprovin = $this->input->post('kodeprovin');
		$namaprovin = $this->input->post('namaprovin');
		$dataprov = array(
				'kodeprovin'=>$kodeprovin,
 				'namaprovin'=>$namaprovin
				);
				  
		if($this->form_validation->run() == FALSE){
			$respon = array('error'=>true,
							'message'=>'Data masih ada yang kosong');
		}else{
			if($this->referensi_model->insert_provinsi($dataprov)){
				$respon = array('error'=>false,
								'message'=>'Tambah data berhasil');
			}else{
				$error = true;
				$respon = array('error'=>true,
								'message'=>'Tambah data gagal');
			}
		}
			echo json_encode($respon);
	}

}
?>