<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Diklat Udara</h1>
	<hr/>
	<?=form_open('diklat_udara/proses_add', array('class'=>'sform'))?>
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
			<li>
				<label for="">UPT<em>*</em></label>
				<select name="kode_upt">
					<?=$this->mdl_upt->getOptionUPTUdara(array('value'=>$kode_upt))?>
				</select>
			</li>
			
			<li>
				<label for="">PROGRAM <em>*</em></label>
				<select name="KODE_PROGRAM">
					<?=$this->mdl_program->getOptionProgramUdara(array('value'=>$kode_program))?>
				</select>
			</li>
			
			<li><label for="">KODE DIKLAT <em>*</em></label> <input name="KODE_DIKLAT" value="<?=set_value('KODE_DIKLAT')?>" type="text" class="three"/></li>
			
			<li><label for="">NAMA DIKLAT <em>*</em></label> <input name="NAMA_DIKLAT" value="<?=set_value('NAMA_DIKLAT')?>" type="text" class="five"/></li>
			
			<input type="hidden" name="KODE_INDUK" value="5">
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
