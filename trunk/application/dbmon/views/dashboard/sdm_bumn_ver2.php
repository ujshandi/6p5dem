<table width="100%" border="0">
		  <tr>
			<td width="23%" valign="top">MATRA</td>
			<td width="2%" valign="top">:&nbsp;</td>
			<td width="75%"><span id="rpn">
		    <select id="MATRA" name="MATRA"></select></span>&nbsp;</td>
		  </tr>
		  <tr>
			<td width="23%" valign="top">TAHUN</td>
			<td width="2%" valign="top">:&nbsp;</td>
			<td width="75%"><span id="rpn">
					<select id="TAHUN_FROM" name="TAHUN_FROM" style="width:100px;">
						<option value="">--PILIH--</option>
					<? for($i=1;$i<=15;$i++){?>
						<option value="<?=($i<10 ? '200'.$i : '20'.$i)?>"><?= ($i<10 ? '200'.$i : '20'.$i)?></option>
					<? }?>
					</select> 
			</span>&nbsp;&nbsp;&nbsp; <a href="#" id="cari"></a></td>
		  </tr>

</table><br>
<div id="tab_na"></div>

<script>
var modul='<?=$modul?>';
</script>
<script type="text/javascript" src="<?=base_url()?>asset/dbmon/js/modul.js" ></script>
	