<!-- contenna -->
<script>
$(function() {
$( "#TANGGAL" ).datepicker();
});
</script>

<div class="wrap_right bgcontent">
	<h1 class="heading">Data Penyuluhan</h1>
	<hr/>
	<?=form_open('penyuluhan/proses_add', array('class'=>'sform'))?>
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
					$opti['id'] = 'KODE_UPT';
					$opti['name'] = 'KODE_UPT';
					$opti['value'] = set_value('KODE_UPT');
					echo $this->mdl_upt->getOptionUPT($opti);
				?>
			</li>
			
			<li><label for="">NAMA PENYULUHAN <em>*</em></label> <input name="NAMA_PENYULUHAN" value="<?=set_value('NAMA_PENYULUHAN')?>" type="text" class="five"/></li>
			
			<li><label for="">JUMLAH PESERTA <em>*</em></label> <input name="JML_PESERTA" value="<?=set_value('JML_PESERTA')?>" type="text" class="one"/></li>
			
			<li><label for="">TEMPAT <em>*</em></label> <input name="TEMPAT" value="<?=set_value('TEMPAT')?>" type="text" class="three"/></li>
			
			<li><label for="">TANGGAL<em>*</em></label> <input name="TANGGAL" value="<?=set_value('TANGGAL')?>" type="text" class="one" id="TANGGAL"/></li>
			
			
			
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
