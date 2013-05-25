<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Satuan Kerja</h1>
	<hr/>
	<?=form_open('mst_indukupt/proses_edit', array('class'=>'sform'))?>
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
						<li><label for="">kode_induk <em>*</em></label> <input name="kode_induk" value="<?=$result->row()->kode_induk?>" type="text" class="five"/></li>
					<li><label for="">nama_induk <em>*</em></label> <input name="nama_induk" value="<?=$result->row()->nama_induk?>" type="text" class="five"/></li>
		
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
