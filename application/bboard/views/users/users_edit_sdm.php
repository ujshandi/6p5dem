<?=form_open('users/proses_add_sdm', array('class'=>'sform','id'=>'form_edit_sdm'))?>
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
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
		<li>
			<a href="javascript:void(0);" onclick="edit_users_sdm()" class="control">SUBMIT</a>
			<a href="javascript:void(0);" onclick="$('#list_data_tab2').load('users/get_users_sdm');" class="control">BACK</a>
		</li>
		</ol>
	<?=form_close()?>