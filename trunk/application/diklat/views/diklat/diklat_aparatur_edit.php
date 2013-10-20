<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Edit Data Diklat Aparatur</h1>
	<hr/>
	<?=form_open('diklat_aparatur/proses_edit', array('class'=>'sform'))?>
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
			
			<li>
				<label for="">UPT<em>*</em></label>
				<select name="KODE_UPT">
					<?php 
						$opti['value'] = $result->row()->KODE_UPT;
						echo $this->mdl_upt->getOptionUPTAparatur($opti);
					?>
				</select>
			</li>
			
			<li><label for="">PROGRAM <em>*</em></label>
				<select name="KODE_PROGRAM">
					<?php 
						$opti['value'] = $result->row()->KODE_PROGRAM;
						echo $this->mdl_program->getOptionProgramAparatur($opti);
					?>
				</select>
			</li>
			
			<li><label for="">KODE DIKLAT <em>*</em></label> <input name="KODE_DIKLAT" value="<?=$result->row()->KODE_DIKLAT?>" type="text" class="three"/></li>
			
			<li><label for="">NAMA DIKLAT <em>*</em></label> <textarea name="NAMA_DIKLAT" class="five"><?=$result->row()->NAMA_DIKLAT?></textarea></li>
			
			<input type="hidden" name="KODE_INDUK" value="<?=$result->row()->KODE_INDUK?>">
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->