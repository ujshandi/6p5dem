<!--<a href="<?//=base_url().$this->config->item('index_page').'/users/add'?>" class="control"><span class="add">Tambah Data</span></a>--><a href="javascript:void(0);" onclick="$('#list_data_tab2').load('users/add_sdm');" class="control">Tambah Data</a>		<input type="text" name="txt_search_sdm" id="txt_search_sdm" value="<?=$this->session->userdata('keysearch_users'); ?>"/><!--<input type="button" onClick="ajaxpaging()" value="Cari">-->		&nbsp; <a href="javascript:void(0);" onClick="ajaxpaging_sdm()" class="control">&nbsp; &nbsp; Cari &nbsp; &nbsp; </a><table width="100%">		  <thead>			<tr>				<th align="left" valign="top" scope="col">NIP</th>				<th align="left" valign="top" scope="col">User Name</th>				<th align="left" valign="top" scope="col">Nama Pengguna</th>				<th align="left" valign="top" scope="col">Group</th>				<th align="left" valign="top" scope="col">Departemen</th>				<th align="left" valign="top" scope="col">Posisi</th>				<th align="left" valign="top" scope="col">Aksi</th>			</tr>		</thead>		<tbody>			<?php foreach($results->result() as $row) { ?>			<tr>				<td align="left" valign="top"><?=$row->NIP;?> </td>				<td align="left" valign="top"><?=$row->USERNAME?> </td>				<td align="left" valign="top"><?=$row->NAME?> </td>				<td align="left" valign="top"><?=$row->USER_GROUP_ID?> </td>				<td align="left" valign="top"><?=$row->DEPARTMENT?> </td>				<td align="left" valign="top"><?=$row->POSITION?> </td>				<td align="left" valign="top" class="table-actions">									<? /*<a href="<?=site_url().'/users/edit/'.$row->USER_ID?>" class="control" ><span class="edit">edit</span></a> */?>										<a href="javascript:void(0);" onclick="edit_users(<?=$row->USER_ID?>)" class="control" ><span class="edit">edit</span></a> 					|						<a href="<?=site_url().'/users/proses_delete/'.$row->USER_ID?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">					<span class="delete">hapus</span></a>				</td>			</tr>			<?php } ?>		</tbody>	</table>	<div class="clear">&nbsp;</div>		<?//=$this->pagination->create_links()?>	<?=$this->pagination->create_ajax_links('ajaxpaging');?>