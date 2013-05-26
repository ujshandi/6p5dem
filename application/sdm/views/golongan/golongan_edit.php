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
			<li><label for="">Id Golongan <em>*</em></label> <input name="ID_GOLONGAN" value="<?=$result->row()->ID_GOLONGAN?>" type="text" class="five"/></li>
			<li><label for="">Nama Satker <em>*</em></label> <input name="NAMA_GOLONGAN" value="<?=$result->row()->NAMA_GOLONGAN?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->