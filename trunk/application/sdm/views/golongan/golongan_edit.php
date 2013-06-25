<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Golongan</h1>
	<hr/>
	<?=form_open('golongan/proses_edit', array('class'=>'sform'))?>
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
			<input type="hidden" name="ID_GOLONGAN" value="<?=$result->row()->ID_GOLONGAN?>">
			<li><label for="">Nama Golongan <em>*</em></label> <input name="NAMA_GOLONGAN" value="<?=$result->row()->NAMA_GOLONGAN?>" type="text" class="two"/></li>
			<li><label for="">Keterangan <em>*</em></label> <input name="KETERANGAN" value="<?=$result->row()->KETERANGAN?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->