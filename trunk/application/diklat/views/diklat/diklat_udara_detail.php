<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Detail Diklat</h1>
	<hr/>
	<?=form_open('diklat_udara/proses_detail', array('class'=>'sform'))?>
	
	<fieldset>
		<ol>
			<input type="hidden" name="action" value="<?=$action?>" />
		    <input type="hidden" name="KODE_DIKLAT" value="<?=$kode_diklat?>">
			
			<li><label for="">Nama Diklat <em>*</em></label>
				<b><?=$diklat->row()->NAMA_DIKLAT?></b>
			</li>
			
			<li><label for="">DESKRIPSI <em>*</em></label>
				<textarea name="DESKRIPSI" cols="70" rows="5"><?=$DESKRIPSI?></textarea>
			</li>
			<li><label for="">TUJUAN <em>*</em></label>
				<textarea name="TUJUAN" cols="70" rows="5"><?=$TUJUAN?></textarea>
			</li>
			<li><label for="">PELUANG <em>*</em></label>
				<textarea name="PELUANG" cols="70" rows="5"><?=$PELUANG?></textarea>
			</li>
			<li><label for="">LAMA <em>*</em></label>
				<textarea name="LAMA" cols="70" rows="5"><?=$LAMA?></textarea>
			</li>
			<li><label for="">SYARAT <em>*</em></label>
				<textarea name="SYARAT" cols="70" rows="5"><?=$SYARAT?></textarea>
			</li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->