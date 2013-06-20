<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Peserta</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/peserta/add'?>" class="control"> <span class="add">Tambah Registrasi Peserta</span></a>
	
	<a href="<?=base_url().$this->config->item('index_page').'/peserta/add_lulus1'?>" class="control"> <span class="add">Tambah Peserta Lulus Diklat</span></a>
	
	<table width="100%">
	  <thead>
		<th>No</th>
		<th width="22%">UPT</th>
		<th width="12%">Diklat</th>
		<th>No peserta</th>
		<th width="12%">Nama peserta</th>
		<th>Angkatan</th>
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
				<td><?=$r->NO_PESERTA?></td>
				<td><?=$r->NAMA_PESERTA?></td>
				<td><?=$r->THN_ANGKATAN?></td>
				<td><?=$r->STATUS_PESERTA?></td>
				<td >
					<a href="<?=site_url().'/peserta/view/'.$r->IDPESERTA?>" class="control" >
						<span class="view">view</span></a> |
					<a href="<?=site_url().'/peserta/edit/'.$r->IDPESERTA?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/peserta/proses_delete/'.$r->IDPESERTA?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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