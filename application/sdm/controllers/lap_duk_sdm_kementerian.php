<?php 
class Lap_duk_sdm_kementerian extends My_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model('mdl_sdm_kementerian');
		//$this->output->enable_profiler(TRUE);
	}
 
    function index(){
		$this->open();
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/lap_duk_sdm_kementerian/index/';
		$data['option_kantor'] = $this->mdl_sdm_kementerian->getkantor();
		$this->load->view('laporan/sdm_duk_laporan_kementerian',$data);
		$this->close();
	}
 
	function pdf(){
		$this->load->model('Laporan_model', 'laporan');
	
		# inisialisasi library
		$this->load->library('our_pdf');
		$this->our_pdf->FPDF('L', 'mm', 'A4');
		define('FPDF_FONTPATH',APPPATH."libraries/fpdf/font/");
		
		// ambil data dari tabel
		$kantor = $this->input->post('KODEKANTOR');
		$unit = $this->input->post('KODEUNIT');
		$pdfdata = $this->laporan->get_duk_sdm_kementerian($kantor, $unit);
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
		$this->our_pdf->text($posX,$posY,'Laporan DUK SDM Aparatur Kementerian');
		
		// setting coloumn
		$this->our_pdf->setFont('Arial','B',9);
		$posY += 6;
		$this->our_pdf->setXY($posX,$posY);
		$this->our_pdf->setFillColor(255,255,255);
		
		$this->our_pdf->SetWidths(array(10,35,50,65,10,20,50,20,20));
		 $this->our_pdf->SetAligns(array("C","C","C","C","C","C","C","C","C"));
		$this->our_pdf->Row(array('No.','NIP','Nama','Alamat','Gol','TMT GOL','Jabatan','TMT JAB','TMT PNS'));
		
		$posY = 22;
		
		// content
		$this->our_pdf->SetAligns(array("C","C","L","L","L","C","L","C","C"));
		$this->our_pdf->setFillColor(255,255,255);
		$this->our_pdf->setFont('arial','',9);	
		$this->our_pdf->setXY($posX,$posY);
		
		$this->our_pdf->setFont('arial','',9);
		for ($i=0;$i<count($pdfdata);$i++){
			$this->our_pdf->Row(array($pdfdata[$i][0],$pdfdata[$i][1],$pdfdata[$i][2],$pdfdata[$i][3],$pdfdata[$i][4],$pdfdata[$i][5],$pdfdata[$i][6],$pdfdata[$i][7],$pdfdata[$i][8])); 
		}
		
		$this->our_pdf->AliasNbPages();
		$this->our_pdf->Output("SDM_Kementerian_duk.pdf","I");
		
	}
 
}

?>