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
	
	function CA()
	{
		var cIdx = 'IDPESERTA'; //manggil id chekbok
		//alert(counterIdx);
		var cControl = 'control';		
		for (var i=0;i < document.sform.elements.length;i++)
		{
			var e = document.sform.elements[i];
			if ((e.id == cIdx) && (e.id != cControl) && (e.type=='checkbox'))
			{
				e.checked = document.getElementById(cControl).checked;
			}
		}
	}
</script>


<div class="wrap_right bgcontent">
	<h1 class="heading">Tambah Data Peserta Lulus Diklat</h1>
	<hr/>
	<?=form_open('peserta/proses_add_lulus', array('class'=>'sform', 'id'=>'sform', 'name'=>'sform'))?>
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
					<th width="3%" scope="col"><input type="checkbox" name="control" id="control" onclick="CA(0)" checked="checked" /></th>
					<th width="11%" scope="col">Nomor Peserta</th>
					<th width="49%" scope="col">Nama Peserta</th>
				</tr>
				<?
					$i=0;
					foreach($data->result() as $r){
				?>
				<tr>
					<td><input name="DATA[<?=$i?>][IDPESERTA]" type="checkbox" id="IDPESERTA"  value="<?=$r->IDPESERTA?>" checked="checked" /></td>
					<td><?=$r->NO_PESERTA?></td>
					<td><?=$r->NAMA_PESERTA?></td>
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