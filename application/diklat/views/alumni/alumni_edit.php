<!-- contenna -->
<script>
$(function() {
$( "#TGL_LULUS" ).datepicker();
});
</script>

<script>
    $(document).ready(function(){
        $("#KODE_UPT").change(function(){
            var KODE_UPT = $("#KODE_UPT").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/alumni/getPeserta",
               data : "KODE_UPT=" + KODE_UPT,
               success: function(data){
                   $("#IDPESERTA").html(data);
               }
            });
        });
    });
</script>

<div class="wrap_right bgcontent">
	<h1 class="heading">Data Alumni</h1>
	<hr/>
	<?=form_open('alumni/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="" >UPT <em>*</em></label>
				<?
					$opt_satker['id'] = 'KODE_UPT';
					$opt_satker['name'] = 'KODE_UPT';
					$opt_satker['value'] = $result->row()->KODE_UPT;
					echo $this->mdl_satker->getOptionUPTChild($opt_satker);
					
				?>
			</li>
			
			<li><label for="">PESERTA <em>*</em></label>
				<div>
				<select name="IDPESERTA" id="IDPESERTA">
					<option value="">--Pilih--</option>        	
				</select>
				</div>
			</li>
			
			<li><label for="">TANGGAL LULUS <em>*</em></label> <input name="TGL_LULUS" id="TGL_LULUS" value="<?=$result->row()->TGL_LULUS?>" type="text" class="one"/></li>
			
			<li><label for="">TEMPAT KERJA <em>*</em></label> <input name="KERJA" value="<?=$result->row()->KERJA?>" type="text" class="five"/></li>
			
			<li><label for="">INSTANSI<em>*</em></label> <input name="INSTANSI" value="<?=$result->row()->INSTANSI?>" type="text" class="five"/></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->