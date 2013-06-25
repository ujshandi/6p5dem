<?
class mdl_diklat extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getData($num=0, $offset=0){
		$this->db->flush_cache();
		$this->db->select('DIKLAT_MST_PROGRAM.*, DIKLAT_MST_INDUKUPT.NAMA_INDUK', false);
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->join('DIKLAT_MST_INDUKUPT', 'DIKLAT_MST_PROGRAM.KODE_INDUK = DIKLAT_MST_INDUKUPT.KODE_INDUK');
		$this->db->limit($num, $offset);
		$this->db->order_by('KODE_PROGRAM');
		
		return $this->db->get();
		
	}
	
	function getDataEdit($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_DIKLAT');
		$this->db->where('KODE_DIKLAT', $id);
		
		return $this->db->get();
	}

	function insert($data){
		$this->db->flush_cache();
        $this->db->set('KODE_PROGRAM', $data['KODE_PROGRAM']);
        $this->db->set('NAMA_PROGRAM', $data['NAMA_PROGRAM']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);

        $result = $this->db->insert('DIKLAT_MST_PROGRAM');

		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function update($data){
		$this->db->flush_cache();
        $this->db->set('KODE_PROGRAM', $data['KODE_PROGRAM']);
        $this->db->set('NAMA_PROGRAM', $data['NAMA_PROGRAM']);
        $this->db->set('KODE_INDUK', $data['KODE_INDUK']);

		$this->db->where('KODE_PROGRAM', $data['id']);
		
		$result = $this->db->update('DIKLAT_MST_PROGRAM');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function delete($id){
		$this->db->flush_cache();
		$this->db->where('KODE_PROGRAM', $id);
		$result = $this->db->delete('DIKLAT_MST_PROGRAM');
		
		if($result) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}
	
	function getOptionDiklat($d=""){
		$name = isset($d['name'])?$d['name']:'';
		$id = isset($d['id'])?$d['id']:'';
		$class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_DIKLAT');
		$this->db->order_by('KODE_DIKLAT');
		
		$res = $this->db->get();
		
		$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if($r->KODE_DIKLAT == trim($value)){
				$out .= '<option value="'.$r->KODE_DIKLAT.'" selected="selected">'.$r->NAMA_DIKLAT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_DIKLAT.'">'.$r->NAMA_DIKLAT.'</option>';
			}
		}
		$out .= '</select>';
		
		return $out;
	}
	
	function getProgramByUPT($id){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_PROGRAM');
		$this->db->where('KODE_INDUK', $id);
		
		return $this->db->get();
	}
	
	function getUPTByProgram($id){
		$this->db->flush_cache();
		$this->db->select('a.KODE_PROGRAM, b.KODE_UPT, b.NAMA_UPT');
		$this->db->from('DIKLAT_MST_DIKLAT "a"');
		$this->db->join('DIKLAT_MST_UPT "b"', 'b.KODE_UPT = a.KODE_UPT');
		$this->db->group_by('a.KODE_PROGRAM, b.KODE_UPT, b.NAMA_UPT');
		$this->db->where('a.KODE_PROGRAM', $id);
		
		return $this->db->get();
	}
	
	function getDiklatByProgramAndUPT($prog, $upt){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('DIKLAT_MST_DIKLAT "a"');
		$this->db->join('DIKLAT_MST_UPT "b"', 'b.KODE_UPT = a.KODE_UPT');
		$this->db->where('a.KODE_PROGRAM', $prog);
		$this->db->where('a.KODE_UPT', $upt);
		
		return $this->db->get();
	}
	
	function getContenttabDiklat($kodeinduk){
		$out = '';
		$out .= '<table width="100%" border="1" cellspacing="1" cellpadding="1">';
				
					# get program
					$r_prog = $this->getProgramByUPT($kodeinduk);
					$c_prog = 1;
					$c_upt = 1;
					$c_diklat = 1;
					foreach($r_prog->result() as $prog){
						$out .= '<tr>
								<td width="12" align="left" valign="top">'.$c_prog.'.</td>
								<td colspan="3" align="left" valign="top">'.$prog->NAMA_PROGRAM.'</td>
							  </tr>';
						
						# get diklat
						$r_upt = $this->getUPTByProgram($prog->KODE_PROGRAM);
						$c_upt = 1;
						foreach($r_upt->result() as $upt){
							$out .= '<tr>
										<td align="left" valign="top">&nbsp;</td>
										<td width="12" align="left" valign="top">'.$c_upt.'.</td>
										<td colspan="2" align="left" valign="top">'.$upt->NAMA_UPT.'</td>
									 </tr>';
							 
							$c_diklat = 1;
							$r_diklat = $this->getDiklatByProgramAndUPT($prog->KODE_PROGRAM, $upt->KODE_UPT);
							foreach($r_diklat->result() as $dik){
								$out .= '<tr>
											<td align="left" valign="top">&nbsp;</td>
											<td align="left" valign="top">&nbsp;</td>
											<td width="1" align="left" valign="top">'.$c_diklat.'.</td>
											<td width="656" align="left" valign="top">'.$dik->NAMA_DIKLAT.'</td>
										  </tr>';
									
									$c_diklat++;
							}
							 
							$c_upt++;
						}
						
						$c_prog++;
					}

		$out .= '</table>';
		
		return $out;
	}
	
}
?>