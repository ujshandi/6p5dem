<link rel="stylesheet" href="<?php  echo base_url() ?>css/table.css" type="text/css" media="screen" />

<div class="title">
	<?=@$title?>
</div>
<?
echo form_button('new', 'New','class=tombol onclick=window.location="'.site_url().'/referensi/add_golongan/"');
?>
<div class="content">
	<div class="content" width='' >
	<table cellpadding="0" cellspacing="0" border="0" class="display mprovinsi box-table-a" id="search" >
	<thead>
		<tr>
			<th width='120px'>No</th>
			<th>Nama Golongan</th>
            <th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<? foreach($golongan as $list){?>
			<tr class="odd gradeX">
				<td><?=$list->id_golongan?>.</td>
				<td><?=$list->nama_golongan?></td>
                <td><a href="<?=site_url()?>/referensi/edit_golongan/<?=$list->id_golongan?>"><?=$list->keterangan?></a></td>
			</tr>
		<? } ?>
	</tbody>
	</table>
	<div class="clear"></div>		
</div>

</div>

<script><!--
	$(document).ready(function(){
		$("#frm").validate({
			submitHandler: function() {
				$("div.error").hide();
				 
					post_data();
				
 			}
		});
	});
	
	
	function post_data() {
		var action = '<?php echo site_url().'/referensi/update/'; ?>'; 
 
		$.post(action, $("#frm").serialize(), 
		
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