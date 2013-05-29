<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kabupaten</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/kabupaten/add'?>">Tambah Data</a>
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
				<td width='5%'><?=$row->KODEKABUP?></td>
				<td width='30%'><?=$row->NAMAKABUP?></td>
				<td width='10%'>
					<a href="<?=site_url().'/kabupaten/edit/'.$row->KODEKABUP?>" >Ubah </a> |
					<a href="<?=site_url().'/kabupaten/proses_delete/'.$row->KODEKABUP?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" >Hapus</a>
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