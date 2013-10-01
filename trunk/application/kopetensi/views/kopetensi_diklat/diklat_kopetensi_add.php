<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Diklat Kompetensi</h1>
	<hr/>
	<?=form_open('diklat_kopetensi/proses_add', array('class'=>'sform'))?>
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
				<label for="">KOMPETENSI<em>*</em></label>
				<select name="KODE_STANDAR_UDARA">
					<?=$this->mdl_diklat_kopetensi->getOptionKopetensiChild()?>
				</select>
			</li>
			<li>
				<label for="">DIKLAT<em>*</em></label>
				<select name="KODE_DIKLAT">
					<?=$this->mdl_diklat_kopetensi->getOptionDiklatChild()?>
				</select>
			</li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
