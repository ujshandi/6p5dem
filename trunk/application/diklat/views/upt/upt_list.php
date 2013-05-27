<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data UPT</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/upt/add'?>">Tambah Data</a>
	<table width="100%">
	  <thead>
		<th>Urutan</th>
		<th>Kode UPT</th>
		<th>Nama UPT</th>
		<th>Satker</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td ><?=$r->URUTAN?></td>
				<td ><?=$r->KODE_UPT?></td>
				<td ><?=$r->NAMA_UPT?></td>
				<td ><?=$r->KODE_INDUK?></td>
				<td >
					<a href="<?=site_url().'/upt/edit/'.$r->KODE_UPT?>" >Ubah </a> |
					<a href="<?=site_url().'/upt/proses_delete/'.$r->KODE_UPT?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" >Hapus</a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->