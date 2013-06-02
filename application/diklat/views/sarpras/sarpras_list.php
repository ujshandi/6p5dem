<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Sarana Prasarana</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/sarpras/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th>UPT</th>
		<th>Nama Sarana</th>
		<th>Jumlah</th>
		<th>Tahun</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td><?=$r->KODE_UPT?></td>
				<td><?=$r->NAMA_SARANA?></td>
				<td><?=$r->JUMLAH?></td>
				<td><?=$r->TAHUN?></td>
				<td >
					<a href="<?=site_url().'/sarpras/edit/'.$r->ID_SARANA?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/sarpras/proses_delete/'.$r->ID_SARANA?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->