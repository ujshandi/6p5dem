<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class peserta extends My_Controller {
	
	var $id = 'peserta';
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_upt');
		$this->load->model('mdl_diklat');
		$this->load->model('mdl_peserta');
		$this->load->model('mdl_satker');
	}
	
	public function index($sort_by ='NO_PESERTA', $sort_order ='ASC') ##sorting
	{
		
		$data['can_view'] 	= $this->can_view();

		$data['can_insert'] = $this->can_insert();

		$data['can_update'] = $this->can_update();

		$data['can_delete'] = $this->can_delete();
		
		$this->open();
		
		# get filter
		$data['kode_upt'] = $this->session->userdata($this->id.'kode_upt');
		$data['kode_diklat'] = $this->session->userdata($this->id.'kode_diklat');
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:10;
		$offset = ($this->uri->segment(5))?$this->uri->segment(5):0;
		
		##sorting
		$data['fields'] = array (
			'NAMA_UPT' => 'UPT',
			'NAMA_DIKLAT' => 'NAMA UPT',
			'NO_PESERTA' => 'NO PESERTA',
			'NAMA_PESERTA' => 'NAMA PESERTA',
			'NAMA_DIKLAT' => 'DIKLAT',
			'ANGKATAN' => 'THN MASUK',
			'THN_ANGKATAN' => 'ANGKATAN',
			'STATUS_PESERTA' => 'STATUS',
		);
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
		##
		
		##sorting
		$result = $this->mdl_peserta->getData($data['numrow'], $offset, $data, $sort_by, $sort_order);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/peserta/index/'."$sort_by/$sort_order";
		$config['per_page'] = $data['numrow'];
		$config['num_links'] = '10';
		$config['uri_segment'] = '5';
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0)" class="current">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['total_rows'] = $result['row_count'];

		$this->pagination->initialize($config);	
		
		$data['curcount'] = $offset+1;
		$data['result'] = $result['row_data'];
		$data['jumlah'] = $result['row_count'];
		
		$this->load->view('peserta/peserta_list', $data);
		
		$this->close();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kode_upt', $this->input->post('KODE_UPT'));
		$this->session->set_userdata($this->id.'kode_diklat', $this->input->post('KODE_DIKLAT'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('peserta');
	}
	
	public function view($id, $idpeserta=""){
		$this->open();	
		$data['id'] = $id;
		$data['result'] = $this->mdl_peserta->getDataDetail($id);
		
		if($idpeserta != ""){
			$data['IDPESERTA'] = $idpeserta;
			$this->load->view('peserta/peserta_view', $data);
		}else{
			$this->load->view('peserta/peserta_view', $data);
		}
		$this->close();
	}
	
	public function add(){
		$this->open();
		$data['DIKLAT_MST_UPT'] = $this->mdl_peserta->getUPT();
		$this->load->view('peserta/peserta_add', $data);
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		# get post data
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        $data['NO_PESERTA'] = $this->input->post('NO_PESERTA');
        $data['NAMA_PESERTA'] = $this->input->post('NAMA_PESERTA');
        $data['DAERAH'] = $this->input->post('DAERAH');
        $data['TEMPAT_LAHIR'] = $this->input->post('TEMPAT_LAHIR');
        $data['TGL_LAHIR'] = "to_date('".$this->input->post('TGL_LAHIR')."', 'dd/mm/yyyy')";
        $data['JK'] = $this->input->post('JK');
        $data['TGL_MASUK'] = "to_date('".$this->input->post('TGL_MASUK')."', 'dd/mm/yyyy')";
        $data['THN_ANGKATAN'] = $this->input->post('THN_ANGKATAN');
		$data['ANGKATAN'] = $this->input->post('ANGKATAN');
        $data['STATUS_PESERTA'] = $this->input->post('STATUS_PESERTA');
        $data['KETERANGAN'] = $this->input->post('KETERANGAN');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'DIKLAT', 'required');
        $this->form_validation->set_rules('NO_PESERTA', 'NO PESERTA', 'required');
        $this->form_validation->set_rules('NAMA_PESERTA', 'NAMA PESERTA', 'required');
        $this->form_validation->set_rules('DAERAH', 'DAERAH', 'required');
        $this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
        $this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
        $this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
        $this->form_validation->set_rules('TGL_MASUK', 'TANGGAL MASUK', 'required');
        $this->form_validation->set_rules('THN_ANGKATAN', 'TAHUN ANGKATAN', 'required');
		$this->form_validation->set_rules('ANGKATAN', 'ANGKATAN', 'required');
        $this->form_validation->set_rules('STATUS_PESERTA', 'STATUS PESERTA', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('peserta/peserta_add',$data);
		}else{
			$this->mdl_peserta->insert($data);
			redirect('peserta');
		}
		
		$this->close();
	}
	
	public function add_lulus1(){
		$this->open();
		$this->load->view('peserta/peserta_lulus_add1');
		$this->close();
	}
	
	public function add_lulus2(){
		$this->open();
		
		$data['KODE_UPT'] 		= $this->input->post('KODE_UPT');
		$data['KODE_DIKLAT'] 	= $this->input->post('KODE_DIKLAT');
		$data['THN_ANGKATAN'] 	= $this->input->post('THN_ANGKATAN');
	
		if($data['KODE_DIKLAT'] == '' || $data['THN_ANGKATAN'] == '0'){
			redirect('peserta/add_lulus1');
		}
		
		
		$data['UPT'] = $this->mdl_upt->getDataEdit($data['KODE_UPT']);
		$data['DIKLAT'] = $this->mdl_diklat->getDataEdit($data['KODE_DIKLAT']);
		$data['data'] = $this->mdl_peserta->getPesertaRegister($data['KODE_UPT'], $data['KODE_DIKLAT'], $data['THN_ANGKATAN']);
		
		$this->load->view('peserta/peserta_lulus_add2', $data);
		$this->close();
	}
	
	public function proses_add_lulus(){
		$data['DATA'] = $this->input->post('DATA');
		
		if($this->mdl_peserta->UpdatePesertaRegister($data['DATA'])){
			redirect('peserta');
		}else{
			echo 'Error insert to db!';
		}
		
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_peserta->getDataEdit($id);
		$this->load->view('peserta/peserta_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
		$data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        $data['NO_PESERTA'] = $this->input->post('NO_PESERTA');
        $data['NAMA_PESERTA'] = $this->input->post('NAMA_PESERTA');
        $data['DAERAH'] = $this->input->post('DAERAH');
        $data['TEMPAT_LAHIR'] = $this->input->post('TEMPAT_LAHIR');
        $data['TGL_LAHIR'] = "to_date('".$this->input->post('TGL_LAHIR')."', 'dd/mm/yyyy')";
        $data['JK'] = $this->input->post('JK');
        $data['TGL_MASUK'] = "to_date('".$this->input->post('TGL_MASUK')."', 'dd/mm/yyyy')";
        $data['THN_ANGKATAN'] = $this->input->post('THN_ANGKATAN');
		$data['ANGKATAN'] = $this->input->post('ANGKATAN');
        $data['STATUS_PESERTA'] = $this->input->post('STATUS_PESERTA');
        $data['KETERANGAN'] = $this->input->post('KETERANGAN');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'DIKLAT', 'required');
        $this->form_validation->set_rules('NO_PESERTA', 'NO PESERTA', 'required');
        $this->form_validation->set_rules('NAMA_PESERTA', 'NAMA PESERTA', 'required');
        $this->form_validation->set_rules('DAERAH', 'DAERAH', 'required');
        $this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
        $this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
        $this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
        $this->form_validation->set_rules('TGL_MASUK', 'TANGGAL MASUK', 'required');
        $this->form_validation->set_rules('THN_ANGKATAN', 'TAHUN ANGKATAN', 'required');
        $this->form_validation->set_rules('ANGKATAN', 'ANGKATAN', 'required');
        $this->form_validation->set_rules('STATUS_PESERTA', 'STATUS PESERTA', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$data['result'] = $this->mdl_peserta->getDataEdit($data['id']);
			$this->load->view('peserta/peserta_edit',$data);
		}else{
			$this->mdl_peserta->update($data);
			redirect('peserta');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_peserta->delete($id)){
			redirect('peserta');
		}else{
			// code u/ gagal simpan
		}
	}
	
	function getDiklat(){
		echo $this->mdl_peserta->getOptionDiklatByUPT(array('KODE_UPT'=>$this->input->post('KODE_UPT')));
	}
	
	function upload(){
		$this->open();
		$this->load->view('peserta/peserta_upload');
		$this->close();
	}
	
	function proses_upload(){
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
			
			//$this->import_gagal('File yang disupport hanya Excel (xls)');
			echo 'File yang disupport hanya Excel (xls)';
			return;
		} 
			  
		# proses upload
		if(isset($fupload)){
			$lokasi_file 	= $fupload['tmp_name'];
			$direktori		= "upload/$nama";
		
			if(move_uploaded_file($lokasi_file, $direktori)){ // proses upload
				
				#data pendukung
				$KODE_INDUK = $this->input->post('KODE_INDUKUPT');
				$KODE_UPT = $this->input->post('KODE_UPT');
				$KODE_DIKLAT = $this->input->post('KODE_DIKLAT');
				
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
						$data_tmp[$x]['NO_PESERTA'] 		= $this->excel->val($i, 1);
						$data_tmp[$x]['NAMA_PESERTA'] 		= $this->excel->val($i, 2);
						//$data_tmp[$x]['DAERAH'] 			= $this->excel->val($i, 2);
						$data_tmp[$x]['TGL_MASUK'] 			= $this->excel->val($i, 3);
						$data_tmp[$x]['TGL_LULUS'] 			= $this->excel->val($i, 4);
						$data_tmp[$x]['THN_ANGKATAN'] 		= $this->excel->val($i, 5);
						$data_tmp[$x]['TEMPAT_LAHIR'] 		= $this->excel->val($i, 6);
						$data_tmp[$x]['TGL_LAHIR'] 			= $this->excel->val($i, 7);
						$data_tmp[$x]['JK'] 				= $this->excel->val($i, 8);
						$data_tmp[$x]['STATUS_PESERTA'] 	= $this->excel->val($i, 9);
						$data_tmp[$x]['KETERANGAN'] 		= $this->excel->val($i, 10);
						
						$data_tmp[$x]['KODE_UPT'] 			= $KODE_UPT;
						$data_tmp[$x]['KODE_DIKLAT'] 		= $KODE_DIKLAT;
						
						$x++;
					}
				}
				
				# eksekusi query
				$result = $this->mdl_peserta->importData($data_tmp);
				if (!$result){
					//$this->import_gagal('Eksekusi gagal');
					echo 'Import data gagal';
				}else{
					redirect('peserta');
				}
				
				# clear folder temporari
				//delete_files('restore');
				
			}else{
				//$this->import_gagal('File gagal diupload');
				echo 'Import data gagal';
			}
		}
		
	}
	
	function getUpt(){
		$KODE_INDUKUPT = $this->input->post('KODE_INDUKUPT');
		echo $this->mdl_upt->getOptionUPT(array('KODE_INDUKUPT'=>$KODE_INDUKUPT));
	}
	
	function pdf(){
		# get filter
		$data['kode_upt'] = $this->session->userdata($this->id.'kode_upt');
		$data['kode_diklat'] = $this->session->userdata($this->id.'kode_diklat');
		
		# inisialisasi library
		$this->load->library('our_pdf');
		$this->our_pdf->FPDF('L', 'mm', 'A4');
		define('FPDF_FONTPATH',APPPATH."libraries/fpdf/font/");
		
		// ambil data dari tabel
		$pdfdata = $this->mdl_peserta->get_pdf($data);
		if (count($pdfdata)==0){
			echo "Data Tidak Tersedia";
			return;
		}
		
		# create pdf
		$this->our_pdf->Open();
		$this->our_pdf->addPage();
		
		// judul laporan
		$this->our_pdf->setFont('arial','B',12);
		$posY = 11;
		$posX = 10;
		$midX = 150;
		$title = 'Laporan Data Peserta';
		$title2 = ($data['kode_upt']!='')?$this->mdl_upt->getUPTNameByKode($data['kode_upt']):'';
		$title3 = ($data['kode_diklat']!='')?$this->mdl_diklat->getDiklatNameByKode($data['kode_diklat']):'';
		$textPosX = $midX - ($this->our_pdf->GetStringWidth($title) / 2);
		$this->our_pdf->text($textPosX,$posY,$title);
		$posY += 6;
		$textPosX = $midX - ($this->our_pdf->GetStringWidth($title2) / 2);
		$this->our_pdf->text($textPosX,$posY,$title2);
		$posY += 6;
		$textPosX = $midX - ($this->our_pdf->GetStringWidth($title3) / 2);
		$this->our_pdf->text($textPosX,$posY,$title3);
		
		// setting coloumn
		$this->our_pdf->setFont('Arial','B',9);
		$posY += 6;
		$this->our_pdf->setXY($posX,$posY);
		$this->our_pdf->setFillColor(255,255,255);
		
		if($data['kode_diklat']==''){
			$this->our_pdf->SetWidths(array(10,20,35,25,20,20,20,30,50,50));
			$this->our_pdf->SetAligns(array("C","C","C","C","C","C","C","C","C","C"));
			$this->our_pdf->Row(array('No.','No.Peserta','Nama','Tgl Masuk','Thn Angkatan','Tmp Lahir','TglLahir','JK','UPT','DIKLAT'));
			
			$posY = 39;
			
			// content
			$this->our_pdf->SetAligns(array("C","C","L","L","L","L","L","L","L","L"));
			$this->our_pdf->setFillColor(255,255,255);
			$this->our_pdf->setFont('arial','',9);	
			$this->our_pdf->setXY($posX,$posY);
			
			$this->our_pdf->setFont('arial','',9);
			for ($i=0;$i<count($pdfdata);$i++){
				$this->our_pdf->Row(array(	$pdfdata[$i][0],
											$pdfdata[$i][1],
											$pdfdata[$i][2],
											$pdfdata[$i][3],
											$pdfdata[$i][4],
											$pdfdata[$i][5],
											$pdfdata[$i][6],
											$pdfdata[$i][7],
											$pdfdata[$i][8],
											$pdfdata[$i][9]
									)); 
			}
		}
		else{
			$this->our_pdf->SetWidths(array(10,40,75,30,30,30,30,30));//,50,50
			$this->our_pdf->SetAligns(array("C","C","C","C","C","C","C","C"));//,"C","C"
			$this->our_pdf->Row(array('No.','No.Peserta','Nama','Tgl Masuk','Thn Angkatan','Tmp Lahir','TglLahir','JK'));//,'UPT','DIKLAT'
			
			$posY = 34;
			
			// content
			$this->our_pdf->SetAligns(array("C","C","L","L","L","L","L","L"));//,"L","L"
			$this->our_pdf->setFillColor(255,255,255);
			$this->our_pdf->setFont('arial','',9);	
			$this->our_pdf->setXY($posX,$posY);
			
			$this->our_pdf->setFont('arial','',9);
			for ($i=0;$i<count($pdfdata);$i++){
				$this->our_pdf->Row(array(	$pdfdata[$i][0],
											$pdfdata[$i][1],
											$pdfdata[$i][2],
											$pdfdata[$i][3],
											$pdfdata[$i][4],
											$pdfdata[$i][5],
											$pdfdata[$i][6],
											$pdfdata[$i][7]
									)); 
			}
			//,$pdfdata[$i][8],$pdfdata[$i][9]
		}
		
		$this->our_pdf->AliasNbPages();
		$this->our_pdf->Output("Diklat_Data_Peserta.pdf","I");
		
		
	}
	
}
