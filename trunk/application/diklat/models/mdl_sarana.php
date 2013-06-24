<?
class mdl_sarana extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_SARANA.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_SARPRAS.NAMA_SARPRAS', false);
		$this->db->from('DIKLAT_MST_SARANA');
		$this->db->join('DIKLAT_MST_SARPRAS', 'DIKLAT_MST_SARANA.ID_SARPRAS = DIKLAT_MST_SARPRAS.ID_SARPRAS');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_SARANA.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->limit($num, $offset);
		
		$this->db->order_by('DIKLAT_MST_UPT.KODE_UPT');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_SARANA');
		$this->db->where('ID_SARANA', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('ID_SARPRAS', $data['ID_SARPRAS']);
        $this->db->set('TAHUN', $data['TAHUN']);
        $this->db->set('JUMLAH', $data['JUMLAH']);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);

        $result = $this->db->insert('DIKLAT_MST_SARANA');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('ID_SARPRAS', $data['ID_SARPRAS']);
        $this->db->set('TAHUN', $data['TAHUN']);
        $this->db->set('JUMLAH', $data['JUMLAH']);
        $this->db->set('KODE_UPT', $data['KODE_UPT']);

		$this->db->where('ID_SARANA', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_SARANA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('ID_SARANA', $id);
		$result = $this->db->delete('DIKLAT_MST_SARANA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getOptionTahun($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$res = array(2000, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020);
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res as $r){
			if($r == trim($value)){
				$out .= '<option value="'.$r.'" selected="selected">'.$r.'</option>';
			}else{
				$out .= '<option value="'.$r.'">'.$r.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getOptionSarana($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_SARPRAS');
		$this->db->order_by('ID_SARPRAS');	
		$this->db->where('JENIS', 'Sarana');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if($r->ID_SARPRAS == trim($value)){
				$out .= '<option value="'.$r->ID_SARPRAS.'" selected="selected">'.$r->NAMA_SARPRAS.'</option>';
			}else{
				$out .= '<option value="'.$r->ID_SARPRAS.'">'.$r->NAMA_SARPRAS.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getSaranaByUPT($upt){
		$this->db->flush_cache();		
		$this->db->select('DIKLAT_MST_SARANA.*, DIKLAT_MST_SARPRAS.NAMA_SARPRAS, DIKLAT_MST_UPT.NAMA_UPT', false);
		$this->db->from('DIKLAT_MST_SARANA');
		$this->db->join('DIKLAT_MST_SARPRAS', 'DIKLAT_MST_SARANA.ID_SARPRAS = DIKLAT_MST_SARPRAS.ID_SARPRAS');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_SARANA.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $upt);
		$this->db->order_by('DIKLAT_MST_SARPRAS.NAMA_SARPRAS');
		
		return $this->db->get();
		
	}
	
}
?>