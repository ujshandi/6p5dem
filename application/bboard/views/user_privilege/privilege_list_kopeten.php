<!--<div class="wrap_right bgcontent">	<h1 class="heading">Data User Privilege</h1>	<hr/>	<a href="<?//=base_url().$this->config->item('index_page').'/user_privilege/add'?>" class="control"><span class="add">Tambah Data</span></a>-->	<table width="100%">		  <thead>			<tr>				<th align="left" valign="top" scope="col">No</th>				<th align="left" valign="top" scope="col">ID User Group</th>				<th align="left" valign="top" scope="col">Nama User Group</th>				<th align="left" valign="top" scope="col">Aksi</th>			</tr>		</thead>		<tbody>			<?php $i=0; foreach($results->result() as $row) { $i++;?>			<tr>				<td align="left" valign="top"><?=$i?> </td>				<td align="left" valign="top"><?=$row->USER_GROUP_ID?> </td>				<td align="left" valign="top"><?=$row->USER_GROUP_NAME?> </td>				<td align="left" valign="top" class="table-actions">					<?php /*						<a href="<?=site_url().'/user_privilege/edit/'.$row->USER_GROUP_ID?>" class="control" >					<span class="edit">edit</span></a> |						<a href="<?=site_url().'/user_privilege/proses_delete/'.$row->USER_GROUP_ID?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">					<span class="delete">hapus</span></a> */ ?>					<a href="javascript:void(0);" id="edit_user_privilege" onclick="get_data_edit_kopeten('<?=$row->USER_GROUP_ID;?>')" class="control" ><span class="edit">edit</span></a>					|<a href="javascript:void(0);" id="edit_user_privilege" onclick="hapus_privilege_kopeten('<?=$row->USER_GROUP_ID;?>')" class="control" ><span class="delete">hapus</span></a>									</td>			</tr>			<?php } ?>		</tbody>	</table>	<!--<div class="clear">&nbsp;</div>	<?=$this->pagination->create_links()?></div>-->