<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Pendaftaran Taruna</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/peserta_backend/add'?>" class="control"> <span class="add">Tambah Pendaftar Taruna</span></a>
	
	<table width="100%">
	  <thead>
		<th>No</th>
		<th width="18%">UPT</th>
		<th width="12%">Diklat</th>
		<th width="12%">Nama Pendatar</th>
		<th >Tempat Lahir</th>
		<th >Tanggal Lahir</th>
		<th width="6%">Jenis Kelamin</th>
		<th>Status</th>
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
				<td><?=$r->NAMA_DIKLAT?></td>
				<td><?=$r->NAMA_PENDAFTAR?></td>
				<td><?=$r->TEMPAT_LAHIR?></td>
				<td><?=$r->TGL_LAHIR?></td>
				<td><?=$r->JK?></td>
				<td><?=$r->STATUS_PENDAFTAR?></td>
				<td >
					<a href="<?=site_url().'/peserta_backend/edit/'.$r->IDPENDAFTAR?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/peserta_backend/proses_delete/'.$r->IDPENDAFTAR?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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