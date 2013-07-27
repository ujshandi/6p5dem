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
<h2>BERITA</h2><hr />
<? 
$rec=1;
foreach ($res as $item){
if ($rec <=3){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="66%" class="judul_info"><a href="<?=base_url()?>index.php/berita/lihat/<?=$item['id']?>"><?=$item['judul']?> </a>&nbsp;</td>
    <td align="right" class="icon">
	<a class="a2a_dd" href="http://www.addtoany.com/share_save">
    <img src="http://static.addtoany.com/buttons/share_save_171_16.png" border="0" alt="Share"/>
	</a>
	<script type="text/javascript">
	a2a_config = {
		linkname: '<?=$linkname?>',
		linkurl: '<?=base_url()."index.php/berita/lihat/".$item['id']?>'
	};
	
	</script>
<script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
	&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="tgl"><?=month_to_bulan($item['tanggal'],'-')?>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td class="gambar" valign="top"><img src="<?=$site_adm?>berita/<?=$item['gambar']?>" width="120" />&nbsp;</td>
			<td><p><?=substr($item['isi_berita'],0,250).'....'?> <a href="<?=base_url()?>index.php/berita/lihat/<?=$item['id']?>">Baca Selengkapnya</a></p> </td>
		  </tr>
		</table>	 </td>
  </tr>
</table>
<? 
	}
	$rec++;

}?>
<br /><br />

<!-- END BERITA -->

<hr />
<h2>BERITA LAINNYA</h2><hr />
<ul class="tulis">
<? foreach ($res2 as $rec){?>
	<li><a href="<?=base_url()?>index.php/berita/lihat/<?=$rec['id']?>"><?=$rec['judul']?></a></li>
<? 
}
?>
</ul>
<p><a href="<?=base_url()?>index.php/berita/semua/">Lihat Daftar Seluruh Berita</a></p>
</body>
</html>
