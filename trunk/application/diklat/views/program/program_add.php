<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Program</h1>
	<hr/>
	<?=form_open('program/proses_add', array('class'=>'sform'))?>
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
			<li><label for="">KODE PROGRAM <em>*</em></label> <input name="KODE_PROGRAM" value="<?=set_value('KODE_PROGRAM')?>" type="text" class="three"/></li>
			<li><label for="">NAMA PROGRAM <em>*</em></label> <input name="NAMA_PROGRAM" value="<?=set_value('NAMA_PROGRAM')?>" type="text" class="five"/></li>
			<li>
				<label for="">SATKER<em>*</em></label>
				<select name="KODE_INDUK">
					<?=$this->mdl_satker->getOptionSatker()?>
				</select>
			</li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
