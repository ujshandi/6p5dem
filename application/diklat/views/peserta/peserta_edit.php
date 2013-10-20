<!-- contenna -->
<script>
$(function() {
$( "#TGL_LAHIR" ).datepicker({ dateFormat: 'dd-mm-yy' });
$( "#TGL_MASUK" ).datepicker({ dateFormat: 'dd-mm-yy' });
});
</script>

<script>
    $(document).ready(function(){
        $("#KODE_UPT").change(function(){
            var KODE_UPT = $("#KODE_UPT").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/peserta/getDiklat",
               data : "KODE_UPT=" + KODE_UPT,
               success: function(data){
                   $("#KODE_DIKLAT").html(data);
               }
            });
        });
    });
</script>


<div class="wrap_right bgcontent">
	<h1 class="heading">Edit Data Peserta</h1>
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
			
			<li>
				<label for="">UPT<em>*</em></label>
				<select name="KODE_UPT" id="KODE_DIKLAT">
					<?php 
						$opti['value'] = $result->row()->KODE_UPT;
						echo $this->mdl_satker->getOptionUPTChild($opti);
					?>
				</select>
			</li>
			
			<li><label for="">DIKLAT <em>*</em></label>
				<select name="KODE_DIKLAT" id="KODE_DIKLAT">
					<option value="">--Pilih--</option>        	
					<?php 
						$opti['value'] = $result->row()->KODE_DIKLAT;
						echo $this->mdl_diklat->getOptionDiklat($opti);
					?>
				</select>
			</li>
			
			<li><label for="">NOMOR INDUK / NIP <em>*</em></label> <input name="NO_PESERTA" value="<?=$result->row()->NO_PESERTA?>" type="text" class="two"/></li>
			
			<li><label for="">NAMA PESERTA <em>*</em></label> <input name="NAMA_PESERTA" value="<?=$result->row()->NAMA_PESERTA?>" type="text" class="three"/></li>
			
			<li><label for="">DAERAH PESERTA<em>*</em></label> <input name="DAERAH" value="<?=$result->row()->DAERAH?>" type="text" class="three"/></li>
			
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
			
			<li><label for="">KETERANGAN <em>*</em></label> <textarea name="KETERANGAN" class="five"><?=ReadCLOB($result->row()->KETERANGAN)?></textarea></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->