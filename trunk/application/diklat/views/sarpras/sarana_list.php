<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Sarana</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/sarana/add'?>" class="control"> <span class="add">Tambah Data Sarana</span></a>
	
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>UPT</th>
		<th>Nama Sarana</th>
		<th>Jumlah</th>
		<th>Tahun</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		
		<?
		$i=1;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td width="25%"><?=$r->NAMA_UPT?></td>
				<td><?=$r->NAMA_SARPRAS?></td>
				<td><?=$r->JUMLAH?></td>
				<td><?=$r->TAHUN?></td>
				<td >
					<a href="<?=site_url().'/sarana/edit/'.$r->ID_SARANA?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/sarana/proses_delete/'.$r->ID_SARANA?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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