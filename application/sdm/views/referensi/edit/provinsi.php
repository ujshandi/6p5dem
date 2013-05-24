<link rel="stylesheet" href="<?php  echo base_url() ?>css/table.css" type="text/css" media="screen" />
<div class="title">
	<?=@$title?>
</div>
<div class="content">
	<!-- Provinsi -->
	<div class="table_master">
		<?php  echo form_open('#','name=frm_prov  class=clearfix id=frm_prov ');	
		echo '<div>';
			echo form_button('back', 'Back','class=tombol onclick=window.location="'.site_url().'/referensi/provinsi"');
			echo form_submit('save', 'Save','class=tombol');
		echo '</div>';
		?>
			<table   width="100%"  class="box-table-a">
				<tr>
					<td colspan="2" class="none" height="25px">
						<div id="msg" style="display:block;"></div>
					</td>
				</tr> 
				<tr>
					<td width='200px'>Kode Provinsi </td>
					<td><?php echo form_input('kodeprovin',$provice->kodeprovin, 'readonly=readonly class="required" id=kodeprovin');?></td>
				</tr>
				<tr>
					<td>Nama Provinsi </td>
					<td><?php echo form_input('namaprovin',$provice->namaprovin, 'class="required" id=namaprovin');?></td>
				</tr>
				<tr>
					<td><?php echo form_close(); ?></td>
					<td>
						<?php echo form_open('#','name=frm_del_prov  class=clearfix id=frm_del_prov ');	?>
						<?php echo form_hidden('kodeprovin', $this->uri->segment('3'),' id=kodeprovin ');?>
						<?php echo form_submit('delete', 'Delete','class=tombol ');?>
						<?php echo form_close(); ?>
					</td>
				</tr>
			</table>
			</div>
		
		
		
	</div>
<hr>
	<!-- Kabupaten -->
	<div width="100%" >
	<div>&nbsp </div>
	<?php  echo form_open('referensi/delete/kabupaten','name=form  class=clearfix id=frm_kab ');?>	
		<table border=0 cellpadding=0 cellspacing=0  class="box-table-a">
			<tr>
					<td colspan="3" class="none" height="25px">
						<div id="msg2" style="display:block;"></div>
					</td>
				</tr> 
			<tr height='40px' class='tdhead'>
				<th  width=10 ><input type="checkbox" class="checkall" /></th>
				<th  width=120 >Kode Kabupaten </th>
				<th>Nama Kabupaten</th>
			</tr>
			<? foreach($kab as $kabupaten){ ?>
			<tr>
				<td  style="text-align:center;">
					<input type="checkbox" value="<?=$kabupaten->kodekabup?>" name="chkboxarray[]" id="chkboxarray">
				</td>
				
				<td style='padding-right:20px;'><?=$kabupaten->kodekabup?></td>
				<td><a href="<?=site_url()?>/referensi/edit_kab/<?=$this->uri->segment('3')."/".$kabupaten->kodekabup ?>"><?=$kabupaten->namakabup ?></td>
			</tr>

			
			<? } ?>
			<tr>
				 
				<td colspan=3> 
				<?
				echo form_button('new', 'Add New','class=tombol onclick=window.location="'.site_url().'/referensi/add_kab/'.$provice->kodeprovin.'" ');
				echo form_submit('delete', 'Delete','class=tombol');
				?>
			</td>
		</table>
			 
	<?php echo form_close(); ?>
	</div>
<div class="clear"></div>	
</div>
 

<script type="text/javascript" src="<?=base_url()?>js/jquery.confirm.js"></script>


<script><!--
$(document).ready(function(){
var action2 = '<?php echo site_url().'/referensi/delete/kabupaten'; ?>'; 

		$("#frm_kab").validate({
			submitHandler: function() {
				$("div.error").hide();
				
 					$.confirm({
						'title'		: 'Konfirmasi Hapus data',
						'message'	: 'Apakah anda akan menghapus data?',
						'buttons'	: {
							'Ya'	: {
								'class'	: 'blue',
								'action': function(){
 
									$.post(action2, $("#frm_kab").serialize(), 
									
									function(data) {
										if(data.error == false ){
											//jika tambah data behasil
											//$("#msg").html(data.message).addClass('successmsg').removeClass('errormsg').show();
											location.reload(true);
										}else{
											//jika tambah data gagal
											$("#msg2").html(data.message).addClass('errormsg').removeClass('successmsg').show();
										}
									}, "json");
								}
							},
							'Tidak'	: {
								'class'	: 'gray',
								'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
							}
						}
					});
			}
		});
	});
	
	
$(document).ready(function(){
	
// action delete provinsi
var action3 = '<?php echo site_url().'/referensi/delete/provinsi'; ?>'; 

		$("#frm_del_prov").validate({
			submitHandler: function() {
				$("div.error").hide();
				
 					$.confirm({
						'title'		: 'Konfirmasi Hapus data',
						'message'	: 'Apakah anda akan menghapus provinsi?',
						'buttons'	: {
							'Ya'	: {
								'class'	: 'blue',
								'action': function(){
 
									$.post(action3, $("#frm_del_prov").serialize(), 
									
									function(data) {
										if(data.error == false ){
											//jika tambah data behasil
											//$("#msg").html(data.message).addClass('successmsg').removeClass('errormsg').show();
											window.location = '<?=site_url()."/referensi/provinsi/".$provice->kodeprovin?>';

										}else{
											//jika tambah data gagal
											$("#msg2").html(data.message).addClass('errormsg').removeClass('successmsg').show();
										}
									}, "json");
								}
							},
							'Tidak'	: {
								'class'	: 'gray',
								'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
							}
						}
					});
			}
		});
	});
	
	
	$(document).ready(function(){
		$("#frm_prov").validate({
			submitHandler: function() {
				$("div.error").hide();
				 
					post_data();
				
 			}
		});
	});
	
	
	function post_data() {
		var action = '<?php echo site_url().'/referensi/update/provinsi'; ?>'; 
 
		$.post(action, $("#frm_prov").serialize(), 
		
		function(data) {
	   		if(data.update == true ){
		   		//jika tambah data behasil
	   			$("#msg").html(data.message).addClass('successmsg').removeClass('errormsg').show();
 	   		}else{
		   		//jika tambah data gagal
	   			$("#msg").html(data.message).addClass('errormsg').removeClass('successmsg').show();
  	   		}
	 	}, "json");
	}
		
--></script>	