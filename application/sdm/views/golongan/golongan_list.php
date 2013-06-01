<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Golongan</h1>
	<hr/>
	<li style="float:left">
	<a href="<?=base_url().$this->config->item('index_page').'/golongan/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	</li>
	<hr/>
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
					<a href="<?=site_url().'/golongan/edit/'.$r->ID_GOLONGAN?>" class="control" >
						<span class="edit">edit</span>
					</a>
					<a href="<?=site_url().'/golongan/proses_delete/'.$r->ID_GOLONGAN?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span>
					</a>
				</td>
			</tr>
		<?}?>
	  </tbody>
	</table>
	<div class="clearfix"></div>
	<div class="paging right">
	  <ul>
		<li><?=$this->pagination->create_links()?></li>
	  </ul>
	</div>
	<div class="clearfix"></div>
</div><!-- end wrap right content-->