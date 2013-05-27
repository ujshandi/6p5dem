<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Import Data SDM Provinsi</h1>
	<hr/>
	<?php 
		$attributes = array('id' => 'fmimport');
		echo form_open_multipart('import/eksekusi', $attributes);
	?>
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
			<li><label for="">File Name <em>*</em></label> <input type="file" name="datafile"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->


