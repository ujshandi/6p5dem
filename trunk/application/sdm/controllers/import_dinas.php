<?php

class Import_dinas extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model('Authentikasi');
		$this->load->model('mdl_sdm_dinas');
		$this->load->model('mdl_import_dinas');
		$this->load->helper('form');
		
	}
	
	function index(){
		$level = $this->Authentikasi->get_level();
		$this->open();
		if($level['LEVEL'] == 2){ // induk upt
			$this->load->view('import/import_dinas_view');
		}else if($level['LEVEL'] == 3){ // upt
			$this->load->view('import/import_dinas_kab_view');
		}else{		
			$this->load->view('import/import_dinas_view');
		}
		//$this->load->view('import/import_dinas_view');
		$this->close();
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
			
			//$this->import_gagal('File yang disuport hanya Excel (xls)');
			echo 'File yang di suport hanya Excel (xls)';
			return;
		} 
			  
		# proses upload
		if(isset($fupload)){
			$lokasi_file 	= $fupload['tmp_name'];
			$direktori		= "upload/$nama";
		
			if(move_uploaded_file($lokasi_file, $direktori)){ // proses upload
				
				#data pendukung
				$dt_golongan = $this->mdl_import_dinas->getGolongan();
				$dt_jabatan = $this->mdl_import_dinas->getJabatan();
				$KODEPROVIN = $this->input->post('KODEPROVIN');
				$KODEKABUP = $this->input->post('KODEKABUP');
				
				# load librari
				$this->load->library('excel');
				$this->excel->setOutputEncoding('CP1251');
				$this->excel->read($direktori); // baca file
			
				# baca file excel
				$x=0;
				$komplite = TRUE;
				for($i=2, $n=$this->excel->rowcount(0); $i<= $n; $i++){
					if($this->excel->val($i, 1) != ''){
					// data
					$data_tmp[$x]['NIP'] 				= $this->excel->val($i, 1);
					$data_tmp[$x]['NAMA_PEGAWAI'] 		= $this->excel->val($i, 2);
					$data_tmp[$x]['TEMPAT_LAHIR'] 		= $this->excel->val($i, 3);
					$data_tmp[$x]['TGL_LAHIR'] 			= $this->excel->val($i, 4);
					$data_tmp[$x]['JENIS_KELAMIN'] 		= $this->excel->val($i, 5);
					$data_tmp[$x]['AGAMA'] 				= $this->excel->val($i, 6);
					$data_tmp[$x]['TAHUN_PENGANGKATAN'] = $this->excel->val($i, 7);
					$data_tmp[$x]['ALAMAT'] 			= $this->excel->val($i, 8);
					$data_tmp[$x]['STATUS_PERKAWINAN'] 	= $this->excel->val($i, 9);
					$data_tmp[$x]['KETERANGAN'] 		= $this->excel->val($i, 10);
					$data_tmp[$x]['JUMLAH_ANAK'] 		= $this->excel->val($i, 11);
					//$data_tmp[$x]['KODEKABUP'] 			= $this->excel->val($i, 12);
					//$data_tmp[$x]['KODEPROVIN'] 		= $this->excel->val($i, 13);
					$data_tmp[$x]['ID_JABATAN'] 		= $this->jabatan($this->excel->val($i, 12), $dt_jabatan);
					$data_tmp[$x]['ID_GOLONGAN'] 		= $this->golongan($this->excel->val($i, 13), $dt_golongan);
					$data_tmp[$x]['TMT_GOLONGAN'] 		= $this->excel->val($i, 14);
					$data_tmp[$x]['TMT_JABATAN'] 		= $this->excel->val($i, 15);
					
					$data_tmp[$x]['KODEKABUP'] 			= $KODEKABUP;
					$data_tmp[$x]['KODEPROVIN'] 		= $KODEPROVIN;
						
					$data_tmp[$x]['LENGKAP'] = TRUE;
					
					// cek data
					if($data_tmp[$x]['ID_GOLONGAN'] == ""){
						$data_tmp[$x]['LENGKAP'] = FALSE;
						$komplite = FALSE;
					}
					if($data_tmp[$x]['ID_JABATAN'] == ""){
						$data_tmp[$x]['LENGKAP'] = FALSE;
						$komplite = FALSE;
					}
				
					$x++;
				 }
				}
				
				# eksekusi query
				$result = $this->mdl_import_dinas->importData($data_tmp);
				if (!$result){
					//$this->import_gagal('Eksekusi gagal');
					echo 'Import Data Gagal';
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
				echo 'Import Data Gagal';
				//$this->import_gagal('File gagal diupload');
			}
		}
		
	}
	
	private function golongan($gol, $data_golongan){
		$gol = strtoupper($gol);
		$gol = trim($gol);
		$gol = str_replace(' ', '', $gol);
		
		for($i=0, $c=count($data_golongan); $i<$c; $i++){
			if($gol == $data_golongan[$i]['NAMA_GOLONGAN']){
				return $data_golongan[$i]['ID_GOLONGAN'];
			}
		}
		
		return '';
	}
	
	private function jabatan($jab, $data_jabatan){
		$jab = strtoupper($jab);
		
		for($i=0, $c=count($data_jabatan); $i<$c; $i++){
			if($jab == $data_jabatan[$i]['NAMA_JABATAN']){
				return $data_jabatan[$i]['ID_JABATAN'];
			}
		}
		
		return '';
	}
	
	function import_sukses(){
		redirect('sdm_dinas/search');
	}
	
	function verifikasi(){
		$this->open();
		
		$data['result'] = $this->mdl_import->getDataVerifikasi();
		$this->load->view('import/import_verifikasi', $data);
		
		$this->close();
	}
	
	public function verifikasi_proses(){
		#GET DATA
		$data = $this->input->post('data');
		
		# eksekusi query
		$result = $this->mdl_import->importDataVerifikasi($data);
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
	
	function getKabup(){
		//$KODEPROVIN = $this->input->post('KODEPROVIN');
		echo $this->mdl_import_dinas->getOptionKabup(array('KODEPROVIN'=>$this->input->post('KODEPROVIN')));
	}
}
?>