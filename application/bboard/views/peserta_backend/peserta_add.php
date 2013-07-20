<!-- contenna -->
<script>
$(function() {
$( "#TGL_LAHIR" ).datepicker();
$( "#TGL_MASUK" ).datepicker();
});
</script>

<script>
    $(document).ready(function(){
        $("#KODE_UPT").change(function(){
            var KODE_UPT = $("#KODE_UPT").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/peserta_front/getDiklat",
               data : "KODE_UPT=" + KODE_UPT,
               success: function(data){
                   $("#KODE_DIKLAT").html(data);
               }
            });
        });
    });
</script>

<div class="wrap_right bgcontent">
	<h1 class="heading">Data Pendaftar Taruna</h1>
	<hr/>
	<?=form_open('peserta_backend/proses_add', array('class'=>'sform'))?>
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
					<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$KODE_UPT))?>
				</select>
			</li>
			
			<li><label for="">DIKLAT <em>*</em></label>
				<select name="KODE_DIKLAT" id="KODE_DIKLAT">
					<option value="">--Pilih--</option>        	
				</select>
			</li>
			
			<li><label for="">NAMA PENDAFTAR <em>*</em></label> <input name="NAMA_PENDAFTAR" value="<?=set_value('NAMA_PENDAFTAR')?>" type="text" class="three"/></li>
			
			<li><label for="">TEMPAT LAHIR<em>*</em></label> <input name="TEMPAT_LAHIR" value="<?=set_value('TEMPAT_LAHIR')?>" type="text" class="three"/></li>
			
			<li><label for="">TANGGAL LAHIR<em>*</em></label> <input name="TGL_LAHIR" value="<?=set_value('TGL_LAHIR')?>" type="text" class="one" id="TGL_LAHIR"/></li>
			
			<li><label for="">Jenis Kelamin <em>*</em></label> <select id="JK" name="JK">
				<option value="">- Pilih Jenis Kelamin -</option>
				<option value="Pria">Pria</option>
				<option value="Wanita">Wanita</option>
			</select></li>
			
			<li><label for="">NO TELEPON<em>*</em></label> <input name="NO_TELP" value="<?=set_value('NO_TELP')?>" type="text" class="three"/></li>
			
			<li><label for="">STATUS PENDAFTAR <em>*</em></label> <select id="STATUS_PENDAFTAR" name="STATUS_PENDAFTAR">
				<option value="">- Pilih Status Peserta -</option>
				<option value="Daftar">Daftar</option>
				<option value="Diterima">Diterima</option>
			</select></li>
			
			<li><label for="">KETERANGAN <em>*</em></label> <input name="KETERANGAN" value="<?=set_value('KETERANGAN')?>" type="text" class="five"/></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->