<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Setting Pendaftaran Taruna</h1>
	<hr/>
	<a href="<?=base_url().$this->config->item('index_page').'/setting_pendaftaran/add'?>" class="control"> <span class="add">Tambah Settingan</span></a>

	
	<table width="100%">
	  <thead>
		<th>NO</th>
		<th width="18%">UPT</th>
		<th width="12%">PERIODE AWAL</th>
		<th width="12%">PERIODE AKHIR</th>
		<th>AKSI</th>
	  </thead>
	  <tbody>
		
		<?
		$i=1;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td><?=$i?></td>
				<td width='50%'><?=$r->NAMA_UPT?></td>
				<td><?=$r->PERIODE_AWAL?></td>
				<td><?=$r->PERIODE_AKHIR?></td>
				<td >
					<a href="<?=site_url().'/setting_pendaftaran/edit/'.$r->ID_PENDAFTARAN?>" class="control" >
						<span class="edit">edit</span></a> |
					<a href="<?=site_url().'/setting_pendaftaran/proses_delete/'.$r->ID_PENDAFTARAN?>" OnClick="return confirm('Apakah anda benar akan menghapus data?')" class="control">
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