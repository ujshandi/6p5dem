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
		<div class="facebook-holder"><?=fbfanpage(234, 600, true)?></div>
		</TD>
	</TR>
	
	<TR>
		<TD class="kanan">Statistik Pengunjung</TD>
	</TR>
	
	<TR>
		<TD><br />
		<div align="center">
		<a href="http://s10.flagcounter.com/more/8X6N"><img src="http://s10.flagcounter.com/count/8X6N/bg_FFFFFF/txt_000000/border_CCCCCC/columns_1/maxflags_5/viewers_0/labels_0/pageviews_0/flags_0/" alt="free counters" border="0"></a></div><br />
		</TD>
	</TR>
</TABLE>

</body>
</html>
