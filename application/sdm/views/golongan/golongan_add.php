<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Golongan</h1>
	<hr/>
	<?=form_open('golongan/proses_add', array('class'=>'sform'))?>
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
			<!--<li><label for="">Id Golongan <em>*</em></label> <input name="ID_GOLONGAN" value="<?=set_value('ID_GOLONGAN')?>" type="text" class="one"/></li>-->
			<li><label for="">Nama Golongan <em>*</em></label> <input name="NAMA_GOLONGAN" value="<?=set_value('NAMA_GOLONGAN')?>" type="text" class="two"/></li>
			<li><label for="">Keterangan <em>*</em></label> <input name="KETERANGAN" value="<?=set_value('KETERANGAN')?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
