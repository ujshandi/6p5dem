<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Penyuluhan</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/penyuluhan/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th width="2%">No</th>
		<th width="20%">UPT</th>
		<th>Nama Penyuluhan</th>
		<th>Peserta</th>
		<th>Tempat</th>
		<th>Tanggal</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
	  
		<?
		$i=1;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td><?=$r->NAMA_UPT?></td>
				<td><?=$r->NAMA_PENYULUHAN?></td>
				<td><?=$r->JML_PESERTA?></td>
				<td><?=$r->TEMPAT?></td>
				<td><?=$r->TANGGAL?></td>
				<td >
					<a href="<?=site_url().'/penyuluhan/edit/'.$r->IDDATA?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/penyuluhan/proses_delete/'.$r->IDDATA?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
						<span class="delete">hapus</span></a>
				</td>
			</tr>
		<?
		$i++;
		}
		?>
	  </tbody>
	</table>
	
	<div class="clearfix">&nbsp;</div>        
        <div class="paging right">
          <ul>
            <li class="active">
				 <li><?=$this->pagination->create_links()?></li>
          </ul>
        </div><!--end pagination-->
	<div class="clearfix"></div>
	
</div><!-- end wrap right content-->