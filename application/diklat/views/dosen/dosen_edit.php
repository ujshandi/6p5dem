<!-- contenna -->
<script>
$(function() {
$( "#TGL_LAHIR" ).datepicker();
});
</script>
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
		    <input type="hidden" name="id" value="<?=$id?>">
			
			<li><label for="">UPT <em>*</em></label>
				<?php 
					$opti['name'] = 'KODE_UPT';
					$opti['value'] = $result->row()->KODE_UPT;
					echo $this->mdl_satker->getOptionUPT($opti);
				?>
			</li>
			
			<li><label for="">NIP <em>*</em></label> <input name="NIP" value="<?=$result->row()->NIP?>" type="text" class="two"/></li>
			
			<li><label for="">NAMA DOSEN <em>*</em></label> <input name="NAMADOSEN" value="<?=$result->row()->NAMADOSEN?>" type="text" class="three"/></li>
			
			<li><label for="">Tempat Lahir <em>*</em></label> <input name="TEMPAT_LAHIR" value="<?=$result->row()->TEMPAT_LAHIR?>" type="text" class="two"/></li>
			
			<li><label for="">Tanggal Lahir<em>*</em></label> <input name="TGL_LAHIR" value="<?=$result->row()->TGL_LAHIR?>" type="text" class="one" id="TGL_LAHIR"/></li>
			
			<li><label for="">Jenis Kelamin <em>*</em></label>
				<?php 
					$opti['name'] = 'JK';
					$opti['value'] = $result->row()->JK;
					echo $this->mdl_dosen->getOptionJenkel($opti);
				?>
			</li>
			
			<li><label for="">Status Pengajar <em>*</em></label>
				<?php 
					$opti['name'] = 'STATUS';
					$opti['value'] = $result->row()->STATUS;
					echo $this->mdl_dosen->getOptionStatus($opti);
				?>
			</li>
			
			<li><label for="">Tahun Mulai Mengajar <em>*</em></label> <input name="TAHUN" value="<?=$result->row()->TAHUN?>" type="text" class="one"/></li>
			
			<li><label for="">Pendidikan <em>*</em></label> <input name="PENDIDIKAN" value="<?=$result->row()->PENDIDIKAN->load()?>" type="text" class="five"/></li>
			
			<li><label for="">Jenis Pengajar <em>*</em></label>
				<?php 
					$opti['name'] = 'JENIS_DOSEN';
					$opti['value'] = $result->row()->JENIS_DOSEN;
					echo $this->mdl_dosen->getOptionJenis($opti);
				?>
			</li>
			
			<li><label for="">UPT <em>*</em></label>
				<?php 
					$opti['id'] = 'KODE_UPT';
					$opti['name'] = 'KODE_UPT';
					$opti['value'] = $result->row()->KODE_UPT;
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