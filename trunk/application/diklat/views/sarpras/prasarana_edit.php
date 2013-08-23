<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Prasarana</h1>
	<hr/>
	<?=form_open_multipart('prasarana/proses_edit', array('class'=>'sform'))?>
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
		    <input type="hidden" name="id" value="<?=$id?>">
			<ol>
			<li>
				<label for="">UPT<em>*</em></label>
				<select name="KODE_UPT">
					<?php 
						$opti['value'] = $result->row()->KODE_UPT;
						echo $this->mdl_satker->getOptionUPTChild($opti);
					?>
				</select>
			</li>
			
			<li><label for="">TAHUN <em>*</em></label> <input name="TAHUN" value="<?=$result->row()->TAHUN?>" type="text" class="one"/></li>
			
			<li>
				<label for="">NAMA PRASARANA<em>*</em></label>
				<select name="ID_SARPRAS">
					<?php 
						$opti['value'] = $result->row()->ID_SARPRAS;
						echo $this->mdl_prasarana->getOptionPrasarana($opti);
					?>
				</select>
			</li>
			
			<li><label for="">JUMLAH <em>*</em></label> <input name="JUMLAH" value="<?=$result->row()->JUMLAH?>" type="text" class="five"/></li>
			
			<li><label for="">KAPASITAS <em>*</em></label> <input name="KAPASITAS" value="<?=$result->row()->KAPASITAS?>" type="text" class="five"/></li>
			
			<li><label for="">FOTO PRASARANA <em>*</em></label> <input name="userfile" value="<?=$result->row()->GAMBAR_PRASARANA?>" type="file" class="five"/></li>
			
			<li><label for="">DESKRIPSI PRASARANA <em>*</em></label> <textarea name="DESKRIPSI_PRASARANA" class="five"><?=$result->row()->DESKRIPSI_PRASARANA?></textarea></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->