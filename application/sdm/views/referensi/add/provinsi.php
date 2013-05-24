<div class="title">
	<?=@$title?>
</div>
<div class="content">
	<div class="table_master">
		<?php  echo form_open('#','name=frm_addprov  class=clearfix id=frm_addprov');	
		echo '<div>';
			echo form_button('back', 'Back','class=tombol onclick=window.location="'.site_url().'/referensi/provinsi/'.$this->uri->segment('3').'" ');
 			echo form_submit('save', 'Save','class=tombol');
		echo '</div>';
		?>
			<table  width="100%"  class="box-table-a">
				<tr>
					<td colspan="2" class="none" height="25px">
						<div id="msg" style="display:block;"></div>
					</td>
				</tr> 
				<tr>
					<td width='200px'>Kode Provinsi </td>
					<td><?php echo form_input('kodeprovin',$kodeprovin, 'readonly=readonly class="required" id=kodeprovin');?></td>
				</tr>
				<tr>
					<td>Nama Provinsi </td>
					<td><?php echo form_input('namaprovin', set_value('namaprovin'), 'class="required" id=namaprovin');?></td>
				</tr>
				
			</table>
			</div>
		<?=form_hidden('kodeprovin', $kodeprovin,' id=kodeprovin');?>
		<?php echo form_close(); ?>
	</div>
	<div class="clear"></div>	
</div>

<script><!--
	$(document).ready(function(){
		$("#frm_addprov").validate({
			submitHandler: function() {
				$("div.error").hide();
				 
					post_data();
				
 			}
		});
	});
	
	
	function post_data() {
		var action = '<?php echo site_url().'/referensi/insert_provinsi/'; ?>'; 
 
		$.post(action, $("#frm_addprov").serialize(), 
		
		function(data) {
	   		if(data.error == false ){
		   		//jika tambah data behasil
	   			$("#msg").html(data.message).addClass('successmsg').removeClass('errormsg').show();
 	   		}else{
		   		//jika tambah data gagal
	   			$("#msg").html(data.message).addClass('errormsg').removeClass('successmsg').show();
  	   		}
	 	}, "json");
	}
		
--></script>	