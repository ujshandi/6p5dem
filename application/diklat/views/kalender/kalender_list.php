<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Kalender</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/kalender/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>UPT</th>
		<th>Periode Awal</th>
		<th>Periode Akhir</th>
		<th>Kegiatan</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=1;
		foreach($result->result() as $r){
		?>
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td width ="27%"><?=$r->NAMA_UPT?></td>
				<td><?=$r->TGL_AWAL?></td>
				<td><?=$r->TGL_AKHIR?></td>
				<td width ="27%"><?=$r->KEGIATAN->load()?></td>
				<td >
					<a href="<?=site_url().'/kalender/edit/'.$r->IDKALENDER?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/kalender/proses_delete/'.$r->IDKALENDER?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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