<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Tambah Data Diklat Darat</h1>
	<hr/>
	<?=form_open('diklat_darat/proses_add', array('class'=>'sform'))?>
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
				<select name="KODE_UPT">
					<?=$this->mdl_upt->getOptionUPTDarat(array('value'=>$kode_upt))?>
				</select>
			</li>
			
			<li>
				<label for="">PROGRAM <em>*</em></label>
				<select name="KODE_PROGRAM">
					<?=$this->mdl_program->getOptionProgramDarat(array('value'=>$kode_program))?>
				</select>
			</li>
			
			<li><label for="">KODE DIKLAT <em>*</em></label> <input name="KODE_DIKLAT" value="<?=set_value('KODE_DIKLAT')?>" type="text" class="three"/></li>
			
			<li><label for="">NAMA DIKLAT <em>*</em></label> <textarea name="NAMA_DIKLAT"><?=set_value('NAMA_DIKLAT')?></textarea></li>
			
			<input type="hidden" name="KODE_INDUK" value="3">
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
