<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data program</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/program/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>Kode program</th>
		<th>Nama program</th>
		<th width="25%">Satker</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
	  
		<?
		$i=1;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td><?=$r->KODE_PROGRAM?></td>
				<td><?=$r->NAMA_PROGRAM?></td>
				<td><?=$r->NAMA_INDUK?></td>
				<td >
					<a href="<?=site_url().'/program/edit/'.$r->KODE_PROGRAM?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/program/proses_delete/'.$r->KODE_PROGRAM?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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