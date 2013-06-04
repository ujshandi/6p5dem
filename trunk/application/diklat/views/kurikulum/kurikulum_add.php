<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Program</h1>
	<hr/>
	<?=form_open('kurikulum/proses_add', array('class'=>'sform'))?>
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
			<li><label for="">KODE UPT <em>*</em></label> <input name="KODE_UPT" value="" type="text" class="five"/></li>
			<li><label for="">KODE DIKLAT <em>*</em></label> <input name="KODE_DIKLAT" value="" type="text" class="five"/></li>
			<li><label for="">KODE KURIKULUM <em>*</em></label> <input name="KODE_KURIKULUM" value="" type="text" class="five"/></li>
			<li><label for="">NAMA KURIKULUM <em>*</em></label> <input name="NAMA_KURIKULUM" value="" type="text" class="five"/></li>
			<li><label for="">SKS TEORI <em>*</em></label> <input name="SKS_TEORI" value="" type="text" class="five"/></li>
			<li><label for="">SKS PRAKTEK <em>*</em></label> <input name="SKS_PRAKTEK" value="" type="text" class="five"/></li>
			<li><label for="">JAM <em>*</em></label> <input name="JAM" value="" type="text" class="five"/></li>
			<li><label for="">SEMESTER <em>*</em></label> <input name="SEMESTER" value="" type="text" class="five"/></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
