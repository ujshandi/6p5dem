<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdashboard');
	}
	
	public function index()
	{
		
		$data['modul']='home';
		show('home', $data);
	
	}
	
	function get_form($p1="",$p2=""){
		//$this->open();
		$data['modul']=$p1;
		
		switch ($p1){
			case 'sdm_dinas':
				$data['title']='Provinsi';
				$mod="sdm_prov";
				
			break;
			case 'sdm_kementerian':
				$data['title']='Kementerian Perhubungan';
				$mod="sdm_kementerian";
				
			break;
			case 'sdm_bumn':
				$data['title']='Kementerian Perhubungan';
				$mod="sdm_bumn";
				
			break;
			case 'mon_diklat':
				$data['title']='Komposisi Peserta Diklat';
				$data['flag']=$p2;
				$mod="mon_diklat";
			
			break;
			case 'mon_diklat_upt':
				$data['title']='Komposisi Peserta Diklat';
				$data['flag']=$p2;
				$mod="mon_diklat_upt";
			
			break;
			
			case "data_list":
				$mod="data_list";
				$data['induk_upt']	 =$this->input->post('induk_upt');
				$data['program_upt'] =$this->input->post('program_upt');
				$data['tahun_akhir'] =$this->input->post('tahun_akhir');
				$data['tahun_mulai'] =$this->input->post('tahun_mulai');
				$data_diklat=$this->mdashboard->get_data('get_DIKLAT',$data['induk_upt'],$data['tahun_mulai'],$data['tahun_akhir']);
				$html_isi="";
				$html='<table width="100%" border="0">
					<thead>
					  <tr>
						<th>KODE UPT</th>
						<th>NAMA UPT</th>';
						
				for($i=$data['tahun_mulai'];$i<=$data['tahun_akhir'];$i++){		
					$html .='<th align="right">'.$i.'&nbsp;</th>';
					
				}		
				$html .='</tr></thead>';
				foreach($data_diklat as $x=>$v){
				$html .='
					  <tr>
						<td>'.$v['KODE_UPT'].'</td>
						<td>'.$v['NAMA_UPT'].'</td>';
						for($i=$data['tahun_mulai'];$i<=$data['tahun_akhir'];$i++){	
								$html .='<td align="right">'.$v['JUMLAH_'.$i].'</td>';
						}		
				$html .='</tr>';
					  
				}
				$html .='</table>';
				
				$data['html']=$html;
			break;
			//tambahan
			/*case "data_list_upt":
				$mod="data_list_upt";
				$data['induk_upt']	 =$this->input->post('induk_upt');
				$data['upt'] =$this->input->post('upt');
				$data['tahun_akhir'] =$this->input->post('tahun_akhir');
				$data['tahun_mulai'] =$this->input->post('tahun_mulai');
				$data_diklat=$this->mdashboard->get_data_upt('get_DIKLAT',$data['induk_upt'],$data['tahun_mulai'],$data['tahun_akhir']);
				$html_isi="";
				$html='<table width="100%" border="0">
					<thead>
					  <tr>
						<th>KODE UPT</th>
						<th>NAMA UPT</th>';
						
				for($i=$data['tahun_mulai'];$i<=$data['tahun_akhir'];$i++){		
					$html .='<th align="right">'.$i.'&nbsp;</th>';
					
				}		
				$html .='</tr></thead>';
				foreach($data_diklat as $x=>$v){
				$html .='
					  <tr>
						<td>'.$v['KODE_UPT'].'</td>
						<td>'.$v['NAMA_UPT'].'</td>';
						for($i=$data['tahun_mulai'];$i<=$data['tahun_akhir'];$i++){	
								$html .='<td align="right">'.$v['JUMLAH_'.$i].'</td>';
						}		
				$html .='</tr>';
					  
				}
				$html .='</table>';
				
				$data['html']=$html;
			break;*/
			
			case "data_grafik":
				$mod="data_grafik";
			break;
			case "data_grafik_upt":
				$mod="data_grafik_upt";
			break;
			default:$mod='under';
		}
		
		$this->load->view('dashboard/'.$mod, $data);
		//$this->close();
	}
	
	function get_data($p1="",$p2=""){
		
		echo $this->mdashboard->get_data_grid($p1);
		
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
			//tes BUMN
			case 'data_bumn':
				$data['kd_matra']=$this->input->post('kd_matra');
				$data['flag_kelamin']=$this->input->post('flag_kelamin');
				$data['chart']=$p2;
				$data['title']='Data ';
				$data['chart']=$p2;
				
			break;
			
		}
		$this->load->view('dashboard/'.$p1, $data);
	}
	//kementerian
	function get_detail2($p1="",$p2=""){
		switch ($p1){
			case 'data_satker':
				$data['kd_kantor']=$this->input->post('kd_kantor');
				$data['flag_kelamin']=$this->input->post('flag_kelamin');
				$data['chart']=$p2;
				$data['title']='Data ';
				$data['chart']=$p2;
				
			break;
			
		}
		$this->load->view('dashboard/'.$p1, $data);
	}
	
	function get_datagrap(){
	$kat=$this->input->post('kat');
	$kom=$this->input->post('kom');
	$prov=$this->input->post('prov');
	$kantor=$this->input->post('kantor');
	$matra=$this->input->post('matra');

		switch($kat){
			case "all":
				$data=$this->mdashboard->get_data('data_sdm',$kat);
			//	print_r($data);
				$xml='<chart caption="" showLegend="0" bgAlpha="30,100" bgAngle="100" pieYScale="50" startingAngle="100"  smartLineColor="7D8892" smartLineThickness="2">';
				foreach ($data as $x=>$v){
					$xml .='<set label="'.$v['NAMAPROVIN'].'" value="'.$v['JUMLAH_SDM'].'" isSliced="1" link=\'JavaScript:get_data_kab("'.$v["KODEPROVIN"].'","",300,200,"get_detail/data_kab/Doughnut3D")\' />';
				}
				
			
			$xml .='</chart>';
			
			break;
			//---- kementerian
			case "all2":
				$data=$this->mdashboard->get_data('data_sdm_kementerian',$kat);
			//	print_r($data);
				$xml='<chart caption="" showLegend="0" bgAlpha="30,100" bgAngle="100" pieYScale="50" startingAngle="100"  smartLineColor="7D8892" smartLineThickness="2">';
				foreach ($data as $x=>$v){
					$xml .='<set label="'.$v['NAMAPENUH'].'" value="'.$v['JUMLAH_SDM'].'" isSliced="1" link=\'JavaScript:get_data_satker("'.$v["UNITKANTOR"].'","",300,200,"get_detail2/data_satker/Doughnut3D")\' />';
				}
				
			
			$xml .='</chart>';
			
			break;
			// --- BUMN
			case "all3":
				$data=$this->mdashboard->get_data('data_sdm_bumn',$kat);
			//	print_r($data);
				$xml='<chart caption="" showLegend="0" bgAlpha="30,100" bgAngle="100" pieYScale="50" startingAngle="100"  smartLineColor="7D8892" smartLineThickness="2">';
				foreach ($data as $x=>$v){
					$xml .='<set label="'.$v['NAMAMATRA'].'" value="'.$v['JUMLAH_SDM'].'" isSliced="1" link=\'JavaScript:get_data_bumn("'.$v["KODEMATRA"].'","",300,200,"get_detail/data_bumn/Doughnut3D")\' />';
				}
				
			
			$xml .='</chart>';
			
			break;
			case "diklat":
				$data['induk_upt']	 =$this->input->post('induk_upt');
				$data['program_upt'] =$this->input->post('program_upt');
				$data['tahun_akhir'] =$this->input->post('tahun_akhir');
				$data['tahun_mulai'] =$this->input->post('tahun_mulai');
				$data_diklat=$this->mdashboard->get_data('get_DIKLAT_GRAP',$data['induk_upt'],$data['tahun_mulai'],$data['tahun_akhir']);
				
				
				
				$xml="<chart caption='Jumlah ".($this->input->post('flag')=='peserta' ? 'Peserta' : 'Lulusan')." Pendidikan Dan Pelatihan' subcaption='Tahun ".$data['tahun_mulai']." sampai ".$data['tahun_akhir']."' xAxisName='Tahun' yAxisName='Orang' numberPrefix='' showLabels='1' showColumnShadow='1' animation='1' showAlternateHGridColor='1' AlternateHGridColor='ff5904' divLineColor='ff5904' divLineAlpha='20' alternateHGridAlpha='5' canvasBorderColor='666666' baseFontColor='666666' lineColor='FF5904' lineAlpha='85' showValues='1' rotateValues='1' valuePosition='auto' canvaspadding='8'>";
				//print_r($data_diklat);
				for($i=$data['tahun_mulai'];$i<=$data['tahun_akhir'];$i++){		
					$xml .="<set label='".$i."' value='".$data_diklat[0]['JML_'.$i]."' />";
					
				}		
				
			
			$xml .="</chart>";
			break;
			
			case "data_kab":
				$kd_prov=$this->input->post('kd_prov');
				$flag_kelamin=$this->input->post('flag_kelamin');
				$data=$this->mdashboard->get_data('data_sdm_kab',$kd_prov,$flag_kelamin);
			//	print_r($data);
				if($flag_kelamin){
					$xml="<chart yAxisName='Jumlah' showLegend='0' labelDisplay='ROTATE' numDivLines='5' slantLabels='1' caption='Data Per Kabupaten' numberPrefix='' showBorder='0' imageSave='1' exportHandler=''>";
				}
				
				else{
					$xml='<chart caption="" showLegend="1" bgAlpha="30,100" bgAngle="100" pieYScale="50" startingAngle="100"  smartLineColor="7D8892" smartLineThickness="2">';
				}
				
				foreach ($data as $x=>$v){
					$xml .='<set label="'.$v['NAMAKABUP'].'" value="'.$v['JUMLAH_SDM'].'" />';
				}
				
			
			$xml .='</chart>';
			
			break;
			
			//kementerian
			case "data_satker":
				$kd_kantor=$this->input->post('kd_kantor');
				$flag_kelamin=$this->input->post('flag_kelamin');
				$data=$this->mdashboard->get_data('data_sdm_satker',$kd_kantor,$flag_kelamin);
			//	print_r($data);
				if($flag_kelamin){
					$xml="<chart yAxisName='Jumlah' showLegend='0' labelDisplay='ROTATE' numDivLines='5' slantLabels='1' caption='Data Per Unit Kerja' numberPrefix='' showBorder='0' imageSave='1' exportHandler=''>";
				}
				
				else{
					$xml='<chart caption="" showLegend="1" bgAlpha="30,100" bgAngle="100" pieYScale="50" startingAngle="100"  smartLineColor="7D8892" smartLineThickness="2">';
				}
				
				foreach ($data as $x=>$v){
					$xml .='<set label="'.$v['NAMAPENUH'].'" value="'.$v['JUMLAH_SDM'].'" />';
				}
				
			
			$xml .='</chart>';
			
			break;
			
			//--- BUMN
			case "data_bumn":
				$kd_matra=$this->input->post('kd_matra');
				$flag_kelamin=$this->input->post('flag_kelamin');
				$data=$this->mdashboard->get_data('data_sdm_bumn',$kd_matra,$flag_kelamin);
			//	print_r($data);
				if($flag_kelamin){
					$xml="<chart yAxisName='Jumlah' showLegend='0' labelDisplay='ROTATE' numDivLines='5' slantLabels='1' caption='Data Per BUMN' numberPrefix='' showBorder='0' imageSave='1' exportHandler=''>";
				}
				
				else{
					$xml='<chart caption="" showLegend="1" bgAlpha="30,100" bgAngle="100" pieYScale="50" startingAngle="100"  smartLineColor="7D8892" smartLineThickness="2">';
				}
				
				foreach ($data as $x=>$v){
					$xml .='<set label="'.$v['NAMA_BUMN'].'" value="'.$v['JUMLAH_SDM'].'" />';
				}
				
			
			$xml .='</chart>';
			
			break;
			
			case "campur":
				$data=$this->mdashboard->get_data('data_sdm',$kat);
				$xml_pria="<dataset seriesName='Pria' color='0078B5' showValues='0'>";
				$xml_wanita="<dataset seriesName='Wanita' color='750D00' showValues='0'>";
				$xml="<graph caption='Komposisi dashboard Provinsi' xAxisName='Provinsi' yAxisName='Total Pria & Wanita'
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
					$xml .="<set label='".$v['NAMAPROVIN']."' value='".$v['JUMLAH_dashboard']."' toolText='2006 Rank: 1, Country: US'/>";
				}
				$xml .="</chart>";*/
			break;
			
			//kementerian
			
			case "campur2":
				$data=$this->mdashboard->get_data('data_sdm_kementerian',$kat);
				$xml_pria="<dataset seriesName='Pria' color='0078B5' showValues='0'>";
				$xml_wanita="<dataset seriesName='Wanita' color='750D00' showValues='0'>";
				$xml="<graph caption='Komposisi dashboard Kementerian Perhubungan' xAxisName='Kantor' yAxisName='Total Pria & Wanita'
					  showValues='0' numberPrefix='' decimalPrecision='0' bgcolor='F3f3f3' bgAlpha='70'
					  showColumnShadow='1' divlinecolor='c5c5c5' divLineAlpha='60' showAlternateHGridColor='1'
					  alternateHGridColor='f8f8f8' alternateHGridAlpha='60' ><categories>"; 
				foreach ($data as $x=>$v){
					$xml .="<category name='".$v["NAMAPENUH"]."' />";
					$xml_pria .="<set value='".$v["JUMLAH_SDM_PRIA"]."' link=\"JavaScript:get_data_satker('".$v["KODEKANTOR"]."','P',300,200,'get_detail2/data_satker/Column3D')\" />";
					$xml_wanita .="<set value='".$v["JUMLAH_SDM_WANITA"]."' link=\"JavaScript:get_data_satker('".$v["KODEKANTOR"]."','W',300,200,'get_detail2/data_satker/Column3D')\" />";
				}
					$xml_pria .="</dataset>";
					$xml_wanita .="</dataset>";
					$xml .="</categories>";
					$xml .=$xml_pria.$xml_wanita."</graph>";
				
				
				/*$xml="<chart caption='Brand Winner' yAxisName='Brand Value ($ m)' xAxisName='Brand' bgColor='F1F1F1' showValues='0' canvasBorderThickness='1' canvasBorderColor='999999' plotFillAngle='330' plotBorderColor='999999' showAlternateVGridColor='1' divLineAlpha='0'>";
				foreach ($data as $x=>$v){
					$xml .="<set label='".$v['NAMAPROVIN']."' value='".$v['JUMLAH_dashboard']."' toolText='2006 Rank: 1, Country: US'/>";
				}
				$xml .="</chart>";*/
			break;
			
			//BUMN
			case "campur3":
				$data=$this->mdashboard->get_data('data_sdm_bumn',$kat);
				$xml_pria="<dataset seriesName='Pria' color='0078B5' showValues='0'>";
				$xml_wanita="<dataset seriesName='Wanita' color='750D00' showValues='0'>";
				$xml="<graph caption='Komposisi dashboard BUMN Bidang Transportasi' xAxisName='Matra' yAxisName='Total Pria & Wanita'
					  showValues='0' numberPrefix='' decimalPrecision='0' bgcolor='F3f3f3' bgAlpha='70'
					  showColumnShadow='1' divlinecolor='c5c5c5' divLineAlpha='60' showAlternateHGridColor='1'
					  alternateHGridColor='f8f8f8' alternateHGridAlpha='60' ><categories>"; 
				foreach ($data as $x=>$v){
					$xml .="<category name='".$v["NAMAMATRA"]."' />";
					$xml_pria .="<set value='".$v["JUMLAH_SDM_PRIA"]."' link=\"JavaScript:get_data_bumn('".$v["KODEMATRA"]."','P',300,200,'get_detail/data_bumn/Column3D')\" />";
					$xml_wanita .="<set value='".$v["JUMLAH_SDM_WANITA"]."' link=\"JavaScript:get_data_bumn('".$v["KODEMATRA"]."','W',300,200,'get_detail/data_bumn/Column3D')\" />";
				}
					$xml_pria .="</dataset>";
					$xml_wanita .="</dataset>";
					$xml .="</categories>";
					$xml .=$xml_pria.$xml_wanita."</graph>";
				
				
				/*$xml="<chart caption='Brand Winner' yAxisName='Brand Value ($ m)' xAxisName='Brand' bgColor='F1F1F1' showValues='0' canvasBorderThickness='1' canvasBorderColor='999999' plotFillAngle='330' plotBorderColor='999999' showAlternateVGridColor='1' divLineAlpha='0'>";
				foreach ($data as $x=>$v){
					$xml .="<set label='".$v['NAMAPROVIN']."' value='".$v['JUMLAH_dashboard']."' toolText='2006 Rank: 1, Country: US'/>";
				}
				$xml .="</chart>";*/
			break;
		}
		
		echo $xml;	
	}

	function get_combo($p1,$valfilter="",$val="",$val2=""){
		$optTemp =""; 
		switch($p1){
				case 'DIKLAT_MST_INDUKUPT':
					$rec=$this->mdashboard->isi_combo('DIKLAT_MST_INDUKUPT','KODE_INDUK','NAMA_INDUK');
				break;
				
				case 'DIKLAT_MST_PROGRAM':
					$rec=$this->mdashboard->isi_combo('DIKLAT_MST_PROGRAM','KODE_PROGRAM','NAMA_PROGRAM');
				break;
		}
		//print_r($rec);
		$optTemp .= "<option value=''>-- Pilih --</option>";			
			foreach($rec as $v=>$k)
			{
				if($this->input->post("v") == $k['ID_NA'])
					$optTemp .= "<option selected value='".$k['ID_NA']."'>".$k['TEXT']."</option>";
				else 
					$optTemp .= "<option value='".$k['ID_NA']."'>".$k['TEXT']."</option>";
			}
			echo $optTemp;	
		
	}
	//tambahan
	function get_combo_upt($p1,$valfilter="",$val="",$val2=""){
		$optTemp =""; 
		switch($p1){
				case 'DIKLAT_MST_INDUKUPT':
					$rec=$this->mdashboard->isi_combo_upt('DIKLAT_MST_INDUKUPT','KODE_INDUK','NAMA_INDUK');
				break;
				
				case 'DIKLAT_MST_UPT':
					$rec=$this->mdashboard->isi_combo_upt('DIKLAT_MST_UPT','KODE_UPT','NAMA_UPT');
				break;
		}
		//print_r($rec);
		$optTemp .= "<option value=''>-- Pilih --</option>";			
			foreach($rec as $v=>$k)
			{
				if($this->input->post("v") == $k['ID_NA'])
					$optTemp .= "<option selected value='".$k['ID_NA']."'>".$k['TEXT']."</option>";
				else 
					$optTemp .= "<option value='".$k['ID_NA']."'>".$k['TEXT']."</option>";
			}
			echo $optTemp;	
		
	}
	
}
