<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Dosen</h1>
	<hr/>
	<?=form_open('dosen/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="">ID DOSEN <em>*</em></label> <input name="IDDOSEN" value="<?=$result->row()->IDDOSEN?>" type="text" class="three"/></li>
			
			<li><label for="">NIP <em>*</em></label> <input name="NIP" value="<?=$result->row()->NIP?>" type="text" class="five"/></li>
			
			<li><label for="">NAMA DOSEN <em>*</em></label> <input name="NAMADOSEN" value="<?=$result->row()->NAMADOSEN?>" type="text" class="five"/></li>
			
			<li><label for="">Tempat Lahir <em>*</em></label> <input name="TEMPAT_LAHIR" value="<<?=$result->row()->TEMPAT_LAHIR?>" type="text" class="five"/></li>
			
			<li><label for="">Tanggal Lahir <em>*</em></label> <input name="TGL_LAHIR" value="<?=$result->row()->TGL_LAHIR?>" type="text" class="five"/></li>
			
			<li><label for="">Jenis Kelamin <em>*</em></label> <select id="JK" name="JK">
			<option value="">- Pilih Jenis Kelamin -</option>
			<option value="Pria">Pria</option>
			<option value="Wanita">Wanita</option>
			</select></li>
			
			<li><label for="">Status Pengajar <em>*</em></label> <select id="STATUS" name="STATUS">
			<option value="">- Pilih Status -</option>
			<option value="Tetap">Tetap</option>
			<option value="Tidak Tetap">Tidak Tetap</option>
			<option value="Luar Biasa">Luar Biasa</option>
			</select></li>
			
			<li><label for="">Tahun Mulai Mengajar <em>*</em></label> <input name="TAHUN" value="<?=$result->row()->TAHUN?>" type="text" class="three"/></li>
			
			<li><label for="">Pendidikan <em>*</em></label> <input name="PENDIDIKAN" value="<?=$result->row()->PENDIDIKAN?>" type="text" class="three"/></li>
			
			<li><label for="">Jenis Pengajar <em>*</em></label> <select id="JENIS_DOSEN" name="JENIS_DOSEN">
			<option value="">- Pilih Jenis Pengajar -</option>
			<option value="Tetap">Dosen</option>
			<option value="Tidak Tetap">Widyaiswara</option>
			<option value="Luar Biasa">Instruktur</option>
			</select></li>
			
			<li><label for="">UPT <em>*</em></label>
				<?php 
					$opti['id'] = 'KODE_INDUK';
					$opti['name'] = 'KODE_INDUK';
					$opti['value'] = set_value('KODE_INDUK');
					echo $this->mdl_satker->getOptionUPT($opti);
				?>
			</li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->