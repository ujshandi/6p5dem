<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Golongan</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/golongan/add'?>">Tambah Data</a>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>Nama</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td width='5%'><?=$r->ID_GOLONGAN?></td>
				<td width='30%'><?=$r->NAMA_GOLONGAN?></td>
				<td width='10%'>
					<a href="<?=site_url().'/golongan/edit/'.$r->ID_GOLONGAN?>" >Ubah </a> |
					<a href="<?=site_url().'/golongan/proses_delete/'.$r->ID_GOLONGAN?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" >Hapus</a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->