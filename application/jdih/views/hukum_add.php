<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
.kecil{font-size:10px;
font-family:Verdana, Arial, Helvetica, sans-serif;
color:#ffffff;
text-align:center;
margin-left:139px;
font-weight:bold;
}
.text_css{
	border: solid 1px  #006633;
	background: #FFFFFF;
	margin: 50px 0 2px 141px;
	padding: 5px;
	display:inline-block;
	font-size:16px;
	width:237px;
	background: 
		-webkit-gradient(
			linear,
			left top,
			left 25,
			from(#FFFFFF),
			color-stop(4%, #EEEEEE),
			to(#FFFFFF)
		);
	background: 
		-moz-linear-gradient(
			top,
			#FFFFFF,
			#EEEEEE 1px,
			#FFFFFF 25px
			);
	-moz-box-shadow: 0px 0px 8px #f0f0f0;
	-webkit-box-shadow: 0px 0px 8px #f0f0f0;
	box-shadow: 0px 0px 8px #000000;
}
</style>
	
	<link href="<?=base_url()?>asset/globalstyle/css/jquery-ui-datepicker/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="<?=base_url()?>asset/globalstyle/js/jquery-ui-datepicker/jquery-1.9.1.js"></script>
	<script src="<?=base_url()?>asset/globalstyle/js/jquery-ui-datepicker/jquery-ui-1.10.3.custom.js"></script>
	
</head>

<body>
<script>
	$(function() {
		//$( "#TAHUN" ).datepicker({ dateFormat: 'yy' });
	});
</script>
<div style="display:inline-block; border:1px solid #57B2DA; border-radius: 3px 3px 3px 3px; margin-top:7px; margin-left:5px; padding:5px;width:643px; font-size:12px;">					
	<?php 
		$attributes = array('id' => 'fmimport');
		echo form_open_multipart('produk_hukum/proses_insert', $attributes);
	?>
	<table width="600" border="0" cellpadding="2" cellspacing="2" style="font-size:12px;">
	  <tr>
		<td width="150">Jenis Produk Hukum</td>
		<td width="8">:</td>
		<td width="347">
			<select name="ID_PRODUK_HUKUM">
				<?=$this->mjdih->getOptionProdukHukum(array('value'=>set_value('ID_PRODUK_HUKUM')));?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td>Tematik</td>
		<td>:</td>
		<td>
			<select name="ID_TEMATIK">
				<?=$this->mjdih->getOptionTematik(array('value'=>set_value('ID_TEMATIK')));?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td>Judul</td>
		<td>:</td>
		<td><input type="text" name="JUDUL" id="textfield" size="50" value="<?=set_value('JUDUL')?>"/></td>
	  </tr>
	  <tr>
		<td>Tahun</td>
		<td>:</td>
		<td><input type="text" name="TAHUN" id="TAHUN" size="10" maxlength="4" value="<?=set_value('TAHUN')?>"/></td>
	  </tr>
	  <tr>
		<td>Deskripsi</td>
		<td>:</td>
		<td><textarea name="DESKRIPSI" cols="50" rows="6"><?=set_value('DESKRIPSI')?></textarea></td>
	  </tr>
	  <tr>
		<td>File</td>
		<td>:</td>
		<td><input type="file" name="datafile"/></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><label>
		  <input type="submit" name="button" id="button" value="Simpan" />
		</label></td>
	  </tr>
	</table>
	<?=form_close()?>
</div>
<br><br>
</body>
</html>
