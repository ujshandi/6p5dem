	<?=form_open('user_group/proses_add', array('class'=>'sform','id'=>'form_add_user_group'))?>	<fieldset>		<?php 			if(validation_errors())			{		?>				<ul class="message error grid_12">					<li><?=validation_errors()?></li>					<li class="close-bt"></li>				</ul>			<?php			} 		?>		<ol>			<li><label for="">NAMA GROUP USER <em>*</em></label> <input name="USER_GROUP_NAME" value="" type="text" class="five"/></li>			<li><label for="">URUTAN <em>*</em></label> <input name="URUTAN" value="" type="text" class="five"/></li>			<div class="clearfix">&nbsp;</div>			<hr/>			<li>			<a href="javascript:void(0);" onclick="add_user_group_bboard()" class="control">SUBMIT</a>			<a href="javascript:void(0);" onclick="$('#list_data_tab1').load('user_group/bboard_getall');" class="control" style="float:right">BACK</a>			</li>					</ol>	</fieldset>	<?=form_close()?>
				
		