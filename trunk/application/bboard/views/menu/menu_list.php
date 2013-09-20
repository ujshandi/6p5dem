<div class="wrap_right bgcontent">
	<h1 class="heading">Data Menu</h1>
	<hr/>
	<?php
	/*
	<a href="<?=base_url().$this->config->item('index_page').'/menu/add'?>" class="control"><span class="add">Tambah Data</span></a>
	 */
		if ($number_ai==null) $i=1 ; else $i= $number_ai;
	?>
	<table width="100%">
		<thead>
			<tr>
				
				<th align="left" valign="top" scope="col">NO</th>
				<th align="left" valign="top" scope="col">MENU ID</th>
				<th align="left" valign="top" scope="col">MENU NAME</th>
				<th align="left" valign="top" scope="col">MENU URL</th>
				<th align="left" valign="top" scope="col">USER GROUP ID</th>
				<th align="left" valign="top" scope="col">PRIVILEGE</th>
				<th align="left" valign="top" scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($results->result() as $row) {?>
			<tr>
				
				<td align="left" valign="top"><?=$i?> </td>
				<td align="left" valign="top"><?=$row->MENU_ID?> </td>
				<td align="left" valign="top"><?=$row->MENU_NAME?> </td>
				<td align="left" valign="top"><?=$row->MENU_URL?> </td>
				<td align="left" valign="top"><?=$row->USER_GROUP_ID?> </td>
				<td align="left" valign="top"><?=$row->PRIVILEGE?> </td>
				<td align="left" valign="top" class="table-actions">
						<a href="<?=site_url().'/menu/edit/'.$row->MENU_ID?>" class="control" >
					<span class="edit">edit</span></a> |
						<a href="<?=site_url().'/menu/proses_delete/'.$row->MENU_ID?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
					<span class="delete">hapus</span></a>
				</td>
			</tr>
			<?php $i++;} ?>
		</tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div>