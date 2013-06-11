<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kalender</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/kalender/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th>UPT</th>
		<th>Periode Awal</th>
		<th>Periode Akhir</th>
		<th>Kegiatan</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td><?=$r->NAMA_INDUK?></td>
				<td><?=$r->TGL_AWAL?></td>
				<td><?=$r->TGL_AKHIR?></td>
				<td><?=$r->KEGIATAN->load()?></td>
				<td >
					<a href="<?=site_url().'/kalender/edit/'.$r->IDKALENDER?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/kalender/proses_delete/'.$r->IDKALENDER?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->