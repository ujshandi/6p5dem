<!-- contenna -->
<script>
$(function() {
$( "#TGL_PUBLIKASI" ).datepicker({ dateFormat: 'dd-mm-yy' });
});
</script>

<script>
    $(document).ready(function(){
        $("#KODE_UPT").change(function(){
            var KODE_UPT = $("#KODE_UPT").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/penelitian/getDosen",
               data : "KODE_UPT=" + KODE_UPT,
               success: function(data){
                   $("#IDDOSEN").html(data);
               }
            });
        });
    });
</script>

<div class="wrap_right bgcontent">
	<h1 class="heading">Edit Data Penelitian</h1>
	<hr/>
	<?=form_open('penelitian/proses_edit', array('class'=>'sform'))?>
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
			<li><label for="" >UPT <em>*</em></label>
				<select name="KODE_UPT" id="KODE_UPT">
				<?
					$opt_satker['value'] = $result->row()->KODE_UPT;
					echo $this->mdl_satker->getOptionUPTChild($opt_satker);
				?>
				</select>
			</li>
			
			<li><label for="">DOSEN <em>*</em></label>
				<div id="IDDOSEN">
				<?php
					$opt['name'] = 'IDDOSEN';
					//$opt['id'] = 'KODE_UPT';
					$opt['KODE_UPT'] = $result->row()->KODE_UPT;
					$opt['value'] = $result->row()->IDDOSEN;
					echo $this->mdl_penelitian->getOptionDosenByUPT($opt);
				?>
				</div>
			</li>
			
			<li><label for="">DOSEN <em> </em></label>
				<div id="IDDOSEN">
				<select name="IDDOSEN">
					<option value="">--Pilih--</option>        	
				</select>
				</div>
			</li>
			
			<li><label for="">DOSEN <em> </em></label>
				<div id="IDDOSEN">
				<select name="IDDOSEN">
					<option value="">--Pilih--</option>        	
				</select>
				</div>
			</li>
			
			<li><label for="">DOSEN <em> </em></label>
				<div id="IDDOSEN">
				<select name="IDDOSEN">
					<option value="">--Pilih--</option>        	
				</select>
				</div>
			</li>
			
			<li><label for="">JUDUL PENELITIAN <em>*</em></label> <input name="JUDUL_PENELITIAN" value="<?=$result->row()->JUDUL_PENELITIAN?>" type="text" class="three"/></li>
			
			<li><label for="">ABSTRAK <em>*</em></label> <input name="ABSTRAK" value="<?=$result->row()->ABSTRAK?>" type="text" class="five"/></li>
			
			<li><label for="">TANGGAL PUBLIKASI<em>*</em></label> <input name="TGL_PUBLIKASI" value="<?=$result->row()->TGL_PUBLIKASI?>" type="text" class="one" id="TGL_PUBLIKASI"/></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->
