<!-- contenna -->
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

<script>
$(function() {
$( "#TGL_LULUS" ).datepicker({ dateFormat: 'dd-mm-yy' });
});
</script>

<div class="wrap_right bgcontent">
	<h1 class="heading">Tambah Data Alumni</h1>
	<hr/>
	<?=form_open('alumni/add_alumni2', array('class'=>'sform'))?>
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
			
			<li><label for="">TAHUN ANGKATAN<em>*</em></label>
				<select id="THN_ANGKATAN" name="THN_ANGKATAN">
					<option value="0">-- PILIH --</option>
					<?
						$date = date('Y');
						for($i=$date, $c=$date-15; $i>$c; $i--){
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					?>
				</select>
			</li>
			
			<li><label for="">PERIODE / TANGGAL LULUS<em>*</em></label> <input name="TGL_LULUS" value="<?=set_value('TGL_LULUS')?>" type="text" class="one" id="TGL_LULUS"/>
			</li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->