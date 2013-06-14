<!-- contenna -->
<script>
$(function() {
$( "#TGL_LAHIR" ).datepicker();
$( "#TGL_MASUK" ).datepicker();
});
</script>

<div class="wrap_right bgcontent">
	<h1 class="heading">Data Peserta</h1>
	<hr/>
	<?=form_open('peserta/proses_edit', array('class'=>'sform'))?>
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
					$opti['id'] = 'KODE_UPT';
					$opti['name'] = 'KODE_UPT';
					$opti['value'] = $result->row()->KODE_UPT;
					echo $this->mdl_upt->getOptionUPT($opti);
				?>
			</li>
			
			<li><label for="">DIKLAT <em>*</em></label>
				<?php 
					$opti['id'] = 'KODE_DIKLAT';
					$opti['name'] = 'KODE_DIKLAT';
					$opti['value'] = $result->row()->KODE_DIKLAT;
					echo $this->mdl_diklat->getOptionDiklat($opti);
				?>
			</li>
			
			<li><label for="">NOMOR INDUK <em>*</em></label> <input name="NO_PESERTA" value="<?=$result->row()->NO_PESERTA?>" type="text" class="two"/></li>
			
			<li><label for="">NAMA PESERTA <em>*</em></label> <input name="NAMA_PESERTA" value="<?=$result->row()->NAMA_PESERTA?>" type="text" class="three"/></li>
			
			<li><label for="">TEMPAT LAHIR<em>*</em></label> <input name="TEMPAT_LAHIR" value="<?=$result->row()->TEMPAT_LAHIR?>" type="text" class="three"/></li>
			
			<li><label for="">TANGGAL LAHIR<em>*</em></label> <input name="TGL_LAHIR" value="<?=$result->row()->TGL_LAHIR?>" type="text" class="one" id="TGL_LAHIR"/></li>
			
			<li><label for="">DIKLAT <em>*</em></label>
				<?php 
					$opti['id'] = 'JK';
					$opti['name'] = 'JK';
					$opti['value'] = $result->row()->JK;
					echo $this->mdl_peserta->getOptionJenkel($opti);
				?>
			</li>
			
			<li><label for="">TANGGAL MASUK<em>*</em></label> <input name="TGL_MASUK" value="<?=$result->row()->TGL_MASUK?>" type="text" class="one" id="TGL_MASUK"/></li>
			
			<li><label for="">TAHUN <em>*</em></label>
				<?php 
					$opti['id'] = 'THN_ANGKATAN';
					$opti['name'] = 'THN_ANGKATAN';
					$opti['value'] = $result->row()->THN_ANGKATAN;
					echo $this->mdl_peserta->getOptionTahun($opti);
				?>
			</li>
			
			<li><label for="">STATUS PESERTA <em>*</em></label>
				<?php 
					$opti['id'] = 'STATUS_PESERTA';
					$opti['name'] = 'STATUS_PESERTA';
					$opti['value'] = $result->row()->STATUS_PESERTA;
					echo $this->mdl_peserta->getOptionStatus($opti);
				?>
			</li>
			
			<li><label for="">KETERANGAN <em>*</em></label> <input name="KETERANGAN" value="<?=$result->row()->KETERANGAN->load()?>" type="text" class="five"/></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->