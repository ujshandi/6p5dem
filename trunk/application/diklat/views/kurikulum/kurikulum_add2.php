<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Tambah Kurikulum (2)</h1>
	<hr/>
	<?=form_open('kurikulum/proses_add', array('class'=>'sform'))?>
	<fieldset>
		<?php 
			if(validation_errors())
			{
		?>
				<ul class="message error grid_12">
					<li><?=validation_errors()?></li>
					<li class="close-bt"></li>
				</ul>	
		<?php
			} 
		?>
		<input type="hidden" name="KODE_UPT" value="<?=$KODE_UPT?>">
		<input type="hidden" name="KODE_DIKLAT" value="<?=$KODE_DIKLAT?>">
		<table width="69%" border="1" cellspacing="1" cellpadding="1">
			<tr>
				<th width="16%" scope="col">Kode</th>
				<th width="34%" scope="col">Nama Kurikulum</th>
				<th width="10%" scope="col">SKS Teori</th>
				<th width="10%" scope="col">SKS Praktek</th>
				<th width="10%" scope="col">Semester</th>
				<th width="20%" scope="col">Jml Jam Pelajaran</th>
			</tr>
			<?for($i=0; $i<$JUMLAH; $i++){?>
			<tr>
				<td><input name="DATA[<?=$i?>][KODE_KURIKULUM]" type="text" id="KODE_KURIKULUM" size="25" value="<?=$KODE_DIKLAT.'-'?>" /></td>
				<td><input name="DATA[<?=$i?>][NAMA_KURIKULUM]" type="text" id="NAMA_KURIKULUM" size="50" /></td>
				<td><input name="DATA[<?=$i?>][SKS_TEORI]" type="text" id="SKS_TEORI" size="15" /></td>
				<td><input name="DATA[<?=$i?>][SKS_PRAKTEK]" type="text" id="SKS_PRAKTEK" size="15" /></td>
				<td><input name="DATA[<?=$i?>][SEMESTER]" type="text" id="SEMESTER" size="15" /></td>
				<td><input name="DATA[<?=$i?>][JAM]" type="text" id="JAM" size="15" /></td>
			</tr>
			<?}?>
		</table>
		<div class="clearfix">&nbsp;</div>
		<hr/>
		<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
