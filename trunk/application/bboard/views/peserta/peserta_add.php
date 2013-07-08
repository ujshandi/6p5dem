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

<div class="center_content">
	<h1 class="heading">Pendaftaran Taruna</h1>
	<hr/>
	<div class="clearfix">&nbsp;</div>
	<?=form_open('peserta_front/proses_add', array('class'=>'sform'))?>
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
				<li><label for="" >UPT <em>*</em></label>
					<?
						$opt_satker['id'] = 'KODE_UPT';
						$opt_satker['name'] = 'KODE_UPT';
						//$opt_satker[] = '';
						echo $this->mdl_satker->getOptionUPTChild($opt_satker);
						
					?>
				</li>
							
				<li><label for="">DIKLAT <em>*</em></label>
					<div id="KODE_DIKLAT">
					<select name="KODE_DIKLAT">
						<option value="">--Pilih--</option>        	
					</select>
					</div>
				</li>
				
				<li><label for="">NAMA PENDAFTAR <em>*</em></label> 
					<input name="NAMA_PENDAFTAR" value="<?=set_value('NAMA_PENDAFTAR')?>" type="text" class="three"/>
				</li>
				
				<li><label for="">TEMPAT LAHIR<em>*</em></label> 
					<input name="TEMPAT_LAHIR" value="<?=set_value('TEMPAT_LAHIR')?>" type="text" class="three"/>
				</li>
				
				<li><label for="">TANGGAL LAHIR<em>*</em></label> 
					<input name="TGL_LAHIR" value="<?=set_value('TGL_LAHIR')?>" type="text" class="one" id="TGL_LAHIR"/>
				</li>
				
				<li><label for="">Jenis Kelamin <em>*</em></label> <select id="JK" name="JK">
					<option value="">- Pilih Jenis Kelamin -</option>
					<option value="Pria">Pria</option>
					<option value="Wanita">Wanita</option>
				</select></li>

				<!--<input type="hidden" name="STATUS_PESERTA" value="Registrasi">-->
				
				<li><label for="">KETERANGAN <em> </em></label> 
					<input name="KETERANGAN" value="<?=set_value('KETERANGAN')?>" type="text" class="five"/>
				</li>
				
				<hr/>
				
				<div class="clearfix">&nbsp;</div>
				
				<li>
					<input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/>
					<a href="<?=site_url();?>" class="greenbutton">Back</a>
				</li>				
			</li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<div id="search_view">
			</div>
			
			<li><a>PERSYARATAN ADMINISTRASI</a>
				<p class="feat_text">	
						<li>1. Usia maksimum 23 tahun pada bulan Agustus 2013;</li>
						<li>2. Jenis Kelamin : Pria / Wanita;</li>
						<li>3. Belum menikah dan sangguptidak menikah selama masa pendidikan dibuktikan dengan surat pernyataan;</li>
						<li>4. Tinggi Badan minimal Pria 160 Cm dan Wanita 155 Cm;</li>
				</p>
			 </li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->