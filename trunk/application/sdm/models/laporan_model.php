<?php
class Laporan_model extends CI_Model{
		
	public function __construct(){
		parent::__construct();
	}
	
	public function get_sdm_kementerian($kantor,$unit){
		
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEGAWAI');
		$this->db->join('SDM_KABUPATEN', 'SDM_KABUPATEN.KODEKABUP = SDM_PEGAWAI.KABALAMAT');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEGAWAI.GOLONGAN');
		
		if($kantor != '0'){
			$this->db->where('UNITKANTOR', $kantor);	
		}
		if($unit != '0'){
			$this->db->where('KERJAUNIT', $unit);	
		}
		
		$result = $this->db->get();
		
		$i=0;
		foreach($result->result() as $row){
			$pdfdata[$i][0] = $i +1;
			$pdfdata[$i][1] = $row->NIP;
			$pdfdata[$i][2] = $row->NAMA;
			$pdfdata[$i][3] = $row->JALAN;
			$pdfdata[$i][4] = $row->JABATAN;
			$pdfdata[$i][5] = $row->NAMA_GOLONGAN;
			$i++;
		}
		
		return $pdfdata;
		
	}
	
	public function get_sdm_dinas($prov, $kab){
		
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_DINAS');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEG_DINAS.ID_GOLONGAN');
		$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_DINAS.ID_JABATAN');
		
		$this->db->where('KODEPROVIN', $prov);
		$this->db->where('KODEKABUP', $kab);	
		
		$result = $this->db->get();
		
		$i=0;
		foreach($result->result() as $r){
			$data[$i][0] = $i + 1;
			$data[$i][1] = $r->NIP;
			$data[$i][2] = $r->NAMA;
			$data[$i][3] = $r->ALAMAT;
			$data[$i][4] = $r->NAMA_JABATAN;
			$data[$i][5] = $r->NAMA_GOLONGAN;
			$i++;
		}
		
		return $data;
	}
	public function get_sdm_bumn($matra, $bumn){
		
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_BUMN');
		//$this->db->join('SDM_BUMN', 'SDM_BUMN.KODEBUMN = SDM_PEG_BUMN.KODEBUMN');
		//$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_BUMN.ID_JABATAN');
		
		$this->db->where('KODEMATRA', $matra);
		$this->db->where('KODEBUMN', $bumn);	
		
		$result = $this->db->get();
		
		$i=0;
		foreach($result->result() as $r){
			$data[$i][0] = $i + 1;
			$data[$i][1] = $r->NIK;
			$data[$i][2] = $r->NAMA;
			$data[$i][3] = $r->ALAMAT;
			$data[$i][4] = $r->JABATAN;
			//$data[$i][5] = $r->NAMA_BUMN;
			$i++;
		}
		
		return $data;
	}
	
	public function get_duk_sdm_kementerian($kantor,$unit){
		
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEGAWAI');
		$this->db->join('SDM_KABUPATEN', 'SDM_KABUPATEN.KODEKABUP = SDM_PEGAWAI.KABALAMAT');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEGAWAI.GOLONGAN');
		
		if($kantor != '0'){
			$this->db->where('UNITKANTOR', $kantor);	
		}
		if($unit != '0'){
			$this->db->where('KERJAUNIT', $unit);	
		}
		
		$this->db->order_by('ID_GOLONGAN', 'ASC');
		$this->db->order_by('TMTPNS', 'ASC');
		$result = $this->db->get();
		
		$i=0;
		foreach($result->result() as $row){
			$pdfdata[$i][0] = $i +1;
			$pdfdata[$i][1] = $row->NIP;
			$pdfdata[$i][2] = $row->NAMA;
			$pdfdata[$i][3] = $row->JALAN;
			$pdfdata[$i][4] = $row->NAMA_GOLONGAN;
			$pdfdata[$i][5] = $row->TMTGOLONG;
			$pdfdata[$i][6] = $row->JABATAN;
			$pdfdata[$i][7] = $row->TMTJABATAN;
			$pdfdata[$i][8] = $row->TMTPNS;
			$i++;
		}
		
		return $pdfdata;
		
	}
	
	public function get_duk_sdm_dinas($prov,$kab){
		
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEG_DINAS');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEG_DINAS.ID_GOLONGAN');
		$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_DINAS.ID_JABATAN');
		
		if($prov != '0'){
			$this->db->where('KODEPROVIN', $prov);	
		}
		if($kab != '0'){
			$this->db->where('KODEKABUP', $kab);	
		}
		
		$this->db->order_by('SDM_PEG_DINAS.ID_GOLONGAN', 'ASC');
		$this->db->order_by('SDM_PEG_DINAS.ID_JABATAN', 'ASC');
		$this->db->order_by('SDM_PEG_DINAS.TMT', 'ASC');
		$result = $this->db->get();
		
		$i=0;
		foreach($result->result() as $row){
			$pdfdata[$i][0] = $i +1;
			$pdfdata[$i][1] = $row->NIP;
			$pdfdata[$i][2] = $row->NAMA;
			$pdfdata[$i][3] = $row->ALAMAT;
			$pdfdata[$i][4] = $row->NAMA_GOLONGAN;
			$pdfdata[$i][5] = $row->TMT_GOLONGAN;
			$pdfdata[$i][6] = $row->NAMA_JABATAN;
			$pdfdata[$i][7] = $row->TMT_JABATAN;
			$pdfdata[$i][8] = $row->TMT;
			$i++;
		}
		
		return $pdfdata;
		
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