<div id="myslidemenu" class="jqueryslidemenu">

<ul>
<? 
	
	$this->db->select('*')->from('JDIH_MENU_GROUPING_F');
	$this->db->where(array('FLAG'=>'f','STS'=>'A'));
	
	$query=$this->db->get();
	$res=$query->result_array();
	
	foreach($res as $item){
	
	$this->db->select('*')->from('JDIH_MENU_F');
	$this->db->where(array('MENU_GROUPING_ID'=>$item['MENU_GROUPING_ID'],'STAT'=>'A'));
	$query2=$this->db->get();
	$res2=$query2->result_array();
	$jml=count($res2);
	
			if($jml>0){
			//echo "AAAA";
			$menu = '<li><a href="#">'.$item['MENU_GROUPING_NAME'].'</a>
			<ul>';
			
			foreach($res2 as $item2){
			$menu .='
			<li><a href="'.base_url().$item2["MENU_URL"].$item2["MENU_ID"].'">'.$item2["MENU_NAME"].'</a></li>';
			}
			
			$menu .='
			</ul>
			</li>';
			
			echo $menu;
			
			}
			else
			{
			echo '<li><a href="'.base_url().$item['LINK'].'">'.$item['MENU_GROUPING_NAME'].'</a></li>';
			}
	}	
	
?>
</ul>
<br style="clear: left" />
</div>

