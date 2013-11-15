<!-- contenna -->
<script>
    $(document).ready(function(){
        $("#KODE_UPT").change(function(){
            var KODE_UPT = $("#KODE_UPT").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/peserta_backend/getDiklat",
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
	<?=form_open('peserta_backend/add_lulus2', array('class'=>'sform'))?>
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
					<?=$this->mdl_upt->getOptionUPT(array('value'=>$kode_upt))?>
				</select>
			</li>
			
			<li><label for="">DIKLAT <em>*</em></label>
				<select name="KODE_DIKLAT" id="KODE_DIKLAT">
					<option value="">--Pilih--</option>        	
				</select>
			</li>

			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->