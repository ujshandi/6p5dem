<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kabupaten</h1>
	<hr/>
	<li style="float:left">
	<a href="<?=base_url().$this->config->item('index_page').'/kabupaten/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	</li>
	<hr/>
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
					<a href="<?=site_url().'/kabupaten/edit/'.$row->KODEKABUP?>" class="control" >
						<span class="edit">edit</span>
					<a href="<?=site_url().'/kabupaten/proses_delete/'.$row->KODEKABUP?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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