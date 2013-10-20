<?
class mdl_diklat_front extends CI_Model{
	
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
	
	function getOptionDiklat($d=""){
		// $name = isset($d['name'])?$d['name']:'';
		// $id = isset($d['id'])?$d['id']:'';
		// $class = isset($d['class'])?$d['class']:'';
		$value = isset($d['value'])?$d['value']:'';
		
		$this->db->flush_cache();
		$this->db->from('DIKLAT_MST_DIKLAT');
		$this->db->order_by('KODE_DIKLAT');
		
		$res = $this->db->get();
		
		//$out = '<select name="'.$name.'" id="'.$id.'">';
		foreach($res->result() as $r){
			if($r->KODE_DIKLAT == trim($value)){
				$out .= '<option value="'.$r->KODE_DIKLAT.'" selected="selected">'.$r->NAMA_DIKLAT.'</option>';
			}else{
				$out .= '<option value="'.$r->KODE_DIKLAT.'">'.$r->NAMA_DIKLAT.'</option>';
			}
		}
		//$out .= '</select>';
		
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
		// yanto
		//$level = get_level();
		
		$this->db->flush_cache();
		$this->db->select('a.KODE_PROGRAM, b.KODE_UPT, b.NAMA_UPT, b.URUTAN');
		$this->db->from('DIKLAT_MST_DIKLAT "a"');
		$this->db->join('DIKLAT_MST_UPT "b"', 'b.KODE_UPT = a.KODE_UPT');
		$this->db->group_by('a.KODE_PROGRAM, b.KODE_UPT, b.NAMA_UPT, b.URUTAN');
		$this->db->where('a.KODE_PROGRAM', $id);
		$this->db->order_by('"b"."URUTAN"', 'ASC');
		
		// if($level['LEVEL'] == 2){
			// $this->db->where('b.KODE_INDUK', $level['KODE_UPT']);
		// }else if($level['LEVEL'] == 3){
			// $this->db->where('b.KODE_UPT', $level['KODE_UPT']);
		// }
		
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
		$out .= '<table width="100%" border="0" cellspacing="1" cellpadding="1">';
				
					# get program
					$r_prog = $this->getProgramByUPT($kodeinduk);
					$c_prog = 1;
					$c_upt = 1;
					$c_diklat = 'a';
					foreach($r_prog->result() as $prog){
						$out .= '<tr>
								<td width="12" align="left" valign="top">'.$this->romanNumerals($c_prog).'.</td>
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
							 
							$c_diklat = 'a';
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
	
	function romanNumerals($num) 
	{
		$n = intval($num);
		$res = '';

		/*** roman_numerals array  ***/
		$roman_numerals = array(
					'M'  => 1000,
					'CM' => 900,
					'D'  => 500,
					'CD' => 400,
					'C'  => 100,
					'XC' => 90,
					'L'  => 50,
					'XL' => 40,
					'X'  => 10,
					'IX' => 9,
					'V'  => 5,
					'IV' => 4,
					'I'  => 1);

		foreach ($roman_numerals as $roman => $number) 
		{
			/*** divide to get  matches ***/
			$matches = intval($n / $number);

			/*** assign the roman char * $matches ***/
			$res .= str_repeat($roman, $matches);

			/*** substract from the number ***/
			$n = $n % $number;
		}

		/*** return the res ***/
		return $res;
	}
	
}
?>