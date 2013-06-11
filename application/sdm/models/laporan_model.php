<?php
class Laporan_model extends CI_Model{
		
	public function __construct(){
		parent::__construct();
	}
	
	public function get_sdm_kementerian($e1,$e2,$e3,$e4){
		
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('SDM_PEGAWAI_KEMENTRIAN');
		$this->db->join('SDM_GOLONGAN', 'SDM_GOLONGAN.ID_GOLONGAN = SDM_PEGAWAI_KEMENTRIAN.ID_GOLONGAN');
		$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEGAWAI_KEMENTRIAN.ID_JABATAN');
		
		if($e1 != '0'){
			$this->db->where('ID_ESELON_1', $e1);	
		}
		if($e2 != '0'){
			$this->db->where('ID_ESELON_2', $e2);	
		}
		if($e3 != '0'){
			$this->db->where('ID_ESELON_3', $e3);	
		}
		if($e4 != '0'){
			$this->db->where('ID_ESELON_4', $e4);	
		}
		
		$result = $this->db->get();
		
		$i=0;
		foreach($result->result() as $row){
			$pdfdata[$i][0] = $i +1;
			$pdfdata[$i][1] = $row->NIP;
			$pdfdata[$i][2] = $row->NAMA;
			$pdfdata[$i][3] = $row->ALAMAT;
			$pdfdata[$i][4] = $row->NAMA_JABATAN;
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
		$this->db->join('SDM_JABATAN', 'SDM_JABATAN.ID_JABATAN = SDM_PEG_BUMN.ID_JABATAN');
		
		$this->db->where('KODEMATRA', $matra);
		$this->db->where('KODEBUMN', $bumn);	
		
		$result = $this->db->get();
		
		$i=0;
		foreach($result->result() as $r){
			$data[$i][0] = $i + 1;
			$data[$i][1] = $r->NIK;
			$data[$i][2] = $r->NAMA;
			$data[$i][3] = $r->ALAMAT;
			$data[$i][4] = $r->NAMA_JABATAN;
			//$data[$i][5] = $r->NAMA_BUMN;
			$i++;
		}
		
		return $data;
	}

	
}
?>