<script type="text/javascript">
	var url='<?php echo site_url();?>/users/';
	
	$(document).ready(function() {
		
		var level_id = $("#EDIT_LEVEL_ID").val();
		$("#EDIT_LEVEL_ID").change(function() {
			/*
			$("#edit_tampil_induk_upt").empty();
			$("#edit_tampil_upt").empty();
			
			$.ajax({
				 type:'post',
				 url:url + 'get_induk_upt',
				 data:'level_id='+level_id,
				 success:function(data){
					   $("#edit_tampil_induk_upt").html(data);
				 }
			 });    
			*/
			alert();
		});
	});
</script>
<?=form_open('users/proses_add_diklat', array('class'=>'sform','id'=>'form_edit_diklat'))?>
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
					echo $this->users->get_group_user_diklat($opti);
				?>
			</li>
			<li><label for="">LEVEL <em>*</em></label>
				<?php 
					$opti['name'] = 'EDIT_LEVEL_ID';
					$opti['value'] = set_value($LEVEL);
					$opti['id'] = 'EDIT_LEVEL_ID';
					echo $this->users->get_group_level($opti);
				?>
			</li>
			
			<div id="edit_tampil_induk_upt"></div>
			<div id="edit_tampil_upt"></div>
			<div class="clearfix">&nbsp;</div>
			<hr/>
		<li>
			<a href="javascript:void(0);" onclick="edit_users_diklat()" class="control">SUBMIT</a>
			<a href="javascript:void(0);" onclick="$('#list_data_tab3').load('users/get_users_diklat');" class="control">BACK</a>
		</li>
		</ol>
	<?=form_close()?>
