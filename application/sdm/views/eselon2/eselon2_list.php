<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Eselon II</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/eselon2/add'?>">Tambah Data</a>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>Kode Eselon</th>
		<th>Nama</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=1;
		foreach($result->result() AS $r){?>
			<tr class='gradeC'>
				<td width='5%'><?=$i?></td>
				<td width='5%'><?=$r->ID_ESELON_2?></td>
				<td width='30%'><?=$r->NAMA_ESELON_2?></td>
				<td width='10%'>
					<a href="<?=site_url().'/golongan/edit/'.$r->ID_ESELON_2?>" >Ubah </a> |
					<a href="<?=site_url().'/golongan/proses_delete/'.$r->ID_ESELON_2?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" >Hapus</a>
				</td>
			</tr>
		<?
		$i++;
		}
		?>
	  </tbody>
	</table>
	<div class="clear">&nbsp;</div>
	<?=$this->pagination->create_links()?>
</div><!-- end wrap right content-->