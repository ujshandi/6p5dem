<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Diklat Sekretariat</h1>
	<hr/>
	<?=form_open('diklat_sekretariat/proses_edit', array('class'=>'sform'))?>
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
		    <input type="hidden" name="id" value="<?=$id?>">
			
			<li><label for="">UPT <em>*</em></label>
				<?php 
					$opti['name'] = 'KODE_UPT';
					$opti['value'] = $result->row()->KODE_UPT;
					echo $this->mdl_upt->getOptionUPTSekretariat($opti);
				?>
			</li>
			
			<li><label for="">PROGRAM <em>*</em></label>
				<?php 
					$opti['name'] = 'KODE_PROGRAM';
					$opti['value'] = $result->row()->KODE_PROGRAM;
					echo $this->mdl_program->getOptionProgramSekretariat($opti);
				?>
			</li>
			
			<li><label for="">KODE DIKLAT <em>*</em></label> <input name="KODE_DIKLAT" value="<?=$result->row()->KODE_DIKLAT?>" type="text" class="three"/></li>
			
			<li><label for="">NAMA DIKLAT <em>*</em></label> <input name="NAMA_DIKLAT" value="<?=$result->row()->NAMA_DIKLAT?>" type="text" class="five"/></li>
			
			<input type="hidden" name="KODE_INDUK" value="<?=$result->row()->KODE_INDUK?>">
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->