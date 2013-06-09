<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Sarana</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/sarana/add'?>" class="control"> <span class="add">Tambah Data Sarana</span></a>
	
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
				<td width="25%"><?=$r->NAMA_INDUK?></td>
				<td><?=$r->NAMA_SARPRAS?></td>
				<td><?=$r->JUMLAH?></td>
				<td><?=$r->TAHUN?></td>
				<td >
					<a href="<?=site_url().'/sarana/edit/'.$r->ID_SARANA?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/sarana/proses_delete/'.$r->ID_SARANA?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->