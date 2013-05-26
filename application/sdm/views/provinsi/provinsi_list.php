<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Golongan</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/provinsi/add'?>">Tambah Data</a>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=1;
		foreach($result->result() as $row){
		?>
			<tr class='gradeC'>
				<td width='5%'><?=$i?></td>
				<td width='5%'><?=$row->KODEPROVIN?></td>
				<td width='30%'><?=$row->NAMAPROVIN?></td>
				<td width='10%'>
					<a href="<?=site_url().'/golongan/edit/'.$row->KODEPROVIN?>" >Ubah </a> |
					<a href="<?=site_url().'/golongan/proses_delete/'.$row->KODEPROVIN?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" >Hapus</a>
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