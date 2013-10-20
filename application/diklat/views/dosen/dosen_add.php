<!-- contenna -->
<script>
$(function() {
$( "#TGL_LAHIR" ).datepicker({ dateFormat: 'dd-mm-yy' });
});
</script>

<div class="wrap_right bgcontent">
	<h1 class="heading">Tambah Data Dosen</h1>
	<hr/>
	<?=form_open('dosen/proses_add', array('class'=>'sform'))?>
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
			
			<li><label for="">NIP <em>*</em></label> <input name="NIP" value="<?=set_value('NIP')?>" type="text" class="five"/></li>
			
			<li><label for="">NAMA DOSEN <em>*</em></label> <input name="NAMADOSEN" value="<?=set_value('NAMADOSEN')?>" type="text" class="five"/></li>
			
			<li><label for="">Tempat Lahir <em>*</em></label> <input name="TEMPAT_LAHIR" value="<?=set_value('TEMPAT_LAHIR')?>" type="text" class="two"/></li>
			
			<li><label for="">Tanggal Lahir<em>*</em></label> <input name="TGL_LAHIR" value="<?=set_value('TGL_LAHIR')?>" type="text" class="one" id="TGL_LAHIR"/></li>
			
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
			
			<li><label for="">Tahun Mulai Mengajar <em>*</em></label> <input name="TAHUN" value="<?=set_value('TAHUN')?>" type="text" class="one"/></li>
			
			<li><label for="">Pendidikan <em>*</em></label> <textarea name="PENDIDIKAN" class="five"><?=set_value('PENDIDIKAN')?></textarea></li>
			
			<!--<li><label for="">Jurusan <em>*</em></label> <input name="JURUSAN" value="<?=set_value('JURUSAN')?>" type="text" class="four"/></li>			
			
			<li><label for="">Kelompok Matakuliah <em>*</em></label> <input name="KELOMPOK_MATKUL" value="<?=set_value('KELOMPOK_MATKUL')?>" type="text" class="five"/></li>-->		
			
			<li><label for="">Jenis Pengajar <em>*</em></label> <select id="JENIS_DOSEN" name="JENIS_DOSEN">
			<option value="">- Pilih Jenis Pengajar -</option>
			<option value="Tetap">Dosen</option>
			<option value="Tidak Tetap">Widyaiswara</option>
			<option value="Luar Biasa">Instruktur</option>
			</select></li>
			
			<li>
				<label for="">UPT<em>*</em></label>
				<select name="KODE_UPT">
					<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$kode_upt))?>
				</select>
			</li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
