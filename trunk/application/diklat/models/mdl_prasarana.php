<?
class mdl_prasarana extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_PRASARANA.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_SARPRAS.NAMA_SARPRAS', false);
		$this->db->from('DIKLAT_MST_PRASARANA');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_PRASARANA.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_SARPRAS', 'DIKLAT_MST_PRASARANA.ID_SARPRAS = DIKLAT_MST_SARPRAS.ID_SARPRAS');
		$this->db->limit($num, $offset);
		$this->db->order_by('DIKLAT_MST_PRASARANA.KODE_UPT');
		
		$this->db->where('DIKLAT_MST_SARPRAS.JENIS', 'Prasarana');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PRASARANA');
		$this->db->where('ID_PRASARANA', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
		$this->db->set('KODE_UPT', $data['KODE_UPT']);
		$this->db->set('TAHUN', $data['TAHUN']);
        $this->db->set('ID_SARPRAS', $data['ID_SARPRAS']);        
        $this->db->set('JUMLAH', $data['JUMLAH']);
        $this->db->set('KAPASITAS', $data['KAPASITAS']);
        $this->db->set('GAMBAR_PRASARANA', $data['GAMBAR_PRASARANA']);
        $this->db->set('DESKRIPSI_PRASARANA', $data['DESKRIPSI_PRASARANA']);
        $this->db->set('TANGGAL_UPLOAD', $data['TANGGAL_UPLOAD'], false);
        

        $result = $this->db->insert('DIKLAT_MST_PRASARANA');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_UPT', $data['KODE_UPT']);
		$this->db->set('TAHUN', $data['TAHUN']);
        $this->db->set('ID_SARPRAS', $data['ID_SARPRAS']);        
        $this->db->set('JUMLAH', $data['JUMLAH']);
        $this->db->set('KAPASITAS', $data['KAPASITAS']);
        $this->db->set('GAMBAR_PRASARANA', $data['GAMBAR_PRASARANA']);
        $this->db->set('DESKRIPSI_PRASARANA', $data['DESKRIPSI_PRASARANA']);
        $this->db->set('TANGGAL_UPLOAD', $data['TANGGAL_UPLOAD'], false);

		$this->db->where('ID_PRASARANA', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_PRASARANA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('ID_PRASARANA', $id);
		$result = $this->db->delete('DIKLAT_MST_PRASARANA');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getOptionPrasarana($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_SARPRAS');
		$this->db->order_by('ID_SARPRAS');	
		$this->db->where('JENIS', 'Prasarana');
		
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
	
	function getPrasaranaByUPT($upt){
		$this->db->flush_cache();		
		$this->db->select('DIKLAT_MST_PRASARANA.*, DIKLAT_MST_UPT.NAMA_UPT, DIKLAT_MST_SARPRAS.NAMA_SARPRAS', false);
		$this->db->from('DIKLAT_MST_PRASARANA');
		$this->db->join('DIKLAT_MST_UPT', 'DIKLAT_MST_PRASARANA.KODE_UPT = DIKLAT_MST_UPT.KODE_UPT');
		$this->db->join('DIKLAT_MST_SARPRAS', 'DIKLAT_MST_PRASARANA.ID_SARPRAS = DIKLAT_MST_SARPRAS.ID_SARPRAS');
		$this->db->where('DIKLAT_MST_UPT.KODE_UPT', $upt);
		$this->db->order_by('DIKLAT_MST_SARPRAS.NAMA_SARPRAS');
		
		return $this->db->get();
		
	}
	
}
?>