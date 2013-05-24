<?php
class Laporan_model extends CI_Model{
		
	public function __construct(){
		parent::__construct();
	}
	
	public function get_sdm_kementerian($e1,$e2,$e3,$e4){
		
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('pegawai_kementrian a');
		$this->db->join('golongan b', 'b.id_golongan = a.id_golongan');
		$this->db->join('jabatan c', 'c.id_jabatan = a.id_jabatan');
		
		if($e1 != '0'){
			$this->db->where('id_eselon_1', $e1);	
		}
		if($e2 != '0'){
			$this->db->where('id_eselon_2', $e2);	
		}
		if($e3 != '0'){
			$this->db->where('id_eselon_3', $e3);	
		}
		if($e4 != '0'){
			$this->db->where('id_eselon_4', $e4);	
		}
		
		$result = $this->db->get();
		
		$i=0;
		foreach($result->result() as $row){
			$pdfdata[$i][0] = $i +1;
			$pdfdata[$i][1] = $row->nip;
			$pdfdata[$i][2] = $row->nama;
			$pdfdata[$i][3] = $row->alamat;
			$pdfdata[$i][4] = $row->nama_jabatan;
			$pdfdata[$i][5] = $row->nama_golongan;
			
			$i++;
		}
		
		return $pdfdata;
		
	}
	
	public function get_sdm_dinas($prov, $kab){
		
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('pegawai_dinas a');
		$this->db->join('golongan b', 'b.id_golongan = a.id_golongan');
		$this->db->join('jabatan c', 'c.id_jabatan = a.id_jabatan');
		
		if($prov != 0){
			$this->db->where('kodeprovin', $prov);
		}
		if($kab != 0){
			$this->db->where('kodekabup', $kab);	
		}
		
		
		$result = $this->db->get();
		
		$i=0;
		foreach($result->result() as $r){
			$data[$i][0] = $i + 1;
			$data[$i][1] = $r->nip;
			$data[$i][2] = $r->nama_pegawai;
			$data[$i][3] = $r->alamat;
			$data[$i][4] = $r->nama_jabatan;
			$data[$i][5] = $r->nama_golongan;
			
			$i++;
		}
		
		return $data;
	}
	
}
?>