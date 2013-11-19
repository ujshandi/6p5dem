<!-- contenna -->
<script>
    $(document).ready(function(){
        $("#KODEMATRA").change(function(){
            var KODEMATRA = $("#KODEMATRA").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/import_bumn/getBumn",
               data : "KODEMATRA=" + KODEMATRA,
               success: function(data){
                   $("#KODEBUMN").html(data);
               }
            });
        });
		
    });
</script>
<div class="wrap_right bgcontent">
	<h1 class="heading">Import Data SDM BUMN</h1>
	<hr/>
	<?php 
		//$attributes = array('id' => 'fmimport');
		//echo form_open_multipart('import_bumn/eksekusi', $attributes);
	?>
	<?=form_open_multipart('import_bumn/eksekusi', array('class'=>'sform'))?>
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
				<label for="">MATRA<em>*</em></label>
				<select name="KODEMATRA" id="KODEMATRA">
					<?=$this->mdl_import_bumn->getOptionMatra()?>
				</select>
			</li>
			<li><label for="">BUMN<em>*</em></label>
				<select name="KODEBUMN" id="KODEBUMN">
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


