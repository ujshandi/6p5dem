<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Praprasarana</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/prasarana/add'?>" class="control"> <span class="add">Tambah Data Prasarana</span></a>
	
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>UPT</th>
		<th>Nama Prasarana</th>
		<th>Jumlah</th>
		<th>Kapasitas</th>
		<th>Tahun</th>
		<th>Foto</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
	  
		<?
		$i=1;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td style="vertical-align:middle" width = "25%"><?=$r->NAMA_UPT?></td>
				<td style="vertical-align:middle"><?=$r->ID_SARPRAS?></td>
				<td style="vertical-align:middle"><?=$r->JUMLAH?></td>
				<td style="vertical-align:middle"><?=$r->KAPASITAS?></td>
				<td style="vertical-align:middle"><?=$r->TAHUN?></td>
				<td style="vertical-align:middle"><img width ="75px" src='<?=base_url()?>file_upload/diklat/<?=$r->GAMBAR_PRASARANA?>' alt='<?=$r->GAMBAR_PRASARANA?>'/></td>
				<td style="vertical-align:middle">
					<a href="<?=site_url().'/prasarana/edit/'.$r->ID_PRASARANA?>" class="control" >
						<span class="edit">edit</span></a> |					
					<a href="<?=site_url().'/prasarana/proses_delete/'.$r->ID_PRASARANA?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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