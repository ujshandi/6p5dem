<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kurikulum</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/kurikulum/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th>Kode UPT</th>
		<th>Kode Diklat</th>		
		<th>Kode kurikulum</th>
		<th>Nama kurikulum</th>
		<th>SKS Teori</th>
		<th>SKS Praktek</th>
		<th>jam</th>
		<th>Semester</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td><?=$r->KODE_UPT?></td>
				<td><?=$r->KODE_DIKLAT?></td>
				<td><?=$r->KODE_KURIKULUM?></td>
				<td><?=$r->NAMA_KURIKULUM?></td>
				<td><?=$r->SKS_TEORI?></td>
				<td><?=$r->SKS_PRAKTEK?></td>
				<td><?=$r->JAM?></td>
				<td><?=$r->SEMESTER?></td>				
				<td >
					<a href="<?=site_url().'/kurikulum/edit/'.$r->KODE_KURIKULUM?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/kurikulum/proses_delete/'.$r->KODE_PROGRAM?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->