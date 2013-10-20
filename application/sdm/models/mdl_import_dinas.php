<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mdl_import_dinas extends CI_Model
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
			
			$this->db->set('NIP', 				$data[$i]['NIP']);
			$this->db->set('NAMA', 				$data[$i]['NAMA_PEGAWAI']);
			$this->db->set('TMPT_LAHIR', 		$data[$i]['TEMPAT_LAHIR']);
			$this->db->set('TGL_LAHIR', 		'TO_TIMESTAMP(\''.$data[$i]['TGL_LAHIR'].'\', \'YYYY-MM-DD HH24:MI:SS\')', FALSE);
			$this->db->set('JENIS_KELAMIN', 	$data[$i]['JENIS_KELAMIN']);
			$this->db->set('AGAMA', 			$data[$i]['AGAMA']);
			$this->db->set('TMT',				$data[$i]['TAHUN_PENGANGKATAN']);
			$this->db->set('ALAMAT', 			$data[$i]['ALAMAT']);
			$this->db->set('STATUS', 			$data[$i]['STATUS_PERKAWINAN']);
			$this->db->set('KETERANGAN', 		$data[$i]['KETERANGAN']);
			$this->db->set('JML_ANAK', 			$data[$i]['JUMLAH_ANAK']);
			//$this->db->set('KODEKABUP', 		$data[$i]['KODEKABUP']);
			//$this->db->set('KODEPROVIN', 		$data[$i]['KODEPROVIN']);
			$this->db->set('ID_JABATAN', 		$data[$i]['ID_JABATAN']);
			$this->db->set('ID_GOLONGAN', 		$data[$i]['ID_GOLONGAN']);
			$this->db->set('TMT_GOLONGAN', 		$data[$i]['TMT_GOLONGAN']);
			$this->db->set('TMT_JABATAN', 		$data[$i]['TMT_JABATAN']);
			
			//$this->db->set('userid', 		$data[$i]['kodeprovin']);
			$this->db->set('KODEPROVIN', 		$data[$i]['KODEPROVIN']);
			$this->db->set('KODEKABUP', 		$data[$i]['KODEKABUP']);
			
			if($data[$i]['LENGKAP'] == TRUE){
				$this->db->insert('SDM_PEG_DINAS');
			}else{
				$this->db->insert('SDM_PEG_DINAS_TEMP');
			}
			
		}
		
		$this->db->trans_complete();
	    return $this->db->trans_status();
	}
	
	public function importDataVerifikasi($data){
		$this->db->trans_start();
		
		for($i=0, $c=count($data); $i<$c; $i++){
			$this->db->flush_cache();
			
			$this->db->set('NIP', 				$data[$i]['NIP']);
			$this->db->set('NAMA', 				$data[$i]['NAMA']);
			$this->db->set('TMPT_LAHIR', 		$data[$i]['TMPT_LAHIR']);
			$this->db->set('TGL_LAHIR', 		'TO_TIMESTAMP(\''.$this->getDate($data[$i]['TGL_LAHIR']).'\', \'YYYY-MM-DD\')', FALSE);
			$this->db->set('JENIS_KELAMIN', 	$data[$i]['JENIS_KELAMIN']);
			$this->db->set('AGAMA', 			$data[$i]['AGAMA']);
			$this->db->set('TMT',				$data[$i]['TMT']);
			$this->db->set('ALAMAT', 			$data[$i]['ALAMAT']);
			$this->db->set('STATUS', 			$data[$i]['STATUS']);
			$this->db->set('KETERANGAN', 		$data[$i]['KETERANGAN']);
			$this->db->set('JML_ANAK', 			$data[$i]['JML_ANAK']);
			$this->db->set('KODEKABUP', 		$data[$i]['KODEKABUP']);
			$this->db->set('KODEPROVIN', 		$data[$i]['KODEPROVIN']);
			$this->db->set('ID_JABATAN', 		$data[$i]['ID_JABATAN']);
			$this->db->set('ID_GOLONGAN', 		$data[$i]['ID_GOLONGAN']);
			$this->db->set('TMT_GOLONGAN', 		$data[$i]['TMT_GOLONGAN']);
			$this->db->set('TMT_JABATAN', 		$data[$i]['TMT_JABATAN']);
			
			$this->db->insert('SDM_PEG_DINAS');
			
			# delete temporary
			$this->db->flush_cache();
			$this->db->where('ID_PEG_DINAS', $data[$i]['ID_PEG_DINAS']);
			$this->db->delete('SDM_PEG_DINAS_TEMP');
			
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
		return $this->db->get('SDM_PEG_DINAS_TEMP');
	}
	
	public function getGolongan(){
		$this->db->flush_cache();
		$row = $this->db->get('SDM_GOLONGAN')->result();
		$x=0;
		foreach($row as $r){
			$data[$x]['ID_GOLONGAN'] = $r->ID_GOLONGAN;
			$data[$x]['NAMA_GOLONGAN'] = $r->NAMA_GOLONGAN;
			$data[$x]['NAMA_GOLONGAN'] = strtoupper($data[$x]['NAMA_GOLONGAN']);
			$data[$x]['NAMA_GOLONGAN'] = trim($data[$x]['NAMA_GOLONGAN']);
			$data[$x]['NAMA_GOLONGAN'] = str_replace(' ', '', $data[$x]['NAMA_GOLONGAN']);
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
	
	public function comboGolongan($dt){
		$name = isset($dt['name'])?$dt['name']:'ID_GOLONGAN';
		$selected = isset($dt['selected'])?$dt['selected']:'';
		
		$this->db->flush_cache();
		$res = $this->db->get('SDM_GOLONGAN');
		
		$str = '<select name="'.$name.'">';
		$str .= '<option value=""></option>';
			
		foreach($res->result() as $r){
			if($r->ID_GOLONGAN == $selected){
				$str .= '<option value="'.$r->ID_GOLONGAN.'" selected="selected">'.$r->NAMA_GOLONGAN.'</option>';
			}else{
				$str .= '<option value="'.$r->ID_GOLONGAN.'">'.$r->NAMA_GOLONGAN.'</option>';
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
	
	function getOptionProvin($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('SDM_PROVINSI');
		$this->db->order_by('KODEPROVIN');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="">--- Semua ---</option>';
		foreach($res->result() as $r){
			if($r->KODEPROVIN == trim($value)){
				$out .= '<option value="'.$r->KODEPROVIN.'" selected="selected">'.$r->NAMAPROVIN.'</option>';
			}else{
				$out .= '<option value="'.$r->KODEPROVIN.'">'.$r->NAMAPROVIN.'</option>';
			}
		}
		//$out .= '</select>';
		
		return $out;
	}
	
	function getOptionKabup($d){
	
		$value = isset($d['value'])?$d['value']:'';
		$KODEPROVIN = isset($d['KODEPROVIN'])?$d['KODEPROVIN']:'';
		
		$this->db->flush_cache();
		$this->db->where('KODEPROVIN', $KODEPROVIN==0?'':$KODEPROVIN);
		$result = $this->db->get('SDM_KABUPATEN');
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		$out = '<option value="" selected="selected">-- Pilih --</option>';
		foreach($result->result() as $r){
				if(trim($r->KODEKABUP) == trim($value)){
						$out .= '<option value="'.$r->KODEKABUP.'" selected="selected">'.$r->NAMAKABUP.'</option>';
				}else{
						$out .= '<option value="'.$r->KODEKABUP.'">'.$r->NAMAKABUP.'</option>';
				}
		}
		//$out .= '</select>';
		
		return $out;
	
	}
}
?>