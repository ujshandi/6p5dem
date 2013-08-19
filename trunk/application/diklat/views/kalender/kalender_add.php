<!-- contenna -->
<script>
$(function() {
$( "#TGL_AWAL" ).datepicker();
$( "#TGL_AKHIR" ).datepicker();
});
</script>

<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kelender</h1>
	<hr/>
	<?=form_open('kalender/proses_add', array('class'=>'sform'))?>
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
					<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$kode_upt))?>
				</select>
			</li>
			
			<li><label for="">TANGGAL AWAL S/D <em>*</em></label> <input name="TGL_AWAL" value="<?=set_value('TGL_AWAL')?>" type="text" class="one" id="TGL_AWAL"/></li>
			
			<li><label for="">TANGGAL AKHIR <em>*</em></label> <input name="TGL_AKHIR" value="<?=set_value('TGL_AKHIR')?>" type="text" class="one" id="TGL_AKHIR"/></li>
			
			<li><label for="">KEGIATAN<em>*</em></label> <textarea name="KEGIATAN" value="<?=set_value('KEGIATAN')?>" type="text" class="five"/> </textarea></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
