<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Sarana</h1>
	<hr/>
	<?=form_open('sarana/proses_add', array('class'=>'sform'))?>
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
					<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$KODE_UPT))?>
				</select>
			</li>
			
			<li><label for="">TAHUN <em>*</em></label> <input name="TAHUN" value="<?=set_value('TAHUN')?>" type="text" class="one"/></li>
			
			<li><label for="">Nama Sarana <em>*</em></label>
				<?php 
					$opti['id'] = 'ID_SARPRAS';
					$opti['name'] = 'ID_SARPRAS';
					$opti['value'] = set_value('ID_SARPRAS');
					echo $this->mdl_sarana->getOptionSarana($opti);
				?>
			</li>
			
			<li><label for="">JUMLAH <em>*</em></label> <input name="JUMLAH" value="<?=set_value('JUMLAH')?>" type="text" class="five"/></li>
			<li><label for="">DESKRIPSI <em>*</em></label><textarea name="DESKRIPSI" class="five"><?=set_value('DESKRIPSI')?></textarea></li>
			
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
