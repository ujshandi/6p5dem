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
               url  : "<?=base_url().$this->config->item('index_page');?>/peserta_front/getDiklat",
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
	<?=form_open('peserta_backend/proses_edit', array('class'=>'sform'))?>
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
				<select name="KODE_UPT" id="KODE_UPT">
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
			
			<li><label for="">NAMA PENDAFTAR <em>*</em></label> <input name="NAMA_PENDAFTAR" value="<?=$result->row()->NAMA_PENDAFTAR?>" type="text" class="three"/></li>
			
			<li><label for="">TEMPAT LAHIR<em>*</em></label> <input name="TEMPAT_LAHIR" value="<?=$result->row()->TEMPAT_LAHIR?>" type="text" class="three"/></li>
			
			<li><label for="">TANGGAL LAHIR<em>*</em></label> <input name="TGL_LAHIR" value="<?=$result->row()->TGL_LAHIR?>" type="text" class="one" id="TGL_LAHIR"/></li>
			
			<li><label for="">JENIS KELAMIn <em>*</em></label>
				<?php 
					$opti['id'] = 'JK';
					$opti['name'] = 'JK';
					$opti['value'] = $result->row()->JK;
					echo $this->mdl_peserta->getOptionJenkel($opti);
				?>
			</li>
			
			<li><label for="">NO TELEPON<em>*</em></label> <input name="NO_TELP" value="<?=$result->row()->NO_TELP?>" type="text" class="three"/></li>
			
			<li><label for="">STATUS PENDAFTAR <em>*</em></label>
				<?php 
					$opti['id'] = 'STATUS_PENDAFTAR';
					$opti['name'] = 'STATUS_PENDAFTAR';
					$opti['value'] = $result->row()->STATUS_PENDAFTAR;
					echo $this->mdl_peserta->getOptionStatus($opti);
				?>
			</li>
			
			<li><label for="">KETERANGAN <em>*</em></label> <input name="KETERANGAN" value="<?=ReadCLOB($result->row()->KETERANGAN)?>" type="text" class="five"/></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->