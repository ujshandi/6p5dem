<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Sarana Prasarana</h1>
	<hr/>
	<?=form_open('jenis_sarpras/proses_add', array('class'=>'sform'))?>
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
			<li><label for="">NAMA SARANA / PRASARANA <em>*</em></label> <input name="NAMA_SARPRAS" value="<?=set_value('NAMA_SARPRAS')?>" type="text" class="five"/></li>
			
			<li><label for="">Jenis <em>*</em></label> <select id="JENIS" name="JENIS">
				<option value="">- Pilih Jenis -</option>
				<option value="Sarana">Sarana</option>
				<option value="Prasarana">Prasarana</option>
			</select></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
