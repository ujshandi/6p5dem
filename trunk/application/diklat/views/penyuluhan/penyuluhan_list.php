<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Penyuluhan</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/penyuluhan/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th width="20%">UPT</th>
		<th>Nama Penyuluhan</th>
		<th>Peserta</th>
		<th>Tempat</th>
		<th>Tanggal</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td><?=$r->NAMA_INDUK?></td>
				<td><?=$r->NAMA_PENYULUHAN?></td>
				<td><?=$r->JML_PESERTA?></td>
				<td><?=$r->TEMPAT?></td>
				<td><?=$r->TANGGAL?></td>
				<td >
					<a href="<?=site_url().'/penyuluhan/edit/'.$r->IDDATA?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/penyuluhan/proses_delete/'.$r->IDDATA?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->