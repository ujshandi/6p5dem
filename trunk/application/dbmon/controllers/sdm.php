<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sdm extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('msdm');
	}
	
	public function index()
	{
		//echo base_url();
		redirect("sdm/get_form/sdm_dinas");
	}
	
	function get_form($p1="",$p2=""){
		$this->open();
		$data['modul']=$p1;
		
		switch ($p1){
			case 'sdm_dinas':
				$data['title']='Provinsi';
				$this->load->view('sdm/dinas/sdm_prov', $data);
				
			break;
		}
		
		$this->close();
	}
	
	function get_detail($p1="",$p2=""){
		switch ($p1){
			case 'data_kab':
				$data['kd_prov']=$this->input->post('kd_prov');
				$data['flag_kelamin']=$this->input->post('flag_kelamin');
				$data['chart']=$p2;
				$data['title']='Data ';
				$data['chart']=$p2;
				
			break;
		}
		$this->load->view('sdm/dinas/'.$p1, $data);
	}
	
	function get_datagrap(){
	$kat=$this->input->post('kat');
	$kom=$this->input->post('kom');
	$prov=$this->input->post('prov');

		switch($kat){
			case "all":
				$data=$this->msdm->get_data('data_sdm',$kat);
			//	print_r($data);
				$xml='<chart caption="" showLegend="1" bgAlpha="30,100" bgAngle="100" pieYScale="50" startingAngle="100"  smartLineColor="7D8892" smartLineThickness="2">';
				foreach ($data as $x=>$v){
					$xml .='<set label="'.$v['NAMAPROVIN'].'" value="'.$v['JUMLAH_SDM'].'" isSliced="1" link=\'JavaScript:get_data_kab("'.$v["KODEPROVIN"].'","",300,200,"get_detail/data_kab/Doughnut3D")\' />';
				}
				
			
			$xml .='</chart>';
			
			break;
			
			case "data_kab":
				$kd_prov=$this->input->post('kd_prov');
				$flag_kelamin=$this->input->post('flag_kelamin');
				$data=$this->msdm->get_data('data_sdm_kab',$kd_prov,$flag_kelamin);
			//	print_r($data);
				if($flag_kelamin){
					$xml="<chart yAxisName='Jumlah' showLegend='1' labelDisplay='ROTATE' numDivLines='5' slantLabels='1' caption='Data Per Kabupaten' numberPrefix='' showBorder='0' imageSave='1' exportHandler=''>";
				}
				
				else{
					$xml='<chart caption="" showLegend="1" bgAlpha="30,100" bgAngle="100" pieYScale="50" startingAngle="100"  smartLineColor="7D8892" smartLineThickness="2">';
				}
				
				foreach ($data as $x=>$v){
					$xml .='<set label="'.$v['NAMAKABUP'].'" value="'.$v['JUMLAH_SDM'].'" />';
				}
				
			
			$xml .='</chart>';
			
			break;
			
			
			
			case "campur":
				$data=$this->msdm->get_data('data_sdm',$kat);
				$xml_pria="<dataset seriesName='Pria' color='0078B5' showValues='0'>";
				$xml_wanita="<dataset seriesName='Wanita' color='750D00' showValues='0'>";
				$xml="<graph caption='Komposisi SDM Provinsi' xAxisName='Provinsi' yAxisName='Total Pria & Wanita'
					  showValues='0' numberPrefix='' decimalPrecision='0' bgcolor='F3f3f3' bgAlpha='70'
					  showColumnShadow='1' divlinecolor='c5c5c5' divLineAlpha='60' showAlternateHGridColor='1'
					  alternateHGridColor='f8f8f8' alternateHGridAlpha='60' ><categories>"; 
				foreach ($data as $x=>$v){
					$xml .="<category name='".$v["NAMAPROVIN"]."' />";
					$xml_pria .="<set value='".$v["JUMLAH_SDM_PRIA"]."' link=\"JavaScript:get_data_kab('".$v["KODEPROVIN"]."','P',300,200,'get_detail/data_kab/Column3D')\" />";
					$xml_wanita .="<set value='".$v["JUMLAH_SDM_WANITA"]."' link=\"JavaScript:get_data_kab('".$v["KODEPROVIN"]."','W',300,200,'get_detail/data_kab/Column3D')\" />";
				}
					$xml_pria .="</dataset>";
					$xml_wanita .="</dataset>";
					$xml .="</categories>";
					$xml .=$xml_pria.$xml_wanita."</graph>";
				
				
				/*$xml="<chart caption='Brand Winner' yAxisName='Brand Value ($ m)' xAxisName='Brand' bgColor='F1F1F1' showValues='0' canvasBorderThickness='1' canvasBorderColor='999999' plotFillAngle='330' plotBorderColor='999999' showAlternateVGridColor='1' divLineAlpha='0'>";
				foreach ($data as $x=>$v){
					$xml .="<set label='".$v['NAMAPROVIN']."' value='".$v['JUMLAH_SDM']."' toolText='2006 Rank: 1, Country: US'/>";
				}
				$xml .="</chart>";*/
			break;
		}
		
		echo $xml;	
	}

	function dinas($prov=0, $kab=0){ 
		$this->load->model('mdl_kbupaten');
		$this->load->model('mdl_provinsi');
		$this->load->model('mdl_peg_dinas');
		$this->open();

		$data['title'] = 'Dinas ';
		if($prov==0){
			$data['title'] .= 'Provinsi ';
			$data['stat'] = $this->mdl_provinsi->getData('');
			$data['statF'] = $this->mdl_provinsi->getData('Wanita');
			$data['statM'] = $this->mdl_provinsi->getData('Pria');
			$this->load->view('sdm/dinas/sdm_prov', $data);
		}
		elseif($kab==0){
			$data['title'] .= 'Provinsi '.$this->mdl_provinsi->getProvByID($prov)->NAMAPROVIN;
			$data['stat'] = $this->mdl_kbupaten->getData($prov, '');
			$data['statF'] = $this->mdl_kbupaten->getData($prov, 'Wanita');
			$data['statM'] = $this->mdl_kbupaten->getData($prov, 'Pria');
			$this->load->view('sdm/dinas/sdm_kab', $data);
		}
		// else{
		// 	$data['title'] .= 'Kabupaten/Kota '.$this->mdl_kbupaten->getKabByID($kab)->NAMAKABUP;
		// 	$data['stat'] = $this->mdl_kbupaten->getData($prov);
		// 	$this->load->view('sdm/dinas/sdm_kab', $data);
		// }
		
		$this->close();
	}
	
	
	function kementerian($e1='', $e2='', $e3='', $e4=''){
		$this->load->model('mdl_eselon1');
		$this->load->model('mdl_eselon2');
		$this->load->model('mdl_eselon3');
		$this->load->model('mdl_eselon4');
		$this->open();

		$data['title'] = 'Kementerian ';
		
		if($e1==''){
			$data['title'] .= 'Eselon 1 ';
			$data['stat'] = $this->mdl_eselon1->getData('');
			$data['statF'] = $this->mdl_eselon1->getData('Wanita');
			$data['statM'] = $this->mdl_eselon1->getData('Pria');
			$this->load->view('sdm/kementerian/sdm_e1', $data);
		}
		elseif($e2==''){
			$data['title'] .= 'Eselon 1 | '.$this->mdl_eselon1->getEselon1ByID($e1)->NAMA_ESELON_1;
			$data['stat'] = $this->mdl_eselon2->getData($e1,$this->input->post('JENIS_KELAMIN'));
			$this->load->view('sdm/kementerian/sdm_e2', $data);
		}
		elseif($e3==''){
			$data['title'] .= 'Eselon 2 | '.$this->mdl_eselon2->getEselon2ByID($e1)->NAMA_ESELON_2;
			$data['stat'] = $this->mdl_eselon3->getData($e2);
			$this->load->view('sdm/kementerian/sdm_e3', $data);
		}
		// else{
		// 	$data['title'] .= 'Kabupaten/Kota '.$this->mdl_kbupaten->getKabByID($kab)->NAMAKABUP;
		// 	$data['stat'] = $this->mdl_kbupaten->getData($prov);
		// 	$this->load->view('sdm/dinas/sdm_kab', $data);
		// }
		
		$this->close();

	}
	
}
