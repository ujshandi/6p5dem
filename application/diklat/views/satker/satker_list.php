<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Satuan Kerja</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/satker/add'?>" class="control"><span class="add">Tambah Data</span></a>
	<table width="100%">
	  <thead>
		<th>Kode</th>
		<th>Nama</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td width='5%'><?=$r->KODE_INDUK?></td>
				<td width='30%'><?=$r->NAMA_INDUK?></td>
				<td width='10%'>
					<a href="<?=site_url().'/satker/edit/'.$r->KODE_INDUK?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/satker/proses_delete/'.$r->KODE_INDUK?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->