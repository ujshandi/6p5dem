<!-- contenna -->
<script>
$(function() {
$( "#TGL_AWAL" ).datepicker();
$( "#TGL_AKHIR" ).datepicker();
});
</script>

<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kalender</h1>
	<hr/>
	<?=form_open('kalender/proses_edit', array('class'=>'sform'))?>
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
						echo $this->mdl_satker->getOptionUPTChild($opti);
					?>
				</select>
			</li>
			
			<li><label for="">TANGGAL AWAL S/D <em>*</em></label> <input name="TGL_AWAL" value="<?=$result->row()->TGL_AWAL?>" type="text" class="one" id="TGL_AWAL"/></li>
			
			<li><label for="">TANGGAL AKHIR <em>*</em></label> <input name="TGL_AKHIR" value="<?=$result->row()->TGL_AKHIR?>" type="text" class="one" id="TGL_AKHIR"/></li>
			
			<li><label for="">KEGIATAN<em>*</em></label> <input name="KEGIATAN" value="<?=ReadCLOB($result->row()->KEGIATAN)?>" type="text" class="five"/></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->