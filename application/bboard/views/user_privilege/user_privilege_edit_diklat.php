<!-- contenna --><script type="text/javascript">	function add_modul(){		var param_url='<?php echo site_url();?>/user_privilege/add_diklat/';				  $.ajax({			type: 'POST',			url :  param_url,			data: $("#privilege_diklat").serialize(),			success: function(data) {				$('#form_add_diklat').html(data);			}		});	}</script>	<li>			<a href="javascript:void(0);" onClick="add_modul();" class="control">&nbsp; Tambah Akses Modul &nbsp; </a>	</li>	<div id="form_add_diklat"></div>	<?=form_open('user_privilege/proses_edit_diklat', array('class'=>'sform','id'=>'privilege_diklat','name'=>'privilege_diklat','id'=>'privilege_diklat'))?>	<fieldset>		<?php 			if(validation_errors())			{		?>				<ul class="message error grid_12">					<li><?=validation_errors()?></li>					<li class="close-bt"></li>				</ul>			<?php			}									$MENU = array();		?>		<ol>			<li>				<label for="">User Group Admin : <?php echo  $results->row()->USER_GROUP_NAME ?> <em>*</em></label>							</li>			<hr/>		<?php $i=0; foreach($results->result() as $row) { $i++;?>										<input type="hidden" name="ID" value="<?=$id?>">					<input type="hidden" name="USER_GROUP_ID" value="<?=$row->USER_GROUP_ID;?>">					<?php 						echo "<input type='hidden' name='MENU[$i][MENU_ID]' value=" . $row->MENU_ID . ">";						echo "<input type='hidden' name='MENU[$i][USER_GROUP_MENU_ID]' value=" . $row->USER_GROUP_MENU_ID . ">";					?>										<li><label for="">MENU  <?php echo $row->MENU_NAME ?> <em>*</em></label>						Menu <input name="<?="MENU[$i][HAKAKSES0]";?>" value="<?=$row->PRIVILEGE[0]?>" type="checkbox" <?=$row->PRIVILEGE[0]=='1'?'checked':''?> />						- View <input name="<?="MENU[$i][HAKAKSES1]";?>" value="<?=$row->PRIVILEGE[1]?>" type="checkbox" <?=$row->PRIVILEGE[1]=='1'?'checked':''?> />						- Add <input name="<?="MENU[$i][HAKAKSES2]";?>" value="<?=$row->PRIVILEGE[2]?>" type="checkbox" <?=$row->PRIVILEGE[2]=='1'?'checked':''?> />						- Edit <input name="<?="MENU[$i][HAKAKSES3]";?>" value="<?=$row->PRIVILEGE[3]?>" type="checkbox" <?=$row->PRIVILEGE[3]=='1'?'checked':''?> />						- Delete <input name="<?="MENU[$i][HAKAKSES4]";?>" value="<?=$row->PRIVILEGE[4]?>" type="checkbox" <?=$row->PRIVILEGE[4]=='1'?'checked':''?> />										</li>															<hr/>											<?php } ?>				<li>			<!--<input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/>-->			<a href="javascript:void(0);" onclick="edit_privilege_diklat()" class="control">SUBMIT</a>			<a href="javascript:void(0);" onclick="$('#list_data_tab3').load('user_privilege/get_all_diklat');" class="control">BACK</a>				</li>		<div class="clearfix">&nbsp;</div>				</ol>	</fieldset>	<?=form_close()?>	