<? 
global $site_adm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h2>ARTIKEL</h2><hr />
<? 
$rec2=1;
foreach ($res as $item){
if ($rec2 <=3){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="66%" class="judul_info"><a href="<?=base_url()?>index.php/artikel/lihat/<?=$item['id']?>"><?=$item['judul_artikel']?> </a>&nbsp;</td>
    <td align="right" class="icon">
	<a class="a2a_dd" href="http://www.addtoany.com/share_save">
    <img src="http://static.addtoany.com/buttons/share_save_171_16.png" border="0" alt="Share"/>
	</a>
	<script type="text/javascript">
	a2a_config = {
		linkname: 'TESSS CUYYYY',
		a2a_config.show_title = 1,
		linkurl: '<?=base_url()."index.php/artikel/lihat/".$item['id']?>'
	};
	
	</script>
<script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
	&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="tgl">Penulis:<?=$item['penulis']?><br /><?=month_to_bulan($item['tgl_artikel'],'-')?>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td class="gambar" valign="top"><img src="<?=$site_adm?>artikel/<?=$item['GAMBAR']?>" width="120" />&nbsp;</td>
			<td><p><?=substr($item['ISI_ARTIKEL'],0,350).'....'?> <a href="<?=base_url()?>index.php/artikel/lihat/<?=$item['ID']?>">Baca Selengkapnya</a></p> </td>
		  </tr>
		</table>	 </td>
  </tr>
</table>
<? 
}
$rec2++;
}
?>
<br /><br />

<!-- END BERITA -->

<hr />
<h2>ARTIKEL LAINNYA</h2><hr />
<ul class="tulis">
	<? foreach ($res2 as $rec){?>
	<li><a href="<?=base_url()?>index.php/artikel/lihat/<?=$rec['ID']?>"><?=$rec['JUDUL_ARTIKEL']?></a></li>
<? 
}
?>
</ul>
<p><a href="<?=base_url()?>index.php/artikel/semua/">Lihat Daftar Seluruh ARTIKEL</a></p>
</body>
</html>
