<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dosen extends My_Controller {
	
	var $id = 'dosen';
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_upt');
		$this->load->model('mdl_satker');
		$this->load->model('mdl_dosen');
	}
	
	public function index($sort_by ='NAMADOSEN', $sort_order ='ASC') ##sorting
	{
		$this->open();
		
		# get filter
		$data['kode_upt'] = $this->session->userdata($this->id.'kode_upt');
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:10;
		$offset = ($this->uri->segment(5))?$this->uri->segment(5):0;
		
		##sorting
		$data['fields'] = array (
			'NAMADOSEN' => 'Nama Pengajar',
			'STATUS' => 'Status Pengajar',
			'JENIS_DOSEN' => 'Jenis Pengajar',
			'TAHUN' => 'Thn Mulai Mengajar',
			'NAMA_UPT' => 'UPT',
		);
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
		##
		
		# get data
		$result = $this->mdl_dosen->getData($data['numrow'], $offset, $data, $sort_by, $sort_order);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/dosen/index/'."$sort_by/$sort_order"; ##sorting
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
		
		$this->load->view('dosen/dosen_list', $data);
		
		$this->close();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kode_upt', $this->input->post('kode_upt'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('dosen');
	}
	
	public function view($id, $iddosen=""){
		$this->open();	
		$data['id'] = $id;
		$data['result'] = $this->mdl_dosen->getDataDetail($id);
		
		if($iddosen != ""){
			$data['IDDOSEN'] = $iddosen;
			$this->load->view('dosen/dosen_view', $data);
		}else{
			$this->load->view('dosen/dosen_view', $data);
		}
		$this->close();
	}
	
	public function add(){
		$this->open();
		$this->load->view('dosen/dosen_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$config['upload_path'] = './file_upload/diklat/';
		$config['allowed_types'] = 'gif|jpg|png|BMP|';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload()){
		$data['FOTO_DOSEN'] =  $this->upload->file_name;
        $data['NIP'] = $this->input->post('NIP');
        $data['NAMADOSEN'] = $this->input->post('NAMADOSEN');		
		$data['TEMPAT_LAHIR'] = $this->input->post('TEMPAT_LAHIR');
		$data['TGL_LAHIR'] = "to_date('".$this->input->post('TGL_LAHIR')."', 'dd/mm/yyyy')";
		$data['JK'] = $this->input->post('JK');
		$data['STATUS'] = $this->input->post('STATUS');
		$data['TAHUN'] = $this->input->post('TAHUN');
		$data['PENDIDIKAN'] = $this->input->post('PENDIDIKAN');
		//$data['JURUSAN'] = $this->input->post('JURUSAN');
		//$data['KELOMPOK_MATKUL'] = $this->input->post('KELOMPOK_MATKUL');
		$data['JENIS_DOSEN'] = $this->input->post('JENIS_DOSEN');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
		
	 	# set rules validation
		//$this->form_validation->set_rules('IDDOSEN', 'ID DOSEN', 'required');
        //$this->form_validation->set_rules('NIP', 'NIP', 'required');
        $this->form_validation->set_rules('NAMADOSEN', 'NAMA DOSEN', 'required');
		//$this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
		//$this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
		$this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
		$this->form_validation->set_rules('STATUS', 'STATUS', 'required');
		//$this->form_validation->set_rules('TAHUN', 'TAHUN', 'required');
		//$this->form_validation->set_rules('PENDIDIKAN', 'PENDIDIKAN', 'required');
		//$this->form_validation->set_rules('JURUSAN', 'JURUSAN', 'required');
		//$this->form_validation->set_rules('KELOMPOK_MATKUL', 'KELOMPOK_MATKUL', 'required');
		$this->form_validation->set_rules('JENIS_DOSEN', 'JENIS DOSEN', 'required');
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
		//$this->form_validation->set_rules('KODE_UPT', 'KODE UPT', 'required');
        //$this->form_validation->set_rules('URUTAN', 'URUTAN', 'required'); 
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('dosen/dosen_add',$data);
		}else{
			$this->mdl_dosen->insert($data);
			redirect('dosen');
		}
	}else{
		echo $this->upload->display_errors();
	}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_dosen->getDataEdit($id);
		$this->load->view('dosen/dosen_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		$config['upload_path'] = './file_upload/diklat/';
		$config['allowed_types'] = 'gif|jpg|png|BMP|';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload()){
		$data['FOTO_DOSEN'] =  $this->upload->file_name;
		$data['id'] = $this->input->post('id');
		//$data['IDDOSEN'] = $this->input->post('IDDOSEN');
        $data['NIP'] = $this->input->post('NIP');
        $data['NAMADOSEN'] = $this->input->post('NAMADOSEN');		
		$data['TEMPAT_LAHIR'] = $this->input->post('TEMPAT_LAHIR');
		$data['TGL_LAHIR'] = "to_date('".$this->input->post('TGL_LAHIR')."', 'dd/mm/yyyy')";
		$data['JK'] = $this->input->post('JK');
		$data['STATUS'] = $this->input->post('STATUS');
		$data['TAHUN'] = $this->input->post('TAHUN');
		$data['PENDIDIKAN'] = $this->input->post('PENDIDIKAN');
		//$data['JURUSAN'] = $this->input->post('JURUSAN');
		//$data['KELOMPOK_MATKUL'] = $this->input->post('KELOMPOK_MATKUL');
		$data['JENIS_DOSEN'] = $this->input->post('JENIS_DOSEN');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
		
		# set rules validation
		//$this->form_validation->set_rules('IDDOSEN', 'ID DOSEN', 'required');
        //$this->form_validation->set_rules('NIP', 'NIP', 'required');
        $this->form_validation->set_rules('NAMADOSEN', 'NAMA DOSEN', 'required');
		//$this->form_validation->set_rules('TEMPAT_LAHIR', 'TEMPAT LAHIR', 'required');
		//$this->form_validation->set_rules('TGL_LAHIR', 'TANGGAL LAHIR', 'required');
		$this->form_validation->set_rules('JK', 'JENIS KELAMIN', 'required');
		$this->form_validation->set_rules('STATUS', 'STATUS', 'required');
		//$this->form_validation->set_rules('TAHUN', 'TAHUN', 'required');
		//$this->form_validation->set_rules('PENDIDIKAN', 'PENDIDIKAN', 'required');
		//$this->form_validation->set_rules('JURUSAN', 'JURUSAN', 'required');
		//$this->form_validation->set_rules('KELOMPOK_MATKUL', 'KELOMPOK_MATKUL', 'required');
		$this->form_validation->set_rules('JENIS_DOSEN', 'JENIS DOSEN', 'required');
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$data['result'] = $this->mdl_dosen->getDataEdit($data['id']);
			$this->load->view('dosen/dosen_edit',$data);
		}else{
			$this->mdl_dosen->update($data);
			redirect('dosen');
		}
		}else{
			echo $this->upload->display_errors();
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_dosen->delete($id)){
			redirect('dosen');
		}else{
			// code u/ gagal simpan
		}
	}
	
	function upload(){
		$this->open();
		$this->load->view('dosen/dosen_upload');
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
						$data_tmp[$x]['NIP'] 			= $this->excel->val($i, 1);
						$data_tmp[$x]['NAMADOSEN'] 		= $this->excel->val($i, 2);
						$data_tmp[$x]['TEMPAT_LAHIR'] 	= $this->excel->val($i, 3);
						$data_tmp[$x]['TGL_LAHIR'] 		= $this->excel->val($i, 4);
						$data_tmp[$x]['JK'] 			= $this->excel->val($i, 5);
						$data_tmp[$x]['STATUS'] 		= $this->excel->val($i, 6);
						$data_tmp[$x]['TAHUN'] 			= $this->excel->val($i, 7);
						$data_tmp[$x]['PENDIDIKAN'] 	= $this->excel->val($i, 8);
						//$data_tmp[$x]['JURUSAN'] 		= $this->excel->val($i, 8);
						//$data_tmp[$x]['KELOMPOK_MATKUL']= $this->excel->val($i, 8);
						$data_tmp[$x]['JENIS_DOSEN'] 	= $this->excel->val($i, 9);
						$data_tmp[$x]['KODE_UPT'] 		= $KODE_UPT;
						
						$x++;
					}
				}
				
				# eksekusi query
				$result = $this->mdl_dosen->importData($data_tmp);
				if (!$result){
					//$this->import_gagal('Eksekusi gagal');
					echo 'Import data gagal';
				}else{
					redirect('dosen');
				}
				
				# clear folder temporari
				//delete_files('restore');
				
			}else{
				//$this->import_gagal('File gagal diupload');
				echo 'Import data gagal';
			}
		}
		
	}
	
	function pdf(){
		# get filter
		$data['kode_upt'] = $this->session->userdata($this->id.'kode_upt');
		
		# inisialisasi library
		$this->load->library('our_pdf');
		$this->our_pdf->FPDF('L', 'mm', 'A4');
		define('FPDF_FONTPATH',APPPATH."libraries/fpdf/font/");
		
		// ambil data dari tabel
		$pdfdata = $this->mdl_dosen->get_pdf($data);
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
		$title = 'Laporan Data Dosen';
		$title2 = ($data['kode_upt']!='')?$this->mdl_upt->getUPTNameByKode($data['kode_upt']):'';
		$textPosX = $midX - ($this->our_pdf->GetStringWidth($title) / 2);
		$this->our_pdf->text($textPosX,$posY,$title);
		$posY += 6;
		$textPosX = $midX - ($this->our_pdf->GetStringWidth($title2) / 2);
		$this->our_pdf->text($textPosX,$posY,$title2);
		
		// setting coloumn
		$this->our_pdf->setFont('Arial','B',9);
		$posY += 6;
		$this->our_pdf->setXY($posX,$posY);
		$this->our_pdf->setFillColor(255,255,255);
		
		if($data['kode_upt']==''){
			$this->our_pdf->SetWidths(array(10,20,35,25,25,20,20,40,20,60));
			$this->our_pdf->SetAligns(array("C","C","C","C","C","C","C","C","C","C"));
			$this->our_pdf->Row(array('No.','NIP','Nama','Tempat Lahir','Tgl Lahir','JK','Status','Pendidikan','Jenis','UPT'));
			
			$posY = 28;
			
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
		}else{
			$this->our_pdf->SetWidths(array(10,25,70,25,25,20,30,40,30)); //,60
			$this->our_pdf->SetAligns(array("C","C","C","C","C","C","C","C","C")); //,"C"
			$this->our_pdf->Row(array('No.','NIP','Nama','Tempat Lahir','Tgl Lahir','JK','Status','Pendidikan','Jenis')); //,'UPT'
			
			$posY = 28;
			
			// content
			$this->our_pdf->SetAligns(array("C","C","L","L","L","L","L","L","L")); //,"L"
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
											$pdfdata[$i][8]
									)); 
			}
			//,$pdfdata[$i][9]

		}
		
		$this->our_pdf->AliasNbPages();
		$this->our_pdf->Output("Diklat_Data_Dosen.pdf","I");
	}
	
}
