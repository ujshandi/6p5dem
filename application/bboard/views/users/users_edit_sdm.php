<script type="text/javascript">
	var url='<?php echo site_url();?>/users/';
	
	
	$(document).ready(function() {	
		var level_id = $("#LEVEL_ID").val();
		var var_kodeprovin = $("#VAR_KODEPROVIN").val();
		var var_kodekabup = $("#VAR_KODEKABUP").val();
		var data = { 'level_id': level_id , 'kodeprovin': var_kodeprovin, 'kodekabup': var_kodekabup};
		if (level_id!='1'){
				$.ajax({
					 type:'post',
					 url:url + 'get_provinsi',
					 data:data,
					 success:function(data){
						   $("#tampil_provinsi").html(data);
					 }
				 }); 
			}
			
		$("#LEVEL_ID").change(function() {
			var level_id = $("#LEVEL_ID").val();

			$("#tampil_provinsi").empty();
			$("#tampil_kabupaten").empty();
			if (level_id!='1'){
				$.ajax({
					 type:'post',
					 url:url + 'get_provinsi',
					 data:'level_id='+level_id,
					 success:function(data){
						   $("#tampil_provinsi").html(data);
					 }
				 }); 
			}
		});
	});
</script>
<?=form_open('users/form_edit_sdm', array('class'=>'sform','id'=>'form_edit_sdm'))?>
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
		    
			<li><label for="">USERNAME <em>*</em></label> <input name="USERNAME" value="<?=$USERNAME?>" type="text" readonly /></li>
			
			<li><label for="">USER GROUP <em>*</em></label>
				<?php 
					$opti['name'] = 'USER_GROUP_ID';
					$opti['value'] = $USER_GROUP_ID;
					echo $this->users->get_group_user_sdm($opti);
				?>
			</li>
			<li><label for="">LEVEL <em>*</em></label>
				<select id="LEVEL_ID" name="LEVEL_ID">
					<?php
						switch($LEVEL_ID){
							case 1:
								echo '<option value="1" selected="selected">ADMINISTRASI</option>';
								echo '<option value="2">PROVINSI</option>';
								echo '<option value="3">KABUPATEN</option>';
								break;
							case 2:
								echo '<option value="1" >ADMINISTRASI</option>';
								echo '<option value="2" selected="selected">PROVINSI</option>';
								echo '<option value="3">KABUPATEN</option>';
								break;
							case 3:
								echo '<option value="1" >ADMINISTRASI</option>';
								echo '<option value="2" >PROVINSI</option>';
								echo '<option value="3" selected="selected">KABUPATEN</option>';
								break;
							default:
								echo '<option value="1" >ADMINISTRASI</option>';
								echo '<option value="2" >PROVINSI</option>';
								echo '<option value="3" >KABUPATEN</option>';
						}
					?>
					
				</select>
			</li>
			<input type="hidden" id="VAR_KODEPROVIN" name="VAR_KODEPROVIN" value="<?=$KODEPROVIN?>" />
			<input type="hidden" id="VAR_KODEKABUP" name="VAR_KODEKABUP" value="<?=$KODEKABUP?>" />
			<div id="tampil_provinsi"></div><br/>
			<div id="tampil_kabupaten"></div>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
		<li>
			<a href="javascript:void(0);" onclick="edit_users_sdm()" class="control">SUBMIT</a>
			<a href="javascript:void(0);" onclick="$('#list_data_tab2').load('users/get_users_sdm');" class="control">BACK</a>
		</li>
		</ol>
	<?=form_close()?>
