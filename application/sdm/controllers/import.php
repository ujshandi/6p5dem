<?php

class Import extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		
		$this->load->model('import_model');
		$this->load->helper('form');
		
	}
	
	function index(){
		$data['title']	='IMPORT DATA';
		$data['home']	='selected';
		$data['main']	='import/import_view';
		
		$this->load->view('container/template',$data);
	}
	
	function eksekusi(){
		# --
		$error='';
		$result=true;
		$extensi = '';
		
		# load
		$this->load->helper('file');
		
		# get file
		$fupload = $_FILES['datafile'];
		$nama = $_FILES['datafile']['name'];
		$extensi = $_FILES['datafile']['type'];
		
		# cek extensi file
		$allowedExtensions = array("xls");

		if (!in_array(end(explode(".", 
			strtolower($nama))), 
			$allowedExtensions)) { 
			
			$this->import_gagal('File yang disuport hanya Excel (xls)');
			return;
		} 
			  
		# proses upload
		if(isset($fupload)){
			$lokasi_file 	= $fupload['tmp_name'];
			$direktori		= "upload/$nama";
		
			if(move_uploaded_file($lokasi_file, $direktori)){ // proses upload
				
				#data pendukung
				$dt_golongan = $this->import_model->getGolongan();
				$dt_jabatan = $this->import_model->getJabatan();
				
				# load librari
				$this->load->library('excel');
				$this->excel->setOutputEncoding('CP1251');
				$this->excel->read($direktori); // baca file
			
				# baca file excel
				$x=0;
				$komplite = TRUE;
				for($i=2, $n=$this->excel->rowcount(0); $i<= $n; $i++){
					
					// data
					$data_tmp[$x]['nip'] 				= $this->excel->val($i, 1);
					$data_tmp[$x]['nama_pegawai'] 		= $this->excel->val($i, 2);
					$data_tmp[$x]['tempat_lahir'] 		= $this->excel->val($i, 3);
					$data_tmp[$x]['tgl_lahir'] 			= $this->excel->val($i, 4);
					$data_tmp[$x]['jenis_kelamin'] 		= $this->excel->val($i, 5);
					$data_tmp[$x]['agama'] 				= $this->excel->val($i, 6);
					$data_tmp[$x]['tahun_pengangkatan'] = $this->excel->val($i, 7);
					$data_tmp[$x]['alamat'] 			= $this->excel->val($i, 8);
					$data_tmp[$x]['status_perkawinan'] 	= $this->excel->val($i, 9);
					$data_tmp[$x]['keterangan'] 		= $this->excel->val($i, 10);
					$data_tmp[$x]['jumlah_anak'] 		= $this->excel->val($i, 11);
					$data_tmp[$x]['kodekabup'] 			= $this->excel->val($i, 12);
					$data_tmp[$x]['id_golongan'] 		= $this->golongan($this->excel->val($i, 13), $dt_golongan);
					$data_tmp[$x]['id_jabatan'] 		= $this->jabatan($this->excel->val($i, 14), $dt_jabatan);
					$data_tmp[$x]['kodeprovin'] 		= $this->excel->val($i, 15);
					
					$data_tmp[$x]['lengkap'] = TRUE;
					
					// cek data
					if($data_tmp[$x]['id_golongan'] == ""){
						$data_tmp[$x]['lengkap'] = FALSE;
						$komplite = FALSE;
					}
					if($data_tmp[$x]['id_jabatan'] == ""){
						$data_tmp[$x]['lengkap'] = FALSE;
						$komplite = FALSE;
					}
				
					$x++;
				}
				
				# eksekusi query
				$result = $this->import_model->importData($data_tmp);
				if (!$result){
					$this->import_gagal('Eksekusi gagal');
				}else{
					if(!$komplite){ // jika ada data yg tidak lengkap
						redirect('import/verifikasi');
					}else{
						redirect('import/import_sukses');
					}
				}
				
				# clear folder temporari
				//delete_files('restore');
				
				
			}else{
				$this->import_gagal('File gagal diupload');
			}
		}
		
	}
	
	private function golongan($gol, $data_golongan){
		$gol = strtoupper($gol);
		$gol = trim($gol);
		$gol = str_replace(' ', '', $gol);
		
		for($i=0, $c=count($data_golongan); $i<$c; $i++){
			if($gol == $data_golongan[$i]['nama_golongan']){
				return $data_golongan[$i]['id_golongan'];
			}
		}
		
		return '';
	}
	
	private function jabatan($jab, $data_jabatan){
		$jab = strtoupper($jab);
		
		for($i=0, $c=count($data_jabatan); $i<$c; $i++){
			if($jab == $data_jabatan[$i]['nama_jabatan']){
				return $data_jabatan[$i]['id_jabatan'];
			}
		}
		
		return '';
	}
	
	function import_sukses(){
		$data['title']	='IMPORT DATA';
		$data['home']	='selected';
		$data['main']	='import/import_view';
		$data['success']	='Data berhasil disimpan';
		
		$this->load->view('container/template',$data);
	}
	
	function verifikasi(){
		$data['title']	='VERIFIKASI IMPORT DATA';
		$data['home']	='selected';
		$data['main']	='import/import_verifikasi';
		
		$data['result'] = $this->import_model->getDataVerifikasi();
		
		$this->load->view('container/template',$data);
	}
	
	public function verifikasi_proses(){
		#GET DATA
		$data = $this->input->post('data');
		
		# eksekusi query
		$result = $this->import_model->importDataVerifikasi($data);
		if (!$result){
			//$this->import_gagal('Eksekusi gagal');
			echo 'error eksekusi query';
		}else{
			redirect('import/import_sukses');
		}
	}
	
	function import_gagal($pesan){
		$data['title']	='IMPORT DATA';
		$data['home']	='selected';
		$data['main']	='import/import_view';
		$data['error']	=$pesan;
		
		$this->load->view('container/template',$data);
	}
	
}
?>