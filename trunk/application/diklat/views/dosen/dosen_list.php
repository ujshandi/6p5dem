<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Dosen</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/dosen/add'?>" class="control"> <span class="add">Tambah Data </span></a>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th width="15%">Nama Pengajar</th>
		<th width="15%">Status Pengajar</th>
		<th width="10%">Jenis Pengajar</th>
		<th width="5%">Thn Mulai Mengajar</th>
		<th width="20%">UPT</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=1;
		foreach($result->result() as $r){
		?>
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td><?=$r->NAMADOSEN?></td>
				<td><?=$r->STATUS?></td>
				<td><?=$r->JENIS_DOSEN?></td>
				<td><?=$r->TAHUN?></td>
				<td><?=$r->NAMA_UPT?></td>
				<td >
					<a href="<?=site_url().'/dosen/edit/'.$r->IDDOSEN?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/dosen/proses_delete/'.$r->IDDOSEN?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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