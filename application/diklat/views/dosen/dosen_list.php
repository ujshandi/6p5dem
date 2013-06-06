<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Dosen</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/dosen/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th>Nama Pengajar</th>
		<th>Status Pengajar</th>
		<th>Jenis Pengajar</th>
		<th>Thn Mulai Mengajar</th>
		<th>UPT</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td><?=$r->NAMADOSEN?></td>
				<td><?=$r->STATUS?></td>
				<td><?=$r->JENIS_DOSEN?></td>
				<td><?=$r->TAHUN?></td>
				<td><?=$r->KODE_UPT?></td>
				<td >
					<a href="<?=site_url().'/underconstruction/'?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/dosen/proses_delete/'.$r->IDDOSEN?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->