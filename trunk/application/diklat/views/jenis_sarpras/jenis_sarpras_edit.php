<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Edit Data Sarana Prasarana</h1>
	<hr/>
	<?=form_open('jenis_sarpras/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">NAMA SARANA / PRASARANA <em>*</em></label> <input name="NAMA_SARPRAS" value="<?=$result->row()->NAMA_SARPRAS?>" type="text" class="five"/></li>
			
			<li><label for="">JENIS <em>*</em></label>
				<?php 
					$opti['name'] = 'JENIS';
					$opti['value'] = $result->row()->JENIS;
					echo $this->mdl_jenis_sarpras->getOptionJenis($opti);
				?>
			</li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->