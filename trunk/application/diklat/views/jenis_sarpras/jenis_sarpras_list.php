<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Sarana Prasarana</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/jenis_sarpras/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th>Nama Sarana Prasarana</th>
		<th>Jenis</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td><?=$r->NAMA_SARPRAS?></td>
				<td><?=$r->JENIS?></td>
				<td >
					<a href="<?=site_url().'/jenis_sarpras/edit/'.$r->ID_SARPRAS?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/jenis_sarpras/proses_delete/'.$r->ID_SARPRAS?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->