<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data program</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/program/add'?>">Tambah Data</a>
	<table width="100%">
	  <thead>
		<th>Kode program</th>
		<th>Nama program</th>
		<th>Satker</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td><?=$r->KODE_PROGRAM?></td>
				<td><?=$r->NAMA_PROGRAM?></td>
				<td><?=$r->KODE_INDUK?></td>
				<td >
					<a href="<?=site_url().'/program/edit/'.$r->KODE_PROGRAM?>" >Ubah </a> |
					<a href="<?=site_url().'/program/proses_delete/'.$r->KODE_PROGRAM?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" >Hapus</a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->