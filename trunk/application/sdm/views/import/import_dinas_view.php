<!-- contenna -->
<script>
    $(document).ready(function(){
        $("#KODEPROVIN").change(function(){
            var KODEPROVIN = $("#KODEPROVIN").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/import_dinas/getKabup",
               data : "KODEPROVIN=" + KODEPROVIN,
               success: function(data){
                   $("#KODEKABUP").html(data);
               }
            });
        });
		
    });
</script>
<div class="wrap_right bgcontent">
	<h1 class="heading">Import Data SDM Dinas</h1>
	<hr/>
	<?php 
		/*$attributes = array('id' => 'fmimport');
		echo form_open_multipart('import/eksekusi', $attributes);*/
	?>
	<?=form_open_multipart('import_dinas/eksekusi', array('class'=>'sform'))?>
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
				<label for="">PROVINSI<em>*</em></label>
				<select name="KODEPROVIN" id="KODEPROVIN">
					<?=$this->mdl_import_dinas->getOptionProvin()?>
				</select>
			</li>
			<li><label for="">KABUPATEN<em>*</em></label>
				<select name="KODEKABUP" id="KODEKABUP">
					<option value="">--Pilih--</option>        	
				</select>
			</li>
			<li><label for="">File Name <em>*</em></label> <input type="file" name="datafile"/></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->


