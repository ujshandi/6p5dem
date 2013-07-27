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
<h2><?=$form?></h2><hr />
<table width="97%" border="0" cellspacing="1" cellpadding="1" class="table2">
  <tr class="rowH">
    <td width="5%" align="center">No<br />&nbsp;</td>
    <td width="81%" valign="top">Judul
    </td>
    <td width="14%" align="center" valign="top">&nbsp;Action</td>
  </tr>
  
  <? 
  $no=1;
  foreach($res as $item){
  
  ?>
  
  
  <tr class="row1">
    <td width="5%" align="center" valign="top"><?=$no?>&nbsp;</td>
    <td width="81%"><span class="tulis3"><?=$item['JUDUL']?></span><br /><span class="tulis2"><?=$item['DESKRIPSI']?></span>&nbsp;</td>
    <td width="14%" align="center"><a href="#" id="look" onclick="return t('<?=$item['FILE']?>',<?=$item['ID']?>);">
	<img src="<?=base_url()?>asset/dbmon/css/easyui/icons/page_white_acrobat.png" width="20" /></a> 
	&nbsp;</td>
  </tr>
 <? 
 $no++;
 }?>
</table>
<br />
<div class="link2"><a href="<?=base_url()?>jdih.php/produk_hukum/peraturan/<?=$flag?>"><<<<<< Kembali</a></div>

</body>
</html>
<script type="text/javascript">

function t(filee,id){
var folder 		="<?=$folder?>";
	$.post('<?=base_url()?>jdih.php/produk_hukum/cek_file',{folder:folder,file:filee,id:id},function(resp){
		if(resp==1){
			open_win('<?=$site_adm?>files/<?=$folder?>/'+filee,'Menu Pilihan Proyek');
		}
	else{	
			alert(resp);
			window.location.href('#');
		}
	});
	
}
</script>
