<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Diklat Laut</h1>
	<hr/>
	<?=form_open('diklat_laut/proses_add', array('class'=>'sform'))?>
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
			<li><label for="">UPT <em>*</em></label>
				<?php 
					$opti['name'] = 'KODE_UPT';
					$opti['value'] = set_value('KODE_UPT');
					echo $this->mdl_upt->getOptionUPTLaut($opti);
				?>
			</li>
			
			<li><label for="">PROGRAM <em>*</em></label>
				<?php 
					$opti['name'] = 'KODE_PROGRAM';
					$opti['value'] = set_value('KODE_PROGRAM');
					echo $this->mdl_program->getOptionProgramLaut($opti);
				?>
			</li>
			
			<li><label for="">KODE DIKLAT <em>*</em></label> <input name="KODE_DIKLAT" value="<?=set_value('KODE_DIKLAT')?>" type="text" class="three"/></li>
			
			<li><label for="">NAMA DIKLAT <em>*</em></label> <input name="NAMA_DIKLAT" value="<?=set_value('NAMA_DIKLAT')?>" type="text" class="five"/></li>
			
			<input type="hidden" name="KODE_INDUK" value="4">
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
