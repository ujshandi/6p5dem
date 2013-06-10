<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data BUMN</h1>
	<hr/>
	<?=form_open('bumn/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">Kode BUMN <em>*</em></label> <input name="KODEBUMN" value="<?=$result->row()->KODEBUMN?>" type="text" class="five" readonly="yes" /></li>
			<li><label for="">Nama BUMN <em>*</em></label> <input name="NAMA_BUMN" value="<?=$result->row()->NAMA_BUMN?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->