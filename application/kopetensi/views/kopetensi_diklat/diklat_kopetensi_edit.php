<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Edit Data Diklat Kompetensi</h1>
	<?=form_open('diklat_kopetensi', array('class'=>'sform'))?>
	<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
	<hr/>
	<?=form_open('diklat_kopetensi/proses_edit', array('class'=>'sform'))?>
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
			
			<li><label for="kategori">Kompetensi   <em>*</em></label>
				<?php
					echo form_dropdown("KODE_STANDAR_UDARA", $option_kopetensi, $result->row()->KODE_STANDAR_UDARA, $this->input->post('KODE_STANDAR_UDARA'),"id='KODE_STANDAR_UDARA'");
				?>
			<li><label for="tingkat">Diklat   <em>*</em></label>
				<?php
					echo form_dropdown("KODE_DIKLAT", $option_diklat, $result->row()->KODE_DIKLAT, $this->input->post('KODE_DIKLAT'),"id='KODE_DIKLAT'");
				?>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:left"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->