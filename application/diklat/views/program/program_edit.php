<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Program</h1>
	<hr/>
	<?=form_open('program/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">KODE PROGRAM <em>*</em></label> <input name="KODE_PROGRAM" value="<?=$result->row()->KODE_PROGRAM?>" type="text" class="five"/></li>
			<li><label for="">NAMA PROGRAM <em>*</em></label> <textarea name="NAMA_PROGRAM" class="five"><?=$result->row()->NAMA_PROGRAM?></textarea></li>
			<li>
				<label for="">UPT<em>*</em></label>
				<select name="KODE_INDUK">
					<?php 
						$opti['value'] = $result->row()->KODE_INDUK;
						echo $this->mdl_satker->getOptionSatker($opti);
					?>
				</select>
			</li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->