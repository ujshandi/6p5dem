<script type="text/javascript">	var url='<?php echo site_url();?>/users/';	$(document).ready(function() {			$("#LEVEL_ID").change(function() {			var level_id = $("#LEVEL_ID").val();			$.ajax({				 type:'post',				 url:url + 'get_induk_upt',				 data:'level_id='+level_id,				 success:function(data){					   $("#tampil_induk_upt").html(data);				 }			 });    					});							});</script><!-- contenna --><!--<div class="wrap_right bgcontent">	<h1 class="heading">Data Users</h1>	<hr/>-->	<?=form_open('users/proses_add', array('class'=>'sform','id'=>'form_add_users'))?>		<?php 			if(validation_errors())			{		?>				<ul class="message error grid_12">					<li><?=validation_errors()?></li>					<li class="close-bt"></li>				</ul>			<?php			} 		?>		<ol>			<li><label for="">NAME <em>*</em></label> <input name="NAME" value="<?=set_value('NAME')?>" type="text" class="five"/></li>			<li><label for="">USERNAME <em>*</em></label> <input name="USERNAME" value="<?=set_value('USERNAME')?>" type="text" class="five"/></li>			<li><label for="">PASSWORD <em>*</em></label> <input name="PASSWORD" value="<?=set_value('PASSWORD')?>" type="password" class="five"/></li>			<li><label for="">USER GROUP <em>*</em></label>				<?php 					$opti['name'] = 'USER_GROUP_ID';					$opti['value'] = set_value('USER_GROUP_ID');					echo $this->users->get_group_user($opti);				?>			</li>			<li><label for="">LEVEL <em>*</em></label>				<?php 					$opti['name'] = 'LEVEL_ID';					$opti['value'] = set_value('LEVEL_ID');					$opti['id'] = 'LEVEL_ID';					echo $this->users->get_group_level($opti);				?>			</li>						<div id="tampil_induk_upt"></div>			<div id="tampil_upt"></div>						<li><label for="">DEPARTMENT <em>*</em></label> <input name="DEPARTMENT" value="<?=set_value('DEPARTMENT')?>" type="text" class="five"/></li>			<li><label for="">POSITION <em>*</em></label> <input name="POSITION" value="<?=set_value('POSITION')?>" type="text" class="five"/></li>			<li><label for="">DESCRIPTION <em>*</em></label> <input name="DESCRIPTION" value="<?=set_value('DESCRIPTION')?>" type="text" class="five"/></li>			<li><label for="">NIP <em>*</em></label> <input name="NIP" value="<?=set_value('NIP')?>" type="text" class="five"/></li>			<li><label for="">EMAIL <em>*</em></label> <input name="EMAIL" value="<?=set_value('EMAIL')?>" type="text" class="five"/></li>			<div class="clearfix">&nbsp;</div>			<hr/>			<li><!--<input class="greenbutton" type="submit" id="add_users" value="SUBMIT" style="float:right"/>-->				<a href="javascript:void(0);" onclick="add_users()" class="control">SUBMIT</a>				<a href="javascript:void(0);" onclick="$('#list_data_tab3').load('users/getall');" class="control">BACK</a>			</li>		</ol>	<?=form_close()?>	<!--</div><fieldset class="grey-bg">-->
				
		