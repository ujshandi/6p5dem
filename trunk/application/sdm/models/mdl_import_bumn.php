<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mdl_import_bumn extends CI_Model
{	
	/**
	* constructor
	*/
	public function __construct()
    {
        parent::__construct();
		//$this->CI =& get_instance();
    }
	
	public function importData($data){
		$this->db->trans_start();
		
		for($i=0, $c=count($data); $i<$c; $i++){
			$this->db->flush_cache();
			
			$this->db->set('NIK', 				$data[$i]['NIK']);
			$this->db->set('NAMA', 				str_replace("'", "", $data[$i]['NAMA']));
			$this->db->set('TMPT_LAHIR', 		$data[$i]['TMPT_LAHIR']);
			$this->db->set('TGL_LAHIR', 		'TO_DATE(\''.$data[$i]['TGL_LAHIR'].'\', \'DD-MM-YYYY\')', FALSE);
			$this->db->set('JENIS_KELAMIN', 	$data[$i]['JENIS_KELAMIN']);
			$this->db->set('AGAMA', 			$data[$i]['AGAMA']);
			$this->db->set('TMT',				$data[$i]['TMT']);
			$this->db->set('ALAMAT', 			$data[$i]['ALAMAT']);
			$this->db->set('STATUS', 			$data[$i]['STATUS']);
			$this->db->set('GOLONGAN',	 		$data[$i]['GOLONGAN']);
			$this->db->set('JML_ANAK', 			$data[$i]['JML_ANAK']);
			//$this->db->set('KODEMATRA', 		$data[$i]['KODEMATRA']);
			//$this->db->set('KODEBUMN', 			$data[$i]['KODEBUMN']);
			$this->db->set('JABATAN', 			$data[$i]['JABATAN']);
			$this->db->set('SATKER', 			$data[$i]['SATKER']);
			$this->db->set('STATUS_PEG', 		$data[$i]['STATUS_PEG']);
			
			$this->db->set('KODEMATRA', 		$data[$i]['KODEMATRA']);
			$this->db->set('KODEBUMN',	 		$data[$i]['KODEBUMN']);
			
			//$data_tmp[$x]['JABATAN'] 			= $this->excel->val($i, 13);
			//$this->db->set('ID_GOLONGAN', 		$data[$i]['ID_GOLONGAN']);
			//$this->db->set('TMT_GOLONGAN', 		$data[$i]['TMT_GOLONGAN']);
			//$this->db->set('TMT_JABATAN', 		$data[$i]['TMT_JABATAN']);
			
			//$this->db->set('userid', 		$data[$i]['kodeprovin']);
			
			//if($data[$i]['LENGKAP'] == TRUE){
				$this->db->insert('SDM_PEG_BUMN');
			//}else{
				//$this->db->insert('SDM_PEG_BUMN_TEMP');
			//}
			
		}
		
		$this->db->trans_complete();
	    return $this->db->trans_status();
	}
	
	public function importDataVerifikasi($data){
		$this->db->trans_start();
		
		for($i=0, $c=count($data); $i<$c; $i++){
			$this->db->flush_cache();
			
			$this->db->set('NIK', 				$data[$i]['NIK']);
			$this->db->set('NAMA', 				str_replace("'", "", $data[$x]['NAMAMATRA']));
			$this->db->set('TMPT_LAHIR', 		$data[$i]['TMPT_LAHIR']);
			$this->db->set('TGL_LAHIR', 		'TO_TIMESTAMP(\''.$this->getDate($data[$i]['TGL_LAHIR']).'\', \'YYYY-MM-DD\')', FALSE);
			$this->db->set('JENIS_KELAMIN', 	$data[$i]['JENIS_KELAMIN']);
			$this->db->set('AGAMA', 			$data[$i]['AGAMA']);
			//$this->db->set('TMT',				$data[$i]['TMT']);
			$this->db->set('ALAMAT', 			$data[$i]['ALAMAT']);
			$this->db->set('STATUS', 			$data[$i]['STATUS']);
			$this->db->set('KETERANGAN', 		$data[$i]['KETERANGAN']);
			$this->db->set('JML_ANAK', 			$data[$i]['JML_ANAK']);
			$this->db->set('KODEMATRA', 		$data[$i]['KODEMATRA']);
			$this->db->set('KODEBUMN', 			$data[$i]['KODEBUMN']);
			$this->db->set('ID_JABATAN', 		$data[$i]['ID_JABATAN']);
			//$this->db->set('ID_GOLONGAN', 		$data[$i]['ID_GOLONGAN']);
			//$this->db->set('TMT_GOLONGAN', 		$data[$i]['TMT_GOLONGAN']);
			//$this->db->set('TMT_JABATAN', 		$data[$i]['TMT_JABATAN']);
			
			$this->db->insert('SDM_PEG_BUMN');
			
			# delete temporary
			$this->db->flush_cache();
			$this->db->where('ID_PEG_BUMN', $data[$i]['ID_PEG_BUMN']);
			$this->db->delete('SDM_PEG_BUMN_TEMP');
			
		}
		
		$this->db->trans_complete();
	    return $this->db->trans_status();
	}
	
	function getDate($d){
		//echo $d;
		$tgl = explode('-', $d);
		//echo $tgl[0];
		//exit;
		return $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
	}
	
	public function getDataVerifikasi(){
		$this->db->flush_cache();
		#@$this->db->where('userid', '');
		return $this->db->get('SDM_PEG_BUMN_TEMP');
	}
	
	public function getmatra(){
		$this->db->flush_cache();
		$row = $this->db->get('MATRA')->result();
		$x=0;
		foreach($row as $r){
			$data[$x]['KODEMATRA'] = $r->KODEMATRA;
			$data[$x]['NAMAMATRA'] = $r->NAMAMATRA;
			$data[$x]['NAMAMATRA'] = strtoupper($data[$x]['NAMAMATRA']);
			$data[$x]['NAMAMATRA'] = trim($data[$x]['NAMAMATRA']);
			$data[$x]['NAMAMATRA'] = str_replace(' ', '', $data[$x]['NAMAMATRA']);
			$x++;
		}
		
		return $data;
	}
	
	public function getbumn(){
		$this->db->flush_cache();
		$row = $this->db->get('SDM_BUMN')->result();
		$x=0;
		foreach($row as $r){
			$data[$x]['KODEBUMN'] = $r->KODEBUMN;
			$data[$x]['NAMA_BUMN'] = $r->NAMA_BUMN;
			$data[$x]['NAMA_BUMN'] = strtoupper($data[$x]['NAMA_BUMN']);
			$data[$x]['NAMA_BUMN'] = trim($data[$x]['NAMA_BUMN']);
			$data[$x]['NAMA_BUMN'] = str_replace(' ', '', $data[$x]['NAMA_BUMN']);
			$x++;
		}
		
		return $data;
	}
	
	public function getJabatan(){
		$this->db->flush_cache();
		$row = $this->db->get('SDM_JABATAN')->result();
		
		$x=0;
		foreach($row as $r){
			$data[$x]['ID_JABATAN'] = $r->ID_JABATAN;
			$data[$x]['NAMA_JABATAN'] = strtoupper($r->NAMA_JABATAN);
			$x++;
		}
		
		return $data;
	}
	
	public function comboMatra($dt){
		$name = isset($dt['name'])?$dt['name']:'KODEMATRA';
		$selected = isset($dt['selected'])?$dt['selected']:'';
		
		$this->db->flush_cache();
		$res = $this->db->get('MATRA');
		
		$str = '<select name="'.$name.'">';
		$str .= '<option value=""></option>';
			
		foreach($res->result() as $r){
			if($r->KODEMATRA == $selected){
				$str .= '<option value="'.$r->KODEMATRA.'" selected="selected">'.$r->NAMAMATRA.'</option>';
			}else{
				$str .= '<option value="'.$r->KODEMATRA.'">'.$r->NAMAMATRA.'</option>';
			}
		}
			
		$str .= '</select>';
		
		return $str;
	}
	
	public function comboBumn($dt){
		$name = isset($dt['name'])?$dt['name']:'KODEBUMN';
		$selected = isset($dt['selected'])?$dt['selected']:'';
		
		$this->db->flush_cache();
		$res = $this->db->get('SDM_BUMN');
		
		$str = '<select name="'.$name.'">';
		$str .= '<option value=""></option>';
			
		foreach($res->result() as $r){
			if($r->KODEBUMN == $selected){
				$str .= '<option value="'.$r->KODEBUMN.'" selected="selected">'.$r->NAMA_BUMN.'</option>';
			}else{
				$str .= '<option value="'.$r->KODEBUMN.'">'.$r->NAMA_BUMN.'</option>';
			}
		}
			
		$str .= '</select>';
		
		return $str;
	}
	
	public function comboJabatan($dt){
		$name = isset($dt['name'])?$dt['name']:'ID_JABATAN';
		$selected = isset($dt['selected'])?$dt['selected']:'';
		
		$this->db->flush_cache();
		$res = $this->db->get('SDM_JABATAN');
		
		$str = '<select name="'.$name.'">';
		$str .= '<option value=""></option>';
			
		foreach($res->result() as $r){
			if($r->ID_JABATAN == $selected){
				$str .= '<option value="'.$r->ID_JABATAN.'" selected="selected">'.$r->NAMA_JABATAN.'</option>';
			}else{
				$str .= '<option value="'.$r->ID_JABATAN.'">'.$r->NAMA_JABATAN.'</option>';
			}
		}
			
		$str .= '</select>';
		
		return $str;
	}
	
	// filter baru
	function getOptionMatra($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('MATRA');
		$this->db->order_by('KODEMATRA');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="">--- Semua ---</option>';
		foreach($res->result() as $r){
			if($r->KODEMATRA == trim($value)){
				$out .= '<option value="'.$r->KODEMATRA.'" selected="selected">'.$r->NAMAMATRA.'</option>';
			}else{
				$out .= '<option value="'.$r->KODEMATRA.'">'.$r->NAMAMATRA.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionBumn($d){
	
		$value = isset($d['value'])?$d['value']:'';
		$KODEMATRA = isset($d['KODEMATRA'])?$d['KODEMATRA']:'';
		
		$this->db->flush_cache();
		$this->db->where('KODEMATRA',$KODEMATRA);
		$result = $this->db->get('SDM_BUMN');
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($result->result() as $r){
				if(trim($r->KODEBUMN) == trim($value)){
						$out .= '<option value="'.$r->KODEBUMN.'" selected="selected">'.$r->NAMA_BUMN.'</option>';
				}else{
						$out .= '<option value="'.$r->KODEBUMN.'">'.$r->NAMA_BUMN.'</option>';
				}
		}
		//$out .= '</select>';
		
		return $out;
	
	}
	
}
?>