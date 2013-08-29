<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Prasarana</h1>
	<hr/>
	<?=form_open_multipart('prasarana/proses_add', array('class'=>'sform'))?>
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
		<ol>
			<li>
				<label for="">UPT<em>*</em></label>
				<select name="KODE_UPT">
					<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$KODE_UPT))?>
				</select>
			</li>
			
			<li><label for="">TAHUN <em>*</em></label> <input name="TAHUN" value="<?=set_value('TAHUN')?>" type="text" class="one"/></li>
			
			<li><label for="">NAMA PRASARANA <em>*</em></label>
				<select name="ID_SARPRAS">
					<?=$this->mdl_prasarana->getOptionPrasarana(array('value'=>$ID_SARPRAS))?>
				</select>
			</li> 
			
			<li><label for="">JUMLAH <em>*</em></label> <input name="JUMLAH" value="<?=set_value('JUMLAH')?>" type="text" class="five"/></li>
			
			<li><label for="">KAPASITAS <em>*</em></label> <input name="KAPASITAS" value="<?=set_value('KAPASITAS')?>" type="text" class="five"/></li>
			
			<li><label for="">FOTO PRASARANA <em>*</em></label> <input name="userfile" value="<?=set_value('GAMBAR_PRASARANA')?>" type="file" class="five"/></li>
			
			<li><label for="">DESKRIPSI PRASARANA <em>*</em></label> <textarea name="DESKRIPSI_PRASARANA" class="five"><?=set_value('DESKRIPSI_PRASARANA')?></textarea></li>
			
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
