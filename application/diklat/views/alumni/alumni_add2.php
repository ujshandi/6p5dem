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
	<h1 class="heading">Data Alumni</h1>
	<hr/>
	<?=form_open('alumni/proses_add_alumni1', array('class'=>'sform'))?>
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
				<strong><?=$UPT->row()->NAMA_UPT?></strong>
			</li>
			<li><label for="" >DIKLAT <em>*</em></label>
				<strong><?=$DIKLAT->row()->NAMA_DIKLAT?></strong>
			</li>
			<table width="69%" border="1" cellspacing="1" cellpadding="1">
				<tr>
					<th width="3%" scope="col">&nbsp;</th>
					<th width="10%" scope="col">Nomor Peserta</th>
					<th width="30%" scope="col">Nama Peserta</th>
					<th width="25%" scope="col">Status Alumni</th>
					<th width="25%" scope="col">Tempat Bekerja</th>
				</tr>
				<?
					$i=0;
					foreach($data->result() as $r){
				?>
				<tr>
					<td><input name="DATA[<?=$i?>][IDPESERTA]" type="checkbox"  value="<?=$r->IDPESERTA?>" checked="checked" /></td>
					<td><?=$r->NO_PESERTA?></td>
					<td><?=$r->NAMA_PESERTA?></td>
					<td>
						<select id="JK" name="JK">
							<option value="">- Pilih Status Alumni -</option>
							<option value="Bekerja">Bekerja</option>
							<option value="Belum Bekerja">Belum Bekerja</option>
						</select>
					</td>
					<td><input name="INSTANSI" value="<?=set_value('INSTANSI')?>" type="text" id="INSTANSI"/></td>
				</tr>
				<?
						$i++;
					}
				?>
			</table>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->