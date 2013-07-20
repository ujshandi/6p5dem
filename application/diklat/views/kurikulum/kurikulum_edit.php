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

<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Program</h1>
	<hr/>
	<?=form_open('kurikulum/proses_edit', array('class'=>'sform'))?>
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
				<select name="kode_upt" id="KODE_UPT">
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
			<li><label for="">KODE KURIKULUM <em>*</em></label> <input name="KODE_KURIKULUM" value="<?=$result->row()->KODE_KURIKULUM?>" type="text" class="five"/></li>
			<li><label for="">NAMA KURIKULUM <em>*</em></label> <input name="NAMA_KURIKULUM" value="<?=$result->row()->NAMA_KURIKULUM?>" type="text" class="five"/></li>
			<li><label for="">SKS TEORI <em>*</em></label> <input name="SKS_TEORI" value="<?=$result->row()->SKS_TEORI?>" type="text" class="five"/></li>
			<li><label for="">SKS PRAKTEK <em>*</em></label> <input name="SKS_PRAKTEK" value="<?=$result->row()->SKS_PRAKTEK?>" type="text" class="five"/></li>
			<li><label for="">JAM <em>*</em></label> <input name="JAM" value="<?=$result->row()->JAM?>" type="text" class="five"/></li>
			<li><label for="">SEMESTER <em>*</em></label> <input name="SEMESTER" value="<?=$result->row()->SEMESTER?>" type="text" class="five"/></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->