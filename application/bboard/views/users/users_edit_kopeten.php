<script type="text/javascript">
	var url='<?php echo site_url();?>/users/';
	
	$(document).ready(function() {	
		
		/*
	
		$("#LEVEL_ID").change(function() {
			var level_id = $("#LEVEL_ID").val();
			var var_kode_upt = $("#VAR_KODE_UPT").val();
			$("#tampil_induk_upt").empty();
			$("#tampil_upt").empty();
			if (level_id!='1'){
				$.ajax({
					 type:'post',
					 url:url + 'get_induk_upt',
					 data:'level_id='+level_id + 'kode_upt=' + var_kode_upt,
					 success:function(data){
						   $("#tampil_induk_upt").html(data);
					 }
				 });    
			}
		}); */
	});
</script>
<?=form_open('users/proses_edit_kopeten', array('class'=>'sform','id'=>'form_edit_kopeten'))?>
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
					echo $this->users->get_group_user_kopeten($opti);
				?>
			</li>
			<!--
			<li><label for="">LEVEL <em>*</em></label>
				<select id="LEVEL_ID" name="LEVEL_ID">
				<?php /*
					$opti['value'] = $LEVEL;
					echo $this->users->get_edit_group_level($opti);
					*/
				?>
				</select>
			</li>-->
			<!--
			<input type="hidden" name="VAR_KODE_UPT" value="<?php /* echo $KODE_UPT */?>" id="VAR_KODE_UPT">
			<div id="tampil_induk_upt"></div>
			<div id="tampil_upt"></div> -->
			<div class="clearfix">&nbsp;</div>
			<hr/>
		<li>
			<a href="javascript:void(0);" onclick="edit_users_kopeten()" class="control">SUBMIT</a>
			<a href="javascript:void(0);" onclick="$('#list_data_tab4').load('users/get_users_kopeten');" class="control">BACK</a>
		</li>
		</ol>
	<?=form_close()?>
