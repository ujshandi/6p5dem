<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
	.kanan{height:35px; text-align:left; vertical-align:middle; padding:0px 0px 0px 20px; font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 12px; font-weight:bold; background-color:#E8D530}
</style>
</head>

<body>
<TABLE WIDTH=234 BORDER=0 CELLPADDING=0 CELLSPACING=0 background="<?=base_url()?>images/bg_left.png">
	<TR>
		<TD class="kanan">
			Link JDIH Lainnya
		</TD>
	</TR>
	<TR>
		<TD >
		<? 
		$this->db->select('*')->from('JDIH_M_LINK');
		//$this->db->where('flag','f');
		//$this->db->where('menu_grouping_id',3);
		$query=$this->db->get();
		$res=$query->result_array();
		
		$menu ='
		<ul class="tmo_list">';
		
		foreach($res as $item){
		$menu .='
                	<li><a href="'.$item["URL"].'">'.$item["LINK"].'</a></li><hr />';
		}
		$menu .='
	  </ul>';
	  
	  echo $menu;
	  ?>
		</TD>
	</TR>
	<!--
	<TR>
		<TD class="kanan">Login Admin</TD>
	</TR>
	<TR>
		<TD><br />
			<table width="100%" border="0" cellspacing="1" cellpadding="1">
			  <tr>
				<td align="center" class="tulis4"><a href="http://<?=$_SERVER['HTTP_HOST']?>/admjdih/" onclick="this.form.target='_blank';return true;"><img src="<?=base_url()?>images/admin.png" width="80" /></a>&nbsp;<a href="#" onclick="this.form.target='_blank';return true;"></a>&nbsp;</td>
			  </tr>
			  <tr>
				<td align="center" class="tulis4"><a href="http://<?=$_SERVER['HTTP_HOST']?>/admjdih">LoGin</a></td>
			  </tr>
			</table>
 </TD>
	</TR>-->
	<TR>
		<TD class="kanan">Menu Admin</TD>
	</TR>
	<TR>
		<TD>
			<ul class="tmo_list">
				<?php
					$data_sess = $this->session->userdata('dataUser');	
					$data['USER_NAME'] = $data_sess['USER_NAME'];
					$results=$this->mjdih->get_level_jdih($data);
					if (isset($results)){
						if (isset($results->row()->LEVEL)){
							if ($results->row()->LEVEL=='1'){
								?>
									<li><a href="<?=base_url().$this->config->item('index_page').'/produk_hukum/add_hukum'?>">Tambah Produk Hukum</a></li>
								<?php
							}
						}
					}
					
				?>
				
			</ul>
		</TD>
	</TR>
</TABLE>

</body>
</html>
