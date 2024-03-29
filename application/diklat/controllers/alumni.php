<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class alumni extends My_Controller {

	var $id = 'alumni';
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_satker');
		$this->load->model('mdl_upt');
		$this->load->model('mdl_diklat');
		$this->load->model('mdl_peserta');
		$this->load->model('mdl_alumni');
	}
	
	public function index($sort_by ='NAMA_DIKLAT', $sort_order ='ASC') ##sorting
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
		$offset = ($this->uri->segment(5))?$this->uri->segment(5):0; ##sorting
		
		##sorting
		$data['fields'] = array (
			'NAMA_UPT' => 'UPT',
			'NAMA_DIKLAT' => 'DIKLAT',
			'NO_PESERTA' => 'NO PESERTA',
			'NAMA_PESERTA' => 'NAMA ALUMNI',
			'KERJA' => 'STATUS',
			'INSTANSI' => 'TEMPAT BEKERJA', 
			'THN_ANGKATAN' => 'TAHUN ANGKATAN',
		);
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
		##
		
		##sorting
		$result = $this->mdl_alumni->getData($data['numrow'], $offset, $data, $sort_by, $sort_order);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/alumni/index/'."$sort_by/$sort_order"; ##sorting
		$config['per_page'] = $data['numrow'];
		$config['num_links'] = '10';
		$config['uri_segment'] = '5'; ##sorting
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
		
		$this->load->view('alumni/alumni_list', $data);
		
		$this->close();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kode_upt', $this->input->post('KODE_UPT'));
		$this->session->set_userdata($this->id.'kode_diklat', $this->input->post('KODE_DIKLAT'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('alumni');
	}
	
	public function add_alumni1(){
		$this->open();		
		$this->load->view('alumni/alumni_add1');
		$this->close();
	}
	
	public function add_alumni2(){
		$this->open();
		
		$data['KODE_UPT'] 		= $this->input->post('KODE_UPT');
		$data['KODE_DIKLAT'] 	= $this->input->post('KODE_DIKLAT');
		$data['TGL_LULUS'] 		= $this->input->post('TGL_LULUS');
		//$data['TGL_LULUS'] = "to_date('".$this->input->post('TGL_AKHIR')."', 'dd/mm/yyyy')";
		$data['KERJA'] 			= $this->input->post('KERJA');
		$data['INSTANSI'] 		= $this->input->post('INSTANSI');
	
		if($data['KODE_DIKLAT'] == ''){
			//redirect('alumni/add_alumni1');
		}
		
		$data['UPT'] = $this->mdl_upt->getDataEdit($data['KODE_UPT']);
		$data['DIKLAT'] = $this->mdl_diklat->getDataEdit($data['KODE_DIKLAT']);
		$data['data'] = $this->mdl_peserta->getPesertaLulus($data['KODE_UPT'], $data['KODE_DIKLAT'], $data['TGL_LULUS']);                                                    
		
		$this->load->view('alumni/alumni_add2', $data);
		$this->close();
	}
	
	public function proses_add_alumni1(){
		$data['DATA'] = $this->input->post('DATA');
		
		if($this->mdl_alumni->InsertAlumni($data['DATA'])){
			redirect('alumni');
		}else{
			echo 'Error insert to db!';
		}
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_alumni->getDataEdit($id);
		$this->load->view('alumni/alumni_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['NO_PESERTA'] = $this->input->post('NO_PESERTA');
        $data['TGL_LULUS'] = "to_date('".$this->input->post('TGL_LULUS')."', 'dd/mm/yyyy')";
        $data['KERJA'] = $this->input->post('KERJA');
        $data['INSTANSI'] = $this->input->post('INSTANSI');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('NO_PESERTA', 'PESERTA', 'required');
        $this->form_validation->set_rules('TGL_LULUS', 'TANGGAL LULUS', 'required');
        $this->form_validation->set_rules('KERJA', 'STATUS KERJA', 'required');
        //$this->form_validation->set_rules('INSTANSI', 'INSTANSI', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$data['result'] = $this->mdl_alumni->getDataEdit($data['id']);
			$this->load->view('alumni/alumni_edit',$data);
		}else{
			$this->mdl_alumni->update($data);
			redirect('alumni');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_alumni->delete($id)){
			redirect('alumni');
		}else{
			
		}
	}
	
	function getPeserta(){
		echo $this->mdl_alumni->getOptionPesertaByUPT(array('KODE_UPT'=>$this->input->post('KODE_UPT')));
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
		$pdfdata = $this->mdl_alumni->get_pdf($data);
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
		$title = 'Laporan Data Alumni';
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
			$this->our_pdf->SetWidths(array(10,30,45,25,40,20,55,50));
			$this->our_pdf->SetAligns(array("C","C","C","C","C","C","C","C"));
			$this->our_pdf->Row(array('No.','No.Peserta','Nama','Status','Tempat Bekerja','Periode Lulus','UPT','DIKLAT'));
			
			$posY = 39;
			
			// content
			$this->our_pdf->SetAligns(array("C","C","L","L","L","L","L","L"));
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
		}else{
			$this->our_pdf->SetWidths(array(10,40,100,35,60,30));//,55,50
			$this->our_pdf->SetAligns(array("C","C","C","C","C","C"));//,"C","C"
			$this->our_pdf->Row(array('No.','No.Peserta','Nama','Status','Tempat Bekerja','Periode Lulus'));//,'UPT','DIKLAT'
			
			$posY = 34;
			
			// content
			$this->our_pdf->SetAligns(array("C","C","L","L","L","L"));//,"L","L"
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
											$pdfdata[$i][5]
									)); 
			}
			//,$pdfdata[$i][6],$pdfdata[$i][7]

		}
		
		
		$this->our_pdf->AliasNbPages();
		$this->our_pdf->Output("Diklat_Data_Alumni.pdf","I");
		
		
	}
	
	
}
