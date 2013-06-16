<?
class mdl_kategori_kopetensi extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getmatra(){
		$result = array();
		$this->db->select('*');
		$this->db->from('KOPETEN_MATRA');
		$this->db->order_by('KODEMATRA','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Matra-';
            $result[$row->KODEMATRA]= $row->NAMAMATRA;
        }
 
        return $result;
	}
	
	function getData($matra, $num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('KOPETEN_KATEGORI');
		//$this->db->join('KOPETEN_MATRA', 'KOPETEN_MATRA.KODEMATRA = KOPETEN_KATEGORI.KODEMATRA');
		if($matra != '0'){
			$this->db->where('KODEMATRA', $matra);	
		}
		$this->db->limit($num, $offset);
		$this->db->order_by('KODE_KATEG_KOPETENSI');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('KOPETEN_KATEGORI');
		$this->db->where('KODE_KATEG_KOPETENSI', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('KODE_KATEG_KOPETENSI', $data['KODE_KATEG_KOPETENSI']);
		$this->db->set('NAMA_KATEGORI', $data['NAMA_KATEGORI']);
		$this->db->set('KODEMATRA', $data['KODEMATRA']);
		//$this->db->set('KETERANGAN', $data['']);
		$result = $this->db->insert('KOPETEN_KATEGORI');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
		$this->db->set('KODE_KATEG_KOPETENSI', $data['KODE_KATEG_KOPETENSI']);
		$this->db->set('NAMA_KATEGORI', $data['NAMA_KATEGORI']);
		$this->db->where('KODE_KATEG_KOPETENSI', $data['KODE_KATEG_KOPETENSI']);
		$result = $this->db->update('KOPETEN_KATEGORI');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($data){
		$this->db->flush_cache();
		$this->db->where('KODE_KATEG_KOPETENSI', $data['id']);
		$result = $this->db->delete('KOPETEN_KATEGORI');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>