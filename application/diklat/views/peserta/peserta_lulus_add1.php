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

<div class="wrap_right bgcontent">
	<h1 class="heading">Data Peserta</h1>
	<hr/>
	<?=form_open('peserta/add_lulus2', array('class'=>'sform'))?>
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
			<li><label for="">TAHUN <em>*</em></label>
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

			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->