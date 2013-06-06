<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Praprasarana</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/underconstruction'?>" class="control"> <span class="add">Tambah Data Prasarana</span></a>
	
	<table width="100%">
	  <thead>
		<th>UPT</th>
		<th>Nama Prasarana</th>
		<th>Jumlah</th>
		<th>Kapasitas</th>
		<th>Tahun</th>
		<th>Foto</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td><?=$r->KODE_UPT?></td>
				<td><?=$r->ID_SARPRAS?></td>
				<td><?=$r->JUMLAH?></td>
				<td><?=$r->KAPASITAS?></td>
				<td><?=$r->TAHUN?></td>
				<td><?=$r->FOTO?></td>
				<td >
					<a href="<?=site_url().'/prasarana/edit/'.$r->ID_prasarana?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/prasarana/proses_delete/'.$r->ID_prasarana?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->