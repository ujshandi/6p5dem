<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data UPT</h1>
	<hr/>
	<?=form_open('upt/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">URUTAN <em>*</em></label> <input name="URUTAN" value="<?=$result->row()->URUTAN?>" type="text" class="three"/></li>
			<li><label for="">KODE UPT <em>*</em></label> <input name="KODE_UPT" value="<?=$result->row()->KODE_UPT?>" type="text" class="three"/></li>
			<li><label for="">NAMA UPT <em>*</em></label> <input name="NAMA_UPT" value="<?=$result->row()->NAMA_UPT?>" type="text" class="five"/></li>
			<li><label for="">SATKER <em>*</em></label>
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