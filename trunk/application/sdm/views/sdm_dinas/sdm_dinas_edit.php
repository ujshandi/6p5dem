<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Edit Data Aparatur Dinas</h1>
	<?=form_open('sdm_dinas/search', array('class'=>'sform'))?>
	<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
	<hr/>
	<?=form_open('sdm_dinas/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">Id Peg Dinas <em>*</em></label> <input name="ID_PEG_DINAS" value="<?=$result->row()->ID_PEG_DINAS?>" type="text" class="five" readonly="yes"/></li>
			<li><label for="">NIP <em>*</em></label> <input name="NIP" value="<?=$result->row()->NIP?>" type="text" class="five" readonly="yes"/></li>
			<li><label for="">Alamat <em>*</em></label> <input name="ALAMAT" value="<?=$result->row()->ALAMAT?>" type="text" class="five"/></li>
			<li><label for="">Status Perkawinan <em>*</em></label> <select name="STATUS">
								<option value="Lajang">Lajang</option>
								<option value="Menikah">Menikah</option>
						</select></li>
			<li><label for="">Jumlah Anak <em>*</em></label> <input name="JML_ANAK" value="<?=$result->row()->JML_ANAK?>" type="text"/>
			<li><label for="">Golongan   <em>*</em></label>
				<?php
					echo form_dropdown("ID_GOLONGAN", $option_golongan, $result->row()->ID_JABATAN, $this->input->post('ID_GOLONGAN'),"id='ID_GOLONGAN'");
				?>
			<li><label for="">TMT Golongan <em>*</em></label> <input name="TMT_GOLONGAN" value="<?=$result->row()->TMT_GOLONGAN?>" type="text" class="five"/></li>
			<li><label for="">Jabatan   <em>*</em></label>
				<?php
					echo form_dropdown("ID_JABATAN", $option_jabatan, $result->row()->ID_JABATAN, $this->input->post('ID_JABATAN'),"id='ID_JABATAN'");
				?>
			<li><label for="">TMT Jabatan <em>*</em></label> <input name="TMT_JABATAN" value="<?=$result->row()->TMT_JABATAN?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:left"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->