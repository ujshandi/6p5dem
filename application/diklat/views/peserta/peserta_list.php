<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Peserta</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/peserta/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th>UPT</th>
		<th>Diklat</th>
		<th>No peserta</th>
		<th>Nama peserta</th>
		<th>Angkatan</th>
		<th>Status</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td><?=$r->KODE_UPT?></td>
				<td><?=$r->KODE_DIKLAT?></td>
				<td><?=$r->NO_PESERTA?></td>
				<td><?=$r->NAMA_PESERTA?></td>
				<td><?=$r->THN_ANGKATAN?></td>
				<td><?=$r->STATUS_PESERTA?></td>
				<td >
					<a href="<?=site_url().'/peserta/edit/'.$r->IDPESERTA?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/peserta/proses_delete/'.$r->IDPESERTA?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->