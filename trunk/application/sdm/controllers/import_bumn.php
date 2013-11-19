<?php

class Import_bumn extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		
		$this->load->model('mdl_import_bumn');
		$this->load->helper('form');
		
	}
	
	function index(){
		$this->open();
		$this->load->view('import/import_bumn_view');
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
			echo 'File yang di suport hanya Escel (xls)';
			return;
		} 
			  
		# proses upload
		if(isset($fupload)){
			$lokasi_file 	= $fupload['tmp_name'];
			$direktori		= "upload/$nama";
		
			if(move_uploaded_file($lokasi_file, $direktori)){ // proses upload
				
				#data pendukung
				//$dt_golongan = $this->mdl_import->getGolongan();
				//$dt_jabatan = $this->mdl_import_bumn->getJabatan();
				
				//tambahan filter
				$KODEMATRA  = $this->input->post('KODEMATRA');
				$KODEBUMN	= $this->input->post('KODEBUMN');
				// end tambahan filter
				//$dt_bumn = $this->mdl_import_bumn->getbumn();
				//$dt_matra = $this->mdl_import_bumn->getmatra();
				
				# load librari
				$this->load->library('excel');
				$this->excel->setOutputEncoding('CP1251');
				$this->excel->read($direktori); // baca file
			
				# baca file excel
				$x=0;
				$komplite = TRUE;
				for($i=2, $n=$this->excel->rowcount(0); $i<= $n; $i++){
					
					// data
					$data_tmp[$x]['NIK'] 				= $this->excel->val($i, 1);
					$data_tmp[$x]['NAMA'] 				= $this->excel->val($i, 2);
					$data_tmp[$x]['TMPT_LAHIR'] 		= $this->excel->val($i, 3);
					$data_tmp[$x]['TGL_LAHIR'] 			= $this->excel->val($i, 4);
					$data_tmp[$x]['JABATAN']	 		= $this->excel->val($i, 5);
					$data_tmp[$x]['STATUS_PEG'] 				= $this->excel->val($i, 6);
					//$data_tmp[$x]['TAHUN_PENGANGKATAN'] = $this->excel->val($i, 7);
					$data_tmp[$x]['JENIS_KELAMIN']		= $this->excel->val($i, 7);
					$data_tmp[$x]['AGAMA']			 	= $this->excel->val($i, 8);
					$data_tmp[$x]['TMT'] 				= $this->excel->val($i, 9);
					$data_tmp[$x]['ALAMAT'] 			= $this->excel->val($i, 10);
					$data_tmp[$x]['STATUS'] 			= $this->excel->val($i, 11);
					$data_tmp[$x]['JML_ANAK'] 			= $this->excel->val($i, 12);
					$data_tmp[$x]['GOLONGAN'] 			= $this->excel->val($i, 13);
					$data_tmp[$x]['SATKER'] 			= $this->excel->val($i, 14);
					//$data_tmp[$x]['KODEMATRA'] 			= $this->excel->val($i, 15);
					//$data_tmp[$x]['KODEBUMN'] 			= $this->excel->val($i, 16);
					//$data_tmp[$x]['ID_GOLONGAN'] 		= $this->golongan($this->excel->val($i, 15), $dt_golongan);
					//$data_tmp[$x]['TMT_GOLONGAN'] 		= $this->excel->val($i, 16);
					//$data_tmp[$x]['TMT_JABATAN'] 		= $this->excel->val($i, 17);
					
					//tambahan filter
					$data_tmp[$x]['KODEMATRA'] 			= $KODEMATRA;
					$data_tmp[$x]['KODEBUMN'] 			= $KODEBUMN;
					//end tambah filter
					//$data_tmp[$x]['LENGKAP'] = TRUE;
					
					// cek data
					/*if($data_tmp[$x]['KODEMATRA'] == ""){
						$data_tmp[$x]['LENGKAP'] = FALSE;
						$komplite = FALSE;
					}
					if($data_tmp[$x]['KODEBUMN'] == ""){
						$data_tmp[$x]['LENGKAP'] = FALSE;
						$komplite = FALSE;
					}
					if($data_tmp[$x]['ID_JABATAN'] == ""){
						$data_tmp[$x]['LENGKAP'] = FALSE;
						$komplite = FALSE;
					}
					*/
					$x++;
				}
				
				# eksekusi query
				$result = $this->mdl_import_bumn->importData($data_tmp);
				if (!$result){
					//$this->import_gagal('Eksekusi gagal');
					echo 'Import Data Gagal';
				}else{
				
					redirect('import_bumn/import_sukses');
					}
				}
				
				# clear folder temporari
				//delete_files('restore');
				
				
			}else{
				echo 'Import Data Gagal';
				//$this->import_gagal('File gagal diupload');
			}
		}
		
	
	/*private function matra($matra, $data_matra){
		$matra = strtoupper($matra);
		$matra = trim($matra);
		$matra = str_replace(' ', '', $matra);
		
		for($i=0, $c=count($data_matra); $i<$c; $i++){
			if($matra == $data_matra[$i]['NAMAMATRA']){
				return $data_matra[$i]['KODEMATRA'];
			}
		}
		
		return '';
	}
	
	private function bumn($bumn, $data_bumn){
		$bumn = strtoupper($bumn);
		$bumn = trim($bumn);
		$bumn = str_replace(' ', '', $bumn);
		
		for($i=0, $c=count($data_bumn); $i<$c; $i++){
			if($bumn == $data_bumn[$i]['NAMA_BUMN']){
				return $data_bumn[$i]['KODEBUMN'];
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
	}*/
	
	function import_sukses(){
		redirect('sdm_bumn/search');
	}
	
	function verifikasi(){
		$this->open();
		
		$data['result'] = $this->mdl_import_bumn->getDataVerifikasi();
		$this->load->view('import/import_bumn_verifikasi', $data);
		
		$this->close();
	}
	
	/*public function verifikasi_proses(){
		#GET DATA
		$data = $this->input->post('data');
		
		# eksekusi query
		$result = $this->mdl_import_bumn->importDataVerifikasi($data);
		if (!$result){
			//$this->import_gagal('Eksekusi gagal');
			echo 'error eksekusi query';
		}else{
			redirect('import_bumn/import_sukses');
		}
	}*/
	
	function import_gagal($pesan){
		$data['title']	='IMPORT DATA';
		$data['home']	='selected';
		$data['main']	='import/import_view';
		$data['error']	=$pesan;
		
		$this->load->view('container/template',$data);
	}
	
	function getBumn(){
		//$KODEPROVIN = $this->input->post('KODEPROVIN');
		echo $this->mdl_import_bumn->getOptionBumn(array('KODEMATRA'=>$this->input->post('KODEMATRA')));
	}
}
?>