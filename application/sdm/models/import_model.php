<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Import_model extends CI_Model
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
			
			$this->db->set('nip', 				$data[$i]['nip']);
			$this->db->set('nama_pegawai', 		$data[$i]['nama_pegawai']);
			$this->db->set('tempat_lahir', 		$data[$i]['tempat_lahir']);
			$this->db->set('tgl_lahir', 		$data[$i]['tgl_lahir']);
			$this->db->set('jenis_kelamin', 	$data[$i]['jenis_kelamin']);
			$this->db->set('agama', 			$data[$i]['agama']);
			$this->db->set('tahun_pengangkatan',$data[$i]['tahun_pengangkatan']);
			$this->db->set('alamat', 			$data[$i]['alamat']);
			$this->db->set('status_perkawinan', $data[$i]['status_perkawinan']);
			$this->db->set('keterangan', 		$data[$i]['keterangan']);
			$this->db->set('jumlah_anak', 		$data[$i]['jumlah_anak']);
			$this->db->set('kodekabup', 		$data[$i]['kodekabup']);
			$this->db->set('id_golongan', 		$data[$i]['id_golongan']);
			$this->db->set('id_jabatan', 		$data[$i]['id_jabatan']);
			$this->db->set('kodeprovin', 		$data[$i]['kodeprovin']);
			
			//$this->db->set('userid', 		$data[$i]['kodeprovin']);
			
			if($data[$i]['lengkap'] == TRUE){
				$this->db->insert('pegawai_dinas');
			}else{
				$this->db->insert('pegawai_dinas_tmp');
			}
			
		}
		
		$this->db->trans_complete();
	    return $this->db->trans_status();
	}
	
	public function importDataVerifikasi($data){
		$this->db->trans_start();
		
		for($i=0, $c=count($data); $i<$c; $i++){
			$this->db->flush_cache();
			
			$this->db->set('nip', 				$data[$i]['nip']);
			$this->db->set('nama_pegawai', 		$data[$i]['nama_pegawai']);
			$this->db->set('tempat_lahir', 		$data[$i]['tempat_lahir']);
			$this->db->set('tgl_lahir', 		$data[$i]['tgl_lahir']);
			$this->db->set('jenis_kelamin', 	$data[$i]['jenis_kelamin']);
			$this->db->set('agama', 			$data[$i]['agama']);
			$this->db->set('tahun_pengangkatan',$data[$i]['tahun_pengangkatan']);
			$this->db->set('alamat', 			$data[$i]['alamat']);
			$this->db->set('status_perkawinan', $data[$i]['status_perkawinan']);
			$this->db->set('keterangan', 		$data[$i]['keterangan']);
			$this->db->set('jumlah_anak', 		$data[$i]['jumlah_anak']);
			$this->db->set('kodekabup', 		$data[$i]['kodekabup']);
			$this->db->set('id_golongan', 		$data[$i]['id_golongan']);
			$this->db->set('id_jabatan', 		$data[$i]['id_jabatan']);
			$this->db->set('kodeprovin', 		$data[$i]['kodeprovin']);
			
			$this->db->insert('pegawai_dinas');
			
			# delete temporary
			$this->db->flush_cache();
			$this->db->where('id', $data[$i]['id']);
			$this->db->delete('pegawai_dinas_tmp');
			
		}
		
		$this->db->trans_complete();
	    return $this->db->trans_status();
	}
	
	public function getDataVerifikasi(){
		$this->db->flush_cache();
		#@$this->db->where('userid', '');
		return $this->db->get('pegawai_dinas_tmp');
	}
	
	public function getGolongan(){
		$this->db->flush_cache();
		$row = $this->db->get('golongan')->result();
		$x=0;
		foreach($row as $r){
			$data[$x]['id_golongan'] = $r->id_golongan;
			$data[$x]['nama_golongan'] = $r->nama_golongan;
			$data[$x]['nama_golongan'] = strtoupper($data[$x]['nama_golongan']);
			$data[$x]['nama_golongan'] = trim($data[$x]['nama_golongan']);
			$data[$x]['nama_golongan'] = str_replace(' ', '', $data[$x]['nama_golongan']);
			$x++;
		}
		
		return $data;
	}
	
	public function comboGolongan($dt){
		$name = isset($dt['name'])?$dt['name']:'id_golongan';
		$selected = isset($dt['selected'])?$dt['selected']:'';
		
		$this->db->flush_cache();
		$res = $this->db->get('golongan');
		
		$str = '<select name="'.$name.'">';
		$str .= '<option value=""></option>';
			
		foreach($res->result() as $r){
			if($r->id_golongan == $selected){
				$str .= '<option value="'.$r->id_golongan.'" selected="selected">'.$r->nama_golongan.'</option>';
			}else{
				$str .= '<option value="'.$r->id_golongan.'">'.$r->nama_golongan.'</option>';
			}
		}
			
		$str .= '</select>';
		
		return $str;
	}
	
	public function comboJabatan($dt){
		$name = isset($dt['name'])?$dt['name']:'id_jabatan';
		$selected = isset($dt['selected'])?$dt['selected']:'';
		
		$this->db->flush_cache();
		$res = $this->db->get('jabatan');
		
		$str = '<select name="'.$name.'">';
		$str .= '<option value=""></option>';
			
		foreach($res->result() as $r){
			if($r->id_jabatan == $selected){
				$str .= '<option value="'.$r->id_jabatan.'" selected="selected">'.$r->nama_jabatan.'</option>';
			}else{
				$str .= '<option value="'.$r->id_jabatan.'">'.$r->nama_jabatan.'</option>';
			}
		}
			
		$str .= '</select>';
		
		return $str;
	}
	
	public function getJabatan(){
		$this->db->flush_cache();
		$row = $this->db->get('jabatan')->result();
		
		$x=0;
		foreach($row as $r){
			$data[$x]['id_jabatan'] = $r->id_jabatan;
			$data[$x]['nama_jabatan'] = strtoupper($r->nama_jabatan);
			$x++;
		}
		
		return $data;
	}
	
}
?>