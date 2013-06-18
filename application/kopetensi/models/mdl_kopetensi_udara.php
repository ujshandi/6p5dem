<?
class mdl_kopetensi_udara extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getkategori(){
		$result = array();
		$this->db->select('*');
		$this->db->from('KOPETEN_KATEGORI');
		$this->db->order_by('KODE_KATEG_KOPETENSI','ASC');
		$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Kategori-';
            $result[$row->KODE_KATEG_KOPETENSI]= $row->NAMA_KATEGORI;
        }
 
        return $result;
	}
	
	function gettingkat(){
		if($KODE_KATEG_KOPETENSI = $this->input->post('KODE_KATEG_KOPETENSI')){
    	$result = array();
    	$this->db->select('*');
    	$this->db->from('KOPETEN_TINGKAT');
    	$this->db->where('KODE_KATEG_KOPETENSI',$KODE_KATEG_KOPETENSI);
    	$this->db->order_by('KODE_TINGKAT','ASC');
    	$array_keys_values = $this->db->get();
    	foreach ($array_keys_values->result() as $row)
        	{
            	$result[0]= '-Pilih Tingkat-';
            	$result[$row->KODE_TINGKAT]= $row->DESKRIPSI;
        	}
 		}else
		{
			{
			 $result[0]= '-Pilih Kategori Dahulu-';	
			}
		}
        return $result;
	}
	
	function getData($kategori, $tingkat){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('KOPETEN_UDARA');
		//$this->db->join('KOPETEN_MATRA', 'KOPETEN_MATRA.KODEMATRA = KOPETEN_KATEGORI.KODEMATRA');
		if($kategori != '0'){
			$this->db->where('KODE_KATEG_KOPETENSI', $kategori);
			//$this->db->limit($kategori,$num, $offset);
		}
		if($tingkat != '0'){
			$this->db->where('KODE_TINGKAT', $tingkat);	
			//$this->db->limit($tingkat,$num, $offset);
		}
		//$this->db->limit($num, $offset,$kategori, $tingkat);
		$this->db->order_by('KODE_KOPETENSI_UDARA');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('KOPETEN_UDARA');
		$this->db->where('KODE_KOPETENSI_UDARA', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('KODE_KATEG_KOPETENSI', $data['KODE_KATEG_KOPETENSI']);
		$this->db->set('KODE_KOPETENSI_UDARA', $data['KODE_KOPETENSI_UDARA']);
		$this->db->set('NAMA_KOPETENSI', $data['NAMA_KOPETENSI']);
		$this->db->set('KODE_TINGKAT', $data['KODE_TINGKAT']);
		//$this->db->set('KETERANGAN', $data['']);
		$result = $this->db->insert('KOPETEN_UDARA');
		
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
		$this->db->where('KODE_KOPETENSI_UDARA', $data['id']);
		$result = $this->db->delete('KOPETEN_UDARA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
}
?>