<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Tingkat Kopetensi</h1>
	<hr/>
	<li style="float:left">
	<a href="<?=base_url().$this->config->item('index_page').'/tingkat_kopetensi/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	</li>
	<hr/>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>Kode Tingkat</th>
		<th>Kategori Kopetensi</th>
		<th>Deskripsi</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=1;
		foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td width='5%'><?=$i?></td>
				<td width='5%'><?=$r->KODE_TINGKAT?></td>
				<td width='15%'><?=$r->NAMA_KATEGORI?></td>
				<td width='20%'><?=$r->DESKRIPSI?></td>
				<td width='10%'>
					<a href="<?=site_url().'/tingkat_kopetensi/edit/'.$r->KODE_TINGKAT?>" class="control">
						<span class="edit">edit</span>
					</a>
					<a href="<?=site_url().'/tingkat_kopetensi/proses_delete/'.$r->KODE_TINGKAT?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span>
					</a>
				</td>
			</tr>
		<?
		$i++;
		}
		?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<div class="paging right">
          <ul>
            <li><?=$this->pagination->create_links()?></li>
          </ul>
        </div>
</div><!-- end wrap right content-->