<section class="grid_12">	<div class="block-border">		<form class="block-content form" id="table_form" method="post" action="">			<h1>Data User</h1>
			<div class="block-controls">
				<ul class="controls-buttons">
					<?php echo $this->pagination->create_links(); ?>
					<li class="sep"></li>
					<li><? /*
							if ($can_insert == TRUE){
								echo anchor('users/insert', 'Tambah Data');
							}
					*/ ?></li>
				</ul>		
			</div>			<div class="no-margin"><table class="table" cellspacing="0" width="100%">				<thead>
					<tr>						<th align="left" valign="top" scope="col">NIP</th>
						<th align="left" valign="top" scope="col">User Name</th>
						<th align="left" valign="top" scope="col">Nama Pengguna</th>
						<th align="left" valign="top" scope="col">Group</th>
						<th align="left" valign="top" scope="col">Departemen</th>
						<th align="left" valign="top" scope="col">Posisi</th>
						<th align="left" valign="top" scope="col">Deskripsi</th>
						<th align="left" valign="top" scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($results->result() as $row) {?>
					<tr>
						<td align="left" valign="top"><?=$row->NIP?> </td>
						<td align="left" valign="top"><?=$row->USERNAME?> </td>
						<td align="left" valign="top"><?=$row->NAME?> </td>
						<td align="left" valign="top"><?=$row->USER_GROUP_ID?> </td>
						<td align="left" valign="top"><?=$row->DEPARTMENT?> </td>
						<td align="left" valign="top"><?=$row->POSITION?> </td>
						<td align="left" valign="top" class="table-actions">
						<?php
						/*
							if ($can_update == TRUE){
								echo anchor('users/update/'.$row->userid, '<img src="'.base_url().'asset/admin/images/icons/fugue/pencil.png" width="16" height="16">', array('class'=>'with-tip', 'title'=>'Edit'));
							}
							if ($can_delete == TRUE){
								echo anchor('users/delete/'.$row->userid, '<img src="'.base_url().'asset/admin/images/icons/fugue/cross-circle.png" width="16" height="16">', array('class'=>'with-tip', 'title'=>'Edit', 'onclick'=>"return confirm('Anda yakin akan menghapus data ini?')"));
							}							*/
						?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			
			</table></div>
			<div class="block-footer">
				<?=anchor('users/insert', 'Tambah Data', array('class'=>'button'))?>
			</div>
		</form>
	</div></section>