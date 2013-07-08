<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Alumni</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/alumni/add_alumni1'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th>NO</th>
		<th width="20%">UPT</th>
		<th width="15%">DIKLAT</th>
		<th>NO PESERTA</th>
		<th width="15%">Nama PESERTA</th>
		<th>STATUS</th>
		<th>TEMPAT BEKERJA</th>
		<th>PERIODE LULUS</th>
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
				<td><?=$r->NO_PESERTA?></td>
				<td><?=$r->NAMA_PESERTA?></td>
				<td><?=$r->KERJA?></td>
				<td><?=$r->INSTANSI?></td>
				<td><?=$r->TGL_LULUS?></td>
				<td >
					<a href="<?=site_url().'/alumni/edit/'.$r->ID_ALUMNI?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/alumni/proses_delete/'.$r->ID_ALUMNI?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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