<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kategori Kompetensi</h1>
	<hr/>
	<?=form_open('tingkat_kopetensi/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">Kode Tingkat <em>*</em></label> <input name="KODE_TINGKAT" value="<?=$result->row()->KODE_TINGKAT?>" type="text" class="five" readonly="yes" /></li>
			<li><label for="">Kategori   <em>*</em></label>
				<?php
					echo form_dropdown("KODE_KATEG_KOPETENSI", $option_kategori, $result->row()->KODE_KATEG_KOPETENSI, $this->input->post('KODE_KATEG_KOPETENSI'),"id='KODE_KATEG_KOPETENSI'");
				?>
			<li><label for="">Deskripsi <em>*</em></label> <input name="DESKRIPSI" value="<?=$result->row()->DESKRIPSI?>" type="text" class="eight"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->