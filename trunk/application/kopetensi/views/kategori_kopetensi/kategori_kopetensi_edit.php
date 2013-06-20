<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kategori Kompetensi</h1>
	<hr/>
	<?=form_open('kategori_kopetensi/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">Kode Kategori <em>*</em></label> <input name="KODE_KATEG_KOPETENSI" value="<?=$result->row()->KODE_KATEG_KOPETENSI?>" type="text" class="five" readonly="yes" /></li>
			<li><label for="">Matra   <em>*</em></label>
				<?php
					echo form_dropdown("KODEMATRA", $option_matra, $result->row()->KODEMATRA, $this->input->post('KODEMATRA'),"id='KODEMATRA'");
				?>
			<li><label for="">Nama Kategori <em>*</em></label> <input name="NAMA_KATEGORI" value="<?=$result->row()->NAMA_KATEGORI?>" type="text" class="eight"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->