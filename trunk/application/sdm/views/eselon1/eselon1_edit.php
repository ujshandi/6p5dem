<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Eselon I</h1>
	<hr/>
	<?=form_open('eselon1/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">Id Eselon I <em>*</em></label> <input name="ID_ESELON_1" value="<?=$result->row()->ID_ESELON_1?>" type="text" class="five" readonly="yes" /></li>
			<li><label for="">Nama Eselon I <em>*</em></label> <input name="NAMA_ESELON_1" value="<?=$result->row()->NAMA_ESELON_1?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->