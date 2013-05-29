<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Provinsi</h1>
	<hr/>
	<?=form_open('provinsi/proses_add', array('class'=>'sform'))?>
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
			<li><label for="">Kode Provinsi <em>*</em></label> <input name="KODEPROVIN" value="<?=set_value('KODEPROVIN')?>" type="text" class="five"/></li>
			<li><label for="">Nama Provinsi <em>*</em></label> <input name="NAMAPROVIN" value="<?=set_value('NAMAPROVIN')?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
