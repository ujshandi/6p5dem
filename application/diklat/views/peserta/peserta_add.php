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
		
		$("#TGL_MASUK").change(function(){
			var tahun = $("#TGL_MASUK").val();
			//alert(tahun.substring(6));
			$("#THN_ANGKATAN").val(tahun.substring(6));
		});
		
    });
</script>

<div class="wrap_right bgcontent">
	<h1 class="heading">Tambah Data Peserta</h1>
	<hr/>
	<?=form_open('peserta/proses_add', array('class'=>'sform'))?>
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
				<select name="KODE_UPT" id="KODE_UPT">
					<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$kode_upt))?>
				</select>
			</li>
			
			<li><label for="">DIKLAT <em>*</em></label>
				<select name="KODE_DIKLAT" id="KODE_DIKLAT">
					<option value="">--Pilih--</option>        	
				</select>
			</li>
			
			<li><label for="">NOMOR INDUK / NIP <em>*</em></label> <input name="NO_PESERTA" value="<?=set_value('NO_PESERTA')?>" type="text" class="two"/></li>
			
			<li><label for="">NAMA PESERTA <em>*</em></label> <input name="NAMA_PESERTA" value="<?=set_value('NAMA_PESERTA')?>" type="text" class="three"/></li>
			
			<li><label for="">TEMPAT DIKLAT<em>*</em></label> <input name="DAERAH" value="<?=set_value('DAERAH')?>" type="text" class="three"/></li>
			
			<li><label for="">TEMPAT LAHIR<em>*</em></label> <input name="TEMPAT_LAHIR" value="<?=set_value('TEMPAT_LAHIR')?>" type="text" class="three"/></li>
			
			<li><label for="">TANGGAL LAHIR<em>*</em></label> <input name="TGL_LAHIR" value="<?=set_value('TGL_LAHIR')?>" type="text" class="one" id="TGL_LAHIR"/></li>
			
			<li><label for="">Jenis Kelamin <em>*</em></label> <select id="JK" name="JK">
			<option value="">- Pilih Jenis Kelamin -</option>
			<option value="Pria">Pria</option>
			<option value="Wanita">Wanita</option>
			</select></li>
			
			<li><label for="">TANGGAL MASUK<em>*</em></label> <input name="TGL_MASUK" value="<?=set_value('TGL_MASUK')?>" type="text" class="one" id="TGL_MASUK"/></li>
			
			<li><label for="">TAHUN MASUK<em>*</em></label> 
				<select name="THN_ANGKATAN" id="THN_ANGKATAN">
				<?php 
					$opti['value'] = set_value('THN_ANGKATAN');
					echo $this->mdl_peserta->getOptionTahun($opti);
				?>
				</select>
			</li>
			
			<li><label for="">STATUS PESERTA <em>*</em></label> <select id="STATUS_PESERTA" name="STATUS_PESERTA">
			<option value="">- Pilih Status Peserta -</option>
			<option value="Registrasi">Registrasi</option>
			<option value="Drop Out">Drop Out</option>
			</select></li>
			
			<li><label for="">KETERANGAN <em>*</em></label> <textarea name="KETERANGAN" class="five"><?=set_value('KETERANGAN')?></textarea></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->