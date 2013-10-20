<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Tambah Data Satuan Kerja</h1>
	<hr/>
	<?=form_open('satker/proses_add', array('class'=>'sform'))?>
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
			<li><label for="">Nama Satker <em>*</em></label> <input name="nama_induk" value="<?=set_value('nama_induk')?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
