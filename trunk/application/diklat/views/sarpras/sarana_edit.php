<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Sarana</h1>
	<hr/>
	<?=form_open('sarana/proses_edit', array('class'=>'sform'))?>
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
					echo $this->mdl_upt->getOptionUPT($opti);
				?>
			</li>
			
			<li><label for="">TAHUN <em>*</em></label>
				<?php 
					$opti['name'] = 'TAHUN';
					$opti['value'] = $result->row()->TAHUN;
					echo $this->mdl_sarana->getOptionTahun($opti);
				?>
			</li>
			
			<li><label for="">Nama Sarana <em>*</em></label>
				<?php 
					$opti['name'] = 'ID_SARPRAS';
					$opti['value'] = $result->row()->ID_SARPRAS;
					echo $this->mdl_sarana->getOptionSarana($opti);
				?>
			</li>
			
			<li><label for="">JUMLAH<em>*</em></label> <input name="JUMLAH" value="<?=$result->row()->JUMLAH?>" type="text" class="five"/></li>
			
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->