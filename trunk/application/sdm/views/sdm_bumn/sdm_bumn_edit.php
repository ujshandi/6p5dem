<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Edit Data Pegawai BUMN</h1>
	<?=form_open('sdm_bumn/search', array('class'=>'sform'))?>
	<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
	<hr/>
	<?=form_open('sdm_bumn/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">Id Pegawai <em>*</em></label> <input name="ID_PEG_BUMN" value="<?=$result->row()->ID_PEG_BUMN?>" type="text" class="five" readonly="yes"/></li>
			<li><label for="">NIK <em>*</em></label> <input name="NIK" value="<?=$result->row()->NIK?>" type="text" class="five" readonly="yes"/></li>
			<li><label for="">Alamat <em>*</em></label> <input name="ALAMAT" value="<?=$result->row()->ALAMAT?>" type="text" class="five"/></li>
			<li><label for="">Status Perkawinan <em>*</em></label> <select name="STATUS">
								<option value="Lajang">Lajang</option>
								<option value="Menikah">Menikah</option>
						</select></li>
			<li><label for="">Jumlah Anak <em>*</em></label> <input name="JML_ANAK" value="<?=$result->row()->JML_ANAK?>" type="text"/>
			<li><label for="">Jabatan   <em>*</em></label>
				<?php
					echo form_dropdown("ID_JABATAN", $option_jabatan, $result->row()->ID_JABATAN, $this->input->post('ID_JABATAN'),"id='ID_JABATAN'");
				?>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:left"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->