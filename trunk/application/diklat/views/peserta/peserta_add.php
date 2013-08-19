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
	<h1 class="heading">Data Peserta</h1>
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
			
			<li><label for="">NOMOR INDUK <em>*</em></label> <input name="NO_PESERTA" value="<?=set_value('NO_PESERTA')?>" type="text" class="two"/></li>
			
			<li><label for="">NAMA PESERTA <em>*</em></label> <input name="NAMA_PESERTA" value="<?=set_value('NAMA_PESERTA')?>" type="text" class="three"/></li>
			
			<li><label for="">TEMPAT LAHIR<em>*</em></label> <input name="TEMPAT_LAHIR" value="<?=set_value('TEMPAT_LAHIR')?>" type="text" class="three"/></li>
			
			<li><label for="">TANGGAL LAHIR<em>*</em></label> <input name="TGL_LAHIR" value="<?=set_value('TGL_LAHIR')?>" type="text" class="one" id="TGL_LAHIR"/></li>
			
			<li><label for="">Jenis Kelamin <em>*</em></label> <select id="JK" name="JK">
			<option value="">- Pilih Jenis Kelamin -</option>
			<option value="Pria">Pria</option>
			<option value="Wanita">Wanita</option>
			</select></li>
			
			<li><label for="">TANGGAL MASUK<em>*</em></label> <input name="TGL_MASUK" value="<?=set_value('TGL_MASUK')?>" type="text" class="one" id="TGL_MASUK"/></li>
			
			<li><label for="">TAHUN<em>*</em></label> <select id="THN_ANGKATAN" name="THN_ANGKATAN">
			<option value="">- Pilih Tahun -</option>
			<option value="2000">2000</option>
			<option value="2001">2001</option>
			<option value="2002">2002</option>
			<option value="2003">2003</option>
			<option value="2004">2004</option>
			<option value="2005">2005</option>
			<option value="2006">2006</option>
			<option value="2007">2007</option>
			<option value="2008">2008</option>
			<option value="2009">2009</option>
			<option value="2010">2010</option>
			<option value="2011">2011</option>
			<option value="2012">2012</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			</select></li>
			
			<li><label for="">STATUS PESERTA <em>*</em></label> <select id="STATUS_PESERTA" name="STATUS_PESERTA">
			<option value="">- Pilih Status Peserta -</option>
			<option value="Registrasi">Registrasi</option>
			<option value="Drop Out">Drop Out</option>
			<option value="Lulus">Lulus</option>
			</select></li>
			
			<li><label for="">KETERANGAN <em>*</em></label> <textarea name="KETERANGAN" value="<?=set_value('KETERANGAN')?>" type="text" class="five"/></textarea></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->