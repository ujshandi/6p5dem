<?php 
class Lap_sdm_dinas extends My_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model('mdl_sdm_dinas');
		$this->load->model('mdl_import_dinas');
		//$this->output->enable_profiler(TRUE);
	}
 
    function index(){
		$level = $this->Authentikasi->get_level();
		$this->open();
		if($level['LEVEL'] == 2){ // induk upt
			$this->load->view('laporan/sdm_laporan_dinas');
		}else if($level['LEVEL'] == 3){ // upt
			$this->load->view('laporan/sdm_laporan_dinas_kab');
		}else{		
			$this->load->view('laporan/sdm_laporan_dinas');
		}
		//$this->load->view('import/import_dinas_view');
		$this->close();
	}
 
	function pdf(){
		$this->load->model('Laporan_model', 'laporan');
	
		# inisialisasi library
		$this->load->library('our_pdf');
		$this->our_pdf->FPDF('L', 'mm', 'A4');
		define('FPDF_FONTPATH',APPPATH."libraries/fpdf/font/");
		
		// ambil data dari tabel
		$prov = $this->input->post('KODEPROVIN');
		$kab = $this->input->post('KODEKABUP');
		$pdfdata = $this->laporan->get_sdm_dinas($prov, $kab);
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
		$title = 'Laporan SDM Aparatur Dinas';
		$textPosX = $midX - ($this->our_pdf->GetStringWidth($title) / 2);
		$this->our_pdf->text($textPosX,$posY,$title);
		$posY += 6;
		/*$title2 = 'aaa';//($data['kode_upt']!='')?$this->mdl_upt->getUPTNameByKode($data['kode_upt']):'';
		$textPosX = $midX - ($this->our_pdf->GetStringWidth($title2) / 2);
		$this->our_pdf->text($textPosX,$posY,$title2);
		$posY += 6;*/
		//$textPosX = $midX - ($this->our_pdf->GetStringWidth($title2) / 2);
		//$this->our_pdf->text($textPosX,$posY,$title2);
		//$posY += 6;
		//$textPosX = $midX - ($this->our_pdf->GetStringWidth($title3) / 2);
		//$this->our_pdf->text($textPosX,$posY,$title3);
		//$this->our_pdf->text($posX,$posY,'Laporan SDM Aparatur Dinas');
		
		// setting coloumn
		$this->our_pdf->setFont('Arial','B',9);
		$posY += 6;
		$this->our_pdf->setXY($posX,$posY);
		$this->our_pdf->setFillColor(255,255,255);
		
		$this->our_pdf->SetWidths(array(10,40,55,100,40,40));
		 $this->our_pdf->SetAligns(array("C","C","C","C","C","C"));
		$this->our_pdf->Row(array('No.','NIP','Nama','Alamat','Jabatan','Golongan'));
		$posY += 5;
		
		// content
		$this->our_pdf->SetAligns(array("C","C","L","L","L","L"));
		$this->our_pdf->setFillColor(255,255,255);
		$this->our_pdf->setFont('arial','',9);	
		$this->our_pdf->setXY($posX,$posY);
		
		$this->our_pdf->setFont('arial','',9);
		for ($i=0;$i<count($pdfdata);$i++){
			$this->our_pdf->Row(array($pdfdata[$i][0],$pdfdata[$i][1],$pdfdata[$i][2],$pdfdata[$i][3],$pdfdata[$i][4],$pdfdata[$i][5])); 
		}
		
		$this->our_pdf->AliasNbPages();
		$this->our_pdf->Output("SDM_Dinas.pdf","I");
		
	}
	
	function getKabup(){
		//$KODEPROVIN = $this->input->post('KODEPROVIN');
		echo $this->mdl_import_dinas->getOptionKabup(array('KODEPROVIN'=>$this->input->post('KODEPROVIN')));
	}
 
}

?>