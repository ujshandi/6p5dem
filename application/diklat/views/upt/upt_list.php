<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data UPT</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/upt/add'?>"class="control"> <span class="add">Tambah Data</span></a>
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>Kode UPT</th>
		<th width="35%">Nama UPT</th>
		<th width="20%">Satker</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=1;
		foreach($result->result() as $r){
		?>
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td ><?=$r->KODE_UPT?></td>
				<td ><?=$r->NAMA_UPT?></td>
				<td ><?=$r->NAMA_INDUK?></td>
				<td >
					<a href="<?=site_url().'/upt/edit/'.$r->KODE_UPT?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/upt/proses_delete/'.$r->KODE_UPT?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')"class="control">
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