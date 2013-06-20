<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Edit Data Standar Kompetensi Udara</h1>
	<?=form_open('standar_udara', array('class'=>'sform'))?>
	<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
	<hr/>
	<?=form_open('standar_udara/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">Kode Standar <em>*</em></label> <input name="KODE_STANDAR_UDARA" value="<?=$result->row()->KODE_STANDAR_UDARA?>" type="text" class="three"/></li>
			<li><label for="kategori">Kategori   <em>*</em></label>
				<?php
					echo form_dropdown("KODE_KATEG_KOPETENSI", $option_kategori, $result->row()->KODE_KATEG_KOPETENSI, $this->input->post('KODE_KATEG_KOPETENSI'),"id='KODE_KATEG_KOPETENSI'");
				?>
			<li><label for="tingkat">Tingkat   <em>*</em></label>
				<?php
					echo form_dropdown("KODE_TINGKAT", $option_tingkat2, $result->row()->KODE_TINGKAT, $this->input->post('KODE_TINGKAT'),"id='KODE_TINGKAT'");
				?>
			<li><label for="">Nama Standar <em>*</em></label> <input name="NAMA_STANDAR" value="<?=$result->row()->NAMA_STANDAR?>" type="text" class="eight"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:left"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->