<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Edit Data Kompetensi Udara</h1>
	<?=form_open('kopetensi_udara', array('class'=>'sform'))?>
	<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
	<hr/>
	<?=form_open('kopetensi_udara/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">Kode Kopetensi <em>*</em></label> <input name="KODE_KOPETENSI_UDARA" value="<?=$result->row()->KODE_KOPETENSI_UDARA?>" type="text" class="three"/></li>
			<li><label for="kategori">Kategori   <em>*</em></label>
				<?php
					echo form_dropdown("KODE_KATEG_KOPETENSI", $option_kategori, $result->row()->KODE_KATEG_KOPETENSI, $this->input->post('KODE_KATEG_KOPETENSI'),"id='KODE_KATEG_KOPETENSI'");
				?>
			<li><label for="tingkat">Tingkat   <em>*</em></label>
				<?php
					echo form_dropdown("KODE_TINGKAT", $option_tingkat2, $result->row()->KODE_TINGKAT, $this->input->post('KODE_TINGKAT'),"id='KODE_TINGKAT'");
				?>
			<li><label for="">Nama Kopetensi <em>*</em></label> <input name="NAMA_KOPETENSI" value="<?=$result->row()->NAMA_KOPETENSI?>" type="text" class="eight"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:left"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->