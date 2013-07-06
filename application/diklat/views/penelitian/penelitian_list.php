<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Penelitian</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/penelitian/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th width="25%">UPT</th>
		<th>DOSEN</th>
		<th>Judul Penelitian</th>
		<th>Abstrak</th>
		<th>Tanggal Publikasi</th>
		
		<th>aksi</th>
	  </thead>
	  <tbody>
	  
		<?
		$i=1;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td><?=$r->KODE_UPT?></td>
				<td><?=$r->ID_DOSEN?></td>
				<td><?=$r->JUDUL_PENELITIAN?></td>
				<td><?=$r->ABSTRAK?></td>
				<td><?=$r->TGL_PUBLIKASI?></td>
				<td >
					<a href="<?=site_url().'/penelitian/edit/'.$r->ID_PENELITIAN?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/penelitian/proses_delete/'.$r->ID_PENELITIAN?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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