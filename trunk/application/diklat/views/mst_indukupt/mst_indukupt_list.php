<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Satuan Kerja</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/mst_indukupt/add'?>">Tambah Data</a>
	<table width="100%">
	  <thead>
		<th>kode_induk</th>
		<th>nama_induk</th>
		
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?foreach($result->result() AS $row){?>
			<tr class='gradeC'>
				<td><?=$row->kode_induk?> </td>
		<td><?=$row->nama_induk?> </td>
		
				<td width='10%'>
					<a href="<?=site_url().'/mst_indukupt/edit/'.$row->kode_induk?>" >Ubah </a> |
					<a href="<?=site_url().'/mst_indukupt/proses_delete/'.$row->kode_induk?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" >Hapus</a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->
